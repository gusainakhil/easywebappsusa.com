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
    <link href="css/style.css" rel="stylesheet" />
    <style>
      .blog-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }
      .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }
      .blog-image {
        overflow: hidden;
        background-color: #f0f0f0;
      }
      .blog-image img {
        transition: transform 0.3s ease;
      }
      .blog-card:hover .blog-image img {
        transform: scale(1.05);
      }
      .blog-title {
        font-size: 1.25rem;
        color: #333;
      }
      .blog-title a {
        text-decoration: none;
        color: #333;
      }
      .blog-title a:hover {
        color: #0066cc;
      }
      .blog-meta {
        font-size: 0.9rem;
        color: #666;
      }
    </style>
  </head>

  <body>
     <?php include "navbar.php"; ?>
    <script src="js/navigation.js"></script>
    <main style="margin-top: 35px">
      <!-- Blog Header -->
      <section
        class="page-header bg-gradient-primary text-white py-5"
        style="padding-top: 120px !important; margin-bottom: 0"
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
                    <a href="index.html" class="text-warning">Home</a>
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
          <div class="row" id="blogPostsContainer">
            <!-- Blog Post 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=Web+Development"
                    alt="Web Development Trends"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>March 15, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>John Smith
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=1"
                      >Latest Web Development Trends in 2024</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Discover the cutting-edge technologies and frameworks
                    shaping modern web development this year...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=1"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>523 views
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=App+Security"
                    alt="App Security"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>March 10, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>Sarah Johnson
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=2"
                      >The Importance of Application Security</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Learn best practices for securing your applications and
                    protecting user data from cyber threats...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=2"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>368 views
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=Digital+Marketing"
                    alt="Digital Marketing"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>March 5, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>Mike Davis
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=3"
                      >Digital Marketing Strategies for 2024</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Build effective digital marketing campaigns with proven
                    strategies that drive real business results...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=3"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>614 views
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Post 4 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=Cloud+Computing"
                    alt="Cloud Solutions"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>February 28, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>Emily Brown
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=4"
                      >Cloud Computing: Benefits and Implementation</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Explore how cloud computing can transform your business
                    operations and reduce IT costs...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=4"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>445 views
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Post 5 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=AI+Technology"
                    alt="AI Solutions"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>February 20, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>Alex Wilson
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=5"
                      >Artificial Intelligence in Business</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Understand how AI is revolutionizing businesses and creating
                    new opportunities in various industries...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=5"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>732 views
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Blog Post 6 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="blog-card h-100">
                <div class="blog-image">
                  <img
                    src="https://via.placeholder.com/400x250?text=Mobile+Apps"
                    alt="Mobile Development"
                    class="img-fluid rounded-top"
                    style="height: 250px; object-fit: cover; width: 100%"
                  />
                </div>
                <div class="blog-content p-4">
                  <div class="blog-meta mb-3">
                    <span class="text-muted">
                      <i class="fas fa-calendar-alt me-2"></i>February 15, 2024
                    </span>
                    <span class="text-muted ms-3">
                      <i class="fas fa-user me-2"></i>Jessica Lee
                    </span>
                  </div>
                  <h4 class="blog-title fw-bold mb-3">
                    <a href="blog-detail.html?id=6"
                      >Building Successful Mobile Applications</a
                    >
                  </h4>
                  <p class="text-muted mb-3">
                    Key strategies for developing mobile apps that users love
                    and that drive business growth...
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <a
                      href="blog-detail.html?id=6"
                      class="btn btn-outline-primary"
                    >
                      Read More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <small class="text-muted">
                      <i class="fas fa-eye me-1"></i>589 views
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

      // Load navbar and footer dynamically
      document.getElementById("navbar-container").innerHTML =
        '<div id="navbar-placeholder"></div>';
      document.getElementById("footer-container").innerHTML =
        '<div id="footer-placeholder"></div>';

      fetch("navbar.html")
        .then((r) => r.text())
        .then((html) => {
          document.getElementById(
            "navbar-placeholder",
          ).parentElement.innerHTML = html;
          setActiveNavLink();
        });

      fetch("footer.html")
        .then((r) => r.text())
        .then((html) => {
          document.getElementById(
            "footer-placeholder",
          ).parentElement.innerHTML = html;
        });
    </script>
  </body>
</html>
