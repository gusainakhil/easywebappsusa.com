<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();

$locationCards = [];

if (dbTableExists('locations')) {
  try {
    $stmt = getDbConnection()->query(
      'SELECT `location_name`, `city_name`, `state`, `slug`, `meta_description` FROM `locations` ORDER BY `id` DESC LIMIT 12'
    );
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
      $title = trim((string) ($row['location_name'] ?? ''));
      $city = trim((string) ($row['city_name'] ?? ''));
      $state = trim((string) ($row['state'] ?? ''));
      $slug = trim((string) ($row['slug'] ?? ''));
      $description = trim((string) ($row['meta_description'] ?? ''));

      if ($title === '') {
        $title = $city;
      }

      if ($title === '') {
        continue;
      }

      if ($description === '') {
        $description = 'Serving businesses with web development, mobile apps, and digital marketing solutions.';
      }

      if ($slug === '') {
        $slug = strtolower((string) preg_replace('/[^a-z0-9]+/i', '-', $title));
        $slug = trim($slug, '-');
      }

      $cityState = trim($city . ($state !== '' ? ', ' . $state : ''));

      $locationUrl = 'web-development.php';
      if ($slug !== '') {
        $locationUrl = 'location/' . rawurlencode($slug);
      }

      $locationCards[] = [
        'title' => $title,
        'city_state' => $cityState,
        'description' => $description,
        'slug' => $slug,
        'url' => $locationUrl,
      ];
    }
  } catch (Throwable $t) {
    $locationCards = [];
  }
}

if (empty($locationCards)) {
  $locationCards[] = [
    'title' => 'New York',
    'city_state' => 'New York, NY',
    'description' => 'Serving the New York metropolitan area with web development, mobile apps, and digital marketing solutions.',
    'slug' => 'new-york',
    'url' => 'location/new-york',
  ];
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
      content="EverythingEasy Technology USA - Serving clients across major cities in the United States with professional IT solutions and digital services."
    />
    <meta
      name="keywords"
      content="IT services locations, web development USA, software development cities, tech services nationwide"
    />
    <title>Service Locations - EverythingEasy Technology USA</title>
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
    <link href="css/style.css" rel="stylesheet" />
    <style>
      .location-card {
        transition: all 0.3s ease;
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
      }
      .location-card:hover {
        border-color: #0066cc;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
      }
      .location-icon {
        font-size: 2.5rem;
        color: #0066cc;
        margin-bottom: 1rem;
      }
    </style>
  </head>

  <body>
    <?php include "navbar.php"; ?>
    <!-- <script src="js/navigation.js"></script> -->
    <!-- Page Header -->
    <section
      class="py-5 bg-gradient-primary text-white"
      style="padding-top: 120px !important"
    >
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="display-4 fw-bold mb-3">Service Locations</h1>
            <p class="lead mb-4">
              Professional IT services and solutions available across the United
              States
            </p>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center bg-transparent">
                <li class="breadcrumb-item">
                  <a href="index.php" class="text-warning">Home</a>
                </li>
                <li
                  class="breadcrumb-item active text-white"
                  aria-current="page"
                >
                  Service Locations
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <!-- Introduction -->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="fw-bold mb-3">Nationwide Service Coverage</h2>
            <p class="text-muted">
              Whether you're in New York, California, Texas, or anywhere in
              between, EverythingEasy Technology provides world-class IT
              solutions and services. Our distributed team ensures you receive
              the support you need, when you need it.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Service Locations -->
    <section class="py-5">
      <div class="container">
        <h2 class="fw-bold text-center mb-5">Major Service Areas</h2>
        <div class="row">
          <?php foreach ($locationCards as $location): ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <div
                class="location-card"
                style="cursor: pointer"
                onclick='window.location.href = <?= json_encode((string) ($location['url'] ?? 'web-development.php')) ?>'
              >
                <div class="location-icon">
                  <i class="fas fa-map-pin"></i>
                </div>
                <h4 class="fw-bold mb-2"><?= e((string) ($location['title'] ?? '')) ?></h4>
                <?php if (!empty($location['city_state'])): ?>
                  <p class="text-primary small mb-2"><?= e((string) $location['city_state']) ?></p>
                <?php endif; ?>
                <p class="text-muted mb-3"><?= e((string) ($location['description'] ?? '')) ?></p>
                <small class="text-muted">
                  <i class="fas fa-phone me-2"></i><?= e((string) ($companyInfo['company_number'] ?? '')) ?>
                </small>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Services by Location -->
    <section class="py-5 bg-light">
      <div class="container">
        <h2 class="fw-bold text-center mb-5">Services Available Nationwide</h2>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">Web Development</h5>
                <p class="text-muted small">
                  Custom websites and web applications tailored to your business
                  needs
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">Mobile App Development</h5>
                <p class="text-muted small">
                  Native and cross-platform mobile applications for iOS and
                  Android
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">Digital Marketing</h5>
                <p class="text-muted small">
                  SEO, social media, content marketing, and paid advertising
                  campaigns
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">Cloud Solutions</h5>
                <p class="text-muted small">
                  AWS, Azure, and GCP consulting, migration, and management
                  services
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">Cybersecurity</h5>
                <p class="text-muted small">
                  Security assessments, penetration testing, and compliance
                  solutions
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="d-flex gap-3">
              <div>
                <i
                  class="fas fa-check-circle text-primary"
                  style="font-size: 1.5rem"
                ></i>
              </div>
              <div>
                <h5 class="fw-bold">IT Consulting</h5>
                <p class="text-muted small">
                  Strategic technology planning and enterprise solutions
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Remote & On-Site Services -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-4">
            <div class="bg-light p-5 rounded">
              <div class="mb-3">
                <i
                  class="fas fa-laptop"
                  style="font-size: 2.5rem; color: #0066cc"
                ></i>
              </div>
              <h4 class="fw-bold mb-3">Remote Services</h4>
              <p class="text-muted mb-3">
                Most of our services are delivered remotely, allowing us to
                serve clients across the entire United States with flexibility
                and efficiency.
              </p>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>24/7 Support
                  Available
                </li>
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>Flexible
                  Scheduling
                </li>
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>Secure
                  Communication
                </li>
                <li>
                  <i class="fas fa-check text-success me-2"></i>Fast Response
                  Times
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 mb-4">
            <div class="bg-light p-5 rounded">
              <div class="mb-3">
                <i
                  class="fas fa-building"
                  style="font-size: 2.5rem; color: #0066cc"
                ></i>
              </div>
              <h4 class="fw-bold mb-3">On-Site Services</h4>
              <p class="text-muted mb-3">
                For projects requiring on-site presence, we can arrange
                consultants and developers to work directly at your location.
              </p>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>Dedicated Team
                  Members
                </li>
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>Direct
                  Collaboration
                </li>
                <li class="mb-2">
                  <i class="fas fa-check text-success me-2"></i>Knowledge
                  Transfer
                </li>
                <li>
                  <i class="fas fa-check text-success me-2"></i>Hybrid Models
                  Available
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-gradient-primary text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="fw-bold mb-4">Ready to Get Started?</h2>
            <p class="lead mb-4">
              Contact us today to discuss your project and find out how we can
              help your business grow.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="contact.php" class="btn btn-warning btn-lg">
                <i class="fas fa-envelope me-2"></i>Contact Us
              </a>
              <a href="tel:+18443299832" class="btn btn-outline-light btn-lg">
                <i class="fas fa-phone me-2"></i>Call Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

   <?php include "footer.php"; ?>

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

      fetch("navbar.php")
        .then((r) => r.text())
        .then((html) => {
          document.getElementById("navbar-container").innerHTML = html;
          setActiveNavLink();
        });

      fetch("footer.php")
        .then((r) => r.text())
        .then((html) => {
          document.getElementById("footer-container").innerHTML = html;
        });
    </script>
  </body>
</html>
