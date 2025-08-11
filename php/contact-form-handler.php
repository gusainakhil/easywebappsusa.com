<?php
// Contact Form Handler for EasyWebAppsUSA
// Handles form submissions and sends emails

// Load configuration
require_once 'config.php';

// Enable error reporting for debugging (controlled by config)
if (ENABLE_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Set response header
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Only POST method allowed'
    ]);
    exit;
}

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number (basic US format)
function validate_phone($phone) {
    if (empty($phone)) return true; // Phone is optional
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 15;
}

try {
    // Collect and sanitize form data
    $name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
    $budget = isset($_POST['budget']) ? sanitize_input($_POST['budget']) : '';
    $service = isset($_POST['service']) ? sanitize_input($_POST['service']) : '';
    $message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';
    $agree = isset($_POST['agree']) ? $_POST['agree'] : '';

    // Validation
    $errors = [];

    // Required fields validation
    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!validate_email($email)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($service)) {
        $errors[] = 'Service selection is required';
    }

    if (empty($message)) {
        $errors[] = 'Project details are required';
    }

    if (empty($agree)) {
        $errors[] = 'You must agree to the Privacy Policy';
    }

    // Phone validation (if provided)
    if (!validate_phone($phone)) {
        $errors[] = 'Invalid phone number format';
    }

    // If there are validation errors, return them
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $errors
        ]);
        exit;
    }

    // Prepare email content
    $subject = EMAIL_SUBJECT_PREFIX . ' - ' . $service;
    
    // Format budget display
    $budget_display = '';
    switch($budget) {
        case 'under-5k':
            $budget_display = 'Under $5,000';
            break;
        case '5k-10k':
            $budget_display = '$5,000 - $10,000';
            break;
        case '10k-25k':
            $budget_display = '$10,000 - $25,000';
            break;
        case '25k-50k':
            $budget_display = '$25,000 - $50,000';
            break;
        case 'over-50k':
            $budget_display = 'Over $50,000';
            break;
        default:
            $budget_display = 'Not specified';
    }

    // Format service display
    $service_display = '';
    switch($service) {
        case 'website':
            $service_display = 'Custom Website Development';
            break;
        case 'mobile-app':
            $service_display = 'Mobile App Development';
            break;
        case 'software':
            $service_display = 'Custom Software Development';
            break;
        case 'hotel':
            $service_display = 'Hotel Website';
            break;
        case 'travel':
            $service_display = 'Travel Website';
            break;
        case 'portfolio':
            $service_display = 'Portfolio Website';
            break;
        case 'other':
            $service_display = 'Other Services';
            break;
        default:
            $service_display = $service;
    }

    // Create HTML email body
    $html_body = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #007bff; color: white; padding: 20px; text-align: center; }
            .content { background-color: #f8f9fa; padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #495057; }
            .value { margin-top: 5px; padding: 10px; background-color: white; border-left: 4px solid #007bff; }
            .footer { background-color: #343a40; color: white; padding: 15px; text-align: center; font-size: 12px; }
            .urgent { background-color: #dc3545; color: white; padding: 10px; margin: 10px 0; text-align: center; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
                <p>" . WEBSITE_NAME . " Website</p>
            </div>
            
            <div class='content'>
                <div class='urgent'>
                    <strong>⚡ NEW LEAD ALERT ⚡</strong><br>
                    A potential client has submitted a project inquiry!
                </div>
                
                <div class='field'>
                    <div class='label'>👤 Client Name:</div>
                    <div class='value'>" . htmlspecialchars($name) . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>📧 Email Address:</div>
                    <div class='value'><a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></div>
                </div>
                
                <div class='field'>
                    <div class='label'>📱 Phone Number:</div>
                    <div class='value'>" . (!empty($phone) ? "<a href='tel:" . preg_replace('/[^0-9+]/', '', $phone) . "'>" . htmlspecialchars($phone) . "</a>" : "Not provided") . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>🎯 Service Requested:</div>
                    <div class='value'>" . htmlspecialchars($service_display) . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>💰 Project Budget:</div>
                    <div class='value'>" . htmlspecialchars($budget_display) . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>📝 Project Details:</div>
                    <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>📅 Submission Date:</div>
                    <div class='value'>" . date('F j, Y \a\t g:i A T') . "</div>
                </div>
                
                <div class='field'>
                    <div class='label'>🌐 User IP:</div>
                    <div class='value'>" . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "</div>
                </div>
            </div>
            
            <div class='footer'>
                <p><strong>Next Steps:</strong></p>
                <p>1. Respond within 24 hours for best conversion rates</p>
                <p>2. Send a personalized quote based on their requirements</p>
                <p>3. Schedule a consultation call if budget is suitable</p>
                <hr style='border-color: #555;'>
                <p>This email was sent from the " . WEBSITE_NAME . " contact form</p>
                <p>Website: " . WEBSITE_URL . "</p>
            </div>
        </div>
    </body>
    </html>";

    // Create plain text version
    $text_body = "
NEW CONTACT FORM SUBMISSION - EasyWebAppsUSA

⚡ NEW LEAD ALERT ⚡
A potential client has submitted a project inquiry!

CLIENT INFORMATION:
Name: " . $name . "
Email: " . $email . "
Phone: " . (!empty($phone) ? $phone : "Not provided") . "

PROJECT DETAILS:
Service: " . $service_display . "
Budget: " . $budget_display . "

Message:
" . $message . "

SUBMISSION DETAILS:
Date: " . date('F j, Y \a\t g:i A T') . "
IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "

NEXT STEPS:
1. Respond within 24 hours for best conversion rates
2. Send a personalized quote based on their requirements  
3. Schedule a consultation call if budget is suitable

---
This email was sent from the " . WEBSITE_NAME . " contact form
Website: " . WEBSITE_URL . "
";

    // Set email headers
    $headers = array();
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>';
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    $headers[] = 'Cc: ' . CC_EMAIL;
    $headers[] = 'X-Mailer: PHP/' . phpversion();
    $headers[] = 'X-Priority: 1'; // High priority
    
    // Convert headers array to string
    $headers_string = implode("\r\n", $headers);

    // Send email
    $mail_sent = mail(RECIPIENT_EMAIL, $subject, $html_body, $headers_string);

    if ($mail_sent) {
        // Log successful submission (if enabled)
        if (ENABLE_LOGGING) {
            $log_entry = date('Y-m-d H:i:s') . " - Form submission from: " . $email . " (" . $name . ")\n";
            file_put_contents(LOG_FILE, $log_entry, FILE_APPEND | LOCK_EX);
        }
        
        // Return success response
        echo json_encode([
            'success' => true,
            'message' => SUCCESS_MESSAGE,
            'data' => [
                'submission_time' => date('c'),
                'reference_id' => 'EWA-' . date('Ymd') . '-' . substr(md5($email . time()), 0, 6)
            ]
        ]);
    } else {
        // Email failed to send
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => ERROR_MESSAGE,
            'error' => 'Mail function failed'
        ]);
    }

} catch (Exception $e) {
    // Handle any unexpected errors
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An unexpected error occurred. Please try again later.',
        'error' => $e->getMessage()
    ]);
}
?>
