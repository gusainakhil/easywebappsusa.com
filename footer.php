<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();
?>
<!-- Footer -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <!-- About Section -->
      <div class="col-lg-4 mb-4">
        <div class="footer-about">
          <h5 class="fw-bold mb-3">EverythingEasy Technology</h5>
          <p class="text-muted mb-4">
            Leading IT solutions company providing innovative technology
            services to help businesses grow digitally.
          </p>

          <!-- Social Links -->
          <div class="social-links mb-4">
            <a
              href="https://www.facebook.com/profile.php?id=61575148140871"
              target="_blank"
              class="facebook text-muted me-3"
              title="Facebook"
            >
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a
              href="https://x.com/Everythingeasy0"
              target="_blank"
              class="twitter text-muted me-3"
              title="Twitter"
            >
              <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a
              href="https://www.linkedin.com/company/everythingeasy/"
              target="_blank"
              class="linkedin text-muted me-3"
              title="LinkedIn"
            >
              <i class="fab fa-linkedin fa-lg"></i>
            </a>
            <a
              href="https://www.instagram.com/everythingeasy0/"
              target="_blank"
              class="instagram text-muted"
              title="Instagram"
            >
              <i class="fab fa-instagram fa-lg"></i>
            </a>
          </div>

          <!-- Trustpilot Widget -->
          <div
            class="trustpilot-widget mt-3"
            data-locale="en-US"
            data-template-id="56278e9abfbbba0bdcd568bc"
            data-businessunit-id="693706f7f444175f88990f6c"
            data-style-height="52px"
            data-style-width="100%"
            data-token="448d2ef3-edd9-486d-8d48-04a5d3ac55b6"
          >
            <a
              href="https://www.trustpilot.com/review/everythingeasy-usa.com"
              target="_blank"
              rel="noopener"
              >Trustpilot</a
            >
          </div>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="footer-links">
          <h6 class="fw-bold mb-3">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="/index.php" class="text-decoration-none">Home</a></li>
            <li>
              <a href="/about.php" class="text-decoration-none">About Us</a>
            </li>
            <li>
              <a href="/services.php" class="text-decoration-none"
                >Our Services</a
              >
            </li>
            <li>
              <a href="/blog.php" class="text-decoration-none">Blog</a>
            </li>
            <li>
              <a href="/contact.php" class="text-decoration-none">Contact Us</a>
            </li>
            <li>
              <a href="/career.php" class="text-decoration-none">Careers</a>
            </li>
            <li>
              <a href="/services-locations.php" class="text-decoration-none"
                >Services Location</a
              >
            </li>
          </ul>
        </div>
      </div>

      <!-- Legal & Policies -->
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="footer-links">
          <h6 class="fw-bold mb-3">Legal</h6>
          <ul class="list-unstyled">
            <li>
              <a href="/privacy-policy.php" class="text-decoration-none"
                >Privacy Policy</a
              >
            </li>
            <li>
              <a href="/terms-conditions.php" class="text-decoration-none"
                >Terms & Conditions</a
              >
            </li>
            <li>
              <a href="/return-refund-policy.php" class="text-decoration-none"
                >Return & Refund</a
              >
            </li>
          </ul>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-4 mb-4">
        <div class="footer-contact">
          <h6 class="fw-bold mb-3">Get In Touch</h6>

          <!-- Address -->
          <div class="contact-item d-flex mb-3">
            <i class="fas fa-map-marker-alt me-3"></i>
            <span><?= e($companyInfo['company_address'] ?? 'USA') ?></span>
          </div>

          <!-- Email -->
          <div class="contact-item d-flex mb-3">
            <i class="fas fa-envelope me-3"></i>
            <a
              href="mailto:<?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?>"
              class="text-decoration-none"
            >
              <span><?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?></span>
            </a>
          </div>

          <!-- Phone -->
          <div class="contact-item d-flex">
            <i class="fas fa-phone me-3"></i>
            <a href="tel:<?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?>" class="text-decoration-none">
              <span><?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Divider -->
    <hr class="my-4 border-secondary" />

    <!-- Footer Bottom -->
    <div class="row align-items-center">
      <div class="col-md-6 mb-2 mb-md-0">
        <p class="text-muted mb-0">
          &copy; <span id="year"></span> EverythingEasy Technology. All Rights
          Reserved.
        </p>
      </div>
      <div class="col-md-6 text-md-end">
        <p class="text-muted mb-0">
          Designed with <i class="fas fa-heart text-danger"></i> by Everything
          Easy Team
        </p>
      </div>
    </div>
  </div>

  <!-- TrustBox script -->
  <script
    type="text/javascript"
    src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"
    async
  ></script>

  <!-- Set current year -->
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</footer>
