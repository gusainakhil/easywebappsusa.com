<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();

function blogDetailImageUrl(array $row): string
{
  $raw = trim((string) (($row['image'] ?? '') !== '' ? $row['image'] : ($row['image_url'] ?? '')));
  if ($raw === '') {
    return '';
  }

  if (preg_match('#^https?://#i', $raw) === 1 || str_starts_with($raw, '/')) {
    return $raw;
  }

  if (str_starts_with($raw, 'uploads/')) {
    return '/' . $raw;
  }

  return '/' . ltrim($raw, '/');
}

$blogId = (int) ($_GET['id'] ?? 0);
$blogSlug = trim((string) ($_GET['slug'] ?? ''));
$blog = null;
$relatedBlogs = [];
$slugCol = null;
$createdAtCol = null;

if (dbTableExists('blogs')) {
  try {
    $columns = dbTableColumns('blogs');
    $slugCol = pickFirstExistingColumn($columns, ['slug', 'url_slug']);
    $createdAtCol = pickFirstExistingColumn($columns, ['created_at', 'createdon', 'created_on', 'date']);

    if ($blogSlug !== '' && $slugCol !== null) {
      $stmt = getDbConnection()->prepare('SELECT * FROM `blogs` WHERE `' . $slugCol . '` = :slug LIMIT 1');
      $stmt->execute([':slug' => $blogSlug]);
      $blog = $stmt->fetch();
    }

    if (!is_array($blog) && $blogId > 0) {
      $stmt = getDbConnection()->prepare('SELECT * FROM `blogs` WHERE `id` = :id LIMIT 1');
      $stmt->execute([':id' => $blogId]);
      $blog = $stmt->fetch();
    }

    if (is_array($blog) && (int) ($blog['id'] ?? 0) > 0) {
      $rowSlug = $slugCol !== null ? (string) ($blog[$slugCol] ?? '') : '';
      $canonicalPath = $rowSlug !== '' ? '/blog/' . rawurlencode($rowSlug) : '';
      if ($canonicalPath !== '' && ($blogId > 0 || $blogSlug === '')) {
        header('Location: ' . $canonicalPath, true, 301);
        exit;
      }

      $titleCol = pickFirstExistingColumn($columns, ['title', 'blog_title', 'name']) ?? 'id';
      $excerptCol = pickFirstExistingColumn($columns, ['excerpt', 'short_description', 'summary', 'description']);
      $imageCol = pickFirstExistingColumn($columns, ['image', 'image_url', 'featured_image', 'thumbnail', 'banner_image']);
      $orderCol = $createdAtCol ?? 'id';

      $relatedSql = 'SELECT `id`, `' . $titleCol . '` AS `title`, '
        . ($slugCol !== null ? '`' . $slugCol . '`' : "''") . ' AS `slug`, '
        . ($excerptCol !== null ? '`' . $excerptCol . '`' : "''") . ' AS `excerpt`, '
        . ($imageCol !== null ? '`' . $imageCol . '`' : "''") . ' AS `image` '
        . 'FROM `blogs` WHERE `id` != :id ORDER BY `' . $orderCol . '` DESC LIMIT 6';

      $stmt = getDbConnection()->prepare($relatedSql);
      $stmt->execute([':id' => $blog['id']]);
      $relatedBlogs = $stmt->fetchAll();

      if ($slugCol !== null) {
        $blog['slug'] = $rowSlug;
      } elseif (!isset($blog['slug'])) {
        $blog['slug'] = '';
      }
    }
  } catch (Throwable $t) {
    error_log('Blog detail query failed: ' . $t->getMessage());
  }
}

if (!is_array($blog)) {
  http_response_code(404);
  $blog = [
    'id' => 0,
    'slug' => '',
    'title' => 'Blog Post Not Found',
    'content' => '<p>The blog post you are looking for does not exist.</p>',
    'excerpt' => 'The blog post you are looking for does not exist.',
    'author' => 'EverythingEasy',
    'created_at' => date('Y-m-d H:i:s'),
    'views' => 0,
    'image' => '',
    'meta_description' => 'Blog post not found',
    'meta_keywords' => 'blog, article',
    'category' => '',
  ];
}

if (empty($blog['image']) && !empty($blog['image_url'])) {
  $blog['image'] = $blog['image_url'];
}

$blogTitle = (string) ($blog['title'] ?? 'Blog Post');
$fallbackDescription = (string) ($blog['excerpt'] ?? strip_tags((string) ($blog['content'] ?? '')));
$blogDescription = (string) ($blog['meta_description'] ?? substr($fallbackDescription, 0, 160));
$blogKeywords = (string) ($blog['meta_keywords'] ?? 'blog, article, technology');
$canonicalUrl = !empty($blog['slug']) ? '/blog/' . rawurlencode((string) $blog['slug']) : '/blog.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="theme-color" content="#0066cc" />
    <meta name="description" content="<?php echo e($blogDescription); ?>" />
    <meta name="keywords" content="<?php echo e($blogKeywords); ?>" />
    <meta property="og:title" content="<?php echo e($blogTitle); ?>" />
    <meta property="og:description" content="<?php echo e($blogDescription); ?>" />
    <meta property="og:type" content="article" />
    <link rel="canonical" href="<?php echo e($canonicalUrl); ?>" />
    <?php if (!empty($blog['image'])): ?>
    <meta property="og:image" content="<?php echo e($blog['image']); ?>" />
    <?php endif; ?>
    <title><?php echo e($blogTitle); ?> - EverythingEasy Technology USA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <style>
      .blog-detail-header {
        border-top: 4px solid #0066cc;
        padding-top: 2rem;
      }
      .blog-content {
        line-height: 1.8;
        font-size: 1.05rem;
        color: #555;
      }
      .blog-content img {
        max-width: 100%;
        height: auto;
        margin: 2rem 0;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      .blog-content p {
        margin-bottom: 1.5rem;
      }
      .blog-content h2,
      .blog-content h3 {
        color: #333;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
      }
      .blog-content li {
        line-height: 1.8;
        margin-bottom: 0.5rem;
      }
      .related-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }
      .related-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }
      .blog-image {
        background: linear-gradient(135deg, #004da6 0%, #0066cc 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
      }
      .blog-image i {
        font-size: 4rem;
        opacity: 0.3;
      }
    </style>
  </head>
  <body>
    <?php include __DIR__ . '/navbar.php'; ?>

    <section class="py-5" style="padding-top: 120px !important;">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <?php if ((int) $blog['id'] > 0): ?>
            <div class="blog-detail-header mb-5">
              <h1 class="display-5 fw-bold mb-3"><?php echo e($blog['title']); ?></h1>
              <div class="d-flex flex-wrap gap-3 text-muted mb-4">
                <span><i class="fas fa-calendar-alt me-2"></i><?php echo date('M d, Y', strtotime((string) $blog['created_at'])); ?></span>
                <?php if (!empty($blog['author'])): ?>
                <span><i class="fas fa-user me-2"></i>By <?php echo e($blog['author']); ?></span>
                <?php endif; ?>
                <?php if (!empty($blog['category'])): ?>
                <span><i class="fas fa-folder me-2"></i><?php echo e($blog['category']); ?></span>
                <?php endif; ?>
                <span><i class="fas fa-eye me-2"></i><?php echo (int) ($blog['views'] ?? 0); ?> Views</span>
              </div>
            </div>

            <?php $mainImage = blogDetailImageUrl($blog); ?>
            <?php if ($mainImage !== ''): ?>
            <img
              src="<?php echo e($mainImage); ?>"
              alt="<?php echo e($blog['title']); ?>"
              class="img-fluid rounded mb-4"
              style="max-height: 500px; object-fit: cover; width: 100%;"
            />
            <?php else: ?>
            <div class="blog-image rounded mb-4" style="height: 400px;">
              <i class="fas fa-image"></i>
            </div>
            <?php endif; ?>

            <div class="blog-content">
              <?php echo (string) ($blog['content'] ?? '<p>No content available.</p>'); ?>
            </div>

            <?php if (!empty($relatedBlogs)): ?>
            <div class="my-5">
              <h3 class="fw-bold mb-4">Related Posts</h3>
              <div class="row">
                <?php foreach (array_slice($relatedBlogs, 0, 3) as $related): ?>
                <?php $relatedPath = !empty($related['slug']) ? '/blog/' . rawurlencode((string) $related['slug']) : '/blog-detail.php?id=' . (int) $related['id']; ?>
                <div class="col-md-6 mb-4">
                  <div class="related-card h-100 p-4 bg-white rounded">
                    <?php $relatedImage = blogDetailImageUrl($related); ?>
                    <?php if ($relatedImage !== ''): ?>
                    <div style="height: 150px; border-radius: 8px; margin-bottom: 1rem; background-image: url('<?php echo e($relatedImage); ?>'); background-size: cover; background-position: center;"></div>
                    <?php else: ?>
                    <div style="height: 150px; background: #f0f0f0; border-radius: 8px; margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; color: #ccc;">
                      <i class="fas fa-image" style="font-size: 2rem;"></i>
                    </div>
                    <?php endif; ?>
                    <h5 class="fw-bold mb-2">
                      <a href="<?php echo e($relatedPath); ?>" class="text-dark text-decoration-none"><?php echo e($related['title']); ?></a>
                    </h5>
                    <p class="text-muted small"><?php echo e(substr(strip_tags((string) ($related['excerpt'] ?? '')), 0, 90)); ?>...</p>
                    <a href="<?php echo e($relatedPath); ?>" class="text-primary text-decoration-none">Read More -&gt;</a>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

            <?php else: ?>
            <div class="text-center py-5">
              <i class="fas fa-search" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
              <h2 class="fw-bold mb-3">Blog Post Not Found</h2>
              <p class="text-muted mb-4">The blog post you are looking for does not exist or has been removed.</p>
              <a href="/blog.php" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <?php include __DIR__ . '/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
      function setActiveNavLink() {
        const currentPagePath = window.location.pathname;
        const currentPage = currentPagePath.split('/').pop();
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.btn)');

        navLinks.forEach((link) => {
          link.classList.remove('active');
          const href = link.getAttribute('href');
          if (
            href &&
            (href === currentPage ||
              (currentPage === '' && href === 'index.php') ||
              (!currentPage && href === 'index.php'))
          ) {
            link.classList.add('active');
          }
        });
      }

      setActiveNavLink();
    </script>
  </body>
</html>
