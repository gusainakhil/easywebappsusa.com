<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();

$rawLocation = trim((string) ($_GET['location'] ?? ''));
$rawLocation = preg_replace('/[^a-zA-Z0-9\s,\-]/', '', $rawLocation) ?? '';
$locationName = $rawLocation !== '' ? $rawLocation : 'USA';
$locationPhrase = strcasecmp($locationName, 'USA') === 0 ? 'in the USA' : 'in ' . $locationName;
$locationLabel = strcasecmp($locationName, 'USA') === 0 ? 'USA' : $locationName;

$serviceSlug = 'web-development';
$serviceQuery = 'SELECT * FROM `services` WHERE `slug` = :slug LIMIT 1';
$serviceQueryParams = [':slug' => $serviceSlug];

$serviceInfo = [
  'title' => 'Web Development Services ' . $locationPhrase,
];

if (isset($_GET['print_query'])) {
  header('Content-Type: text/plain; charset=UTF-8');
  echo "Query:\n" . $serviceQuery . "\n\n";
  echo "Params:\n";
  print_r($serviceQueryParams);
  echo "\nLocation:\n" . $locationLabel . "\n";
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
  <title><?php echo e('Web Development Services in ' . $locationLabel . ' - EverythingEasy Technology'); ?></title>
  <meta name="description"
    content="<?php echo e('Professional web development services in ' . $locationLabel . '. Custom websites, e-commerce solutions, and responsive design for your business growth.'); ?>" />
  <meta name="keywords"
    content="<?php echo e('web development ' . $locationLabel . ', web design ' . $locationLabel . ', custom websites, e-commerce development'); ?>" />
  <meta name="author" content="EverythingEasy" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <link rel="canonical" href="https://everythingeasy-usa.com/web-development.html" />

  <!-- Open Graph / Social -->
  <meta property="og:title" content="<?php echo e('Professional Web Development Services in ' . $locationLabel . ' - EverythingEasy Technology'); ?>" />
  <meta property="og:description"
    content="<?php echo e('Get expert web development services in ' . $locationLabel . ' with modern technologies and proven results.'); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="EverythingEasy Technology USA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo e('Professional Web Development Services in ' . $locationLabel . ' - EverythingEasy Technology'); ?>" />
  <meta name="twitter:description"
    content="<?php echo e('Get expert web development services in ' . $locationLabel . ' with modern technologies and proven results.'); ?>" />

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
  <?php include "navbar.php"; ?>
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
              Unleash the power of professional website development and take
              your business to the next level. Our expert team specializes in
              creating stunning, responsive websites that drive results. With
              10+ years of experience, we help businesses <?php echo e($locationPhrase); ?>
              establish a strong online presence and dominate local search results.
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
              <form id="heroQuoteForm" class="hero-quote-form" action="form-submit.php" method="post">
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
          We specialize in delivering exceptional and affordable website
          development services that drive significant growth for our clients
          nationwide. With extensive experience across various industries
          including hospitality, e-commerce, education, and local businesses,
          we have a proven track record of helping businesses achieve their
          online goals.
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
                <h5 class="mb-1">E-Commerce Platform</h5>
                <p class="text-muted mb-0">Online Retail Solutions</p>
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
                  <td>Security Incidents</td>
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
                <p class="text-muted mb-0">Digital Health Solutions</p>
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
                  <td>Data Security Compliance</td>
                  <td><span class="badge-success">100%</span></td>
                </tr>
                <tr>
                  <td>Staff Productivity</td>
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
                <h5 class="mb-1">FinTech Application</h5>
                <p class="text-muted mb-0">Financial Technology Platform</p>
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
                  <td>User Authentication</td>
                  <td><span class="badge-success">Multi-Factor</span></td>
                </tr>
                <tr>
                  <td>Scalability</td>
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
                <h5 class="mb-1">Education Portal</h5>
                <p class="text-muted mb-0">E-Learning Platform</p>
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
                  <td>Concurrent Users</td>
                  <td><span class="badge-success">10,000+</span></td>
                </tr>
                <tr>
                  <td>Video Streaming Quality</td>
                  <td><span class="badge-success">4K Ready</span></td>
                </tr>
                <tr>
                  <td>Mobile Accessibility</td>
                  <td><span class="badge-success">Cross-Platform</span></td>
                </tr>
                <tr>
                  <td>Content Delivery</td>
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
            <h6>Security & Compliance</h6>
            <p>
              We prioritize your website security with industry-leading
              practices. Our websites are built with enterprise-grade security
              protocols, SSL certificates, and regular security updates to
              protect your business and customer data <?php echo e($locationPhrase); ?>.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-chart-line"></i>
            <h6>Proven Track Record</h6>
            <p>
              With over 10 years of experience and 500+ successful projects,
              we have established partnerships with leading companies across
              <?php echo e($locationLabel); ?>. Our portfolio speaks for our expertise and commitment
              to excellence in website development.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-users"></i>
            <h6>Dedicated Support Team</h6>
            <p>
              Our expert team provides 24/7 support to ensure your website
              runs smoothly. We believe in building long-term relationships
              and being available whenever you need us in <?php echo e($locationLabel); ?> for updates,
              maintenance, or emergency support.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-cogs"></i>
            <h6>Customized Website Solutions</h6>
            <p>
              Every business is unique, and so are our websites. We take time
              to understand your specific requirements and create tailored web
              solutions that align with your business goals and budget
              constraints in <?php echo e($locationLabel); ?>.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-rocket"></i>
            <h6>Modern Web Technologies</h6>
            <p>
              Stay ahead of the competition with the latest web technologies.
              We use responsive design, fast loading speeds, SEO optimization,
              and modern frameworks to build scalable, future-proof websites
              for your business <?php echo e($locationPhrase); ?>.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="help-card">
            <i class="fas fa-handshake"></i>
            <h6>Transparent Communication</h6>
            <p>
              We believe in complete transparency. Regular progress reports,
              clear documentation, and open communication channels ensure
              you're always informed about your website development status in <?php echo e($locationLabel); ?> and
              can provide feedback at any stage.
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
          Finding the right website development partner can make or break your
          online success. Here's why businesses across <?php echo e($locationLabel); ?> choose
          EverythingEasy Technology.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-trophy me-2"></i>Industry Expertise</h5>
            <p class="mb-0">
              Our team comprises certified web development professionals with
              deep understanding of various markets and industries. We stay
              updated with the latest web trends to provide you with
              cutting-edge solutions that give your business a competitive
              advantage.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-dollar-sign me-2"></i>Affordable Web
              Development
            </h5>
            <p class="mb-0">
              We offer premium website development services at competitive
              prices. Our flexible pricing models and efficient development
              processes ensure you get maximum value for your investment
              without compromising on quality.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-clock me-2"></i>On-Time Delivery</h5>
            <p class="mb-0">
              We understand the importance of deadlines for your business. Our
              agile methodology and experienced project managers ensure timely
              delivery of your website projects without sacrificing quality or
              functionality.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-sync-alt me-2"></i>Ongoing Website Maintenance
            </h5>
            <p class="mb-0">
              Our relationship doesn't end at website launch. We provide
              comprehensive maintenance and support services to ensure your
              website continues to perform optimally and evolves with your
              business needs.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5><i class="fas fa-star me-2"></i>Client Testimonials</h5>
            <p class="mb-0">
              Don't just take our word for it. Our clients' success stories
              and testimonials reflect our commitment to excellence. We take
              pride in the long-term partnerships we've built based on trust
              and results.
            </p>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="choose-card">
            <h5>
              <i class="fas fa-laptop-code me-2"></i>Modern Web Technologies
            </h5>
            <p class="mb-0">
              We work with the latest and most reliable web technologies
              including React, WordPress, PHP, HTML5, CSS3, and more. Our
              tech-agnostic approach ensures we choose the right tools for
              your specific website requirements.
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
              How much does website development cost?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                The cost of website development varies depending on project
                scope, complexity, features, and design requirements. We offer
                flexible pricing models from basic business websites to
                advanced e-commerce platforms. After understanding your
                requirements, we provide a detailed quote with transparent
                pricing and no hidden costs.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              How long does it take to build a website?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Website development timelines depend on complexity and
                requirements. A simple business website might take 2-4 weeks,
                while e-commerce or custom applications can take 6-12 weeks.
                We use agile methodology for iterative delivery, ensuring you
                see progress throughout the development cycle.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              What technologies do you use for website development?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                We work with a wide range of modern web technologies including
                WordPress, React, HTML5, CSS3, JavaScript, PHP, and responsive
                frameworks like Bootstrap. We also specialize in e-commerce
                platforms like WooCommerce and Shopify. We choose technologies
                based on your specific needs and budget.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Do you provide ongoing support after website launch?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Yes! We offer comprehensive post-launch support and
                maintenance services for all our clients. This includes bug
                fixes, security updates, content updates, performance
                optimization, and 24/7 technical support. We believe in
                building long-term partnerships with our clients.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Will my website be mobile-friendly and SEO optimized?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Absolutely! All our websites are fully responsive and
                mobile-friendly, working perfectly on all devices. We also
                include basic SEO optimization (meta tags, structured data,
                fast loading, mobile optimization) to help your business rank
                better in search engines.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              How do you ensure website security?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Security is our top priority. We implement SSL certificates,
                secure hosting, regular backups, security plugins, firewall
                protection, and regular security updates. All our websites
                follow industry-standard security practices to protect your
                business and customer data.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              Do you work with small businesses?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                Yes! We work with businesses of all sizes – from small local
                shops to large enterprises. For small businesses, we offer
                affordable starter websites, scalable solutions, and
                cost-effective packages. We understand the unique needs of
                growing businesses.
              </p>
            </div>
          </div>

          <div class="faq-item" onclick="toggleFaq(this)">
            <h6>
              What is your website development process?
              <i class="fas fa-chevron-down"></i>
            </h6>
            <div class="faq-answer">
              <p>
                We follow a proven process: Consultation & Planning → Design &
                Wireframing → Development → Content Integration → Testing & QA
                → Launch → Training & Support. You'll have regular updates and
                opportunities for feedback throughout. We use project
                management tools to keep you informed at every stage.
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
        <a href="services.html" class="service-card-item">
          <i class="fas fa-laptop-code"></i>
          <h6>Web Development</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-mobile-alt"></i>
          <h6>Mobile App Development</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-cloud"></i>
          <h6>Cloud Solutions</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-shopping-cart"></i>
          <h6>E-Commerce Development</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-brain"></i>
          <h6>AI & Machine Learning</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-server"></i>
          <h6>DevOps Services</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-shield-alt"></i>
          <h6>Cybersecurity Solutions</h6>
        </a>
        <a href="services.html" class="service-card-item">
          <i class="fas fa-paint-brush"></i>
          <h6>UI/UX Design</h6>
        </a>
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
          <a href="contact.html" class="btn btn-primary btn-lg">
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

  <?php include "footer.php"; ?>

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
            (currentPage === "" && href === "index.html") ||
            (!currentPage && href === "index.html"))
        ) {
          link.classList.add("active");
        }
      });
    }

    fetch("navbar.html")
      .then((r) => r.text())
      .then((html) => {
        document.getElementById("navbar-container").innerHTML = html;
        setActiveNavLink();
      });

    fetch("footer.html")
      .then((r) => r.text())
      .then((html) => {
        document.getElementById("footer-container").innerHTML = html;
      });

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