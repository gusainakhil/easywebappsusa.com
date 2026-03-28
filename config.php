<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!defined('DB_HOST')) {
    define('DB_HOST', '68.178.236.80');
    define('DB_PORT', '3306');
    define('DB_NAME', 'EverythingeasyDatabase_usa');
    define('DB_USER', 'everythingeasyuser');
    define('DB_PASS', 'nU7H[I7#gN)d');
}

if (!function_exists('getDbConnection')) {
    function getDbConnection(): PDO
    {
        static $pdo = null;
        
        if ($pdo instanceof PDO) {
            return $pdo;
        }
        
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        
        return $pdo;
    }
}

if (!function_exists('getCompanyInfo')) {
    function getCompanyInfo(): array
    {
        try {
            $stmt = getDbConnection()->query('SELECT * FROM `company_detail` LIMIT 1');
            $result = $stmt->fetch();
            
            if (empty($result)) {
                return [
                    'company_email' => 'info@everythingeasy.com',
                    'company_number' => '+1 (844) EASY-WEB',
                    'company_address' => 'USA',
                ];
            }
            
            // Map possible column name variations to standard keys
            $normalized = [
                'company_email' => '',
                'company_number' => '',
                'company_address' => '',
            ];
            
            foreach ($result as $key => $value) {
                $lowerKey = strtolower($key);
                if (strpos($lowerKey, 'email') !== false) {
                    $normalized['company_email'] = $value;
                } elseif (strpos($lowerKey, 'number') !== false || strpos($lowerKey, 'phone') !== false) {
                    $normalized['company_number'] = $value;
                } elseif (strpos($lowerKey, 'address') !== false) {
                    $normalized['company_address'] = $value;
                }
            }
            
            // Use normalized values if found, otherwise fallback
            return [
                'company_email' => $normalized['company_email'] ?: 'info@everythingeasy.com',
                'company_number' => $normalized['company_number'] ?: '+1 (844) EASY-WEB',
                'company_address' => $normalized['company_address'] ?: 'USA',
            ];
        } catch (Throwable $t) {
            return [
                'company_email' => 'info@everythingeasy.com',
                'company_number' => '+1 (844) EASY-WEB',
                'company_address' => 'USA',
            ];
        }
    }
}

if (!function_exists('e')) {
    function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('dbTableExists')) {
    function dbTableExists(string $table): bool
    {
        $stmt = getDbConnection()->prepare('SHOW TABLES LIKE :table_name');
        $stmt->execute([':table_name' => $table]);
        return (bool) $stmt->fetchColumn();
    }
}

if (!function_exists('dbTableColumns')) {
    function dbTableColumns(string $table): array
    {
        static $cache = [];

        if (isset($cache[$table])) {
            return $cache[$table];
        }

        $stmt = getDbConnection()->query('SHOW COLUMNS FROM `' . str_replace('`', '``', $table) . '`');
        $rows = $stmt->fetchAll();
        $cols = [];

        foreach ($rows as $row) {
            $field = (string) ($row['Field'] ?? '');
            if ($field !== '') {
                $cols[] = $field;
            }
        }

        $cache[$table] = $cols;
        return $cols;
    }
}

if (!function_exists('pickFirstExistingColumn')) {
    function pickFirstExistingColumn(array $columns, array $candidates): ?string
    {
        $index = [];
        foreach ($columns as $column) {
            $index[strtolower((string) $column)] = (string) $column;
        }

        foreach ($candidates as $candidate) {
            $key = strtolower((string) $candidate);
            if (isset($index[$key])) {
                return $index[$key];
            }
        }

        return null;
    }
}

if (!function_exists('saveLeadSubmission')) {
    function saveLeadSubmission(array $input): array
    {
        $name = trim((string) ($input['name'] ?? ''));
        $email = trim((string) ($input['email'] ?? ''));
        $phone = trim((string) ($input['phone'] ?? ''));
        $service = trim((string) ($input['service'] ?? ''));
        $message = trim((string) ($input['message'] ?? ''));
        $sourcePage = trim((string) ($input['source_page'] ?? ''));
        $formType = trim((string) ($input['form_type'] ?? ''));

        $nameParts = preg_split('/\s+/', $name, 2) ?: [];
        $firstName = trim((string) ($nameParts[0] ?? ''));
        $lastName = trim((string) ($nameParts[1] ?? ''));

        if ($firstName === '') {
            $firstName = $name;
        }

        if ($lastName === '') {
            $lastName = '-';
        }

        if ($name === '' || $email === '' || $phone === '') {
            throw new InvalidArgumentException('Name, email and phone are required.');
        }

        $isContactSubmission = ($sourcePage === 'contact' || $formType === 'contact_form');
        $candidateTables = $isContactSubmission
            ? ['contact_form', 'quotes']
            : ['quotes', 'contact_form'];

        $existingTables = [];
        foreach ($candidateTables as $table) {
            if (dbTableExists($table)) {
                $existingTables[] = $table;
            }
        }

        if (empty($existingTables)) {
            throw new RuntimeException('No target table available for form submission.');
        }

        $inserted = [];

        foreach ($existingTables as $targetTable) {
            $columns = dbTableColumns($targetTable);

            $insertData = [];
            $addColumn = static function (?string $column, string $value) use (&$insertData): void {
                if ($column !== null && $column !== '') {
                    $insertData[$column] = $value;
                }
            };

            $addColumn(pickFirstExistingColumn($columns, ['first_name', 'firstname']), $firstName);
            $addColumn(pickFirstExistingColumn($columns, ['last_name', 'lastname']), $lastName);
            $addColumn(pickFirstExistingColumn($columns, ['name', 'full_name', 'client_name']), $name);
            $addColumn(pickFirstExistingColumn($columns, ['email', 'email_address']), $email);
            $addColumn(pickFirstExistingColumn($columns, ['phone', 'phone_number', 'mobile', 'mobile_number']), $phone);
            $addColumn(pickFirstExistingColumn($columns, ['service', 'services', 'service_type', 'project_type']), $service);
            $addColumn(pickFirstExistingColumn($columns, ['message', 'project_details', 'details', 'description']), $message);
            $addColumn(pickFirstExistingColumn($columns, ['source', 'source_page', 'page']), $sourcePage);
            $addColumn(pickFirstExistingColumn($columns, ['form_type', 'form_name']), $formType);
            $addColumn(pickFirstExistingColumn($columns, ['status']), 'pending');

            if (empty($insertData)) {
                continue;
            }

            $fields = [];
            $placeholders = [];
            $params = [];

            foreach ($insertData as $field => $value) {
                $fields[] = '`' . str_replace('`', '``', $field) . '`';
                $ph = ':' . $field;
                $placeholders[] = $ph;
                $params[$ph] = $value;
            }

            $sql = 'INSERT INTO `' . str_replace('`', '``', $targetTable) . '` (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $placeholders) . ')';
            $stmt = getDbConnection()->prepare($sql);
            $stmt->execute($params);
            $inserted[$targetTable] = (int) getDbConnection()->lastInsertId();

            if (!$isContactSubmission) {
                break;
            }
        }

        if (empty($inserted)) {
            throw new RuntimeException('No compatible columns found in target table.');
        }

        $primaryTable = $isContactSubmission ? 'contact_form' : 'quotes';
        if (!isset($inserted[$primaryTable])) {
            $primaryTable = (string) array_key_first($inserted);
        }

        return [
            'table' => $primaryTable,
            'id' => (int) ($inserted[$primaryTable] ?? 0),
            'inserted' => $inserted,
        ];
    }
}

if (!defined('LEAD_ADMIN_RECIPIENTS')) {
    define('LEAD_ADMIN_RECIPIENTS', [
        'info@everythingeasy.in',
        'akhilgusain65@gmail.com',
        'akhilgusain2@gmail.com',
        'sarthakbhatt1407@gmail.com',
    ]);
}

if (!defined('LEAD_FROM_EMAIL')) {
    define('LEAD_FROM_EMAIL', 'info@everythingeasy.in');
}

if (!defined('LEAD_FROM_NAME')) {
    define('LEAD_FROM_NAME', 'EverythingEasy Leads');
}

if (!function_exists('safeLog')) {
    function safeLog(string $message): void
    {
        try {
            $dir = __DIR__ . '/logs';
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            $line = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
            @file_put_contents($dir . '/lead-mail.log', $line, FILE_APPEND);
        } catch (Throwable $t) {
            error_log('safeLog failed: ' . $t->getMessage());
        }
    }
}

if (!function_exists('smtpSendPlainTextMail')) {
    function smtpSendPlainTextMail(string $to, string $subject, string $plainBody, string $fromEmail, string $fromName): bool
    {
        // Placeholder for SMTP implementation; fallback to mail() is used by caller.
        safeLog('smtpSendPlainTextMail not implemented; using fallback for ' . $to);
        return false;
    }
}

if (!function_exists('safeSendPlainTextMail')) {
    function safeSendPlainTextMail(string $to, string $subject, string $plainBody, string $fromEmail, string $fromName): bool
    {
        try {
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                safeLog('safeSendPlainTextMail invalid recipient email: ' . $to);
                return false;
            }

            $safeFromName = str_replace(["\r", "\n"], '', $fromName);
            $safeFromEmail = filter_var($fromEmail, FILTER_VALIDATE_EMAIL) ? $fromEmail : 'noreply@everythingeasy.in';
            $safeSubject = trim((string) preg_replace('/[\r\n]+/', ' ', $subject));

            $headers = [];
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
            $headers[] = 'Content-Transfer-Encoding: 8bit';
            $headers[] = 'From: ' . $safeFromName . ' <' . $safeFromEmail . '>';
            $headers[] = 'Reply-To: ' . $safeFromEmail;
            $headers[] = 'Return-Path: ' . $safeFromEmail;
            $headers[] = 'Date: ' . date(DATE_RFC2822);
            $headers[] = 'Message-ID: <' . uniqid('', true) . '@everythingeasy.in>';
            $headers[] = 'X-Mailer: PHP/' . phpversion();

            $params = '-f ' . $safeFromEmail;
            $headerString = implode("\r\n", $headers);

            $sent = @mail($to, $safeSubject, $plainBody, $headerString, $params);
            if ($sent) {
                return true;
            }

            return @mail($to, $safeSubject, $plainBody, $headerString);
        } catch (Throwable $e) {
            safeLog('safeSendPlainTextMail exception: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('safeSendHtmlMail')) {
    function safeSendHtmlMail(string $to, string $subject, string $htmlBody, string $fromEmail, string $fromName): bool
    {
        try {
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                safeLog('safeSendHtmlMail invalid recipient email: ' . $to);
                return false;
            }

            $safeFromName = str_replace(["\r", "\n"], '', $fromName);
            $safeFromEmail = filter_var($fromEmail, FILTER_VALIDATE_EMAIL) ? $fromEmail : 'noreply@everythingeasy.in';
            $safeSubject = trim((string) preg_replace('/[\r\n]+/', ' ', $subject));

            $boundary = 'b1_' . md5((string) microtime(true));
            $textBody = html_entity_decode(strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $htmlBody)), ENT_QUOTES, 'UTF-8');

            $headers = [];
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: multipart/alternative; boundary="' . $boundary . '"';
            $headers[] = 'From: ' . $safeFromName . ' <' . $safeFromEmail . '>';
            $headers[] = 'Reply-To: ' . $safeFromEmail;
            $headers[] = 'Return-Path: ' . $safeFromEmail;
            $headers[] = 'Date: ' . date(DATE_RFC2822);
            $headers[] = 'Message-ID: <' . uniqid('', true) . '@everythingeasy.in>';
            $headers[] = 'X-Mailer: PHP/' . phpversion();

            $parts = [];
            $parts[] = '--' . $boundary;
            $parts[] = 'Content-Type: text/plain; charset=UTF-8';
            $parts[] = 'Content-Transfer-Encoding: 8bit';
            $parts[] = '';
            $parts[] = $textBody;
            $parts[] = '';
            $parts[] = '--' . $boundary;
            $parts[] = 'Content-Type: text/html; charset=UTF-8';
            $parts[] = 'Content-Transfer-Encoding: 8bit';
            $parts[] = '';
            $parts[] = $htmlBody;
            $parts[] = '';
            $parts[] = '--' . $boundary . '--';

            $messageBody = implode("\r\n", $parts);
            $params = '-f ' . $safeFromEmail;
            $headerString = implode("\r\n", $headers);

            $sent = @mail($to, $safeSubject, $messageBody, $headerString, $params);
            if ($sent) {
                return true;
            }

            return @mail($to, $safeSubject, $messageBody, $headerString);
        } catch (Throwable $e) {
            safeLog('safeSendHtmlMail exception: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('safeSendCustomerThankYouMail')) {
    function safeSendCustomerThankYouMail(string $to, string $subject, string $plainBody, string $fromEmail, string $fromName): bool
    {
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            safeLog('Customer thank-you skipped due to invalid email: ' . $to);
            return false;
        }

        $smtpConfigured = defined('SMTP_HOST') && SMTP_HOST !== ''
            && defined('SMTP_USER') && SMTP_USER !== ''
            && defined('SMTP_PASS') && SMTP_PASS !== '';

        if ($smtpConfigured) {
            $smtpFromEmail = (defined('SMTP_FROM_EMAIL') && SMTP_FROM_EMAIL !== '') ? SMTP_FROM_EMAIL : $fromEmail;
            $smtpFromName = (defined('SMTP_FROM_NAME') && SMTP_FROM_NAME !== '') ? SMTP_FROM_NAME : $fromName;
            $smtpOk = smtpSendPlainTextMail($to, $subject, $plainBody, $smtpFromEmail, $smtpFromName);
            if ($smtpOk) {
                return true;
            }

            safeLog('SMTP failed for customer thank-you, using mail() fallback for: ' . $to);
        } else {
            safeLog('SMTP not configured for customer thank-you, using mail() fallback for: ' . $to);
        }

        return safeSendPlainTextMail($to, $subject, $plainBody, $fromEmail, $fromName);
    }
}

if (!function_exists('buildAdminLeadEmailHtml')) {
    function buildAdminLeadEmailHtml(int $quoteId, array $lead): string
    {
        $fullName = trim(((string) ($lead['firstName'] ?? '')) . ' ' . ((string) ($lead['lastName'] ?? '')));
        $email = (string) ($lead['email'] ?? '');
        $phone = (string) ($lead['phone'] ?? '');
        $service = (string) ($lead['service'] ?? '');
        $message = nl2br(e((string) ($lead['message'] ?? '')));
        $sourcePage = (string) ($lead['sourcePage'] ?? '');

        return '<h2>New Quote Lead #' . $quoteId . '</h2>'
            . '<p><strong>Name:</strong> ' . e($fullName) . '</p>'
            . '<p><strong>Email:</strong> ' . e($email) . '</p>'
            . '<p><strong>Phone:</strong> ' . e($phone) . '</p>'
            . '<p><strong>Service:</strong> ' . e($service) . '</p>'
            . '<p><strong>Source:</strong> ' . e($sourcePage) . '</p>'
            . '<p><strong>Message:</strong><br>' . $message . '</p>';
    }
}

if (!function_exists('buildCustomerThankYouPlainText')) {
    function buildCustomerThankYouPlainText(int $quoteId, string $firstName): string
    {
        $name = trim($firstName) !== '' ? trim($firstName) : 'there';
        return "Hi {$name},\n\n"
            . "Thank you for contacting EverythingEasy. "
            . "We received your quote request (#{$quoteId}) and our team will contact you shortly.\n\n"
            . "Regards,\nEverythingEasy Team";
    }
}

if (!function_exists('sendLeadNotificationEmails')) {
    function sendLeadNotificationEmails(int $quoteId, array $lead): void
    {
        $adminRecipients = is_array(LEAD_ADMIN_RECIPIENTS) ? LEAD_ADMIN_RECIPIENTS : [];
        $fromEmail = LEAD_FROM_EMAIL;
        $fromName = LEAD_FROM_NAME;

        $adminSubject = 'New Quote Lead #' . $quoteId . ' - ' . ((string) ($lead['firstName'] ?? '')) . ' ' . ((string) ($lead['lastName'] ?? ''));
        $adminBody = buildAdminLeadEmailHtml($quoteId, $lead);

        foreach ($adminRecipients as $recipient) {
            $ok = safeSendHtmlMail((string) $recipient, $adminSubject, $adminBody, $fromEmail, $fromName);
            if ($ok) {
                safeLog('SUCCESS: Lead email sent to admin ' . $recipient . ' for Quote ID: ' . $quoteId);
            } else {
                $error = error_get_last();
                safeLog('FAILED: Lead email to admin ' . $recipient . ' for Quote ID: ' . $quoteId . '. Error: ' . ($error ? json_encode($error) : 'Unknown error'));
            }
        }

        $customerEmail = (string) ($lead['email'] ?? '');
        if ($customerEmail !== '') {
            $customerSubject = 'Quote Request Received #' . $quoteId;
            $customerBody = buildCustomerThankYouPlainText($quoteId, (string) ($lead['firstName'] ?? ''));
            $customerOk = safeSendCustomerThankYouMail($customerEmail, $customerSubject, $customerBody, $fromEmail, $fromName);
            if ($customerOk) {
                safeLog('SUCCESS: Thank-you email sent to ' . $customerEmail . ' for Quote ID: ' . $quoteId);
            } else {
                $error = error_get_last();
                safeLog('FAILED: Thank-you email to ' . $customerEmail . ' for Quote ID: ' . $quoteId . '. Error: ' . ($error ? json_encode($error) : 'Unknown error'));
            }
        }
    }
}

if (!function_exists('queueLeadNotificationEmail')) {
    function queueLeadNotificationEmail(int $quoteId, array $lead): void
    {
        try {
            $queueDir = __DIR__ . '/logs/email-queue';
            if (!is_dir($queueDir)) {
                @mkdir($queueDir, 0755, true);
            }
            
            $queueData = json_encode([
                'quoteId' => $quoteId,
                'lead' => $lead,
                'timestamp' => time(),
                'attempts' => 0
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            
            $filename = uniqid('lead_', true) . '.json';
            @file_put_contents($queueDir . '/' . $filename, $queueData);
            
            safeLog('Queued email notification for Quote ID: ' . $quoteId);
            
            // Optional: Try to process queue in background (non-blocking)
            processEmailQueue();
        } catch (Throwable $t) {
            safeLog('Failed to queue email: ' . $t->getMessage());
        }
    }
}

if (!function_exists('processEmailQueue')) {
    function processEmailQueue(): void
    {
        try {
            $queueDir = __DIR__ . '/logs/email-queue';
            if (!is_dir($queueDir)) {
                return;
            }
            
            $files = @glob($queueDir . '/*.json');
            if (empty($files) || !is_array($files)) {
                return;
            }
            
            // Process only first 3 at a time to avoid blocking
            $files = array_slice($files, 0, 3);
            
            foreach ($files as $file) {
                if (!file_exists($file)) {
                    continue;
                }
                
                $content = @file_get_contents($file);
                if (!$content) {
                    @unlink($file);
                    continue;
                }
                
                $data = @json_decode($content, true);
                if (!is_array($data) || !isset($data['quoteId'])) {
                    @unlink($file);
                    continue;
                }
                
                $quoteId = (int) $data['quoteId'];
                $lead = is_array($data['lead']) ? $data['lead'] : [];
                $attempts = (int) ($data['attempts'] ?? 0);
                
                // Try to send email
                sendLeadNotificationEmails($quoteId, $lead);
                
                // Remove from queue after processing
                @unlink($file);
            }
        } catch (Throwable $t) {
            safeLog('Error processing email queue: ' . $t->getMessage());
        }
    }
}
