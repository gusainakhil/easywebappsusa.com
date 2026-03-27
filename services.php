<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();
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
      content="Explore our comprehensive IT services including web development, mobile apps, digital marketing, e-commerce, and more. Professional solutions for your business."
    />
    <meta
      name="keywords"
      content="IT services, web development, mobile apps, digital marketing, e-commerce, custom software, SEO"
    />
    <title>Our Services - EverythingEasy Technology USA</title>
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
  </head>

  <body>
    <?php include "navbar.php"; ?>
    <!-- <script src="js/navigation.js"></script> -->
    <main style="margin-top: 30px">
      <!-- Page Header -->
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1>Our Services</h1>
              <p>
                Comprehensive IT solutions to help your business thrive in the
                digital age
              </p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Services
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Overview -->
      <section class="overview-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 mx-auto text-center mb-5">
              <div class="section-badge">
                <i class="fas fa-briefcase"></i> WHAT WE OFFER
              </div>
              <h2 class="section-title">Complete Technology Solutions</h2>
              <p class="section-description">
                From Custom Software to Digital Marketing, we provide end-to-end
                technology services designed to accelerate your business growth
                and digital transformation.
              </p>
            </div>
          </div>

          <!-- Quick Stats -->
          <div class="stats-row">
            <div class="row">
              <div class="col-lg-3 col-6 mb-4">
                <div class="stat-box">
                  <h3>7+</h3>
                  <p>Core Services</p>
                </div>
              </div>
              <div class="col-lg-3 col-6 mb-4">
                <div class="stat-box">
                  <h3>15+</h3>
                  <p>Technologies</p>
                </div>
              </div>
              <div class="col-lg-3 col-6 mb-4">
                <div class="stat-box">
                  <h3>24/7</h3>
                  <p>Support</p>
                </div>
              </div>
              <div class="col-lg-3 col-6 mb-4">
                <div class="stat-box">
                  <h3>100%</h3>
                  <p>Satisfaction</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Core Services -->
      <section class="core-services-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mb-4 text-center">
              <div class="section-badge">
                <i class="fas fa-rocket"></i> CORE SERVICES
              </div>
              <h2 class="section-title">Our Primary Expertise</h2>
            </div>
          </div>
          <div class="row g-4">
            <!-- Web Development -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="core-service-card">
                <div class="service-icon-large">
                  <i class="fas fa-globe"></i>
                </div>
                <h3>Web Development</h3>
                <p>
                  Create stunning, responsive websites and web applications that
                  engage users and drive conversions.
                </p>
                <ul class="service-checklist">
                  <li><i class="fas fa-check"></i> Custom Website Design</li>
                  <li><i class="fas fa-check"></i> E-commerce Solutions</li>
                  <li>
                    <i class="fas fa-check"></i> Content Management Systems
                  </li>
                  <li><i class="fas fa-check"></i> Progressive Web Apps</li>
                  <li><i class="fas fa-check"></i> API Development</li>
                </ul>
              </div>
            </div>

            <!-- Mobile App Development -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="core-service-card featured">
                <div class="service-icon-large">
                  <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile App Development</h3>
                <p>
                  Build powerful mobile applications for iOS and Android
                  platforms that enhance user experience.
                </p>
                <ul class="service-checklist">
                  <li><i class="fas fa-check"></i> iOS App Development</li>
                  <li><i class="fas fa-check"></i> Android App Development</li>
                  <li><i class="fas fa-check"></i> Cross-Platform Solutions</li>
                  <li><i class="fas fa-check"></i> App Store Optimization</li>
                  <li><i class="fas fa-check"></i> Maintenance & Support</li>
                </ul>
              </div>
            </div>

            <!-- Custom Software -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="core-service-card featured">
                <div class="service-icon-large">
                  <i class="fas fa-cogs"></i>
                </div>
                <h3>Custom Software Development</h3>
                <p>
                  Develop custom software solutions designed specifically for
                  your business needs and goals.
                </p>
                <ul class="service-checklist">
                  <li><i class="fas fa-check"></i> Enterprise Solutions</li>
                  <li><i class="fas fa-check"></i> API Development</li>
                  <li><i class="fas fa-check"></i> Cloud Integration</li>
                  <li><i class="fas fa-check"></i> Legacy Modernization</li>
                  <li>
                    <i class="fas fa-check"></i> System Design & Architecture
                  </li>
                </ul>
              </div>
            </div>

            <!-- Digital Marketing -->
            <div class="col-12 col-lg-6 mb-3">
              <div class="core-service-card">
                <div class="service-icon-large">
                  <i class="fas fa-bullhorn"></i>
                </div>
                <h3>Digital Marketing</h3>
                <p>
                  Grow your online presence with data-driven digital marketing
                  strategies and campaigns.
                </p>
                <ul class="service-checklist">
                  <li><i class="fas fa-check"></i> SEO Optimization</li>
                  <li><i class="fas fa-check"></i> Social Media Marketing</li>
                  <li><i class="fas fa-check"></i> Content Marketing</li>
                  <li><i class="fas fa-check"></i> PPC Advertising</li>
                  <li><i class="fas fa-check"></i> Analytics & Reporting</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Specialized Services -->
      <section class="specialized-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mb-5 text-center">
              <h2>Specialized Services</h2>
            </div>
          </div>
          <div class="row">
            <!-- Data Analytics -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-chart-bar"></i>
                </div>
                <h5>Data Analytics</h5>
                <p>
                  Transform raw data into actionable insights. Our analytics
                  solutions help you make data-driven decisions.
                </p>
              </div>
            </div>

            <!-- AI Services -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-brain"></i>
                </div>
                <h5>AI & Machine Learning</h5>
                <p>
                  Leverage artificial intelligence to automate processes and
                  gain competitive advantages in your industry.
                </p>
              </div>
            </div>

            <!-- Cloud Services -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-cloud"></i>
                </div>
                <h5>Cloud Services</h5>
                <p>
                  Migrate to the cloud or optimize your existing cloud
                  infrastructure. AWS, Azure, GCP experts.
                </p>
              </div>
            </div>

            <!-- Security -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-lock"></i>
                </div>
                <h5>Cybersecurity</h5>
                <p>
                  Protect your business with comprehensive security solutions
                  and vulnerability assessments.
                </p>
              </div>
            </div>

            <!-- DevOps -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-rocket"></i>
                </div>
                <h5>DevOps</h5>
                <p>
                  Streamline your development workflow with DevOps practices and
                  continuous integration/deployment.
                </p>
              </div>
            </div>

            <!-- Consulting -->
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              <div class="specialized-card">
                <div class="specialized-icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <h5>IT Consulting</h5>
                <p>
                  Strategic technology consulting to align your IT
                  infrastructure with your business goals.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Why Choose Us -->
      <section class="why-choose-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2 class="text-center">Why Choose EverythingEasy?</h2>
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="feature-content">
                      <h5>Expert Team</h5>
                      <p>
                        Experienced developers, designers, and project managers
                        dedicated to your success.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-clock"></i>
                    </div>
                    <div class="feature-content">
                      <h5>On-Time Delivery</h5>
                      <p>
                        We respect your timeline and deliver quality solutions
                        on schedule.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-handshake"></i>
                    </div>
                    <div class="feature-content">
                      <h5>Transparent Communication</h5>
                      <p>
                        Stay informed with regular updates and clear
                        communication throughout the project.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-content">
                      <h5>Ongoing Support</h5>
                      <p>
                        Comprehensive post-launch support and maintenance to
                        keep your solution running smoothly.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="cta-section" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2>Ready to Get Started?</h2>
              <p>
                Let's discuss how we can help your business through technology
              </p>
              <div class="cta-buttons">
                <a href="index.php" class="cta-btn cta-btn-primary">
                  <i class="fas fa-envelope me-2"></i>Get Free Quote
                </a>
                <a href="tel:+18443299832" class="cta-btn cta-btn-secondary">
                  <i class="fas fa-phone me-2"></i>Call Now
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

     <?php include "footer.php"; ?>
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
