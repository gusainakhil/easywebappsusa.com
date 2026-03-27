<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$table = (string) ($_GET['table'] ?? '');
$id = (string) ($_GET['id'] ?? '');
$allowed = adminLiteTables();

if (!isset($allowed[$table]) || $id === '') {
    http_response_code(400);
    exit('Invalid edit request');
}

$allColumns = dbLite()->query('SHOW COLUMNS FROM ' . quoteIdentLite($table))->fetchAll();
$hidden = ['created_at', 'updated_at'];
if ($table === 'quotes') {
    $hidden = array_merge($hidden, ['first_name', 'last_name']);
}

$editable = array_values(array_filter($allColumns, static function (array $col) use ($hidden): bool {
    $field = (string) ($col['Field'] ?? '');
    if ($field === 'id') return false;
    return !in_array($field, $hidden, true);
}));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $set = [];
    $params = [':id' => $id];

    foreach ($editable as $col) {
        $field = (string) $col['Field'];
        $set[] = quoteIdentLite($field) . ' = :' . $field;
        $params[':' . $field] = $_POST[$field] ?? '';
    }

    if (!empty($set)) {
        $sql = 'UPDATE ' . quoteIdentLite($table) . ' SET ' . implode(', ', $set) . ' WHERE `id` = :id';
        $stmt = dbLite()->prepare($sql);
        $stmt->execute($params);
    }

    header('Location: ' . str_replace('_', '-', $table) . '.php');
    exit;
}

$stmt = dbLite()->prepare('SELECT * FROM ' . quoteIdentLite($table) . ' WHERE `id` = :id LIMIT 1');
$stmt->execute([':id' => $id]);
$row = $stmt->fetch();

if (!$row) {
    http_response_code(404);
    exit('Record not found');
}

$pageTitle = 'Edit ' . $allowed[$table];
$activeKey = $table;
require __DIR__ . '/header.php';
?>
<div class="panel">
  <form method="post">
    <?php foreach ($editable as $col): ?>
      <?php $field = (string) $col['Field']; ?>
      <label><?= e($field) ?></label>
      <input name="<?= e($field) ?>" value="<?= e((string) ($row[$field] ?? '')) ?>">
    <?php endforeach; ?>
    <div style="margin-top:10px;">
      <button class="btn" type="submit">Update</button>
    </div>
  </form>
</div>
<?php require __DIR__ . '/footer.php'; ?>
