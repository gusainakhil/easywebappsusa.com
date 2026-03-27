<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$pageTitle = 'Company Detail';
$activeKey = 'company_detail';
$tableName = 'company_detail';
$error = '';
$success = isset($_GET['ok']) ? trim((string) $_GET['ok']) : '';

$allColumns = dbLite()->query('SHOW COLUMNS FROM ' . quoteIdentLite($tableName))->fetchAll();
$exclude = ['id', 'created_at', 'updated_at'];

$editableColumns = array_values(array_filter($allColumns, static function (array $col) use ($exclude): bool {
		$field = (string) ($col['Field'] ?? '');
		return !in_array($field, $exclude, true);
}));

$record = dbLite()->query('SELECT * FROM ' . quoteIdentLite($tableName) . ' ORDER BY `id` ASC LIMIT 1')->fetch() ?: [];
$recordId = (int) ($record['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$recordId = (int) ($_POST['record_id'] ?? 0);
		$payload = [];

		foreach ($editableColumns as $col) {
				$field = (string) ($col['Field'] ?? '');
				$payload[$field] = trim((string) ($_POST[$field] ?? ''));
		}

		try {
				if ($recordId > 0) {
						$set = [];
						$params = [':id' => $recordId];
						foreach ($payload as $field => $value) {
								$set[] = quoteIdentLite($field) . ' = :' . $field;
								$params[':' . $field] = $value;
						}

						if (!empty($set)) {
								$sql = 'UPDATE ' . quoteIdentLite($tableName) . ' SET ' . implode(', ', $set) . ' WHERE `id` = :id';
								$stmt = dbLite()->prepare($sql);
								$stmt->execute($params);
						}

						header('Location: company-detail.php?ok=' . urlencode('Company detail updated successfully.'));
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
						$sql = 'INSERT INTO ' . quoteIdentLite($tableName) . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $vals) . ')';
						$stmt = dbLite()->prepare($sql);
						$stmt->execute($params);
				}

				header('Location: company-detail.php?ok=' . urlencode('Company detail saved successfully.'));
				exit;
		} catch (Throwable $t) {
				$error = 'Save failed. Please verify values and try again.';
				$record = array_merge(['id' => $recordId], $payload);
		}
}

$totalRows = (int) dbLite()->query('SELECT COUNT(*) FROM ' . quoteIdentLite($tableName))->fetchColumn();

require __DIR__ . '/header.php';
?>

<div class="cards">
	<div class="card">
		<div class="label">Total Records</div>
		<div class="value"><?= e((string) $totalRows) ?></div>
		<div class="sub">Expected: single company profile</div>
	</div>
	<div class="card">
		<div class="label">Editable Fields</div>
		<div class="value"><?= e((string) count($editableColumns)) ?></div>
		<div class="sub">All profile content in one form</div>
	</div>
</div>

<?php if ($success !== ''): ?><div class="ok"><?= e($success) ?></div><?php endif; ?>
<?php if ($error !== ''): ?><div class="err"><?= e($error) ?></div><?php endif; ?>

<div class="panel form-panel" style="margin-bottom:10px;">
	<div class="panel-head">
		<h3>Company Content</h3>
		<p>View and edit complete company data from this single page.</p>
	</div>

	<form method="post" class="form-grid">
		<input type="hidden" name="record_id" value="<?= e((string) ($record['id'] ?? 0)) ?>">

		<?php foreach ($editableColumns as $col): ?>
			<?php
				$field = (string) ($col['Field'] ?? '');
				$type = strtolower((string) ($col['Type'] ?? ''));
				$label = ucwords(str_replace('_', ' ', $field));
				$value = (string) ($record[$field] ?? '');
			?>
			<label><?= e($label) ?></label>

			<?php if (str_contains($type, 'text')): ?>
				<textarea name="<?= e($field) ?>" rows="4"><?= e($value) ?></textarea>
			<?php elseif (str_contains($field, 'email')): ?>
				<input type="email" name="<?= e($field) ?>" value="<?= e($value) ?>">
			<?php elseif (str_contains($field, 'phone')): ?>
				<input type="tel" name="<?= e($field) ?>" value="<?= e($value) ?>">
			<?php else: ?>
				<input name="<?= e($field) ?>" value="<?= e($value) ?>">
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="form-actions">
			<button class="btn" type="submit"><?= (int) ($record['id'] ?? 0) > 0 ? 'Update Company Detail' : 'Save Company Detail' ?></button>
		</div>
	</form>
</div>

<?php require __DIR__ . '/footer.php'; ?>
