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
    <meta name="theme-color" content="#004da6" />
    <title>About Us - EverythingEasy USA</title>
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

    <!-- SEO Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="About EverythingEasy USA - A professional IT solutions company serving US businesses with web development, mobile apps, and digital marketing services."
    />
    <meta
      name="keywords"
      content="about EverythingEasy, IT company USA, web development company, software solutions"
    />
    <meta name="author" content="EverythingEasy Technology USA" />

    <!-- Open Graph -->
    <meta
      property="og:title"
      content="About EverythingEasy USA – IT Solutions Company"
    />
    <meta
      property="og:description"
      content="Learn about EverythingEasy USA and our mission to deliver innovative technology solutions to US businesses."
    />
    <meta property="og:image" content="../everything-easy/images/logo.jpg" />
    <meta property="og:url" content="https://everythingeasy-usa.com/about" />
    <meta property="og:type" content="website" />

    <style>
      * {
        font-family: "Poppins", sans-serif;
      }

      body {
        background: #f8f9fa;
      }

      .bg-gradient-primary {
        background: #004da6;
      }

      .text-primary {
        color: #004da6 !important;
      }

      .btn-primary {
        background-color: #004da6 !important;
        border-color: #004da6 !important;
        color: white !important;
      }
      .btn-primary:hover {
        background-color: #5568d3 !important;
        border-color: #5568d3 !important;
      }

      .timeline-year {
        width: 80px;
        height: 80px;
        background: #004da6;
      }

      .team-card {
        transition:
          transform 0.3s ease,
          box-shadow 0.3s ease;
      }

      .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(102, 126, 234, 0.2);
      }

      .card {
        transition:
          transform 0.3s ease,
          box-shadow 0.3s ease;
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.15);
      }

      #navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
      }

      .badge-primary {
        background-color: #004da6 !important;
      }

      @media (max-width: 768px) {
        .display-4 {
          font-size: 2.5rem;
        }

        .h5 {
          font-size: 14px;
        }
      }
    </style>
  </head>

  <body>
    <!-- Navbar Container -->
    <?php include "navbar.php"; ?>
    <script src="js/navigation.js"></script>
    <main style="margin-top: 30px">
      <!-- Page Header -->
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1>About Us</h1>
              <p>
                Transforming businesses through innovative technology solutions
                in the USA
              </p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    About Us
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- Company Overview -->
      <section class="py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
              <img
                src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80"
                alt="Our Team Working"
                class="img-fluid rounded shadow"
              />
            </div>
            <div class="col-lg-6 mb-4">
              <h5
                class="text-primary mb-3"
                style="
                  font-size: 14px;
                  letter-spacing: 2px;
                  text-transform: uppercase;
                "
              >
                Company Overview
              </h5>
              <h2 class="fw-bold mb-4">
                Leading IT Solutions Provider in the USA
              </h2>
              <p class="text-muted mb-4">
                EverythingEasy Technology USA was founded with a simple mission:
                to make cutting-edge technology accessible and effective for US
                businesses of all sizes. We've grown from a startup to a trusted
                IT solutions provider, serving clients across various industries
                throughout North America.
              </p>
              <p class="text-muted mb-4">
                Our team of dedicated professionals combines technical expertise
                with business acumen to deliver solutions that not only meet
                current needs but also prepare businesses for future growth and
                digital transformation challenges.
              </p>
              <div class="row">
                <div class="col-6">
                  <div class="text-center">
                    <h3 class="text-primary fw-bold mb-1">200+</h3>
                    <p class="text-muted small mb-0">Projects Completed</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-center">
                    <h3 class="text-primary fw-bold mb-1">150+</h3>
                    <p class="text-muted small mb-0">Satisfied Clients</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Mission, Vision, Values -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h5
                class="text-primary mb-3"
                style="
                  font-size: 14px;
                  letter-spacing: 2px;
                  text-transform: uppercase;
                "
              >
                Our Foundation
              </h5>
              <h2 class="fw-bold">Mission, Vision & Values</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                  <div class="mb-4">
                    <i class="fas fa-bullseye fa-3x text-primary"></i>
                  </div>
                  <h4 class="fw-bold mb-3">Our Mission</h4>
                  <p class="text-muted">
                    To empower US businesses with innovative technology
                    solutions that drive growth, efficiency, and digital
                    transformation while maintaining the highest standards of
                    quality and customer service.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                  <div class="mb-4">
                    <i class="fas fa-eye fa-3x text-primary"></i>
                  </div>
                  <h4 class="fw-bold mb-3">Our Vision</h4>
                  <p class="text-muted">
                    To become the most trusted technology partner for businesses
                    across the United States, leading the way in digital
                    innovation and setting new standards for excellence in IT
                    solutions.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                  <div class="mb-4">
                    <i class="fas fa-heart fa-3x text-primary"></i>
                  </div>
                  <h4 class="fw-bold mb-3">Our Values</h4>
                  <p class="text-muted">
                    Integrity, innovation, excellence, and customer-centricity
                    guide everything we do. We believe in building lasting
                    partnerships through trust, transparency, and consistent
                    delivery of exceptional results.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Our Story Timeline -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h5
                class="text-primary mb-3"
                style="
                  font-size: 14px;
                  letter-spacing: 2px;
                  text-transform: uppercase;
                "
              >
                Our Journey
              </h5>
              <h2 class="fw-bold">Company Timeline</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="timeline">
                <div class="timeline-item mb-4">
                  <div class="row align-items-center">
                    <div class="col-12 col-md-2 text-center mb-2 mb-md-0">
                      <div
                        class="timeline-year bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px"
                      >
                        <span class="fw-bold">2021</span>
                      </div>
                    </div>
                    <div class="col-12 col-md-10">
                      <div class="timeline-content">
                        <h5 class="fw-bold">Company Founded</h5>
                        <p class="text-muted mb-0">
                          EverythingEasy Technology USA was established with a
                          vision to simplify technology for US businesses.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="timeline-item mb-4">
                  <div class="row align-items-center">
                    <div class="col-12 col-md-2 text-center mb-2 mb-md-0">
                      <div
                        class="timeline-year bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px"
                      >
                        <span class="fw-bold">2024</span>
                      </div>
                    </div>
                    <div class="col-12 col-md-10">
                      <div class="timeline-content">
                        <h5 class="fw-bold">
                          Team Expansion & First 150 Clients
                        </h5>
                        <p class="text-muted mb-0">
                          Expanded our team and successfully served 150+ clients
                          across the United States with diverse IT solutions.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="timeline-item mb-4">
                  <div class="row align-items-center">
                    <div class="col-12 col-md-2 text-center mb-2 mb-md-0">
                      <div
                        class="timeline-year bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px"
                      >
                        <span class="fw-bold">2025</span>
                      </div>
                    </div>
                    <div class="col-12 col-md-10">
                      <div class="timeline-content">
                        <h5 class="fw-bold">Cloud & Security Excellence</h5>
                        <p class="text-muted mb-0">
                          Became certified cloud solution providers and launched
                          our cybersecurity and data protection services.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="timeline-item">
                  <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                      <div
                        class="timeline-year bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px"
                      >
                        <span class="fw-bold">2026</span>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="timeline-content">
                        <h5 class="fw-bold">AI & Automation Integration</h5>
                        <p class="text-muted mb-0">
                          Integrated AI and machine learning solutions into our
                          service portfolio for enhanced business automation.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Awards & Recognition -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h5
                class="text-primary mb-3"
                style="
                  font-size: 14px;
                  letter-spacing: 2px;
                  text-transform: uppercase;
                "
              >
                Recognition
              </h5>
              <h2 class="fw-bold">Awards & Achievements</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="text-center">
                <div class="award-icon mb-3">
                  <i class="fas fa-trophy fa-3x text-warning"></i>
                </div>
                <h6 class="fw-bold">Best IT Solutions 2024</h6>
                <small class="text-muted">Tech Excellence Awards USA</small>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="text-center">
                <div class="award-icon mb-3">
                  <i class="fas fa-medal fa-3x text-warning"></i>
                </div>
                <h6 class="fw-bold">Innovation Leader</h6>
                <small class="text-muted"
                  >Digital Transformation Excellence</small
                >
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="text-center">
                <div class="award-icon mb-3">
                  <i class="fas fa-star fa-3x text-warning"></i>
                </div>
                <h6 class="fw-bold">Customer Choice Award</h6>
                <small class="text-muted">Client Satisfaction Platform</small>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="text-center">
                <div class="award-icon mb-3">
                  <i class="fas fa-certificate fa-3x text-warning"></i>
                </div>
                <h6 class="fw-bold">ISO 9001 Certified</h6>
                <small class="text-muted">Quality Management</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Call to Action -->
      <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-3">Ready to Partner With Us?</h2>
              <p class="mb-0">
                Let's discuss how EverythingEasy Technology can help transform
                your business with innovative technology solutions tailored for
                the USA market.
              </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
              <a href="index.html" class="btn btn-warning btn-lg">
                Get In Touch
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer Container -->
    <div id="footer-container"></div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
      // Navbar scroll effect
      window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
          navbar.classList.add("shadow");
        } else {
          navbar.classList.remove("shadow");
        }
      });
    </script>
  </body>
</html>
