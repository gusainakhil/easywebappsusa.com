<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$pageTitle = 'Blogs';
$activeKey = 'blogs';
$success = isset($_GET['ok']) ? trim((string) $_GET['ok']) : '';

$statsRows = dbLite()->query("SELECT status, COUNT(*) AS total FROM `blogs` GROUP BY status")->fetchAll();
$published = 0;
$draft = 0;
foreach ($statsRows as $s) {
    if (($s['status'] ?? '') === 'published') {
        $published = (int) $s['total'];
    }
    if (($s['status'] ?? '') === 'draft') {
        $draft = (int) $s['total'];
    }
}

$totalBlogs = (int) dbLite()->query('SELECT COUNT(*) FROM `blogs`')->fetchColumn();
$totalViews = (int) (dbLite()->query('SELECT COALESCE(SUM(`views`), 0) FROM `blogs`')->fetchColumn() ?: 0);
$rows = dbLite()->query('SELECT `id`, `title`, `category`, `author`, `status`, `views`, `slug` FROM `blogs` ORDER BY `id` DESC LIMIT 200')->fetchAll();

require __DIR__ . '/header.php';
?>
<div class="cards">
  <div class="card"><div class="label">Total Blogs</div><div class="value"><?= e((string) $totalBlogs) ?></div></div>
  <div class="card"><div class="label">Published</div><div class="value"><?= e((string) $published) ?></div></div>
  <div class="card"><div class="label">Draft</div><div class="value"><?= e((string) $draft) ?></div></div>
  <div class="card"><div class="label">Total Views</div><div class="value"><?= e((string) $totalViews) ?></div></div>
</div>

<?php if ($success !== ''): ?><div class="ok"><?= e($success) ?></div><?php endif; ?>

<div class="panel" style="margin-bottom:10px;">
  <a class="btn" href="blog-editor.php">Add Blog</a>
</div>

<div class="panel">
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>title</th>
          <th>slug</th>
          <th>category</th>
          <th>author</th>
          <th>status</th>
          <th>views</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row): ?>
          <tr>
            <td><?= e((string) $row['id']) ?></td>
            <td><?= e((string) $row['title']) ?></td>
            <td><?= e((string) $row['slug']) ?></td>
            <td><?= e((string) $row['category']) ?></td>
            <td><?= e((string) $row['author']) ?></td>
            <td><?= e((string) $row['status']) ?></td>
            <td><?= e((string) $row['views']) ?></td>
            <td><a class="btn light" href="blog-editor.php?edit=<?= e((string) $row['id']) ?>">Edit</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require __DIR__ . '/footer.php'; ?>
