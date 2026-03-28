<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();

// Fetch blogs from database
$blogs = [];
if (dbTableExists('blogs')) {
  try {
    $stmt = getDbConnection()->query('SELECT `id`, `slug`, `title`, `excerpt`, `author`, `created_at`, `views`, `image` FROM `blogs` ORDER BY `created_at` DESC LIMIT 12');
    $blogs = $stmt->fetchAll();
  } catch (Throwable $t) {
    error_log('Blog query failed: ' . $t->getMessage());
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes"
    />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="theme-color" content="#0066cc" />
    <meta
      name="description"
      content="Read the latest insights and updates from EverythingEasy Technology USA. Stay informed about IT trends, web development, and digital solutions."
    />
    <meta
      name="keywords"
      content="technology blog, IT insights, web development tips, digital marketing, software development"
    />
    <title>Blog - EverythingEasy Technology USA</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="/css/style.css" rel="stylesheet" />
    <style>
      .blog-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
      }
      .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }
      .blog-image {
        overflow: hidden;
        background: linear-gradient(135deg, #004da6 0%, #0066cc 100%);
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
      }
      .blog-image i {
        font-size: 3rem;
        opacity: 0.3;
      }
      .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
      }
      .blog-card:hover .blog-image img {
        transform: scale(1.05);
      }
      .blog-title {
        font-size: 1.15rem;
        color: #1e3c72;
        font-weight: 700;
      }
      .blog-title a {
        text-decoration: none;
        color: #1e3c72;
      }
      .blog-title a:hover {
        color: #004da6;
      }
      .blog-meta {
        font-size: 0.85rem;
        color: #666;
      }
      .blog-content {
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      .blog-excerpt {
        flex-grow: 1;
        color: #555;
        line-height: 1.6;
      }
      .blog-footer {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
      }
    </style>
  </head>

  <body>
    <?php include __DIR__ . '/navbar.php'; ?>
    <!-- <script src="/js/navigation.js"></script> -->
    <main style="margin-top: 35px">
      <!-- Blog Header -->
      <section
        class="page-header bg-gradient-primary text-white py-5"
        style="padding-top: 120px !important; margin-bottom: 0; background: linear-gradient(135deg, #004da6 0%, #0066cc 100%);"
      >
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="display-4 fw-bold mb-3">Our Blog</h1>
              <p class="lead mb-4">
                Stay updated with the latest insights, trends, and tips in IT
                and digital solutions
              </p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent">
                  <li class="breadcrumb-item">
                    <a href="/index.php" class="text-warning">Home</a>
                  </li>
                  <li
                    class="breadcrumb-item active text-white"
                    aria-current="page"
                  >
                    Blog
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- Blog Posts Section -->
      <section class="py-5">
        <div class="container">
          <?php if (!empty($blogs)): ?>
          <div class="row">
            <?php foreach ($blogs as $blog): ?>
            <?php $blogPath = !empty($blog['slug']) ? '/blog/' . rawurlencode((string) $blog['slug']) : '/blog-detail.php?id=' . (int) $blog['id']; ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <?php if (!empty($blog['image'])): ?>
                    <img src="<?php echo e($blog['image']); ?>" alt="<?php echo e($blog['title']); ?>" />
                  <?php else: ?>
                    <i class="fas fa-newspaper"></i>
                  <?php endif; ?>
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i><?php echo date('M d, Y', strtotime($blog['created_at'])); ?>
                    </span>
                    <?php if (!empty($blog['author'])): ?>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i><?php echo e($blog['author']); ?>
                    </span>
                    <?php endif; ?>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="<?php echo e($blogPath); ?>">
                      <?php echo e($blog['title']); ?>
                    </a>
                  </h4>
                  <p class="blog-excerpt text-muted mb-3">
                    <?php echo e(substr($blog['excerpt'], 0, 120) . (strlen($blog['excerpt']) > 120 ? '...' : '')); ?>
                  </p>
                  <div class="blog-footer d-flex justify-content-between align-items-center">
                    <a
                      href="<?php echo e($blogPath); ?>"
                      class="btn btn-outline-primary btn-sm"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i><?php echo (int)($blog['views'] ?? 0); ?> views
                    </small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php else: ?>
          <div class="row">
            <div class="col-12 text-center py-5">
              <p class="text-muted fs-5">No blog posts available at the moment.</p>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </section>

      <!-- Subscribe Section -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="fw-bold mb-3">Subscribe to Our Newsletter</h2>
              <p class="text-muted mb-4">
                Get the latest tech insights delivered to your inbox
              </p>
              <form class="d-flex gap-2 flex-wrap justify-content-center">
                <input
                  type="email"
                  class="form-control"
                  style="max-width: 300px"
                  placeholder="Enter your email"
                  required
                />
                <button class="btn btn-primary" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </section>

     <?php include __DIR__ . '/footer.php'; ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
      function setActiveNavLink() {
        const currentPagePath = window.location.pathname;
        const currentPage = currentPagePath.split("/").pop();
        const navLinks = document.querySelectorAll(
          ".navbar-nav .nav-link:not(.btn)",
        );

        navLinks.forEach((link) => {
          link.classList.remove("active");
          const href = link.getAttribute("href");
          if (
            href &&
            (href === currentPage ||
              (currentPage === "" && href === "index.php") ||
              (!currentPage && href === "index.php"))
          ) {
            link.classList.add("active");
          }
        });
      }

      setActiveNavLink();
    </script>
  </body>
</html>
