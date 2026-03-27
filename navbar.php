<nav
  id="navbar"
  class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top"
  style="backdrop-filter: blur(10px); z-index: 1000"
>
  <div class="container">
    <a
      class="navbar-brand fw-bold text-primary d-flex align-items-center"
      href="index.html"
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
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.html">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="career.html">Careers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary btn-sm ms-3" href="index.html">Get Quote</a>
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
