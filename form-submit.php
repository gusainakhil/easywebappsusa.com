<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

$redirect = trim((string) ($_POST['redirect'] ?? 'index.php'));
if ($redirect === '' || str_contains($redirect, '://') || str_starts_with($redirect, '/')) {
    $redirect = 'index.php';
}

$allowedPages = [
    'index.php',
    'web-development.php',
    'app-development.php',
    'contact.php'
];

if (!in_array($redirect, $allowedPages, true)) {
    $redirect = 'index.php';
}

try {
    $submission = saveLeadSubmission([
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'service' => $_POST['service'] ?? '',
        'message' => $_POST['message'] ?? '',
        'source_page' => $_POST['source_page'] ?? '',
        'form_type' => $_POST['form_type'] ?? '',
    ]);

    $fullName = trim((string) ($_POST['name'] ?? ''));
    $nameParts = preg_split('/\s+/', $fullName, 2) ?: [];
    $leadPayload = [
        'firstName' => trim((string) ($nameParts[0] ?? '')),
        'lastName' => trim((string) ($nameParts[1] ?? '-')),
        'email' => trim((string) ($_POST['email'] ?? '')),
        'phone' => trim((string) ($_POST['phone'] ?? '')),
        'service' => trim((string) ($_POST['service'] ?? '')),
        'message' => trim((string) ($_POST['message'] ?? '')),
        'sourcePage' => trim((string) ($_POST['source_page'] ?? '')),
    ];

    $quoteId = 0;
    if (is_array($submission) && isset($submission['inserted']) && is_array($submission['inserted']) && isset($submission['inserted']['quotes'])) {
        $quoteId = (int) $submission['inserted']['quotes'];
    } elseif (is_array($submission) && (($submission['table'] ?? '') === 'quotes')) {
        $quoteId = (int) ($submission['id'] ?? 0);
    }

    // Queue email for background processing instead of sending immediately
    if ($quoteId > 0) {
        queueLeadNotificationEmail($quoteId, $leadPayload);
    }

    if ($redirect === 'contact.php') {
        $_SESSION['contact_form_status'] = 'success';
        if (is_array($submission)) {
            $_SESSION['contact_form_ref'] = strtoupper((string) ($submission['table'] ?? 'contact_form')) . '-' . (string) ((int) ($submission['id'] ?? 0));
        }
        header('Location: ' . $redirect);
        session_write_close();
        exit;
    }

    header('Location: ' . $redirect . '?form=success');
    session_write_close();
    exit;
} catch (Throwable $t) {
    error_log('form-submit failed: ' . $t->getMessage());

    if ($redirect === 'contact.php') {
        $_SESSION['contact_form_status'] = 'error';
        unset($_SESSION['contact_form_ref']);
        header('Location: ' . $redirect);
        exit;
    }

    header('Location: ' . $redirect . '?form=error');
    exit;
}
