<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

function isAdminLiteLoggedIn(): bool
{
    return !empty($_SESSION['admin_lite_logged_in']);
}

function requireAdminLiteLogin(): void
{
    if (!isAdminLiteLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function loginAdminLite(string $user, string $pass): bool
{
    if ($user === ADMIN_USER && $pass === ADMIN_PASS) {
        $_SESSION['admin_lite_logged_in'] = true;
        $_SESSION['admin_lite_user'] = ADMIN_USER;
        return true;
    }

    return false;
}

function logoutAdminLite(): void
{
    $_SESSION = [];
    session_destroy();
}
