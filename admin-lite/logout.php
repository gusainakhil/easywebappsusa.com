<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
logoutAdminLite();
header('Location: login.php');
exit;
