<?php
/**
 * Configuration file for EasyWebAppsUSA Contact Form
 * Update these settings according to your hosting environment
 */

// Email Configuration
define('RECIPIENT_EMAIL', 'akhilgusain2@gmail.com');  // Primary email to receive form submissions
define('CC_EMAIL', 'akhilgusain65@gmail.com');        // Secondary email (CC)
define('FROM_EMAIL', 'noreply@easywebappsusa.com');   // From email address
define('FROM_NAME', 'EasyWebAppsUSA Contact Form');   // From name

// Website Configuration
define('WEBSITE_NAME', 'EasyWebAppsUSA');
define('WEBSITE_URL', 'https://easywebappsusa.com');

// Server Configuration
define('ENABLE_LOGGING', true);                       // Enable/disable form submission logging
define('LOG_FILE', 'contact_submissions.log');        // Log file name
define('ENABLE_DEBUG', false);                        // Enable/disable error debugging (set to false in production)

// Email Settings
define('EMAIL_SUBJECT_PREFIX', '[EasyWebAppsUSA] New Contact Form Submission');
define('EMAIL_PRIORITY', 'high');                     // Email priority: high, normal, low

// Validation Settings
define('MAX_MESSAGE_LENGTH', 5000);                   // Maximum message length
define('MIN_MESSAGE_LENGTH', 10);                     // Minimum message length
define('REQUIRED_FIELDS', ['name', 'email', 'service', 'message', 'agree']); // Required form fields

// Security Settings
define('ENABLE_HONEYPOT', true);                      // Enable honeypot spam protection
define('MAX_SUBMISSIONS_PER_IP', 5);                  // Max submissions per IP per hour (set to 0 to disable)
define('ENABLE_CSRF_PROTECTION', false);              // Enable CSRF protection (requires session management)

// SMTP Settings (Optional - for better email delivery)
// If you have SMTP credentials, set ENABLE_SMTP to true and fill in the details
define('ENABLE_SMTP', false);                         // Use SMTP instead of PHP mail() function
define('SMTP_HOST', 'smtp.gmail.com');                // SMTP server
define('SMTP_PORT', 587);                             // SMTP port
define('SMTP_USERNAME', '');                          // SMTP username
define('SMTP_PASSWORD', '');                          // SMTP password
define('SMTP_ENCRYPTION', 'tls');                     // SMTP encryption: tls, ssl, or none

// Response Messages
define('SUCCESS_MESSAGE', 'Thank you for your message! We will get back to you within 24 hours.');
define('ERROR_MESSAGE', 'Sorry, there was an error sending your message. Please try again or contact us directly.');
define('VALIDATION_ERROR_MESSAGE', 'Please check your form entries and try again.');

?>
