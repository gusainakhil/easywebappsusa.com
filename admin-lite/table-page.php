<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

if (!isset($tableName, $pageTitle, $activeKey)) {
    http_response_code(500);
    exit('Table page setup missing');
}

$allColumns = dbLite()->query('SHOW COLUMNS FROM ' . quoteIdentLite($tableName))->fetchAll();
$hidden = ['created_at', 'updated_at'];

if ($tableName === 'quotes') {
    $hidden = array_merge($hidden, ['newsletter', 'budget', 'timeline', 'project_details', 'company_name', 'first_name', 'last_name']);
}

if ($tableName === 'blogs') {
    $hidden = array_merge($hidden, ['excerpt', 'meta_description', 'meta_keywords', 'content', 'image_url', 'slug', 'tags']);
}

$columns = array_values(array_filter($allColumns, static function (array $col) use ($hidden): bool {
    return !in_array((string) ($col['Field'] ?? ''), $hidden, true);
}));

if ($tableName === 'quotes') {
    $withName = [];
    $inserted = false;
    foreach ($columns as $col) {
        $withName[] = $col;
        if (($col['Field'] ?? '') === 'id') {
            $withName[] = ['Field' => 'full_name'];
            $inserted = true;
        }
    }
    if (!$inserted) {
        array_unshift($withName, ['Field' => 'full_name']);
    }
    $columns = $withName;
}

$totalRows = (int) dbLite()->query('SELECT COUNT(*) FROM ' . quoteIdentLite($tableName))->fetchColumn();

$cards = [];
$chartOneTitle = '';
$chartOneSub = '';
$chartOneLabels = [];
$chartOneValues = [];
$chartOneType = 'bar';

$chartTwoTitle = '';
$chartTwoSub = '';
$chartTwoLabels = [];
$chartTwoValues = [];
$chartTwoType = 'doughnut';

if ($tableName === 'quotes') {
    $statusRows = dbLite()->query("SELECT status, COUNT(*) total FROM `quotes` GROUP BY status")->fetchAll();
    $statusMap = ['completed' => 0, 'in-progress' => 0, 'pending' => 0];
    foreach ($statusRows as $s) {
        $status = (string) ($s['status'] ?? '');
        if (isset($statusMap[$status])) {
            $statusMap[$status] = (int) $s['total'];
        }
    }
    $cards = [
        ['Total Quote', $totalRows],
        ['Completed', $statusMap['completed']],
        ['In Progress', $statusMap['in-progress']],
        ['Pending', $statusMap['pending']],
    ];

    $serviceRows = dbLite()->query("SELECT service, COUNT(*) total FROM `quotes` GROUP BY service ORDER BY total DESC LIMIT 6")->fetchAll();
    foreach ($serviceRows as $r) {
      $chartOneLabels[] = (string) ($r['service'] ?? 'other');
      $chartOneValues[] = (int) ($r['total'] ?? 0);
    }

    $chartOneTitle = 'Service Distribution';
    $chartOneSub = 'Top quote service types';
    $chartOneType = 'bar';

    $chartTwoLabels = ['pending', 'in-progress', 'completed'];
    $chartTwoValues = [$statusMap['pending'], $statusMap['in-progress'], $statusMap['completed']];
    $chartTwoTitle = 'Quote Status Breakdown';
    $chartTwoSub = 'Current quote flow';
    $chartTwoType = 'doughnut';
} elseif ($tableName === 'blogs') {
    $statusRows = dbLite()->query("SELECT status, COUNT(*) total FROM `blogs` GROUP BY status")->fetchAll();
    $statusMap = ['published' => 0, 'draft' => 0];
    foreach ($statusRows as $s) {
        $status = (string) ($s['status'] ?? '');
        if (isset($statusMap[$status])) {
            $statusMap[$status] = (int) $s['total'];
        }
    }
    $views = (int) (dbLite()->query('SELECT COALESCE(SUM(`views`),0) FROM `blogs`')->fetchColumn() ?: 0);
    $cards = [
        ['Total Blogs', $totalRows],
        ['Published', $statusMap['published']],
        ['Draft', $statusMap['draft']],
        ['Total Views', $views],
    ];

    $viewRows = dbLite()->query("SELECT title, views FROM `blogs` ORDER BY views DESC LIMIT 6")->fetchAll();
    foreach ($viewRows as $r) {
      $title = (string) ($r['title'] ?? 'Untitled');
      $chartOneLabels[] = strlen($title) > 24 ? substr($title, 0, 21) . '...' : $title;
      $chartOneValues[] = (int) ($r['views'] ?? 0);
    }

    $chartOneTitle = 'Top Blog Views';
    $chartOneSub = 'Most viewed blog posts';
    $chartOneType = 'bar';

    $chartTwoLabels = ['published', 'draft'];
    $chartTwoValues = [$statusMap['published'], $statusMap['draft']];
    $chartTwoTitle = 'Publish Status';
    $chartTwoSub = 'Published vs draft blogs';
    $chartTwoType = 'doughnut';
} else {
    $cards = [
        ['Total Rows', $totalRows],
        ['Visible Columns', count($columns)],
    ];
}

$rows = dbLite()->query('SELECT * FROM ' . quoteIdentLite($tableName) . ' ORDER BY `id` DESC LIMIT 200')->fetchAll();

require __DIR__ . '/header.php';
?>
<div class="cards">
  <?php foreach ($cards as $c): ?>
    <div class="card">
      <div class="label"><?= e((string) $c[0]) ?></div>
      <div class="value"><?= e((string) $c[1]) ?></div>
    </div>
  <?php endforeach; ?>
</div>

<?php if (!empty($chartOneLabels) || !empty($chartTwoLabels)): ?>
  <div class="chart-grid">
    <div class="panel chart-panel">
      <div class="panel-head">
        <h3><?= e($chartOneTitle) ?></h3>
        <p><?= e($chartOneSub) ?></p>
      </div>
      <canvas id="tableChartOne" height="130"></canvas>
    </div>

    <div class="panel chart-panel">
      <div class="panel-head">
        <h3><?= e($chartTwoTitle) ?></h3>
        <p><?= e($chartTwoSub) ?></p>
      </div>
      <canvas id="tableChartTwo" height="130"></canvas>
    </div>
  </div>
<?php endif; ?>

<div class="panel">
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <?php foreach ($columns as $c): ?>
            <?php $f = (string) ($c['Field'] ?? ''); ?>
            <th><?= e($f === 'full_name' ? 'name' : $f) ?></th>
          <?php endforeach; ?>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row): ?>
          <tr>
            <?php foreach ($columns as $c): ?>
              <?php $f = (string) ($c['Field'] ?? ''); ?>
              <td>
                <?php if ($f === 'full_name'): ?>
                  <?= e(trim(((string) ($row['first_name'] ?? '')) . ' ' . ((string) ($row['last_name'] ?? '')))) ?>
                <?php elseif ($f === 'email' && !empty($row['email'])): ?>
                  <span class="inline-tools">
                    <a class="btn light" href="mailto:<?= e((string) $row['email']) ?>">Mail</a>
                    <span class="copy-text" onclick="copyText('<?= e((string) $row['email']) ?>')"><?= e((string) $row['email']) ?></span>
                  </span>
                <?php elseif ($f === 'phone' && !empty($row['phone'])): ?>
                  <span class="inline-tools">
                    <a class="btn light" href="tel:<?= e((string) $row['phone']) ?>">Call</a>
                    <span class="copy-text" onclick="copyText('<?= e((string) $row['phone']) ?>')"><?= e((string) $row['phone']) ?></span>
                  </span>
                <?php else: ?>
                  <?= e((string) ($row[$f] ?? '')) ?>
                <?php endif; ?>
              </td>
            <?php endforeach; ?>
            <td>
              <?php if (isset($row['id'])): ?>
                <a class="btn light" href="edit.php?table=<?= e($tableName) ?>&id=<?= e((string) $row['id']) ?>">Edit</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php if (!empty($chartOneLabels) || !empty($chartTwoLabels)): ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const chartOneLabels = <?= json_encode(array_values($chartOneLabels), JSON_UNESCAPED_UNICODE) ?>;
    const chartOneValues = <?= json_encode(array_values($chartOneValues), JSON_UNESCAPED_UNICODE) ?>;
    const chartTwoLabels = <?= json_encode(array_values($chartTwoLabels), JSON_UNESCAPED_UNICODE) ?>;
    const chartTwoValues = <?= json_encode(array_values($chartTwoValues), JSON_UNESCAPED_UNICODE) ?>;
    const chartOneType = <?= json_encode($chartOneType) ?>;
    const chartTwoType = <?= json_encode($chartTwoType) ?>;

    const chartOne = document.getElementById('tableChartOne');
    if (chartOne && chartOneLabels.length > 0) {
      new Chart(chartOne, {
        type: chartOneType,
        data: {
          labels: chartOneLabels,
          datasets: [{
            data: chartOneValues,
            borderRadius: 10,
            backgroundColor: ['#1e3a8a', '#1d4ed8', '#2563eb', '#3b82f6', '#60a5fa', '#93c5fd']
          }]
        },
        options: {
          plugins: { legend: { display: false } },
          scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
      });
    }

    const chartTwo = document.getElementById('tableChartTwo');
    if (chartTwo && chartTwoLabels.length > 0) {
      new Chart(chartTwo, {
        type: chartTwoType,
        data: {
          labels: chartTwoLabels,
          datasets: [{
            data: chartTwoValues,
            backgroundColor: ['#1e3a8a', '#2563eb', '#60a5fa', '#93c5fd'],
            borderWidth: 0
          }]
        },
        options: {
          plugins: { legend: { position: 'bottom' } },
          cutout: chartTwoType === 'doughnut' ? '65%' : undefined
        }
      });
    }
  </script>
<?php endif; ?>
<?php require __DIR__ . '/footer.php'; ?>
