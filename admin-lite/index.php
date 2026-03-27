<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

$tables = adminLiteTables();
$counts = [];
$total = 0;

foreach ($tables as $table => $label) {
    $sql = 'SELECT COUNT(*) FROM ' . quoteIdentLite($table);
    $counts[$table] = (int) dbLite()->query($sql)->fetchColumn();
    $total += $counts[$table];
}

arsort($counts);
$tableLabels = array_slice(array_keys($counts), 0, 8);
$tableCounts = array_values(array_slice($counts, 0, 8));

$quoteStatus = [
    'pending' => 0,
    'in-progress' => 0,
    'completed' => 0,
];

$statusRows = dbLite()->query("SELECT status, COUNT(*) AS total FROM `quotes` GROUP BY status")->fetchAll();
foreach ($statusRows as $statusRow) {
    $status = (string) ($statusRow['status'] ?? '');
    if (isset($quoteStatus[$status])) {
        $quoteStatus[$status] = (int) $statusRow['total'];
    }
}

$topTable = !empty($counts) ? (string) array_key_first($counts) : 'N/A';
$topTableCount = !empty($counts) ? (int) reset($counts) : 0;

$pageTitle = 'Dashboard';
$activeKey = 'dashboard';
require __DIR__ . '/header.php';
?>
<div class="cards">
  <div class="card"><div class="label">Total Tables</div><div class="value"><?= e((string) count($tables)) ?></div></div>
  <div class="card"><div class="label">Total Records</div><div class="value"><?= e((string) $total) ?></div></div>
  <div class="card"><div class="label">Top Table</div><div class="value"><?= e((string) $topTableCount) ?></div><div class="sub"><?= e($topTable) ?></div></div>
  <div class="card"><div class="label">Quote Pipeline</div><div class="value"><?= e((string) array_sum($quoteStatus)) ?></div><div class="sub">pending/in-progress/completed</div></div>
</div>

<div class="chart-grid">
  <div class="panel chart-panel">
    <div class="panel-head">
      <h3>Table Volume Overview</h3>
      <p>Top tables by records</p>
    </div>
    <canvas id="tableVolumeChart" height="130"></canvas>
  </div>

  <div class="panel chart-panel">
    <div class="panel-head">
      <h3>Quote Status Breakdown</h3>
      <p>Current quote flow</p>
    </div>
    <canvas id="quoteStatusChart" height="130"></canvas>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const tableLabels = <?= json_encode(array_values($tableLabels), JSON_UNESCAPED_UNICODE) ?>;
  const tableCounts = <?= json_encode(array_values($tableCounts), JSON_UNESCAPED_UNICODE) ?>;
  const quoteStatusLabels = <?= json_encode(array_keys($quoteStatus), JSON_UNESCAPED_UNICODE) ?>;
  const quoteStatusValues = <?= json_encode(array_values($quoteStatus), JSON_UNESCAPED_UNICODE) ?>;

  const tableCtx = document.getElementById("tableVolumeChart");
  if (tableCtx && tableLabels.length > 0) {
    new Chart(tableCtx, {
      type: "bar",
      data: {
        labels: tableLabels,
        datasets: [{
          label: "Records",
          data: tableCounts,
          borderRadius: 10,
          backgroundColor: ["#1e3a8a", "#1d4ed8", "#2563eb", "#3b82f6", "#60a5fa", "#93c5fd", "#0f172a", "#1d4ed8"]
        }]
      },
      options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
      }
    });
  }

  const quoteCtx = document.getElementById("quoteStatusChart");
  if (quoteCtx) {
    new Chart(quoteCtx, {
      type: "doughnut",
      data: {
        labels: quoteStatusLabels,
        datasets: [{
          data: quoteStatusValues,
          backgroundColor: ["#1e3a8a", "#2563eb", "#60a5fa"],
          borderWidth: 0
        }]
      },
      options: {
        plugins: { legend: { position: "bottom" } },
        cutout: "65%"
      }
    });
  }
</script>
<?php require __DIR__ . '/footer.php'; ?>
