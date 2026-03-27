<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';

if (isAdminLiteLoggedIn()) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim((string) ($_POST['username'] ?? ''));
    $pass = (string) ($_POST['password'] ?? '');

    if (loginAdminLite($user, $pass)) {
        header('Location: index.php');
        exit;
    }

    $error = 'Invalid username or password';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="login-wrap">
    <form class="login-card" method="post">
      <h1>Admin Lite Login</h1>
      <?php if ($error !== ''): ?><div class="err"><?= e($error) ?></div><?php endif; ?>
      <input name="username" placeholder="Username" required>
      <input name="password" type="password" placeholder="Password" required>
      <button class="btn" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
