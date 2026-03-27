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
    <title>App Development Services - EverythingEasy Technology USA</title>
    <meta
      name="description"
      content="Professional mobile app development services in the USA. Native iOS, Android, and cross-platform solutions for your business needs."
    />
    <meta
      name="keywords"
      content="app development, mobile app development, iOS development, Android development, cross-platform apps"
    />
    <meta name="author" content="EverythingEasy" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <link
      rel="canonical"
      href="https://everythingeasy-usa.com/app-development.html"
    />

    <!-- Open Graph / Social -->
    <meta
      property="og:title"
      content="Professional App Development Services - EverythingEasy Technology USA"
    />
    <meta
      property="og:description"
      content="Get expert mobile app development services with proven results and modern technologies."
    />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="EverythingEasy Technology USA" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="Professional App Development Services - EverythingEasy Technology USA"
    />
    <meta
      name="twitter:description"
      content="Get expert mobile app development services with proven results and modern technologies."
    />

    <!-- CSS -->
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
        color: #004da6;
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
    <?php include "nabar.php"; ?>
    <script src="js/navigation.js"></script>

    <!-- Hero Section -->
    <section class="service-hero" id="app-hero">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content">
              <h5 class="text-warning mb-3">PROFESSIONAL APP DEVELOPMENT</h5>
              <h1 class="display-4 fw-bold mb-4 text-white">
                Mobile App Development Services
              </h1>
              <p class="lead mb-4 text-white" style="font-size: 1.35rem">
                Transform your business vision into powerful mobile
                applications. Our expert development team specializes in
                creating robust, scalable apps that engage users and drive
                business growth. With 10+ years of experience, we deliver
                innovative solutions that keep you ahead of the competition
                across iOS, Android, and cross-platform technologies.
              </p>
            </div>
          </div>

          <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
            <div
              class="card shadow-lg border-0"
              style="
                border-radius: 20px;
                max-width: 450px;
                margin-left: auto;
                margin-right: auto;
              "
              id="hero-contact-form"
            >
              <div class="card-body p-3 p-md-4">
                <h4
                  class="fw-bold mb-3 text-center"
                  style="color: #004da6; font-size: 1.25rem"
                >
                  Get a Free Quote
                </h4>
                <form id="heroQuoteForm" class="hero-quote-form">
                  <div class="mb-2">
                    <input
                      type="text"
                      class="form-control"
                      id="heroName"
                      name="name"
                      placeholder="Your Name*"
                      required
                      style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "
                    />
                  </div>
                  <div class="mb-2">
                    <input
                      type="email"
                      class="form-control"
                      id="heroEmail"
                      name="email"
                      placeholder="Your Email*"
                      required
                      style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "
                    />
                  </div>
                  <div class="mb-2">
                    <input
                      type="tel"
                      class="form-control"
                      id="heroPhone"
                      name="phone"
                      placeholder="Phone Number*"
                      required
                      style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "
                    />
                  </div>
                  <div class="mb-2">
                    <select
                      class="form-select"
                      id="heroService"
                      name="service"
                      required
                      style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "
                    >
                      <option value="">Select App Type*</option>
                      <option value="ios-development">
                        iOS App Development
                      </option>
                      <option value="android-development">
                        Android Development
                      </option>
                      <option value="cross-platform">
                        Cross-Platform Apps (React Native)
                      </option>
                      <option value="flutter">Flutter App Development</option>
                      <option value="app-maintenance">
                        App Maintenance & Support
                      </option>
                      <option value="app-consulting">
                        App Strategy Consulting
                      </option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <textarea
                      class="form-control"
                      id="heroMessage"
                      name="message"
                      rows="2"
                      placeholder="Tell us about your app idea (optional)"
                      style="
                        border-radius: 8px;
                        width: 100%;
                        box-sizing: border-box;
                        padding: 10px 14px;
                        font-size: 14px;
                      "
                    ></textarea>
                  </div>
                  <button
                    type="submit"
                    class="btn btn-primary w-100"
                    style="
                      border-radius: 8px;
                      padding: 10px;
                      font-size: 15px;
                      font-weight: 600;
                    "
                  >
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
              <h2>250+</h2>
              <p>Apps Launched</p>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="metric-box">
              <h2>96%</h2>
              <p>5-Star Ratings</p>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="metric-box">
              <h2>12+</h2>
              <p>Platform Expertise</p>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="metric-box">
              <h2>50M+</h2>
              <p>App Downloads</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Case Studies Section -->
    <section class="case-study-section">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="fw-bold">
            Case Studies - Our App Development Success Stories
          </h2>
          <p class="lead text-muted">
            We specialize in delivering exceptional mobile applications that
            drive user engagement and business growth. From startups to
            enterprises, our proven track record spans iOS, Android, React
            Native, and Flutter development across diverse industries.
          </p>
        </div>

        <div class="row">
          <!-- Case Study 1 -->
          <div class="col-lg-6">
            <div class="case-study-card">
              <div class="d-flex align-items-center mb-3">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                  style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  "
                >
                  RM
                </div>
                <div class="ms-3">
                  <h5 class="mb-1">Ride Sharing Mobile App</h5>
                  <p class="text-muted mb-0">iOS & Android Solutions</p>
                </div>
              </div>
              <table class="results-table">
                <thead>
                  <tr>
                    <th>Metric</th>
                    <th>Achievement</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Active Users</td>
                    <td><span class="badge-success">500K+</span></td>
                  </tr>
                  <tr>
                    <td>App Performance</td>
                    <td><span class="badge-success">60 FPS</span></td>
                  </tr>
                  <tr>
                    <td>Crash Rate</td>
                    <td><span class="badge-success">↓ 0.02%</span></td>
                  </tr>
                  <tr>
                    <td>User Retention</td>
                    <td><span class="badge-success">92%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Case Study 2 -->
          <div class="col-lg-6">
            <div class="case-study-card">
              <div class="d-flex align-items-center mb-3">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                  style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  "
                >
                  FP
                </div>
                <div class="ms-3">
                  <h5 class="mb-1">Fitness & Wellness App</h5>
                  <p class="text-muted mb-0">Cross-Platform Development</p>
                </div>
              </div>
              <table class="results-table">
                <thead>
                  <tr>
                    <th>Metric</th>
                    <th>Achievement</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Downloads</td>
                    <td><span class="badge-success">2M+</span></td>
                  </tr>
                  <tr>
                    <td>App Store Rating</td>
                    <td><span class="badge-success">4.8/5 Stars</span></td>
                  </tr>
                  <tr>
                    <td>Monthly Active</td>
                    <td><span class="badge-success">800K+</span></td>
                  </tr>
                  <tr>
                    <td>Daily Engagement</td>
                    <td><span class="badge-success">45 minutes</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Case Study 3 -->
          <div class="col-lg-6">
            <div class="case-study-card">
              <div class="d-flex align-items-center mb-3">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                  style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  "
                >
                  EA
                </div>
                <div class="ms-3">
                  <h5 class="mb-1">E-Commerce Mobile App</h5>
                  <p class="text-muted mb-0">Multi-Platform Retail Solution</p>
                </div>
              </div>
              <table class="results-table">
                <thead>
                  <tr>
                    <th>Metric</th>
                    <th>Achievement</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Conversion Rate</td>
                    <td><span class="badge-success">↑ 125%</span></td>
                  </tr>
                  <tr>
                    <td>Payment Security</td>
                    <td><span class="badge-success">PCI DSS L1</span></td>
                  </tr>
                  <tr>
                    <td>Transaction Volume</td>
                    <td><span class="badge-success">$5M+/month</span></td>
                  </tr>
                  <tr>
                    <td>Load Time</td>
                    <td><span class="badge-success">↓ 2.3s</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Case Study 4 -->
          <div class="col-lg-6">
            <div class="case-study-card">
              <div class="d-flex align-items-center mb-3">
                <div
                  class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                  style="
                    width: 80px;
                    height: 80px;
                    font-size: 24px;
                    font-weight: 700;
                  "
                >
                  SA
                </div>
                <div class="ms-3">
                  <h5 class="mb-1">Social Networking App</h5>
                  <p class="text-muted mb-0">Real-Time Communication</p>
                </div>
              </div>
              <table class="results-table">
                <thead>
                  <tr>
                    <th>Metric</th>
                    <th>Achievement</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Registered Users</td>
                    <td><span class="badge-success">10M+</span></td>
                  </tr>
                  <tr>
                    <td>Real-Time Sync</td>
                    <td><span class="badge-success">Sub-100ms</span></td>
                  </tr>
                  <tr>
                    <td>Uptime SLA</td>
                    <td><span class="badge-success">99.99%</span></td>
                  </tr>
                  <tr>
                    <td>Push Notification</td>
                    <td><span class="badge-success">98% Delivery</span></td>
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
          <h2 class="fw-bold">How We Can Help You Build the Next Great App</h2>
          <p class="lead text-muted">
            Choosing the right app development partner is crucial for your
            mobile app success. Here's what sets us apart and why businesses
            trust us with their app development projects.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-mobile-alt"></i>
              <h6>Native & Cross-Platform</h6>
              <p>
                Expert development in iOS, Android, React Native, Flutter, and
                more. We choose the right platform for your app's unique
                requirements and budget constraints.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-rocket"></i>
              <h6>Fast Performance</h6>
              <p>
                Lightning-fast app loading, optimized memory usage, and smooth
                animations. We build apps that users love, with exceptional
                performance metrics and minimal crash rates.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-shield-alt"></i>
              <h6>Security First</h6>
              <p>
                Enterprise-grade security, data encryption, secure
                authentication, and compliance with GDPR, CCPA, and industry
                standards. Your app and user data are always protected.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-cloud"></i>
              <h6>Scalable Architecture</h6>
              <p>
                Build apps that grow with your user base. Our scalable backend
                infrastructure supports millions of users, handles high traffic
                loads, and maintains optimal performance.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-chart-line"></i>
              <h6>App Store Optimization</h6>
              <p>
                Expert ASO strategies to improve app visibility, increase
                downloads, and boost rankings. We help your app succeed in both
                Apple App Store and Google Play Store.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="help-card">
              <i class="fas fa-headset"></i>
              <h6>Post-Launch Support</h6>
              <p>
                Comprehensive maintenance, bug fixes, feature updates, and
                continuous improvements. We're there for you long after launch
                with dedicated 24/7 support.
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
            Why Choose EverythingEasy Technology for App Development
          </h2>
          <p class="lead text-muted">
            Finding the right app development partner is critical. Here's why
            thousands of businesses across the USA choose EverythingEasy
            Technology.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="choose-card">
              <h5><i class="fas fa-code me-2"></i>Multi-Language Expertise</h5>
              <p class="mb-0">
                Swift, Kotlin, Java, JavaScript, Flutter, React Native, and
                more. We're fluent in all major app development languages and
                frameworks.
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="choose-card">
              <h5>
                <i class="fas fa-dollar-sign me-2"></i>Flexible Engagement
                Models
              </h5>
              <p class="mb-0">
                Fixed price, time & materials, or dedicated team models. Choose
                the engagement style that works best for your project and
                budget.
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="choose-card">
              <h5>
                <i class="fas fa-hourglass-start me-2"></i>Fast Time-to-Market
              </h5>
              <p class="mb-0">
                Agile development methodology ensures rapid prototyping and
                faster launches. Get your app to market 3-6 months faster than
                traditional approaches.
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="choose-card">
              <h5><i class="fas fa-cogs me-2"></i>Continuous Improvement</h5>
              <p class="mb-0">
                Regular updates, feature enhancements, and performance
                optimizations. Your app stays relevant and competitive with
                regular maintenance and upgrades.
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="choose-card">
              <h5><i class="fas fa-users me-2"></i>Dedicated Team</h5>
              <p class="mb-0">
                Experienced app developers, UX/UI designers, QA engineers, and
                project managers work exclusively on your project for consistent
                quality.
              </p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="choose-card">
              <h5><i class="fas fa-trophy me-2"></i>Award-Winning Studio</h5>
              <p class="mb-0">
                Recognized for excellence in app development with multiple
                industry awards. Our portfolio includes apps with millions of
                downloads and top ratings.
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
          <h2 class="fw-bold">App Development: Frequently Asked Questions</h2>
          <p class="lead text-muted">
            Have questions about app development? Get answers to common
            questions about our mobile app development services.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                How much does app development cost?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  App development costs depend on complexity, features,
                  platforms, and design requirements. A simple MVP might cost
                  $15K-$30K, while a full-featured iOS and Android app can range
                  from $50K-$150K+. We provide detailed quotes after
                  understanding your requirements.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                How long does it take to develop an app?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  A simple app can take 3-6 months, while more complex
                  applications take 6-12 months or longer. We use agile
                  methodology for faster iteration and regular delivery of
                  working features throughout the development process.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                Should I develop for iOS or Android first?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  It depends on your target audience. iOS users typically have
                  higher spending power, while Android has larger market share.
                  We recommend starting with your primary market audience and
                  expanding to other platforms later using cross-platform
                  solutions like React Native or Flutter.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                What's the difference between native and cross-platform
                development?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  Native apps (Swift, Kotlin) offer best performance and deep OS
                  integration, while cross-platform (React Native, Flutter)
                  reduce development time and cost. We recommend native for
                  performance-critical apps and cross-platform for faster,
                  cost-effective development.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                Do you provide app maintenance and updates?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  Yes, we offer comprehensive maintenance and support packages.
                  This includes bug fixes, security updates, OS compatibility
                  updates, feature enhancements, and performance optimization to
                  keep your app fresh and competitive.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                How do you ensure app security?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  We implement enterprise-grade security including end-to-end
                  encryption, secure authentication, data protection, SSL/TLS,
                  and compliance with GDPR and CCPA. Regular security audits and
                  penetration testing ensure your app is protected against
                  vulnerabilities.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                What's your app development process?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  We follow: Discovery & Planning → Design & Wireframing →
                  Development (Agile sprints) → QA Testing → Beta Launch →
                  Production Release → Post-Launch Support. Regular demos and
                  reviews ensure alignment with your vision throughout
                  development.
                </p>
              </div>
            </div>

            <div class="faq-item" onclick="toggleFaq(this)">
              <h6>
                Can you help with app store submission?
                <i class="fas fa-chevron-down"></i>
              </h6>
              <div class="faq-answer">
                <p>
                  Absolutely! We handle the entire app store submission process
                  including app optimization, screenshots, descriptions, review
                  preparation, and launch coordination. We'll ensure your app
                  passes Apple App Store and Google Play guidelines smoothly.
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
          <h2 class="fw-bold">Our Specialized App Development Services</h2>
          <p class="lead text-muted">
            Comprehensive app solutions tailored to your business needs
          </p>
        </div>

        <div class="service-grid">
          <a href="services.html" class="service-card-item">
            <i class="fas fa-apple"></i>
            <h6>iOS App Development</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-android"></i>
            <h6>Android Development</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-layer-group"></i>
            <h6>React Native Apps</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-feather"></i>
            <h6>Flutter Development</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-shopping-cart"></i>
            <h6>E-Commerce Mobile Apps</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-utensils"></i>
            <h6>Food Delivery Apps</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-heartbeat"></i>
            <h6>Healthcare Apps</h6>
          </a>
          <a href="services.html" class="service-card-item">
            <i class="fas fa-gamepad"></i>
            <h6>Gaming Apps</h6>
          </a>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="boost-cta">
      <div class="container">
        <h2>Ready to Build Your App?</h2>
        <p>
          Transform your app vision into reality with our expert development
          team. Whether you need iOS, Android, or cross-platform solutions, we
          deliver high-quality apps that engage users and drive business growth.
        </p>
        <a href="tel:+18443299832" class="btn btn-warning btn-lg me-3">
          <i class="fas fa-phone-alt me-2"></i>Call Us Now
        </a>
        <a href="#app-hero" class="btn btn-outline-light btn-lg">
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

      // Form submission handler - static data
      document
        .getElementById("heroQuoteForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const submitBtn = this.querySelector('button[type="submit"]');
          const originalText = submitBtn.innerHTML;
          submitBtn.innerHTML =
            '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
          submitBtn.disabled = true;

          // Simulate brief processing time
          setTimeout(() => {
            const formResult = document.getElementById("heroFormResult");
            formResult.className = "mt-2 alert alert-success";
            formResult.innerHTML =
              '<i class="fas fa-check-circle me-2"></i>Thank you! Your app development quote request has been received. We will contact you soon.';
            formResult.classList.remove("d-none");

            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Hide message after 6 seconds
            setTimeout(() => {
              formResult.classList.add("d-none");
            }, 6000);
          }, 800);
        });
    </script>
  </body>
</html>
