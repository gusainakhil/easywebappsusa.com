<?php
/**
 * Test script for EasyWebAppsUSA Contact Form
 * Use this to test if your server can send emails
 */

// Load configuration
require_once 'config.php';

// Test email function
function testEmailFunction() {
    $to = RECIPIENT_EMAIL;
    $subject = 'Test Email from EasyWebAppsUSA';
    $message = 'This is a test email to verify that your server can send emails.';
    $headers = 'From: ' . FROM_EMAIL;
    
    if (mail($to, $subject, $message, $headers)) {
        return "✅ Email sent successfully to " . $to;
    } else {
        return "❌ Failed to send email to " . $to;
    }
}

// Test configuration
function testConfiguration() {
    $results = [];
    
    // Check if required constants are defined
    $required_constants = ['RECIPIENT_EMAIL', 'CC_EMAIL', 'FROM_EMAIL', 'FROM_NAME'];
    
    foreach ($required_constants as $constant) {
        if (defined($constant)) {
            $results[] = "✅ $constant is defined: " . constant($constant);
        } else {
            $results[] = "❌ $constant is not defined";
        }
    }
    
    return $results;
}

// Test PHP mail function
function testPHPMailFunction() {
    if (function_exists('mail')) {
        return "✅ PHP mail() function is available";
    } else {
        return "❌ PHP mail() function is not available";
    }
}

// Test file permissions
function testFilePermissions() {
    $results = [];
    
    if (is_writable('.')) {
        $results[] = "✅ Directory is writable for log files";
    } else {
        $results[] = "❌ Directory is not writable - logging may fail";
    }
    
    if (file_exists(LOG_FILE)) {
        if (is_writable(LOG_FILE)) {
            $results[] = "✅ Log file is writable";
        } else {
            $results[] = "❌ Log file exists but is not writable";
        }
    } else {
        $results[] = "ℹ️ Log file doesn't exist yet (will be created on first submission)";
    }
    
    return $results;
}

// Run tests
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyWebAppsUSA Contact Form Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .test-section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .info { color: #17a2b8; }
        .test-email { background: #f8f9fa; padding: 10px; margin: 10px 0; border-left: 4px solid #007bff; }
    </style>
</head>
<body>
    <h1>🧪 EasyWebAppsUSA Contact Form Test</h1>
    
    <div class="test-section">
        <h2>📧 Email Function Test</h2>
        <p><?php echo testPHPMailFunction(); ?></p>
    </div>
    
    <div class="test-section">
        <h2>⚙️ Configuration Test</h2>
        <?php 
        $config_results = testConfiguration();
        foreach ($config_results as $result) {
            echo "<p>$result</p>";
        }
        ?>
    </div>
    
    <div class="test-section">
        <h2>📁 File Permissions Test</h2>
        <?php 
        $permission_results = testFilePermissions();
        foreach ($permission_results as $result) {
            echo "<p>$result</p>";
        }
        ?>
    </div>
    
    <div class="test-section">
        <h2>📤 Send Test Email</h2>
        <div class="test-email">
            <strong>⚠️ Warning:</strong> This will send a test email to <?php echo RECIPIENT_EMAIL; ?>
        </div>
        
        <?php
        if (isset($_GET['send_test']) && $_GET['send_test'] == '1') {
            echo "<p>" . testEmailFunction() . "</p>";
            echo "<p><em>Check your inbox (and spam folder) for the test email.</em></p>";
        } else {
            echo '<p><a href="?send_test=1" style="background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Send Test Email</a></p>';
        }
        ?>
    </div>
    
    <div class="test-section">
        <h2>📋 Server Information</h2>
        <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
        <p><strong>Server:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></p>
        <p><strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?></p>
        <p><strong>Script Path:</strong> <?php echo __FILE__; ?></p>
        <p><strong>Current Directory:</strong> <?php echo getcwd(); ?></p>
    </div>
    
    <div class="test-section">
        <h2>🔧 Troubleshooting Tips</h2>
        <ul>
            <li><strong>Email not received:</strong> Check spam folders in both Gmail accounts</li>
            <li><strong>Permission errors:</strong> Run <code>chmod 666 contact_submissions.log</code></li>
            <li><strong>SMTP issues:</strong> Consider enabling SMTP in config.php</li>
            <li><strong>Server blocks mail:</strong> Contact your hosting provider</li>
        </ul>
    </div>
    
    <div class="test-section">
        <h2>🔒 Security Note</h2>
        <p><strong>⚠️ Important:</strong> Delete this test file after testing for security reasons!</p>
        <p>Run: <code>rm test-email.php</code> or delete via FTP/cPanel</p>
    </div>
</body>
</html>
