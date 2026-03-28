<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();

// Fetch location from URL (by slug or location_name)
$rawSlug = trim((string) ($_GET['slug'] ?? $_GET['location_name'] ?? ''));
$rawSlug = preg_replace('/[^a-zA-Z0-9\-]/', '', $rawSlug);

$locationData = [
  'location_name' => 'USA',
  'city_name' => '',
  'state' => '',
  'meta_title' => '',
  'meta_description' => '',
  'meta_keyword' => '',
  'og_title' => '',
];

// Query locations table if slug provided
if ($rawSlug !== '' && dbTableExists('locations')) {
  try {
    $stmt = getDbConnection()->prepare('SELECT `location_name`, `city_name`, `state`, `meta_title`, `meta_description`, `meta_keyword`, `og_title` FROM `locations` WHERE `slug` = :slug LIMIT 1');
    $stmt->execute([':slug' => $rawSlug]);
    $row = $stmt->fetch();
    if (is_array($row)) {
      $locationData = array_merge($locationData, $row);
    }
  } catch (Throwable $t) {
    // Fallback to USA if query fails
  }
}

// Build location labels with city_name, state combination
$locationName = trim((string) ($locationData['location_name'] ?? 'USA'));
$cityName = trim((string) ($locationData['city_name'] ?? ''));
$state = trim((string) ($locationData['state'] ?? ''));

// Build location phrase for SEO
if ($cityName !== '' && $state !== '') {
  $locationLabel = $cityName . ', ' . $state;
  $locationPhrase = 'in ' . $locationLabel;
} elseif ($cityName !== '') {
  $locationLabel = $cityName;
  $locationPhrase = 'in ' . $locationLabel;
} elseif ($state !== '') {
  $locationLabel = $state;
  $locationPhrase = 'in ' . $locationLabel;
} else {
  $locationLabel = 'USA';
  $locationPhrase = 'in the USA';
}

// Use custom meta tags and values directly from database
$metaTitle = trim((string) ($locationData['meta_title'] ?? ''));
$metaDescription = trim((string) ($locationData['meta_description'] ?? ''));
$metaKeyword = trim((string) ($locationData['meta_keyword'] ?? ''));
$ogTitle = trim((string) ($locationData['og_title'] ?? ''));

$serviceSlug = 'web-development';
$serviceQuery = 'SELECT * FROM `services` WHERE `slug` = :slug LIMIT 1';
$serviceQueryParams = [':slug' => $serviceSlug];

// Use meta_title as h1 if available, otherwise generate from location
$h1Title = $metaTitle !== '' ? $metaTitle : 'Web Development Services ' . $locationPhrase;

$serviceInfo = [
  'title' => $h1Title,
];

if (isset($_GET['print_query'])) {
  header('Content-Type: text/plain; charset=UTF-8');
  echo "Query:\n" . $serviceQuery . "\n\n";
  echo "Params:\n";
  print_r($serviceQueryParams);
  echo "\nLocation Data:\n";
  print_r($locationData);
  exit;
}

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
  <title><?php echo e($metaTitle); ?></title>
  <meta name="description"
    content="<?php echo e($metaDescription); ?>" />
  <meta name="keywords"
    content="<?php echo e($metaKeyword); ?>" />
  <meta name="author" content="EverythingEasy" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <link rel="canonical" href="https://everythingeasy-usa.com/web-development.php" />

  <!-- Open Graph / Social -->
  <meta property="og:title" content="<?php echo e($ogTitle !== '' ? $ogTitle : $metaTitle); ?>" />
  <meta property="og:description"
    content="<?php echo e($metaDescription); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="EverythingEasy Technology USA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo e($ogTitle !== '' ? $ogTitle : $metaTitle); ?>" />
  <meta name="twitter:description"
    content="<?php echo e($metaDescription); ?>" />

  <!-- Mobile Meta -->
  <meta name="format-detection" content="telephone=no" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="MobileOptimized" content="320" />
  <meta name="language" content="English" />
  <meta http-equiv="content-language" content="en" />

  <!-- CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />

  <style>
    .service-hero {
      background: #004da6;
      color: white;
      padding: 80px 0;
      margin-top: 80px;
    }

    .service-hero h1 {
      line-height: 1.2;
      margin-bottom: 20px;
    }

    .metrics-section {
      background: #f8f9fa;
      padding: 60px 0;
    }

    .metric-box {
      text-align: center;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .metric-box h2 {
      font-size: 2.5rem;
      color: #004da6;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .metric-box p {
      color: #666;
      font-weight: 600;
    }

    .case-study-section {
      padding: 80px 0;
    }

    .case-study-card {
      background: white;
      border: 2px solid #f0f0f0;
      border-radius: 10px;
      padding: 30px;
      margin-bottom: 30px;
      transition: all 0.3s ease;
    }

    .case-study-card:hover {
      border-color: #004da6;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .results-table {
      width: 100%;
      margin-top: 20px;
    }

    .results-table thead th {
      border-bottom: 2px solid #f0f0f0;
      padding: 10px 0;
      color: #333;
      font-weight: 600;
    }

    .results-table td {
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .badge-success {
      display: inline-block;
      background: #d4edda;
      color: #155724;
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: 600;
    }

    .how-we-help {
      padding: 80px 0;
      background: white;
    }

    .help-card {
      text-align: center;
      padding: 30px;
      margin-bottom: 30px;
      border-radius: 10px;
      background: #f8f9fa;
      transition: all 0.3s ease;
    }

    .help-card:hover {
      background: #004da6;
      color: white;
      transform: translateY(-5px);
    }

    .help-card i {
      font-size: 2.5rem;
      color: #004da6;
      margin-bottom: 15px;
    }

    .help-card:hover i {
      color: white;
    }

    .help-card h6 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .why-choose {
      padding: 80px 0;
      background: #f8f9fa;
    }

    .choose-card {
      background: white;
      border-left: 4px solid #004da6;
      padding: 25px;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    .choose-card h5 {
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: #1e3c72;
    }

    .boost-cta {
      background: #004da6;
      color: white;
      padding: 60px 0;
      text-align: center;
    }

    .boost-cta h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .boost-cta p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    .faq-section {
      padding: 80px 0;
    }

    .faq-item {
      background: white;
      border: 1px solid #f0f0f0;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .faq-item:hover {
      border-color: #004da6;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .faq-item h6 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 0;
      font-weight: 600;
      color: #004da6;
    }

    .faq-answer {
      display: none;
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid #f0f0f0;
    }

    .faq-item.active .faq-answer {
      display: block;
    }

    .faq-item.active h6 i {
      transform: rotate(180deg);
    }

    .faq-item h6 i {
      transition: transform 0.3s ease;
      color: #004da6;
    }

    .specialized-services {
      padding: 80px 0;
      background: white;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    .service-card-item {
      background: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      text-decoration: none;
      color: inherit;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .service-card-item:hover {
      background: #004da6;
      color: white;
      border-color: #004da6;
      transform: translateY(-5px);
    }

    .service-card-item i {
      font-size: 2rem;
      color: #004da6;
      margin-bottom: 15px;
    }

    .service-card-item:hover i {
      color: white;
    }

    .service-card-item h6 {
      font-weight: 700;
    }
  </style>
</head>

<body>

<nav
  id="navbar"
  class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top"
  style="backdrop-filter: blur(10px); z-index: 1000"
>
  <div class="container">
    <a
      class="navbar-brand fw-bold text-primary d-flex align-items-center"
      href="index.php"
    >
      <img
        src="./images/logo.webp"
        alt="Logo"
        style="height: 40px; margin-right: 10px"
      />
      <span>EverythingEasy</span>
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="career.php">Careers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary btn-sm ms-3" href="index.php">Get Quote</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  // Auto-close mobile menu when a link is clicked
  document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    const navbarCollapse = document.getElementById("navbarNav");

    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        if (navbarCollapse && navbarCollapse.classList.contains("show")) {
          const toggler = document.querySelector(".navbar-toggler");
          if (toggler) {
            toggler.click();
          }
        }
      });
    });
  });
</script>

  <!-- <script src="js/navigation.js"></script> -->

  <!-- Hero Section -->
  <section class="service-hero" id="service-hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="hero-content">
            <h5 class="text-warning mb-3">
              PROFESSIONAL WEBSITE DEVELOPMENT
            </h5>
            <h1 class="display-4 fw-bold mb-4 text-white">
              <?php echo ((string) ($serviceInfo['title'] ?? '')) ?>
            </h1>
            <p class="lead mb-4 text-white" style="font-size: 1.35rem">
              Grow your business with a professional website built for performance and usability.
              Our team creates responsive, conversion-focused websites for businesses <?php echo e($locationPhrase); ?>.
              With 10+ years of experience, we focus on practical solutions that improve visibility,
              customer trust, and long-term growth.
            </p>
          </div>
        </div>

        <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
          <div class="card shadow-lg border-0" style="
                border-radius: 20px;
                max-width: 450px;
                margin-left: auto;
                margin-right: auto;
              " id="hero-contact-form">
            <div class="card-body p-3 p-md-4">
              <h4 class="fw-bold mb-3 text-center" style="color: #1e3c72; font-size: 1.25rem">
                Get a Free Quote
              </h4>
              <form id="heroQuoteForm" class="hero-quote-form" action="/form-submit.php" method="post">
                <input type="hidden" name="redirect" value="web-development.php" />
                <input type="hidden" name="source_page" value="web-development" />
                <input type="hidden" name="form_type" value="hero_quote" />
                <div class="mb-2">
                  <input type="text" class="form-control" id="heroName" name="name" placeholder="Your Name*" required
                    style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      " />
                </div>
                <div class="mb-2">
                  <input type="email" class="form-control" id="heroEmail" name="email" placeholder="Your Email*"
                    required style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      " />
                </div>
                <div class="mb-2">
                  <input type="tel" class="form-control" id="heroPhone" name="phone" placeholder="Phone Number*"
                    required style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      " />
                </div>
                <div class="mb-2">
                  <select class="form-select" id="heroService" name="service" required style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      ">
                    <option value="">Select Service*</option>
                    <option value="web-development">Web Development</option>
                    <option value="app-development">
                      Mobile App Development
                    </option>
                    <option value="cloud-solutions">Cloud Solutions</option>
                    <option value="ecommerce">E-Commerce Development</option>
                    <option value="ui-ux">UI/UX Design</option>
                    <option value="digital-marketing">
                      Digital Marketing
                    </option>
                    <option value="other">Other Services</option>
                  </select>
                </div>
                <div class="mb-3">
                  <textarea class="form-control" id="heroMessage" name="message" rows="2"
                    placeholder="Brief about your project (optional)" style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="
                      border-radius: 8px;
                      padding: 10px;
                      font-size: 15px;
                      font-weight: 600;
                    ">
                  Submit Request
                </button>
                <div id="heroFormResult" class="mt-2 d-none"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Metrics Section -->
  <section class="metrics-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="metric-box">
            <h2>60+</h2>
            <p>Projects Delivered</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="metric-box">
            <h2>98%</h2>
            <p>Client Satisfaction</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="metric-box">
            <h2>10+</h2>
            <p>Years Experience</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="metric-box">
            <h2>15+</h2>
            <p>Expert Team Members</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Case Studies Section -->
  <section class="case-study-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Case Studies - Our Clients' Success Stories</h2>
        <p class="lead text-muted">
          We deliver reliable website solutions that help businesses grow. From e-commerce and healthcare
          to education and local services, our projects are built to improve speed, usability, and results.
        </p>
      </div>

      <div class="row">
        <!-- Case Study 1 -->
        <div class="col-lg-6">
          <div class="case-study-card">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  ">
                EC
              </div>
              <div class="ms-3">
                <h5 class="mb-1">E-Commerce Platform Development</h5>
                <p class="text-muted mb-0">Custom Online Retail Solutions & Shopping Cart Integration</p>
              </div>
            </div>
            <table class="results-table">
              <thead>
                <tr>
                  <th>Metric</th>
                  <th>Improvement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Page Load Speed</td>
                  <td><span class="badge-success">↑ 75%</span></td>
                </tr>
                <tr>
                  <td>System Uptime</td>
                  <td><span class="badge-success">99.9%</span></td>
                </tr>
                <tr>
                  <td>Transaction Processing</td>
                  <td><span class="badge-success">↑ 200%</span></td>
                </tr>
                <tr>
                  <td>Security & SSL Protection</td>
                  <td><span class="badge-success">↓ 95%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Case Study 2 -->
        <div class="col-lg-6">
          <div class="case-study-card">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  ">
                HC
              </div>
              <div class="ms-3">
                <h5 class="mb-1">Healthcare Management System</h5>
                <p class="text-muted mb-0">HIPAA-Compliant Digital Health & Telemedicine Solutions</p>
              </div>
            </div>
            <table class="results-table">
              <thead>
                <tr>
                  <th>Metric</th>
                  <th>Improvement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Patient Data Processing</td>
                  <td><span class="badge-success">↑ 150%</span></td>
                </tr>
                <tr>
                  <td>Appointment Automation</td>
                  <td><span class="badge-success">90%</span></td>
                </tr>
                <tr>
                  <td>HIPAA Compliance</td>
                  <td><span class="badge-success">100%</span></td>
                </tr>
                <tr>
                  <td>Staff Productivity Gain</td>
                  <td><span class="badge-success">↑ 65%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Case Study 3 -->
        <div class="col-lg-6">
          <div class="case-study-card">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  ">
                FT
              </div>
              <div class="ms-3">
                <h5 class="mb-1">FinTech Web Application</h5>
                <p class="text-muted mb-0">Secure Payment Gateway & Financial Technology Platform</p>
              </div>
            </div>
            <table class="results-table">
              <thead>
                <tr>
                  <th>Metric</th>
                  <th>Improvement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Transaction Security</td>
                  <td><span class="badge-success">Bank-Grade</span></td>
                </tr>
                <tr>
                  <td>API Response Time</td>
                  <td><span class="badge-success">↓ 80%</span></td>
                </tr>
                <tr>
                  <td>Multi-Factor Authentication</td>
                  <td><span class="badge-success">Enabled</span></td>
                </tr>
                <tr>
                  <td>Platform Scalability</td>
                  <td><span class="badge-success">↑ 300%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Case Study 4 -->
        <div class="col-lg-6">
          <div class="case-study-card">
            <div class="d-flex align-items-center mb-3">
              <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  ">
                ED
              </div>
              <div class="ms-3">
                <h5 class="mb-1">Education Portal Development</h5>
                <p class="text-muted mb-0">Responsive E-Learning Platform with Video Streaming</p>
              </div>
            </div>
            <table class="results-table">
              <thead>
                <tr>
                  <th>Metric</th>
                  <th>Improvement</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Concurrent Users Support</td>
                  <td><span class="badge-success">10,000+</span></td>
                </tr>
                <tr>
                  <td>Video Streaming Quality</td>
                  <td><span class="badge-success">4K Ready</span></td>
                </tr>
                <tr>
                  <td>Mobile & Responsive Design</td>
                  <td><span class="badge-success">Cross-Platform</span></td>
                </tr>
                <tr>
                  <td>Content Delivery Performance</td>
                  <td><span class="badge-success">↑ 120%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How We Can Help Section -->
  <section class="how-we-help">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">How We Help Businesses in <?php echo e($locationLabel); ?> Grow Online</h2>
        <p class="lead text-muted">
          Choosing the right website development partner is crucial for your
          business success. Here's what sets us apart and why businesses in
          <?php echo e($locationLabel); ?> trust us with their web development needs.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-shield-alt"></i>
            <h6>Security & Compliance for <?php echo e($locationLabel); ?></h6>
            <p>
              We follow strong security practices, including SSL setup and regular updates,
              to protect your business and customer data <?php echo e($locationPhrase); ?>.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-chart-line"></i>
            <h6>Proven Track Record in <?php echo e($locationLabel); ?></h6>
            <p>
              With 10+ years of experience and 500+ completed projects, we deliver websites
              that are fast, stable, and aligned with business goals.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-users"></i>
            <h6>Dedicated Support Team for <?php echo e($locationLabel); ?></h6>
            <p>
              Our support team is available for updates, maintenance, and urgent fixes,
              so your website keeps running smoothly after launch.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-cogs"></i>
            <h6>Customized Website Solutions in <?php echo e($locationLabel); ?></h6>
            <p>
              Every business is different, so we build custom websites based on your goals,
              audience, and budget.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-rocket"></i>
            <h6>Modern Web Technologies for <?php echo e($locationLabel); ?></h6>
            <p>
              We use modern, dependable tools to build responsive websites with fast load times
              and clean structure that supports long-term SEO.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-handshake"></i>
            <h6>Transparent Communication in <?php echo e($locationLabel); ?></h6>
            <p>
              You get clear timelines, regular updates, and direct communication throughout the project.
              We keep the process simple and collaborative from start to finish.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="why-choose">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">
          Why Choose EverythingEasy Technology for Web Development in <?php echo e($locationLabel); ?>
        </h2>
        <p class="lead text-muted">
          The right development partner should combine technical quality, business understanding,
          and dependable support. Here's why businesses choose us.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-trophy me-2"></i>Industry Expertise for <?php echo e($locationLabel); ?> Businesses</h5>
            <p class="mb-0">
              Our team has hands-on experience across multiple industries and builds websites
              that match real business requirements.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-dollar-sign me-2"></i>Affordable Web Development Solutions in <?php echo e($locationLabel); ?>
            </h5>
            <p class="mb-0">
              Our pricing is transparent and flexible, so you can choose a package that fits
              your budget without sacrificing quality.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-clock me-2"></i>On-Time Delivery for <?php echo e($locationLabel); ?> Projects</h5>
            <p class="mb-0">
              We follow a structured workflow and clear milestones to deliver projects on time.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-sync-alt me-2"></i>Ongoing Website Maintenance & Support in <?php echo e($locationLabel); ?>
            </h5>
            <p class="mb-0">
              After launch, we continue with maintenance, updates, and support so your site
              stays secure and up to date.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-star me-2"></i>Client Testimonials & Success Stories</h5>
            <p class="mb-0">
              Our client feedback reflects consistent delivery, clear communication,
              and long-term working relationships.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-laptop-code me-2"></i>Modern Web Technologies & Best Practices
            </h5>
            <p class="mb-0">
              We use reliable technologies and select tools based on your project needs,
              performance goals, and scalability.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Web Development in <?php echo e($locationLabel); ?>: Frequently Asked Questions</h2>
        <p class="lead text-muted">
          Welcome to our FAQ section, where we aim to provide answers to
          common questions about our website development services in <?php echo e($locationLabel); ?>. If you have
          a question that's not covered here, please feel free to reach out to
          us directly.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              How much does website development cost in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Pricing depends on scope, features, and design requirements. After understanding
                your needs, we share a clear quote with transparent cost breakdown.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              How long does it take to build a website in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Timelines depend on complexity. A basic business website usually takes 2-4 weeks,
                while larger custom builds can take 6-12 weeks.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              What modern technologies do you use for web development in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                We work with WordPress, React, PHP, HTML/CSS/JS, and modern frameworks.
                The final stack is chosen based on your goals, budget, and project type.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Do you provide ongoing support after website launch in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Yes. We provide post-launch support including bug fixes, updates, performance
                improvements, and routine maintenance.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Will my website be mobile-friendly and SEO optimized in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Yes. All websites are mobile-friendly and include core SEO essentials like
                clean structure, metadata setup, and performance optimization.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              How do you ensure website security for businesses in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                We use SSL, secure configurations, backups, and regular updates to keep your
                website and customer data protected.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Do you work with small businesses in <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Yes, we work with startups, small businesses, and growing teams. We offer
                scalable packages so you can start lean and expand over time.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              What is your website development process for <?php echo e($locationLabel); ?>?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Our process includes discovery, planning, design, development, testing, launch,
                and ongoing support, with updates shared at each stage.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Specialized Services Section -->
  <section class="specialized-services">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Specialized Web Development Services</h2>
        <p class="lead text-muted">
          Comprehensive web solutions tailored to your business needs
        </p>
      </div>

      <div class="service-grid">
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-laptop-code"></i>
          <h6>Web Development</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-mobile-alt"></i>
          <h6>Mobile App Development</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-cloud"></i>
          <h6>Cloud Solutions</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-shopping-cart"></i>
          <h6>E-Commerce Development</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-brain"></i>
          <h6>AI & Machine Learning</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-server"></i>
          <h6>DevOps Services</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-shield-alt"></i>
          <h6>Cybersecurity Solutions</h6>
        </a>
        <a href="/services.php" class="service-card-item">
          <i class="fas fa-paint-brush"></i>
          <h6>UI/UX Design</h6>
        </a>
      </div>
    </div>
  </section>

  <!-- Web Development Features & Technical Excellence Section -->
  <section class="web-dev-features" style="padding: 80px 0; background: #f9f9f9;">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Web Development Features & Solutions That Drive Business Results</h2>
        <p class="lead text-muted">
          Our professional web development services and custom website solutions combine technical excellence with strategic business approach. 
          Every responsive website we build for businesses in <?php echo e($locationLabel); ?> includes essential web development features, 
          modern design elements, and advanced optimization techniques that improve search engine visibility, user experience design, 
          mobile compatibility, and conversion rates for sustainable growth.
        </p>
      </div>

      <div class="row g-4">
        <!-- Feature 1: Performance Optimization -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-tachometer-alt me-2"></i>Performance Optimization & Fast Load Times
            </h5>
            <p>
              Website speed is crucial for both user experience and SEO rankings. Our professional web development services 
              prioritize performance optimization through code efficiency, image compression, advanced caching strategies, 
              CDN integration, and content delivery optimization. Fast-loading business websites reduce bounce rates and improve conversion rates, 
              which directly impacts your bottom line and search engine rankings. Our responsive website design ensures optimal performance 
              across all devices and browsers for maximum user engagement.
            </p>
          </div>
        </div>

        <!-- Feature 2: SEO Architecture -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-search me-2"></i>SEO-Optimized Website Architecture & Ranking Strategy
            </h5>
            <p>
              Technical search engine optimization starts with solid website architecture and foundation. Our custom web development services 
              include clean code structure, proper heading hierarchy, semantic HTML markup, comprehensive meta tags optimization, XML sitemaps, 
              robots.txt configuration, canonical tag implementation, and schema markup. These technical SEO best practices ensure 
              your custom website is easily discoverable by search engines and ranks for relevant keywords and organic search terms in your industry. 
              We optimize web development for maximum search visibility and organic traffic growth.
            </p>
          </div>
        </div>

        <!-- Feature 3: Mobile Responsiveness -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-mobile-alt me-2"></i>Mobile-Responsive & Cross-Device Responsive Design
            </h5>
            <p>
              Mobile-first responsive design is no longer optional in modern web development. Every professional website we develop features fully responsive 
              design across smartphones, tablets, and desktop devices. Mobile responsiveness is a major ranking factor in Google searches and other search engines, 
              and with over 60% of web traffic coming from mobile devices, our responsive website solutions ensure 
              you capture customers on all devices and platforms. Our responsive website design enhances user experience across all screen sizes 
              and improves your website's organic search performance.
            </p>
          </div>
        </div>

        <!-- Feature 4: Conversion Optimization -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-bullseye me-2"></i>Conversion Rate Optimization & Strategic CTA Design
            </h5>
            <p>
              A beautiful custom website means nothing if visitors don't take action or convert. Our professional web development services include 
              strategic placement of high-converting call-to-action buttons, optimized contact forms, clear value propositions, 
              intuitive user flow optimization, and landing page design. We apply proven conversion rate optimization best practices and web development 
              strategies to transform your website traffic into qualified leads and paying customers. Our responsive website solutions 
              are designed for maximum conversions and business growth.
            </p>
          </div>
        </div>

        <!-- Feature 5: Database & Backend -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-database me-2"></i>Robust Database & Advanced Backend Infrastructure
            </h5>
            <p>
              Professional website development and custom web applications require solid, scalable backend infrastructure and architecture. We build powerful custom web applications 
              with efficient database design, secure server-side processing, RESTful API integration capabilities, microservices architecture, and cloud infrastructure. 
              Our advanced backend web development solutions support growing businesses with reliable, enterprise-grade server infrastructure, 
              load balancing, and redundancy that handles high traffic increases, complex business operations, and data-intensive applications.
            </p>
          </div>
        </div>

        <!-- Feature 6: Security & Compliance -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-lock me-2"></i>Website Security, SSL & Advanced Data Protection Standards
            </h5>
            <p>
              Website security and data protection are paramount and protect your business, employees, and customers. All our custom websites and web applications include 
              enterprise-grade SSL/TLS encryption, secure authentication systems, two-factor authentication, GDPR compliance, CCPA compliance, secure payment gateway integration, 
              DDoS protection, web application firewalls, and comprehensive security audits. Website security and protection is not an afterthought—it's built into every stage 
              of our professional web development process and custom web application development. Our security-first approach to web development ensures your business website 
              and customer data remain protected.
            </p>
          </div>
        </div>

        <!-- Feature 7: Analytics & Tracking -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-chart-bar me-2"></i>Analytics Integration & Advanced Performance Tracking
            </h5>
            <p>
              Data-driven business decisions require proper website analytics and tracking infrastructure. Our professional web development includes 
              advanced Google Analytics setup, Google Search Console integration, comprehensive event tracking, detailed conversion funnel monitoring, 
              heatmap analysis, user session recording, and custom advanced reporting dashboards. These analytics and tracking tools measure your website 
              performance, user behavior patterns, business metrics, and ROI so you understand how your web development investment is delivering results. 
              Our web development solutions are built with analytics and measurement in mind from day one.
            </p>
          </div>
        </div>

        <!-- Feature 8: Scalability & Maintenance -->
        <div class="col-lg-6">
          <div class="feature-box" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <h5 class="fw-bold mb-3" style="color: #004da6;">
              <i class="fas fa-expand me-2"></i>Scalability, Long-Term Maintenance & Growth Support
            </h5>
            <p>
              Your professional website should scale and grow with your business operations. We build highly scalable custom websites and web applications that handle increased traffic loads, 
              support new business features, and integrate seamlessly with additional tools and systems as your business operations expand. Our comprehensive website maintenance and support services 
              ensure ongoing updates, critical security patches, performance monitoring, continuous optimization, and technical support 
              to keep your business website competitive in search results and functioning flawlessly for years to come. We treat web development as a long-term partnership.
            </p>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <h4 class="fw-bold mb-3">Professional Web Development Best Practices for Digital Success & Growth</h4>
        <p class="text-muted mb-4" style="max-width: 700px; margin-left: auto; margin-right: auto;">
          These web development features and technical excellence standards form the foundation of modern, successful website development. 
          Whether you need a responsive corporate website, scalable e-commerce platform, custom web application, 
          progressive web app, or service-based business website, our professional web development services apply these proven best practices 
          and industry standards to ensure your web development project succeeds in delivering both exceptional user experience and measurable business objectives for growth and profitability.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact CTA Section -->
  <section class="py-5 bg-light" id="contact">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3 class="fw-bold mb-3">Ready to Start Your Website Project?</h3>
          <p class="lead text-muted mb-lg-0">
            Let's discuss how we can help transform your business in <?php echo e($locationLabel); ?> with an
            innovative website. Contact us today for a free consultation and
            quote.
          </p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="/contact.php" class="btn btn-primary btn-lg">
            <i class="fas fa-envelope me-2"></i>Contact Us Now
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- CTA Section -->
  <section class="boost-cta">
    <div class="container">
      <h2>Ready to Launch Your Website in <?php echo e($locationLabel); ?>?</h2>
      <p>
        Get affordable and 100% result-oriented website development services
        in <?php echo e($locationLabel); ?> with the latest technologies and best practices. Let us help you boost
        your online presence and stand out with innovative web solutions.
      </p>
      <a href="tel:+18443299832" class="btn btn-warning btn-lg me-3">
        <i class="fas fa-phone-alt me-2"></i>Call Us Now
      </a>
      <a href="#service-hero" class="btn btn-outline-light btn-lg">
        Get a Free Quote
      </a>
    </div>
  </section>

<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();
?>
<!-- Footer -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <!-- About Section -->
      <div class="col-lg-4 mb-4">
        <div class="footer-about">
          <h5 class="fw-bold mb-3">EverythingEasy Technology</h5>
          <p class="text-muted mb-4">
            Leading IT solutions company providing innovative technology
            services to help businesses grow digitally.
          </p>

          <!-- Social Links -->
          <div class="social-links mb-4">
            <a
              href="https://www.facebook.com/profile.php?id=61575148140871"
              target="_blank"
              class="facebook text-muted me-3"
              title="Facebook"
            >
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a
              href="https://x.com/Everythingeasy0"
              target="_blank"
              class="twitter text-muted me-3"
              title="Twitter"
            >
              <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a
              href="https://www.linkedin.com/company/everythingeasy/"
              target="_blank"
              class="linkedin text-muted me-3"
              title="LinkedIn"
            >
              <i class="fab fa-linkedin fa-lg"></i>
            </a>
            <a
              href="https://www.instagram.com/everythingeasy0/"
              target="_blank"
              class="instagram text-muted"
              title="Instagram"
            >
              <i class="fab fa-instagram fa-lg"></i>
            </a>
          </div>

          <!-- Trustpilot Widget -->
          <div
            class="trustpilot-widget mt-3"
            data-locale="en-US"
            data-template-id="56278e9abfbbba0bdcd568bc"
            data-businessunit-id="693706f7f444175f88990f6c"
            data-style-height="52px"
            data-style-width="100%"
            data-token="448d2ef3-edd9-486d-8d48-04a5d3ac55b6"
          >
            <a
              href="https://www.trustpilot.com/review/everythingeasy-usa.com"
              target="_blank"
              rel="noopener"
              >Trustpilot</a
            >
          </div>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="footer-links">
          <h6 class="fw-bold mb-3">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="index.php" class="text-decoration-none">Home</a></li>
            <li>
              <a href="about.php" class="text-decoration-none">About Us</a>
            </li>
            <li>
              <a href="services.php" class="text-decoration-none"
                >Our Services</a
              >
            </li>
            <li>
              <a href="blog.php" class="text-decoration-none">Blog</a>
            </li>
            <li>
              <a href="contact.php" class="text-decoration-none">Contact Us</a>
            </li>
            <li>
              <a href="career.php" class="text-decoration-none">Careers</a>
            </li>
            <li>
              <a href="services-locations.php" class="text-decoration-none"
                >Services Location</a
              >
            </li>
          </ul>
        </div>
      </div>

      <!-- Legal & Policies -->
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="footer-links">
          <h6 class="fw-bold mb-3">Legal</h6>
          <ul class="list-unstyled">
            <li>
              <a href="privacy-policy.php" class="text-decoration-none"
                >Privacy Policy</a
              >
            </li>
            <li>
              <a href="terms-conditions.php" class="text-decoration-none"
                >Terms & Conditions</a
              >
            </li>
            <li>
              <a href="return-refund-policy.php" class="text-decoration-none"
                >Return & Refund</a
              >
            </li>
          </ul>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-4 mb-4">
        <div class="footer-contact">
          <h6 class="fw-bold mb-3">Get In Touch</h6>

          <!-- Address -->
          <div class="contact-item d-flex mb-3">
            <i class="fas fa-map-marker-alt me-3"></i>
            <span><?= e($companyInfo['company_address'] ?? 'USA') ?></span>
          </div>

          <!-- Email -->
          <div class="contact-item d-flex mb-3">
            <i class="fas fa-envelope me-3"></i>
            <a
              href="mailto:<?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?>"
              class="text-decoration-none"
            >
              <span><?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?></span>
            </a>
          </div>

          <!-- Phone -->
          <div class="contact-item d-flex">
            <i class="fas fa-phone me-3"></i>
            <a href="tel:<?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?>" class="text-decoration-none">
              <span><?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Divider -->
    <hr class="my-4 border-secondary" />

    <!-- Footer Bottom -->
    <div class="row align-items-center">
      <div class="col-md-6 mb-2 mb-md-0">
        <p class="text-muted mb-0">
          &copy; <span id="year"></span> EverythingEasy Technology. All Rights
          Reserved.
        </p>
      </div>
      <div class="col-md-6 text-md-end">
        <p class="text-muted mb-0">
          Designed with <i class="fas fa-heart text-danger"></i> by Everything
          Easy Team
        </p>
      </div>
    </div>
  </div>

  <!-- TrustBox script -->
  <script
    type="text/javascript"
    src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"
    async
  ></script>

  <!-- Set current year -->
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</footer>


  <!-- Bootstrap JS -->
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

    // Navbar and footer are already included via PHP, no need to fetch
    setActiveNavLink();

    function toggleFaq(element) {
      element.classList.toggle("active");
    }

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
          target.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      });
    });

    const observerOptions = {
      threshold: 0.1,
      rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = "1";
          entry.target.style.transform = "translateY(0)";
        }
      });
    }, observerOptions);

    document
      .querySelectorAll(".case-study-card, .help-card, .choose-card")
      .forEach((el) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(20px)";
        el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
        observer.observe(el);
      });

    // Submission status alert after redirect
    const pageQuery = new URLSearchParams(window.location.search);
    if (pageQuery.get("form") === "success") {
      const formResult = document.getElementById("heroFormResult");
      if (formResult) {
        formResult.className = "mt-2 alert alert-success";
        formResult.innerHTML =
          '<i class="fas fa-check-circle me-2"></i>Thank you! Your request has been submitted.';
        formResult.classList.remove("d-none");
      }
    } else if (pageQuery.get("form") === "error") {
      const formResult = document.getElementById("heroFormResult");
      if (formResult) {
        formResult.className = "mt-2 alert alert-danger";
        formResult.innerHTML =
          '<i class="fas fa-exclamation-circle me-2"></i>Submission failed. Please try again.';
        formResult.classList.remove("d-none");
      }
    }
  </script>
</body>

</html>