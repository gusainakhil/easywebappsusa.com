<?php
declare(strict_types=1);

require_once __DIR__ . '/auth.php';
requireAdminLiteLogin();

function slugifySitemap(string $text): string
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text) ?? '';
    $text = trim($text, '-');

    return $text !== '' ? $text : 'page';
}

function sitemapTableExists(string $table): bool
{
    $stmt = dbLite()->prepare('SHOW TABLES LIKE :table_name');
    $stmt->execute([':table_name' => $table]);

    return (bool) $stmt->fetchColumn();
}

function sitemapColumns(string $table): array
{
    $stmt = dbLite()->query('SHOW COLUMNS FROM `' . str_replace('`', '``', $table) . '`');
    $rows = $stmt->fetchAll();
    $result = [];

    foreach ($rows as $row) {
        $field = (string) ($row['Field'] ?? '');
        if ($field !== '') {
            $result[] = $field;
        }
    }

    return $result;
}

function pickCol(array $columns, array $candidates): ?string
{
    $index = [];
    foreach ($columns as $col) {
        $index[strtolower((string) $col)] = (string) $col;
    }

    foreach ($candidates as $candidate) {
        $key = strtolower((string) $candidate);
        if (isset($index[$key])) {
            return $index[$key];
        }
    }

    return null;
}

function xmlEscape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
}

function toAbsoluteUrl(string $baseUrl, string $path): string
{
    if (preg_match('#^https?://#i', $path) === 1) {
        return $path;
    }

    $cleanPath = '/' . ltrim($path, '/');
    if ($cleanPath === '/index.php') {
        $cleanPath = '/';
    }

    return rtrim($baseUrl, '/') . $cleanPath;
}

function addSitemapUrl(array &$urls, string $loc, ?string $lastmod, string $changefreq, string $priority): void
{
    $urls[$loc] = [
        'loc' => $loc,
        'lastmod' => $lastmod,
        'changefreq' => $changefreq,
        'priority' => $priority,
    ];
}

$defaultBaseUrl = 'https://easywebappsusa.com';
if (!empty($_SERVER['HTTP_HOST'])) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $defaultBaseUrl = $scheme . '://' . $_SERVER['HTTP_HOST'];
}

$pageTitle = 'Sitemap Generator';
$activeKey = 'sitemap';
$message = '';
$error = '';
$totalUrls = 0;
$preview = [];

$baseUrl = trim((string) ($_POST['base_url'] ?? $defaultBaseUrl));
if ($baseUrl === '') {
    $baseUrl = $defaultBaseUrl;
}
$baseUrl = rtrim($baseUrl, '/');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $rootDir = dirname(__DIR__);
        $sitemapPath = $rootDir . '/sitemap.xml';
        $urls = [];

        $staticPaths = [
            '/',
            '/about.php',
            '/services.php',
            '/web-development.php',
            '/app-development.php',
            '/contact.php',
            '/career.php',
            '/privacy-policy.php',
            '/terms-conditions.php',
            '/return-refund-policy.php',
            '/services-locations.php',
            '/blog',
            '/location',
        ];

        foreach ($staticPaths as $path) {
            $fullPath = $path === '/' ? ($rootDir . '/index.php') : ($rootDir . '/' . ltrim($path, '/'));
            $lastmod = file_exists($fullPath) ? date('c', (int) filemtime($fullPath)) : date('c');
            addSitemapUrl($urls, toAbsoluteUrl($baseUrl, $path), $lastmod, 'weekly', $path === '/' ? '1.0' : '0.8');
        }

        if (sitemapTableExists('blogs')) {
            $blogCols = sitemapColumns('blogs');
            $idCol = pickCol($blogCols, ['id']);
            $slugCol = pickCol($blogCols, ['slug', 'url_slug']);
            $statusCol = pickCol($blogCols, ['status']);
            $updatedCol = pickCol($blogCols, ['updated_at', 'updatedon', 'updated_on']);
            $createdCol = pickCol($blogCols, ['created_at', 'createdon', 'created_on', 'date']);

            if ($idCol !== null) {
                $select = ['`' . $idCol . '` AS `id`'];
                $select[] = ($slugCol !== null ? '`' . $slugCol . '`' : "''") . ' AS `slug`';
                $dateExpr = $updatedCol ?? $createdCol;
                $select[] = ($dateExpr !== null ? '`' . $dateExpr . '`' : 'NOW()') . ' AS `lastmod`';

                $sql = 'SELECT ' . implode(', ', $select) . ' FROM `blogs`';
                if ($statusCol !== null) {
                    $sql .= " WHERE `" . $statusCol . "` = 'published'";
                }
                $orderCol = $updatedCol ?? $createdCol ?? $idCol;
                $sql .= ' ORDER BY `' . $orderCol . '` DESC';

                $rows = dbLite()->query($sql)->fetchAll();
                foreach ($rows as $row) {
                    $id = (int) ($row['id'] ?? 0);
                    if ($id <= 0) {
                        continue;
                    }

                    $slug = trim((string) ($row['slug'] ?? ''));
                    $path = $slug !== ''
                        ? '/blog/' . rawurlencode($slug)
                        : '/blog-detail.php?id=' . $id;

                    $lastmodRaw = trim((string) ($row['lastmod'] ?? ''));
                    $lastmod = $lastmodRaw !== '' ? date('c', strtotime($lastmodRaw)) : date('c');
                    addSitemapUrl($urls, toAbsoluteUrl($baseUrl, $path), $lastmod, 'weekly', '0.7');
                }
            }
        }

        if (sitemapTableExists('locations')) {
            $locCols = sitemapColumns('locations');
            $slugCol = pickCol($locCols, ['slug', 'url_slug', 'location_slug']);
            $nameCol = pickCol($locCols, ['location_name', 'title', 'name', 'city_name']);
            $updatedCol = pickCol($locCols, ['updated_at', 'updatedon', 'updated_on']);
            $createdCol = pickCol($locCols, ['created_at', 'createdon', 'created_on']);

            if ($nameCol !== null || $slugCol !== null) {
                $select = [];
                $select[] = ($slugCol !== null ? '`' . $slugCol . '`' : "''") . ' AS `slug`';
                $select[] = ($nameCol !== null ? '`' . $nameCol . '`' : "''") . ' AS `name`';
                $dateExpr = $updatedCol ?? $createdCol;
                $select[] = ($dateExpr !== null ? '`' . $dateExpr . '`' : 'NOW()') . ' AS `lastmod`';

                $sql = 'SELECT ' . implode(', ', $select) . ' FROM `locations`';
                $orderCol = $updatedCol ?? $createdCol;
                if ($orderCol !== null) {
                    $sql .= ' ORDER BY `' . $orderCol . '` DESC';
                }

                $rows = dbLite()->query($sql)->fetchAll();
                foreach ($rows as $row) {
                    $slug = trim((string) ($row['slug'] ?? ''));
                    if ($slug === '') {
                        $slug = slugifySitemap((string) ($row['name'] ?? ''));
                    }

                    if ($slug === '') {
                        continue;
                    }

                    $path = '/location/' . rawurlencode($slug);
                    $lastmodRaw = trim((string) ($row['lastmod'] ?? ''));
                    $lastmod = $lastmodRaw !== '' ? date('c', strtotime($lastmodRaw)) : date('c');
                    addSitemapUrl($urls, toAbsoluteUrl($baseUrl, $path), $lastmod, 'weekly', '0.7');
                }
            }
        }

        ksort($urls);

        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $u) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . xmlEscape((string) $u['loc']) . '</loc>';
            if (!empty($u['lastmod'])) {
                $xml[] = '    <lastmod>' . xmlEscape((string) $u['lastmod']) . '</lastmod>';
            }
            $xml[] = '    <changefreq>' . xmlEscape((string) $u['changefreq']) . '</changefreq>';
            $xml[] = '    <priority>' . xmlEscape((string) $u['priority']) . '</priority>';
            $xml[] = '  </url>';
        }

        $xml[] = '</urlset>';

        $written = file_put_contents($sitemapPath, implode("\n", $xml) . "\n");
        if ($written === false) {
            throw new RuntimeException('Could not write sitemap.xml. Please check file permissions.');
        }

        $totalUrls = count($urls);
        $preview = array_slice(array_values(array_map(static function (array $i): string {
            return (string) $i['loc'];
        }, $urls)), 0, 12);

        $message = 'Sitemap generated successfully at /sitemap.xml with ' . $totalUrls . ' URLs.';
    } catch (Throwable $t) {
        $error = 'Sitemap generation failed: ' . $t->getMessage();
    }
}

require __DIR__ . '/header.php';
?>

<?php if ($message !== ''): ?><div class="ok"><?= e($message) ?></div><?php endif; ?>
<?php if ($error !== ''): ?><div class="err"><?= e($error) ?></div><?php endif; ?>

<div class="panel form-panel" style="margin-bottom:10px;">
  <div class="panel-head">
    <h3>One Click Sitemap Generator</h3>
    <p>Generate sitemap for static pages + dynamic blog/location URLs.</p>
  </div>

  <form method="post" class="form-grid">
    <label>Base URL *</label>
    <input name="base_url" required value="<?= e($baseUrl) ?>" placeholder="https://easywebappsusa.com">

    <div class="form-actions">
      <button class="btn" type="submit">Generate sitemap.xml</button>
      <a class="btn light" href="/sitemap.xml" target="_blank" rel="noopener">Open sitemap.xml</a>
    </div>
  </form>
</div>

<?php if (!empty($preview)): ?>
<div class="panel">
  <div class="panel-head">
    <h3>Generated URL Preview</h3>
    <p>Showing first <?= e((string) count($preview)) ?> URLs.</p>
  </div>
  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>url</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($preview as $i => $url): ?>
        <tr>
          <td><?= e((string) ($i + 1)) ?></td>
          <td><?= e($url) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php endif; ?>

<?php require __DIR__ . '/footer.php'; ?>
