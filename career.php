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
      content="Join EverythingEasy Technology USA! Explore exciting career opportunities in web development, mobile apps, and IT solutions. Apply now!"
    />
    <meta
      name="keywords"
      content="careers, job opportunities, web developer, mobile developer, IT solutions, employment"
    />
    <title>Careers - EverythingEasy Technology USA</title>
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
      .job-card {
        transition: all 0.3s ease;
        border-left: 4px solid #0066cc;
      }
      .job-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateX(5px);
      }
      .benefit-box {
        text-align: center;
        padding: 2rem;
        border-radius: 8px;
        background: #f8f9fa;
        transition: all 0.3s ease;
      }
      .benefit-box:hover {
        background: #0066cc;
        color: white;
      }
      .benefit-box i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #0066cc;
      }
      .benefit-box:hover i {
        color: white;
      }
    </style>
  </head>

  <body>
    <?php include "nabar.php"; ?>
    <script src="js/navigation.js"></script>
    <main style="margin-top: 30px">
      <!-- Page Header -->

      <section class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h1 class="display-4 fw-bold mb-3">Join Our Team</h1>
              <p class="lead mb-4">
                Be part of a dynamic team driving innovation in technology
                solutions
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
                    Careers
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- Why Join Us -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 mx-auto text-center mb-5">
              <h2 class="fw-bold mb-3">Why Work With Us</h2>
              <p class="text-muted">
                At EverythingEasy, we believe in creating an environment where
                talented professionals can thrive and grow
              </p>
            </div>
          </div>

          <!-- Benefits -->
          <div class="row">
            <div class="col-md-3 col-6 mb-4">
              <div class="benefit-box">
                <i class="fas fa-laptop"></i>
                <h5 class="fw-bold">Remote Work</h5>
                <p class="small">Work from anywhere with flexibility</p>
              </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
              <div class="benefit-box">
                <i class="fas fa-graduation-cap"></i>
                <h5 class="fw-bold">Growth & Learning</h5>
                <p class="small">Continuous professional development</p>
              </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
              <div class="benefit-box">
                <i class="fas fa-handshake"></i>
                <h5 class="fw-bold">Competitive Benefits</h5>
                <p class="small">Health insurance and retirement plans</p>
              </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
              <div class="benefit-box">
                <i class="fas fa-users"></i>
                <h5 class="fw-bold">Great Team</h5>
                <p class="small">Collaborate with talented professionals</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Open Positions -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <h2 class="fw-bold mb-4 text-center">Open Positions</h2>

              <div class="job-card bg-white p-4 rounded mb-4 shadow-sm">
                <div class="row align-items-start">
                  <div class="col-md-8">
                    <h4 class="fw-bold text-primary">Senior Web Developer</h4>
                    <p class="text-muted mb-2">
                      <i class="fas fa-map-marker-alt me-2"></i>Remote, USA
                    </p>
                    <p class="mb-3">
                      We're looking for an experienced web developer with strong
                      skills in React, Node.js, and modern web technologies.
                      You'll work on innovative projects for our diverse client
                      base.
                    </p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="small">
                      <li>5+ years of web development experience</li>
                      <li>Proficiency in React, Node.js, and MongoDB</li>
                      <li>
                        Strong understanding of RESTful APIs and microservices
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary p-2 mb-3 d-inline-block"
                      >Full-Time</span
                    >
                    <br />
                    <button
                      class="btn btn-primary btn-sm mt-3"
                      data-bs-toggle="modal"
                      data-bs-target="#applyModal"
                    >
                      Apply Now
                    </button>
                  </div>
                </div>
              </div>

              <div class="job-card bg-white p-4 rounded mb-4 shadow-sm">
                <div class="row align-items-start">
                  <div class="col-md-8">
                    <h4 class="fw-bold text-primary">Mobile App Developer</h4>
                    <p class="text-muted mb-2">
                      <i class="fas fa-map-marker-alt me-2"></i>Remote, USA
                    </p>
                    <p class="mb-3">
                      Join our mobile development team and create innovative iOS
                      and Android applications. We use React Native and Flutter
                      for cross-platform development.
                    </p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="small">
                      <li>3+ years of mobile development experience</li>
                      <li>Experience with React Native or Flutter</li>
                      <li>Knowledge of iOS and/or Android development</li>
                    </ul>
                  </div>
                  <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary p-2 mb-3 d-inline-block"
                      >Full-Time</span
                    >
                    <br />
                    <button
                      class="btn btn-primary btn-sm mt-3"
                      data-bs-toggle="modal"
                      data-bs-target="#applyModal"
                    >
                      Apply Now
                    </button>
                  </div>
                </div>
              </div>

              <div class="job-card bg-white p-4 rounded mb-4 shadow-sm">
                <div class="row align-items-start">
                  <div class="col-md-8">
                    <h4 class="fw-bold text-primary">UI/UX Designer</h4>
                    <p class="text-muted mb-2">
                      <i class="fas fa-map-marker-alt me-2"></i>Remote, USA
                    </p>
                    <p class="mb-3">
                      Design beautiful and intuitive user experiences for web
                      and mobile applications. Work with our cross-functional
                      team to bring ideas to life.
                    </p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="small">
                      <li>3+ years of UI/UX design experience</li>
                      <li>Proficiency in Figma, Adobe XD, or similar tools</li>
                      <li>Strong portfolio demonstrating design skills</li>
                    </ul>
                  </div>
                  <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary p-2 mb-3 d-inline-block"
                      >Full-Time</span
                    >
                    <br />
                    <button
                      class="btn btn-primary btn-sm mt-3"
                      data-bs-toggle="modal"
                      data-bs-target="#applyModal"
                    >
                      Apply Now
                    </button>
                  </div>
                </div>
              </div>

              <div class="job-card bg-white p-4 rounded mb-4 shadow-sm">
                <div class="row align-items-start">
                  <div class="col-md-8">
                    <h4 class="fw-bold text-primary">
                      Digital Marketing Specialist
                    </h4>
                    <p class="text-muted mb-2">
                      <i class="fas fa-map-marker-alt me-2"></i>Remote, USA
                    </p>
                    <p class="mb-3">
                      Help our clients achieve their marketing goals through
                      innovative digital strategies. Experience with SEO,
                      content marketing, and social media is essential.
                    </p>
                    <p><strong>Requirements:</strong></p>
                    <ul class="small">
                      <li>2+ years of digital marketing experience</li>
                      <li>Knowledge of SEO, SEM, and social media marketing</li>
                      <li>Analytics and data-driven approach</li>
                    </ul>
                  </div>
                  <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary p-2 mb-3 d-inline-block"
                      >Full-Time</span
                    >
                    <br />
                    <button
                      class="btn btn-primary btn-sm mt-3"
                      data-bs-toggle="modal"
                      data-bs-target="#applyModal"
                    >
                      Apply Now
                    </button>
                  </div>
                </div>
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
              <h2 class="fw-bold mb-4">Don't See Your Role?</h2>
              <p class="lead mb-4">
                We're always looking for talented professionals. Send us your
                resume and let's discuss opportunities!
              </p>
              <a href="contact.html" class="btn btn-warning btn-lg">
                <i class="fas fa-envelope me-2"></i>Get In Touch
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Modal -->
      <div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Apply for Position</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form id="applicationForm">
                <div class="mb-3">
                  <label for="applicantName" class="form-label"
                    >Full Name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="applicantName"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="applicantEmail" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="applicantEmail"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="applicantPhone" class="form-label"
                    >Phone Number</label
                  >
                  <input
                    type="tel"
                    class="form-control"
                    id="applicantPhone"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="applicantResume" class="form-label"
                    >Upload Resume (PDF)</label
                  >
                  <input
                    type="file"
                    class="form-control"
                    id="applicantResume"
                    accept=".pdf"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="applicantMessage" class="form-label"
                    >Cover Letter</label
                  >
                  <textarea
                    class="form-control"
                    id="applicantMessage"
                    rows="4"
                  ></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                  Submit Application
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

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
        .getElementById("applicationForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          alert(
            "Thank you for your application! We will review your resume and contact you soon.",
          );
          this.reset();
          bootstrap.Modal.getInstance(
            document.getElementById("applyModal"),
          ).hide();
        });
    </script>
  </body>
</html>
