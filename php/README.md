# EasyWebAppsUSA Contact Form Backend

This PHP backend handles contact form submissions from the EasyWebAppsUSA website and sends emails to specified Gmail addresses.

## Features

- ✅ Sends emails to both `akhilgusain2@gmail.com` and `akhilgusain65@gmail.com`
- ✅ Professional HTML email templates with company branding
- ✅ Form validation and sanitization
- ✅ Spam protection and security measures
- ✅ JSON responses for AJAX integration
- ✅ Submission logging for tracking
- ✅ Mobile-friendly email templates
- ✅ Automatic reference ID generation

## Files Structure

```
php/
├── contact-form-handler.php    # Main form processing script
├── config.php                  # Configuration settings
└── contact_submissions.log     # Log file (created automatically)
```

## Installation

1. **Upload PHP files** to your web server in the `php/` directory
2. **Set file permissions**:
   ```bash
   chmod 644 php/contact-form-handler.php
   chmod 644 php/config.php
   chmod 666 php/contact_submissions.log  # Will be created automatically
   ```

3. **Configure email settings** in `php/config.php`:
   - Update email addresses if needed
   - Set your domain name
   - Configure SMTP (optional, for better deliverability)

## Configuration

### Basic Setup (php/config.php)

```php
// Email Configuration
define('RECIPIENT_EMAIL', 'akhilgusain2@gmail.com');  // Primary email
define('CC_EMAIL', 'akhilgusain65@gmail.com');        // Secondary email
define('FROM_EMAIL', 'noreply@easywebappsusa.com');   // From address
```

### Advanced Configuration

- **SMTP Setup**: For better email delivery, enable SMTP in config.php
- **Security**: Enable rate limiting and spam protection
- **Logging**: Control form submission logging

## Email Configuration for Better Delivery

### Option 1: Using PHP mail() function (Default)
- Works out of the box on most shared hosting
- May have deliverability issues with Gmail

### Option 2: Using SMTP (Recommended)
1. Get SMTP credentials from your hosting provider or Gmail
2. Update `config.php`:
   ```php
   define('ENABLE_SMTP', true);
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_USERNAME', 'your-email@gmail.com');
   define('SMTP_PASSWORD', 'your-app-password');
   ```

### Gmail App Password Setup
1. Enable 2-Factor Authentication on your Gmail account
2. Generate an App Password: [Google Account Settings](https://myaccount.google.com/apppasswords)
3. Use the app password in SMTP_PASSWORD

## Form Integration

The contact form in `contact.html` is already configured to work with this backend:

```html
<form method="POST" action="php/contact-form-handler.php">
    <!-- Form fields -->
</form>
```

## Testing

1. **Test the form** by submitting it on your website
2. **Check email delivery** to both Gmail addresses
3. **Verify logging** in `contact_submissions.log`
4. **Test error handling** by submitting invalid data

## Email Template

The backend sends professional HTML emails with:

- **Company branding** with EasyWebAppsUSA styling
- **Client information** (name, email, phone)
- **Project details** (service type, budget, description)
- **Submission metadata** (timestamp, IP address)
- **Call-to-action** for quick response

## Security Features

- Input sanitization and validation
- CSRF protection (optional)
- Rate limiting per IP address
- Honeypot spam protection
- SQL injection prevention

## Troubleshooting

### Emails not being received:

1. **Check spam folders** in both Gmail accounts
2. **Verify server mail configuration**:
   ```php
   <?php
   if (mail('test@example.com', 'Test', 'Test message')) {
       echo 'Mail function is working';
   } else {
       echo 'Mail function failed';
   }
   ?>
   ```

3. **Enable debug mode** in config.php temporarily
4. **Check error logs** on your web server

### Form submission errors:

1. **Check file permissions** on PHP files
2. **Verify form action URL** points to correct path
3. **Check JavaScript console** for AJAX errors
4. **Review server error logs**

## Production Checklist

- [ ] Set `ENABLE_DEBUG` to `false` in config.php
- [ ] Configure proper SMTP settings
- [ ] Set up proper file permissions
- [ ] Test email delivery thoroughly
- [ ] Configure server-level spam protection
- [ ] Set up SSL certificate for HTTPS
- [ ] Configure proper error logging

## Support

For technical support or customization:
- Email: info@easywebappsusa.com
- Website: https://easywebappsusa.com

## License

This contact form backend is proprietary to EasyWebAppsUSA.
