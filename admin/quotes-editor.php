<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$pageTitle = 'Quotes Editor';
$activeKey = 'quotes';
$error = '';
$editId = (int) ($_GET['edit'] ?? 0);

$allColumns = dbLite()->query('SHOW COLUMNS FROM `quotes`')->fetchAll();
$exclude = ['id', 'created_at', 'updated_at'];

$editableColumns = array_values(array_filter($allColumns, static function (array $col) use ($exclude): bool {
    $field = (string) ($col['Field'] ?? '');
    return !in_array($field, $exclude, true);
}));

$editing = ['id' => 0];
foreach ($editableColumns as $col) {
    $field = (string) ($col['Field'] ?? '');
    $editing[$field] = '';
}

if ($editId > 0) {
    $stmt = dbLite()->prepare('SELECT * FROM `quotes` WHERE `id` = :id LIMIT 1');
    $stmt->execute([':id' => $editId]);
    $row = $stmt->fetch();
    if ($row) {
        $editing = array_merge($editing, $row);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);
    $payload = [];
    foreach ($editableColumns as $col) {
        $field = (string) ($col['Field'] ?? '');
        $payload[$field] = trim((string) ($_POST[$field] ?? ''));
    }

    $required = ['first_name', 'last_name', 'email', 'phone', 'service'];
    foreach ($required as $field) {
        if (array_key_exists($field, $payload) && $payload[$field] === '') {
            $error = 'Please fill required fields: first_name, last_name, email, phone, service.';
            break;
        }
    }

    if ($error === '') {
        try {
            if ($id > 0) {
                $set = [];
                $params = [':id' => $id];
                foreach ($payload as $field => $value) {
                    $set[] = quoteIdentLite($field) . ' = :' . $field;
                    $params[':' . $field] = $value;
                }

                if (!empty($set)) {
                    $sql = 'UPDATE `quotes` SET ' . implode(', ', $set) . ' WHERE `id` = :id';
                    $stmt = dbLite()->prepare($sql);
                    $stmt->execute($params);
                }

                header('Location: quotes.php?ok=' . urlencode('Quote updated successfully.'));
                exit;
            }

            $cols = [];
            $vals = [];
            $params = [];
            foreach ($payload as $field => $value) {
                $cols[] = quoteIdentLite($field);
                $vals[] = ':' . $field;
                $params[':' . $field] = $value;
            }

            if (!empty($cols)) {
                $sql = 'INSERT INTO `quotes` (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $vals) . ')';
                $stmt = dbLite()->prepare($sql);
                $stmt->execute($params);
            }

            header('Location: quotes.php?ok=' . urlencode('Quote added successfully.'));
            exit;
        } catch (Throwable $t) {
            $error = 'Save failed. Please verify field values and try again.';
        }
    }

    $editing = array_merge(['id' => $id], $payload);
}

require __DIR__ . '/header.php';
?>
<?php if ($error !== ''): ?><div class="err"><?= e($error) ?></div><?php endif; ?>

<div class="panel form-panel" style="margin-bottom:10px;">
  <div class="panel-head">
    <h3><?= (int) ($editing['id'] ?? 0) > 0 ? 'Update Quote' : 'Add Quote' ?></h3>
    <p>Quotes add/edit is managed on this dedicated page.</p>
  </div>

  <form method="post" class="form-grid">
    <input type="hidden" name="id" value="<?= e((string) ($editing['id'] ?? 0)) ?>">

    <?php foreach ($editableColumns as $col): ?>
      <?php
        $field = (string) ($col['Field'] ?? '');
        $type = strtolower((string) ($col['Type'] ?? ''));
        $label = ucwords(str_replace('_', ' ', $field));
        $value = (string) ($editing[$field] ?? '');
      ?>
      <label><?= e($label) ?></label>

      <?php if ($field === 'status'): ?>
        <select name="<?= e($field) ?>">
          <?php $statusOptions = ['pending', 'in-progress', 'completed']; ?>
          <?php foreach ($statusOptions as $opt): ?>
            <option value="<?= e($opt) ?>" <?= $value === $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
          <?php endforeach; ?>
        </select>
      <?php elseif ($field === 'newsletter'): ?>
        <select name="<?= e($field) ?>">
          <?php $newsletterOptions = ['yes', 'no']; ?>
          <?php foreach ($newsletterOptions as $opt): ?>
            <option value="<?= e($opt) ?>" <?= strtolower($value) === $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
          <?php endforeach; ?>
        </select>
      <?php elseif (str_contains($type, 'text')): ?>
        <textarea name="<?= e($field) ?>" rows="4"><?= e($value) ?></textarea>
      <?php elseif ($field === 'email'): ?>
        <input type="email" name="<?= e($field) ?>" value="<?= e($value) ?>">
      <?php elseif ($field === 'phone'): ?>
        <input type="tel" name="<?= e($field) ?>" value="<?= e($value) ?>">
      <?php elseif (str_contains($type, 'int') || str_contains($type, 'decimal') || str_contains($type, 'float') || str_contains($type, 'double')): ?>
        <input type="number" step="any" name="<?= e($field) ?>" value="<?= e($value) ?>">
      <?php else: ?>
        <input name="<?= e($field) ?>" value="<?= e($value) ?>">
      <?php endif; ?>
    <?php endforeach; ?>

    <div class="form-actions">
      <button class="btn" type="submit"><?= (int) ($editing['id'] ?? 0) > 0 ? 'Update Quote' : 'Add Quote' ?></button>
      <a class="btn light" href="quotes.php">Back to List</a>
    </div>
  </form>
</div>
<?php require __DIR__ . '/footer.php'; ?>
