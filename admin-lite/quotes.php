<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$pageTitle = 'Quotes';
$activeKey = 'quotes';
$success = isset($_GET['ok']) ? trim((string) $_GET['ok']) : '';

$statusRows = dbLite()->query("SELECT status, COUNT(*) AS total FROM `quotes` GROUP BY status")->fetchAll();
$statusMap = ['completed' => 0, 'in-progress' => 0, 'pending' => 0];
foreach ($statusRows as $s) {
		$status = (string) ($s['status'] ?? '');
		if (isset($statusMap[$status])) {
				$statusMap[$status] = (int) $s['total'];
		}
}

$totalQuotes = (int) dbLite()->query('SELECT COUNT(*) FROM `quotes`')->fetchColumn();
$rows = dbLite()->query('SELECT * FROM `quotes` ORDER BY `id` DESC LIMIT 200')->fetchAll();

require __DIR__ . '/header.php';
?>
<div class="cards">
	<div class="card"><div class="label">Total Quotes</div><div class="value"><?= e((string) $totalQuotes) ?></div></div>
	<div class="card"><div class="label">Completed</div><div class="value"><?= e((string) $statusMap['completed']) ?></div></div>
	<div class="card"><div class="label">In Progress</div><div class="value"><?= e((string) $statusMap['in-progress']) ?></div></div>
	<div class="card"><div class="label">Pending</div><div class="value"><?= e((string) $statusMap['pending']) ?></div></div>
</div>

<?php if ($success !== ''): ?><div class="ok"><?= e($success) ?></div><?php endif; ?>

<div class="panel" style="margin-bottom:10px;">
	<a class="btn" href="quotes-editor.php">Add Quote</a>
</div>

<div class="panel">
	<div class="table-wrap">
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>email</th>
					<th>phone</th>
					<th>service</th>
					<th>status</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rows as $row): ?>
					<tr>
						<td><?= e((string) ($row['id'] ?? '')) ?></td>
						<td><?= e(trim(((string) ($row['first_name'] ?? '')) . ' ' . ((string) ($row['last_name'] ?? '')))) ?></td>
						<td>
							<?php if (!empty($row['email'])): ?>
								<span class="inline-tools">
									<a class="btn light" href="mailto:<?= e((string) $row['email']) ?>">Mail</a>
									<span class="copy-text" onclick="copyText('<?= e((string) $row['email']) ?>')"><?= e((string) $row['email']) ?></span>
								</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if (!empty($row['phone'])): ?>
								<span class="inline-tools">
									<a class="btn light" href="tel:<?= e((string) $row['phone']) ?>">Call</a>
									<span class="copy-text" onclick="copyText('<?= e((string) $row['phone']) ?>')"><?= e((string) $row['phone']) ?></span>
								</span>
							<?php endif; ?>
						</td>
						<td><?= e((string) ($row['service'] ?? '')) ?></td>
						<td><?= e((string) ($row['status'] ?? '')) ?></td>
						<td>
							<?php if (isset($row['id'])): ?>
								<a class="btn light" href="quotes-editor.php?edit=<?= e((string) $row['id']) ?>">Edit</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php require __DIR__ . '/footer.php'; ?>
