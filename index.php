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
    <title>EverythingEasy - Professional IT Solutions USA</title>
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
      content="EverythingEasy Technology - Professional IT solutions and web development company in USA. Custom websites, mobile apps, e-commerce, and digital marketing services."
    />
    <meta
      name="keywords"
      content="web development USA, IT solutions, website design, digital marketing, ecommerce, mobile app development, software development"
    />
    <meta name="author" content="EverythingEasy Technology USA" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <link rel="canonical" href="https://everythingeasy-usa.com/" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/png"
      href="../everything-easy/images/logo.jpg"
    />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
    <link rel="manifest" href="site.webmanifest" />
    <meta name="theme-color" content="#004da6" />

    <!-- Open Graph -->
    <meta
      property="og:title"
      content="EverythingEasy – Web Development & IT Solutions Company USA"
    />
    <meta
      property="og:description"
      content="We help US businesses grow with modern websites, mobile apps, and digital marketing services."
    />
    <meta property="og:image" content="../everything-easy/images/logo.jpg" />
    <meta property="og:url" content="https://everythingeasy-usa.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="EverythingEasy USA" />

    <!-- Schema Markup -->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "EverythingEasy Technology USA",
        "url": "https://everythingeasy-usa.com",
        "telephone": "+1-844-EASY-WEB",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "123 Tech Boulevard",
          "addressLocality": "New York",
          "addressRegion": "NY",
          "postalCode": "10001",
          "addressCountry": "US"
        }
      }
    </script>

    <style>
      /* Enhanced animations and transitions */
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes countUp {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }

      .fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
      }

      .counter-animate {
        display: inline-block;
        animation: countUp 2s ease-out forwards;
      }

      .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.2) !important;
      }

      .pricing-card:hover {
        transform: translateY(-10px);
      }

      .team-card:hover img {
        transform: scale(1.05);
      }

      /* Form Styles */
      .consultation-form {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        color: #333;
        max-width: 440px;
        width: 100%;
        margin: 0 auto;
      }

      .consultation-form h3 {
        font-weight: 700;
        margin-bottom: 25px;
        font-size: 24px;
        color: #333;
      }

      .consultation-form .form-control,
      .consultation-form .form-select {
        border: 2px solid #e0e0e0;
        padding: 12px 15px;
        font-size: 14px;
        border-radius: 8px;
        transition: all 0.3s ease;
      }

      .consultation-form .form-control:focus,
      .consultation-form .form-select:focus {
        border-color: #004da6;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
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

      .text-primary {
        color: #004da6 !important;
      }

      .consultation-form .form-control::placeholder {
        color: #999;
      }

      .consultation-form button {
        padding: 12px 20px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
      }

      .consultation-form button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
      }

      .consultation-form .form-note {
        text-align: center;
        color: #999;
        font-size: 12px;
        margin-top: 15px;
      }

      /* Mobile responsiveness improvements */
      @media (max-width: 991px) {
        .consultation-form {
          max-width: 100%;
          margin-top: 30px;
        }

        .hero-title {
          font-size: 40px !important;
        }
      }

      @media (max-width: 768px) {
        .hero-wrapper {
          grid-template-columns: 1fr !important;
        }

        .consultation-form {
          padding: 25px;
          margin-top: 30px;
          max-width: 100%;
        }

        .consultation-form h3 {
          font-size: 20px;
          margin-bottom: 20px;
        }

        .hero-title {
          font-size: 32px !important;
        }

        .hero-form-card {
          margin-top: 30px;
        }

        .pricing-popular {
          transform: scale(1) !important;
        }
      }

      @media (max-width: 576px) {
        .consultation-form {
          padding: 20px;
          margin-top: 20px;
          max-width: 100%;
        }

        .consultation-form h3 {
          font-size: 18px;
          margin-bottom: 15px;
        }

        .consultation-form .form-control,
        .consultation-form .form-select {
          padding: 10px 12px;
          font-size: 13px;
        }

        .consultation-form button {
          padding: 10px 15px;
          font-size: 13px;
        }

        .hero-title {
          font-size: 24px !important;
        }

        .stat-item h3 {
          font-size: 32px !important;
        }

        .btn {
          font-size: 13px !important;
          padding: 8px 16px !important;
        }

        .service-card,
        .team-card,
        .testimonial-card {
          margin-bottom: 20px;
        }
      }
    </style>
  </head>

  <body>
    <!-- Navbar Container -->
    <?php include "header.php"; ?>
    <script src="js/navigation.js"></script>
    <main style="margin-top: 70px">
      <!-- Hero Section -->
      <section
        id="home"
        class="py-5"
        style="
          background: #004da6;
          color: white;
          min-height: 600px;
          display: flex;
          align-items: center;
          position: relative;
          overflow: hidden;
        "
      >
        <div
          style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url(&quot;data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1200 600%22><defs><pattern id=%22grid%22 width=%2240%22 height=%2240%22 patternUnits=%22userSpaceOnUse%22><path d=%22M 40 0 L 0 0 0 40%22 fill=%22none%22 stroke=%22rgba(255,255,255,0.05)%22 stroke-width=%221%22/></pattern></defs><rect width=%221200%22 height=%22600%22 fill=%22url(%23grid)%22/></svg>&quot;);
            opacity: 0.5;
          "
        ></div>

        <div class="container" style="position: relative; z-index: 2">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <p
                style="
                  font-size: 14px;
                  text-transform: uppercase;
                  letter-spacing: 2px;
                  margin-bottom: 15px;
                  opacity: 0.9;
                "
              >
                Creative & Innovative
              </p>
              <h1
                style="
                  font-size: 48px;
                  font-weight: 700;
                  line-height: 1.2;
                  margin-bottom: 20px;
                "
              >
                Creative & Innovative
                <span style="color: #ffd700; display: block"
                  >Digital Solutions</span
                >
              </h1>
              <p
                style="
                  font-size: 16px;
                  line-height: 1.8;
                  margin-bottom: 30px;
                  opacity: 0.95;
                "
              >
                We provide cutting-edge web development, mobile apps, and
                digital marketing solutions to help your business grow and
                succeed in the USA market. Our expert team delivers innovative
                technology solutions tailored to your needs.
              </p>
              <div style="display: flex; gap: 15px; flex-wrap: wrap">
                <button class="btn btn-warning btn-lg" style="font-weight: 600">
                  Get Free Quote
                </button>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="consultation-form">
                <h3>Free Consultation</h3>
                <form id="heroQuoteForm">
                  <input
                    type="text"
                    placeholder="Full Name"
                    class="form-control mb-3"
                    required
                  />
                  <input
                    type="email"
                    placeholder="Email Address"
                    class="form-control mb-3"
                    required
                  />
                  <input
                    type="tel"
                    placeholder="Phone Number"
                    class="form-control mb-3"
                  />
                  <select class="form-select mb-3" required>
                    <option value="">Select Service</option>
                    <option value="web">Website Development</option>
                    <option value="app">Mobile App</option>
                    <option value="ecom">E-Commerce</option>
                    <option value="marketing">Digital Marketing</option>
                    <option value="other">Other</option>
                  </select>
                  <button type="submit" class="btn btn-primary w-100">
                    Send Request
                  </button>
                </form>
                <p class="form-note">🔒 We'll respond within 2 hours</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Stats Section -->
      <section
        class="py-5"
        style="background: white; box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.05)"
      >
        <div class="container">
          <div class="row text-center">
            <div class="col-md-3 col-sm-6 mb-4">
              <h2
                class="counter"
                style="
                  font-size: 48px;
                  font-weight: 700;
                  color: #004da6;
                  margin-bottom: 10px;
                "
                data-target="200"
              >
                0
              </h2>
              <p style="color: #666; font-size: 16px; font-weight: 500">
                Projects Delivered
              </p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <h2
                class="counter"
                style="
                  font-size: 48px;
                  font-weight: 700;
                  color: #004da6;
                  margin-bottom: 10px;
                "
                data-target="150"
              >
                0
              </h2>
              <p style="color: #666; font-size: 16px; font-weight: 500">
                Happy Clients
              </p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <h2
                class="counter"
                style="
                  font-size: 48px;
                  font-weight: 700;
                  color: #004da6;
                  margin-bottom: 10px;
                "
                data-target="15"
              >
                0
              </h2>
              <p style="color: #666; font-size: 16px; font-weight: 500">
                Expert Team Members
              </p>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
              <h2
                style="
                  font-size: 48px;
                  font-weight: 700;
                  color: #004da6;
                  margin-bottom: 10px;
                "
              >
                6
              </h2>
              <p style="color: #666; font-size: 16px; font-weight: 500">
                Years Experience
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- About Section -->
      <section id="about" class="py-5" style="background: #f8f9fa">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <p
                style="
                  color: #004da6;
                  font-weight: 600;
                  font-size: 14px;
                  text-transform: uppercase;
                  letter-spacing: 1px;
                "
              >
                About Us
              </p>
              <h2
                style="
                  font-size: 36px;
                  font-weight: 700;
                  margin-bottom: 20px;
                  color: #333;
                "
              >
                Leading IT Solutions Company in USA
              </h2>
              <p
                style="
                  color: #666;
                  font-size: 16px;
                  line-height: 1.8;
                  margin-bottom: 20px;
                "
              >
                EverythingEasy Technology is a trusted partner for innovative IT
                solutions and web development services across the United States.
                With over 8 years of industry experience, we have successfully
                delivered more than 150 projects for diverse clients ranging
                from startups to established enterprises.
              </p>
              <p
                style="
                  color: #666;
                  font-size: 16px;
                  line-height: 1.8;
                  margin-bottom: 20px;
                "
              >
                Our team of certified developers, designers, and digital
                strategists is committed to delivering high-quality solutions
                that drive measurable business results and maximize your return
                on investment.
              </p>
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <p style="color: #004da6; margin-bottom: 0">
                    <i
                      class="fas fa-check-circle"
                      style="margin-right: 10px"
                    ></i>
                    Fast Turnaround
                  </p>
                </div>
                <div class="col-sm-6 mb-3">
                  <p style="color: #004da6; margin-bottom: 0">
                    <i
                      class="fas fa-check-circle"
                      style="margin-right: 10px"
                    ></i>
                    Custom Solutions
                  </p>
                </div>
                <div class="col-sm-6 mb-3">
                  <p style="color: #004da6; margin-bottom: 0">
                    <i
                      class="fas fa-check-circle"
                      style="margin-right: 10px"
                    ></i>
                    24/7 Support
                  </p>
                </div>
                <div class="col-sm-6 mb-3">
                  <p style="color: #004da6; margin-bottom: 0">
                    <i
                      class="fas fa-check-circle"
                      style="margin-right: 10px"
                    ></i>
                    Quality Guaranteed
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <img
                src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80"
                alt="About Us"
                style="
                  width: 100%;
                  border-radius: 12px;
                  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
                "
              />
            </div>
          </div>
        </div>
      </section>

      <!-- Why Choose Us -->
      <section class="py-5" style="background: white">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Why Choose Us
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              Why Partner With EverythingEasy
            </h2>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
              <div
                style="
                  padding: 30px;
                  background: #f8f9fa;
                  border-radius: 12px;
                  border-left: 5px solid #004da6;
                "
              >
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  <i
                    class="fas fa-rocket"
                    style="color: #004da6; margin-right: 12px"
                  ></i
                  >Quick Turnaround
                </h5>
                <p style="color: #666; margin-bottom: 0">
                  We deliver high-quality projects on time without compromising
                  on excellence. Fast execution is our commitment.
                </p>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div
                style="
                  padding: 30px;
                  background: #f8f9fa;
                  border-radius: 12px;
                  border-left: 5px solid #004da6;
                "
              >
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  <i
                    class="fas fa-chart-line"
                    style="color: #004da6; margin-right: 12px"
                  ></i
                  >Results-Driven
                </h5>
                <p style="color: #666; margin-bottom: 0">
                  Every project is focused on achieving your business goals and
                  delivering measurable ROI improvements.
                </p>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div
                style="
                  padding: 30px;
                  background: #f8f9fa;
                  border-radius: 12px;
                  border-left: 5px solid #004da6;
                "
              >
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  <i
                    class="fas fa-users"
                    style="color: #004da6; margin-right: 12px"
                  ></i
                  >Expert Team
                </h5>
                <p style="color: #666; margin-bottom: 0">
                  Our certified professionals bring years of experience and stay
                  updated with the latest technologies.
                </p>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div
                style="
                  padding: 30px;
                  background: #f8f9fa;
                  border-radius: 12px;
                  border-left: 5px solid #004da6;
                "
              >
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  <i
                    class="fas fa-headset"
                    style="color: #004da6; margin-right: 12px"
                  ></i
                  >24/7 Support
                </h5>
                <p style="color: #666; margin-bottom: 0">
                  Round-the-clock customer support ensures your business never
                  stops. We're always here to help.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Section -->
      <section id="services" class="py-5" style="background: #f8f9fa">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Our Services
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              Comprehensive IT Solutions
            </h2>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-globe"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Website Development
                </h5>
                <p style="color: #666; font-size: 14px">
                  Custom, responsive websites that convert visitors into
                  customers and boost your online presence.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-mobile-alt"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Mobile App Development
                </h5>
                <p style="color: #666; font-size: 14px">
                  Native and cross-platform apps for iOS and Android that engage
                  users and drive growth.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-shopping-cart"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  E-Commerce Solutions
                </h5>
                <p style="color: #666; font-size: 14px">
                  Powerful online stores with secure payments, inventory
                  management, and conversion optimization.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-search"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  SEO & Digital Marketing
                </h5>
                <p style="color: #666; font-size: 14px">
                  Strategic SEO, PPC, social media, and content marketing to
                  boost your visibility online.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-cloud"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Cloud Solutions
                </h5>
                <p style="color: #666; font-size: 14px">
                  Scalable cloud infrastructure and DevOps services for
                  reliable, secure operations.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div
                class="service-card"
                style="
                  background: white;
                  padding: 30px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-cogs"
                  style="
                    font-size: 50px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  API Integration
                </h5>
                <p style="color: #666; font-size: 14px">
                  Seamless integration with third-party services and custom API
                  development.
                </p>
              </div>
            </div>
          </div>

          <!-- CTA Box -->
          <div class="text-center mt-5">
            <div
              style="
                background: linear-gradient(135deg, #004da6 0%, #003399 100%);
                color: white;
                padding: 40px;
                border-radius: 12px;
              "
            >
              <h3 style="font-weight: 700; margin-bottom: 20px">
                Need a Custom Solution?
              </h3>
              <p style="font-size: 16px; margin-bottom: 25px">
                Let's discuss your project requirements and create the perfect
                solution for your business.
              </p>
              <a
                href="#quote"
                class="btn btn-light btn-lg"
                style="font-weight: 600"
                >Request a Quote</a
              >
            </div>
          </div>
        </div>
      </section>

      <!-- Process Section -->
      <section class="py-5" style="background: white">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Our Process
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              Simple & Clean Working Process
            </h2>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div style="text-align: center">
                <div
                  style="
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(
                      135deg,
                      #004da6 0%,
                      #003399 100%
                    );
                    color: white;
                    font-size: 36px;
                    font-weight: 700;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    margin: 0 auto 20px;
                  "
                >
                  1
                </div>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Research
                </h5>
                <p style="color: #666; font-size: 14px">
                  We deeply understand your business, market, and competitors to
                  devise optimal solutions.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div style="text-align: center">
                <div
                  style="
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(
                      135deg,
                      #004da6 0%,
                      #003399 100%
                    );
                    color: white;
                    font-size: 36px;
                    font-weight: 700;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    margin: 0 auto 20px;
                  "
                >
                  2
                </div>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Concept
                </h5>
                <p style="color: #666; font-size: 14px">
                  We create detailed plans and designs that align with your
                  vision and goals.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div style="text-align: center">
                <div
                  style="
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(
                      135deg,
                      #004da6 0%,
                      #003399 100%
                    );
                    color: white;
                    font-size: 36px;
                    font-weight: 700;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    margin: 0 auto 20px;
                  "
                >
                  3
                </div>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Development
                </h5>
                <p style="color: #666; font-size: 14px">
                  Our expert team brings your concept to life with cutting-edge
                  technology.
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div style="text-align: center">
                <div
                  style="
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(
                      135deg,
                      #004da6 0%,
                      #003399 100%
                    );
                    color: white;
                    font-size: 36px;
                    font-weight: 700;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    margin: 0 auto 20px;
                  "
                >
                  4
                </div>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 15px">
                  Launch & Support
                </h5>
                <p style="color: #666; font-size: 14px">
                  We ensure smooth deployment and provide ongoing support and
                  optimization.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Pricing Section -->
      <section id="pricing" class="py-5" style="background: white">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Pricing Plans
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              Transparent & Flexible Pricing. No Hidden Fees.
            </h2>
          </div>
          <div class="row">
            <!-- Starter -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div
                class="pricing-card"
                style="
                  background: #f8f9fa;
                  border: 2px solid #e0e0e0;
                  border-radius: 12px;
                  padding: 30px;
                  text-align: center;
                  height: 100%;
                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-rocket"
                  style="
                    font-size: 2.5rem;
                    color: #004da6;
                    margin-bottom: 15px;
                    display: block;
                  "
                ></i>
                <h4 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Starter
                </h4>
                <p style="color: #999; font-size: 14px; margin-bottom: 20px">
                  Perfect for small businesses
                </p>
                <h2
                  style="color: #004da6; font-weight: 700; margin-bottom: 5px"
                >
                  $99
                </h2>
                <p style="color: #999; font-size: 12px; margin-bottom: 20px">
                  Billed monthly
                </p>
                <ul
                  style="
                    list-style: none;
                    padding: 0;
                    margin: 20px 0;
                    text-align: left;
                  "
                >
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >5 Web Pages
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Basic SEO
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >SSL Certificate
                  </li>
                  <li style="padding: 10px 0; color: #666; font-size: 14px">
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Email Support
                  </li>
                </ul>
                <a
                  href="#quote"
                  class="btn w-100"
                  style="
                    font-weight: 600;
                    background: white;
                    color: #004da6;
                    border: 2px solid #004da6;
                    margin-top: 15px;
                    display: block;
                    text-decoration: none;
                    padding: 10px 20px;
                  "
                >
                  Get Started
                </a>
              </div>
            </div>

            <!-- Professional (Popular) -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div
                class="pricing-card"
                style="
                  background: #004da6;
                  color: white;
                  border-radius: 12px;
                  padding: 30px;
                  text-align: center;
                  height: 100%;
                  box-shadow: 0 10px 40px rgba(0, 77, 166, 0.2);
                  position: relative;
                  transition: all 0.3s;
                "
              >
                <span
                  style="
                    position: absolute;
                    top: -12px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: #ffc107;
                    color: #333;
                    padding: 6px 20px;
                    border-radius: 20px;
                    font-size: 12px;
                    font-weight: 700;
                    white-space: nowrap;
                  "
                  >★ Most Popular</span
                >
                <i
                  class="fas fa-diamond"
                  style="
                    font-size: 2.5rem;
                    color: white;
                    margin-bottom: 15px;
                    display: block;
                    margin-top: 10px;
                  "
                ></i>
                <h4 style="font-weight: 700; margin-bottom: 10px">
                  Professional
                </h4>
                <p style="opacity: 0.9; font-size: 14px; margin-bottom: 20px">
                  Best for growing businesses
                </p>
                <h2 style="font-weight: 700; margin-bottom: 5px">$399</h2>
                <p style="opacity: 0.8; font-size: 12px; margin-bottom: 20px">
                  Billed monthly • Save 20% yearly
                </p>
                <ul
                  style="
                    list-style: none;
                    padding: 0;
                    margin: 20px 0;
                    text-align: left;
                  "
                >
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                      font-size: 14px;
                    "
                  >
                    <i class="fas fa-check" style="margin-right: 10px"></i>15
                    Web Pages
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                      font-size: 14px;
                    "
                  >
                    <i class="fas fa-check" style="margin-right: 10px"></i
                    >E-commerce Setup
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                      font-size: 14px;
                    "
                  >
                    <i class="fas fa-check" style="margin-right: 10px"></i
                    >Advanced SEO
                  </li>
                  <li style="padding: 10px 0; font-size: 14px">
                    <i class="fas fa-check" style="margin-right: 10px"></i
                    >Priority Support
                  </li>
                </ul>
                <a
                  href="#quote"
                  class="btn w-100"
                  style="
                    font-weight: 600;
                    background: #ffc107;
                    color: #333;
                    margin-top: 15px;
                    display: block;
                    text-decoration: none;
                    padding: 10px 20px;
                  "
                >
                  Get Started
                </a>
              </div>
            </div>

            <!-- Business -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div
                class="pricing-card"
                style="
                  background: #f8f9fa;
                  border: 2px solid #e0e0e0;
                  border-radius: 12px;
                  padding: 30px;
                  text-align: center;
                  height: 100%;
                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-building"
                  style="
                    font-size: 2.5rem;
                    color: #004da6;
                    margin-bottom: 15px;
                    display: block;
                  "
                ></i>
                <h4 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Business
                </h4>
                <p style="color: #999; font-size: 14px; margin-bottom: 20px">
                  For medium businesses
                </p>
                <h2
                  style="color: #004da6; font-weight: 700; margin-bottom: 5px"
                >
                  $1,299
                </h2>
                <p style="color: #999; font-size: 12px; margin-bottom: 20px">
                  Billed monthly
                </p>
                <ul
                  style="
                    list-style: none;
                    padding: 0;
                    margin: 20px 0;
                    text-align: left;
                  "
                >
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >30 Web Pages
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Advanced E-commerce
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Marketing Tools
                  </li>
                  <li style="padding: 10px 0; color: #666; font-size: 14px">
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Phone & Email Support
                  </li>
                </ul>
                <a
                  href="#quote"
                  class="btn w-100"
                  style="
                    font-weight: 600;
                    background: white;
                    color: #004da6;
                    border: 2px solid #004da6;
                    margin-top: 15px;
                    display: block;
                    text-decoration: none;
                    padding: 10px 20px;
                  "
                >
                  Get Started
                </a>
              </div>
            </div>

            <!-- Enterprise -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div
                class="pricing-card"
                style="
                  background: #f8f9fa;
                  border: 2px solid #e0e0e0;
                  border-radius: 12px;
                  padding: 30px;
                  text-align: center;
                  height: 100%;
                  transition: all 0.3s;
                "
              >
                <i
                  class="fas fa-crown"
                  style="
                    font-size: 2.5rem;
                    color: #ffc107;
                    margin-bottom: 15px;
                    display: block;
                  "
                ></i>
                <h4 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Enterprise
                </h4>
                <p style="color: #999; font-size: 14px; margin-bottom: 20px">
                  For large organizations
                </p>
                <h2
                  style="color: #004da6; font-weight: 700; margin-bottom: 5px"
                >
                  $2,499
                </h2>
                <p style="color: #999; font-size: 12px; margin-bottom: 20px">
                  Custom pricing available
                </p>
                <ul
                  style="
                    list-style: none;
                    padding: 0;
                    margin: 20px 0;
                    text-align: left;
                  "
                >
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Unlimited Pages
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >Custom Development
                  </li>
                  <li
                    style="
                      padding: 10px 0;
                      border-bottom: 1px solid #e0e0e0;
                      color: #666;
                      font-size: 14px;
                    "
                  >
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >API Integrations
                  </li>
                  <li style="padding: 10px 0; color: #666; font-size: 14px">
                    <i
                      class="fas fa-check"
                      style="color: #004da6; margin-right: 10px"
                    ></i
                    >24/7 Phone Support
                  </li>
                </ul>
                <a
                  href="#quote"
                  class="btn btn-primary w-100"
                  style="
                    font-weight: 600;
                    background: #004da6;
                    margin-top: 15px;
                    display: block;
                    text-decoration: none;
                    padding: 10px 20px;
                  "
                >
                  Contact Sales
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials Section -->
      <section class="py-5" style="background: #f8f9fa">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Testimonials
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              What Our Clients Say
            </h2>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div
                class="testimonial-card"
                style="
                  background: white;
                  border-radius: 12px;
                  padding: 30px;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <div style="margin-bottom: 15px">
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                </div>
                <p
                  style="
                    color: #666;
                    font-size: 15px;
                    line-height: 1.8;
                    margin-bottom: 20px;
                  "
                >
                  EverythingEasy transformed our business with their exceptional
                  web development services. Highly recommended!
                </p>
                <p style="color: #333; font-weight: 600; margin-bottom: 5px">
                  John Anderson
                </p>
                <p style="color: #004da6; font-size: 13px">
                  CEO, Tech Startup Inc.
                </p>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div
                class="testimonial-card"
                style="
                  background: white;
                  border-radius: 12px;
                  padding: 30px;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <div style="margin-bottom: 15px">
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                </div>
                <p
                  style="
                    color: #666;
                    font-size: 15px;
                    line-height: 1.8;
                    margin-bottom: 20px;
                  "
                >
                  Outstanding service and support! They delivered exactly what
                  we needed within our budget and timeline.
                </p>
                <p style="color: #333; font-weight: 600; margin-bottom: 5px">
                  Sarah Williams
                </p>
                <p style="color: #004da6; font-size: 13px">
                  Marketing Manager, RetailCo
                </p>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div
                class="testimonial-card"
                style="
                  background: white;
                  border-radius: 12px;
                  padding: 30px;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <div style="margin-bottom: 15px">
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                  <i class="fas fa-star" style="color: #ffd700"></i>
                </div>
                <p
                  style="
                    color: #666;
                    font-size: 15px;
                    line-height: 1.8;
                    margin-bottom: 20px;
                  "
                >
                  Their team's expertise and professionalism made all the
                  difference. We couldn't be happier with the results!
                </p>
                <p style="color: #333; font-weight: 600; margin-bottom: 5px">
                  Michael Johnson
                </p>
                <p style="color: #004da6; font-size: 13px">
                  Founder, Digital Solutions LLC
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Quote Section -->
      <section
        id="quote"
        class="py-5"
        style="
          background: linear-gradient(135deg, #004da6 0%, #003399 100%);
          color: white;
        "
      >
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <h2
                style="font-size: 36px; font-weight: 700; margin-bottom: 20px"
              >
                Ready to Get Started?
              </h2>
              <p style="font-size: 16px; line-height: 1.8; margin-bottom: 20px">
                Let's discuss your project requirements and create a customized
                solution that exceeds your expectations.
              </p>
              <p style="font-size: 16px; margin-bottom: 20px">
                <i class="fas fa-phone-alt" style="margin-right: 12px"></i
                >+1-844-EASY-WEB
              </p>
              <p style="font-size: 16px">
                <i class="fas fa-envelope" style="margin-right: 12px"></i
                >hello@everythingeasy-usa.com
              </p>
            </div>
            <div class="col-lg-6">
              <div
                style="
                  background: white;
                  border-radius: 12px;
                  padding: 35px;
                  color: #333;
                "
              >
                <h3 style="font-weight: 700; margin-bottom: 25px">
                  Request a Quote
                </h3>
                <form id="bottomQuoteForm">
                  <input
                    type="text"
                    placeholder="Project Name"
                    class="form-control mb-3"
                    required
                    style="border: 2px solid #e0e0e0; padding: 12px"
                  />
                  <input
                    type="email"
                    placeholder="Your Email"
                    class="form-control mb-3"
                    required
                    style="border: 2px solid #e0e0e0; padding: 12px"
                  />
                  <input
                    type="tel"
                    placeholder="Phone Number"
                    class="form-control mb-3"
                    style="border: 2px solid #e0e0e0; padding: 12px"
                  />
                  <textarea
                    placeholder="Project Details"
                    rows="4"
                    class="form-control mb-3"
                    style="border: 2px solid #e0e0e0; padding: 12px"
                  ></textarea>
                  <button
                    type="submit"
                    class="btn btn-primary w-100"
                    style="padding: 12px; font-weight: 600"
                  >
                    Send Request
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Section -->
      <section id="contact" class="py-5" style="background: #f8f9fa">
        <div class="container">
          <div class="text-center mb-5">
            <p
              style="
                color: #004da6;
                font-weight: 600;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
              "
            >
              Get In Touch
            </p>
            <h2 style="font-size: 36px; font-weight: 700; color: #333">
              Contact Information
            </h2>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div
                style="
                  background: white;
                  padding: 35px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <i
                  class="fas fa-phone-alt"
                  style="
                    font-size: 40px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Phone
                </h5>
                <p style="color: #666">+1-844-EASY-WEB</p>
                <p style="color: #999; font-size: 13px">
                  Mon-Fri, 9 AM - 6 PM EST
                </p>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div
                style="
                  background: white;
                  padding: 35px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <i
                  class="fas fa-envelope"
                  style="
                    font-size: 40px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Email
                </h5>
                <p style="color: #666">hello@everythingeasy-usa.com</p>
                <p style="color: #999; font-size: 13px">
                  We respond within 2 hours
                </p>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div
                style="
                  background: white;
                  padding: 35px;
                  border-radius: 12px;
                  text-align: center;
                  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                "
              >
                <i
                  class="fas fa-map-marker-alt"
                  style="
                    font-size: 40px;
                    color: #004da6;
                    margin-bottom: 20px;
                    display: block;
                  "
                ></i>
                <h5 style="font-weight: 700; color: #333; margin-bottom: 10px">
                  Office
                </h5>
                <p style="color: #666">123 Tech Boulevard</p>
                <p style="color: #666">New York, NY 10001</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
      // Counter animation
      const counters = document.querySelectorAll(".counter");
      const speed = 200;

      const runCounter = (counter) => {
        const target = +counter.getAttribute("data-target");
        const increment = target / speed;

        const updateCount = () => {
          const count = +counter.innerText;
          if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(updateCount, 10);
          } else {
            counter.innerText = target;
          }
        };

        updateCount();
      };

      const observerOptions = {
        threshold: 0.5,
      };

      const observer = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            runCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, observerOptions);

      counters.forEach((counter) => observer.observe(counter));

      // Smooth scroll for navigation
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute("href"));
          if (target) {
            target.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        });
      });

      // Form submission
      document
        .getElementById("heroQuoteForm")
        ?.addEventListener("submit", function (e) {
          e.preventDefault();
          alert("Thank you for your inquiry! We will contact you soon.");
          this.reset();
        });

      document
        .getElementById("bottomQuoteForm")
        ?.addEventListener("submit", function (e) {
          e.preventDefault();
          alert("Thank you for your inquiry! We will contact you soon.");
          this.reset();
        });

      // Navbar scroll effect
      window.addEventListener("scroll", function () {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
          navbar.style.boxShadow = "0 4px 20px rgba(0,0,0,0.15)";
        } else {
          navbar.style.boxShadow = "0 2px 10px rgba(0,0,0,0.1)";
        }
      });
    </script>

    <!-- Footer -->
    <div id="footer"></div>
    <script>
      // Load footer
      fetch("footer.html")
        .then((response) => response.text())
        .then((data) => {
          document.getElementById("footer").innerHTML = data;
          // Load Trustpilot script if needed
          if (window.trustpilot) {
            window.trustpilot.loadedAsynchronously = true;
          }
        })
        .catch((error) => console.error("Error loading footer:", error));
    </script>
  </body>
</html>
