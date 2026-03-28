<?php
/** @var string $pageTitle */
/** @var string $activeKey */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?></title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="shell">
    <aside class="sidebar">
      <div class="brand-block">
        <span class="brand-dot"></span>
        <div>
          <div class="brand">EverythingEasy</div>
          <div class="brand-sub">Admin Lite Panel</div>
        </div>
      </div>

      <nav class="nav">
        <a class="<?= $activeKey === 'dashboard' ? 'active' : '' ?>" href="index.php">Dashboard</a>
        <a class="<?= $activeKey === 'blogs' ? 'active' : '' ?>" href="blogs.php">Blogs</a>
        <a class="<?= $activeKey === 'quotes' ? 'active' : '' ?>" href="quotes.php">Quotes</a>
        <a class="<?= $activeKey === 'contact_form' ? 'active' : '' ?>" href="contact-form.php">Contact Form</a>
        <a class="<?= $activeKey === 'company_detail' ? 'active' : '' ?>" href="company-detail.php">Company Detail</a>
        <a class="<?= $activeKey === 'job_applications' ? 'active' : '' ?>" href="job-applications.php">Job Applications</a>
        <a class="<?= $activeKey === 'locations' ? 'active' : '' ?>" href="locations.php">Locations</a>
        <a class="<?= $activeKey === 'locations_application' ? 'active' : '' ?>" href="locations-application.php">Locations App</a>
        <a class="<?= $activeKey === 'sitemap' ? 'active' : '' ?>" href="sitemap.php">Sitemap</a>
      </nav>

      <div class="sidebar-foot">
        <div class="user-chip">Logged in: <?= e((string) ($_SESSION['admin_lite_user'] ?? 'admin')) ?></div>
        <a class="logout" href="logout.php">Logout</a>
      </div>
    </aside>

    <main class="content">
      <header class="topbar">
        <div>
          <h1><?= e($pageTitle) ?></h1>
          <p>Simple and responsive admin control</p>
        </div>
      </header>
