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
      content="Contact EverythingEasy Technology USA for web development, app development, and IT solutions. Get in touch with our team today!"
    />
    <meta
      name="keywords"
      content="contact us, web development, IT services, customer support, business inquiry"
    />
    <title>Contact Us - EverythingEasy Technology USA</title>
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
      .contact-info-box {
        text-align: center;
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 8px;
        transition: all 0.3s ease;
      }
      .contact-info-box:hover {
        background: #0066cc;
        color: white;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      }
      .contact-info-box i {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: #0066cc;
      }
      .contact-info-box:hover i {
        color: white;
      }
      .form-control:focus {
        border-color: #0066cc;
        box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
      }
    </style>
  </head>

  <body>
    <?php include "navbar.php"; ?>
    <!-- <script src="js/navigation.js"></script> -->
    <main style="margin-top: 30px">
      <!-- Hero Section -->
      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="display-4 fw-bold mb-3">Get In Touch</h1>
              <p class="lead mb-4">
                Have questions? We'd love to hear from you. Send us a message
                and we'll respond as soon as possible.
              </p>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent">
                  <li class="breadcrumb-item">
                    <a href="index.html" class="text-warning">Home</a>
                  </li>
                  <li
                    class="breadcrumb-item active text-white"
                    aria-current="page"
                  >
                    Contact Us
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Information Section -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
              <h2 class="fw-bold mb-3">Contact Information</h2>
              <p class="text-muted">
                Reach out to us through any of these channels
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="contact-info-box">
                <i class="fas fa-phone"></i>
                <h5 class="fw-bold mb-2">Phone</h5>
                <p class="mb-0">+1 (844) EASY-WEB</p>
                <p class="text-muted small">Mon-Fri, 9AM-6PM EST</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="contact-info-box">
                <i class="fas fa-envelope"></i>
                <h5 class="fw-bold mb-2">Email</h5>
                <p class="mb-0">hello@everythingeasy-usa.com</p>
                <p class="text-muted small">We'll respond within 24 hours</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="contact-info-box">
                <i class="fas fa-map-marker-alt"></i>
                <h5 class="fw-bold mb-2">Address</h5>
                <p class="mb-0">123 Tech Boulevard</p>
                <p class="text-muted small">New York, NY 10001, USA</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Form Section -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div
              class="col-lg-8 mx-auto"
              style="
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
              "
            >
              <h2 class="fw-bold text-center mb-5">Send us a Message</h2>
              <form id="contactForm" class="needs-validation">
                <div class="row mb-4">
                  <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label fw-bold"
                      >Full Name</label
                    >
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      id="fullName"
                      placeholder="Your name"
                      required
                    />
                    <div class="invalid-feedback">
                      Please provide your name.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label fw-bold"
                      >Email Address</label
                    >
                    <input
                      type="email"
                      class="form-control form-control-lg"
                      id="email"
                      placeholder="your@email.com"
                      required
                    />
                    <div class="invalid-feedback">
                      Please provide a valid email.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label fw-bold"
                      >Phone Number</label
                    >
                    <input
                      type="tel"
                      class="form-control form-control-lg"
                      id="phone"
                      placeholder="(123) 456-7890"
                    />
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="subject" class="form-label fw-bold"
                      >Subject</label
                    >
                    <select
                      class="form-select form-select-lg"
                      id="subject"
                      required
                    >
                      <option selected>Choose a subject...</option>
                      <option>Web Development</option>
                      <option>Mobile App Development</option>
                      <option>Digital Marketing</option>
                      <option>E-Commerce Solutions</option>
                      <option>IT Consulting</option>
                      <option>Other</option>
                    </select>
                    <div class="invalid-feedback">Please select a subject.</div>
                  </div>
                </div>

                <div class="mb-4">
                  <label for="message" class="form-label fw-bold"
                    >Message</label
                  >
                  <textarea
                    class="form-control form-control-lg"
                    id="message"
                    rows="5"
                    placeholder="Tell us about your project..."
                    required
                  ></textarea>
                  <div class="invalid-feedback">Please provide a message.</div>
                </div>

                <div id="formResult" class="d-none"></div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- Business Hours Section -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4">
              <h3 class="fw-bold mb-4">Business Hours</h3>
              <div class="list-group list-group-flush">
                <div class="list-group-item d-flex justify-content-between">
                  <span>Monday - Friday</span>
                  <strong>9:00 AM - 6:00 PM</strong>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                  <span>Saturday</span>
                  <strong>10:00 AM - 4:00 PM</strong>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                  <span>Sunday</span>
                  <strong>Closed</strong>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h3 class="fw-bold mb-4">Response Time</h3>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <i class="fas fa-check text-success me-2"></i>Email: Within 24
                  hours
                </li>
                <li class="list-group-item">
                  <i class="fas fa-check text-success me-2"></i>Phone: Immediate
                </li>
                <li class="list-group-item">
                  <i class="fas fa-check text-success me-2"></i>Contact Form:
                  Within 24 hours
                </li>
                <li class="list-group-item">
                  <i class="fas fa-check text-success me-2"></i>Emergency:
                  Available 24/7
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- FAQ Section -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="fw-bold text-center mb-5">
                Frequently Asked Questions
              </h2>
              <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#faq1"
                    >
                      How long does a typical project take?
                    </button>
                  </h2>
                  <div
                    id="faq1"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      Project timelines vary based on complexity and
                      requirements. A simple website might take 4-6 weeks, while
                      complex applications can take 3-6 months or more. We'll
                      provide a detailed timeline during the consultation.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#faq2"
                    >
                      What is your pricing model?
                    </button>
                  </h2>
                  <div
                    id="faq2"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      We offer flexible pricing options including fixed-price
                      projects, time-and-materials, and retainer-based services.
                      The best option depends on your project scope and needs.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#faq3"
                    >
                      Do you provide ongoing support?
                    </button>
                  </h2>
                  <div
                    id="faq3"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      Yes, we offer comprehensive support packages including
                      maintenance, updates, and optimization. We can discuss a
                      custom support plan that fits your needs.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#faq4"
                    >
                      Can you help migrate my existing website?
                    </button>
                  </h2>
                  <div
                    id="faq4"
                    class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion"
                  >
                    <div class="accordion-body">
                      Absolutely! We specialize in website migrations and can
                      help move your site with minimal downtime. We'll ensure
                      all SEO rankings and functionality are preserved.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Quick Contact Section -->
      <section class="py-5 text-white" style="background: #004da6">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-2">Ready to Start Your Project?</h2>
              <p class="lead">
                Get a quick response from our team and discuss your project
                requirements today.
              </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
              <a href="tel:+18443299832" class="btn btn-warning btn-lg">
                <i class="fas fa-phone me-2"></i>Call Now
              </a>
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

      document
        .getElementById("contactForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          if (!this.checkValidity()) {
            e.stopPropagation();
            this.classList.add("was-validated");
          } else {
            const formResult = document.getElementById("formResult");
            formResult.className = "alert alert-success";
            formResult.innerHTML =
              '<i class="fas fa-check-circle me-2"></i>Thank you! We\'ve received your message and will get back to you shortly.';
            formResult.classList.remove("d-none");

            this.reset();
            this.classList.remove("was-validated");

            setTimeout(() => {
              formResult.classList.add("d-none");
            }, 5000);
          }
        });
    </script>
  
  </body>
</html>
