// Load navigation components dynamically
document.addEventListener("DOMContentLoaded", function () {
  loadNavbar();
  loadFooter();
});

function loadNavbar() {
  fetch("navbar.html")
    .then((response) => response.text())
    .then((data) => {
      const navContainer = document.getElementById("navbar-container");
      if (navContainer) {
        navContainer.innerHTML = data;
        initNavbarScroll();
        setActiveNavLink();
      }
    })
    .catch((error) => console.log("Error loading navbar:", error));
}

function setActiveNavLink() {
  const currentPagePath = window.location.pathname;
  const currentPage = currentPagePath.split("/").pop();
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link:not(.btn)");

  navLinks.forEach((link) => {
    link.classList.remove("active");
    const href = link.getAttribute("href");

    // Match by filename (handles index.html as root)
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

function loadFooter() {
  fetch("footer.html")
    .then((response) => response.text())
    .then((data) => {
      const footerContainer = document.getElementById("footer-container");
      if (footerContainer) {
        footerContainer.innerHTML = data;
      }
    })
    .catch((error) => console.log("Error loading footer:", error));
}

function initNavbarScroll() {
  const navbar = document.getElementById("navbar");
  if (navbar) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
        navbar.classList.add("shadow");
      } else {
        navbar.classList.remove("shadow");
      }
    });
  }
}

// Smooth scrolling for anchor links
document.addEventListener("click", function (e) {
  const link = e.target.closest('a[href^="#"]');
  if (link) {
    const targetId = link.getAttribute("href").substring(1);
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      e.preventDefault();
      targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
    }
  }
});
