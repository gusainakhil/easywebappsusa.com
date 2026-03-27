<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Return & Refund Policy - EverythingEasy Technology</title>
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
    <!-- Navbar Container -->
    <?php include "navbar.php"; ?>
    <!-- <script src="js/navigation.js"></script> -->

    <main style="margin-top: 70px">
      <!-- Page Header -->
      <section class="py-5" style="background: #004da6; color: white">
        <div class="container">
          <h1 class="display-4 fw-bold mb-3">Return & Refund Policy</h1>
          <p class="lead">Customer satisfaction is our priority</p>
        </div>
      </section>

      <!-- Content -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="content-box">
                <h2 class="mb-4">Return & Refund Policy</h2>

                <h3 class="mt-5 mb-3">1. Refund Eligibility</h3>
                <p>
                  We want you to be completely satisfied with the services
                  provided by EverythingEasy Technology. If you are not
                  satisfied with our services, we offer the following refund
                  options:
                </p>
                <ul>
                  <li>
                    Refunds must be requested within 30 days of service delivery
                  </li>
                  <li>
                    Services must not have been fully utilized or completed
                  </li>
                  <li>
                    All refund requests must be made in writing to our support
                    team
                  </li>
                </ul>

                <h3 class="mt-5 mb-3">2. Refund Timeline</h3>
                <p>
                  Once your refund request has been approved and processed, you
                  can expect to see the funds returned to your original payment
                  method within:
                </p>
                <ul>
                  <li>5-10 business days for credit card transactions</li>
                  <li>5-15 business days for bank transfers</li>
                  <li>3-5 business days for digital wallet payments</li>
                </ul>

                <h3 class="mt-5 mb-3">3. Non-Refundable Items</h3>
                <p>The following items and services are non-refundable:</p>
                <ul>
                  <li>Services that have been fully completed and delivered</li>
                  <li>
                    Custom development and customization work (unless defective)
                  </li>
                  <li>
                    Domain registrations and hosting services (as per provider
                    policies)
                  </li>
                  <li>
                    Partially used services (unless otherwise agreed upon)
                  </li>
                </ul>

                <h3 class="mt-5 mb-3">4. Defective Products or Services</h3>
                <p>
                  If the service delivered is defective or does not meet the
                  agreed specification, we will either:
                </p>
                <ul>
                  <li>Re-do the work at no additional cost</li>
                  <li>Provide a partial or full refund at our discretion</li>
                </ul>

                <h3 class="mt-5 mb-3">5. How to Request a Refund</h3>
                <p>To request a refund, please follow these steps:</p>
                <ol>
                  <li>
                    Contact our support team at
                    <a href="mailto:info@everythingeasy.com"
                      >info@everythingeasy.com</a
                    >
                  </li>
                  <li>
                    Provide your order/project number and reason for the refund
                    request
                  </li>
                  <li>
                    Our team will review your request within 5 business days
                  </li>
                  <li>
                    If approved, we will process your refund to the original
                    payment method
                  </li>
                </ol>

                <h3 class="mt-5 mb-3">6. Service Return/Cancellation</h3>
                <p>
                  You may cancel a project or service at any time. However, you
                  will be charged for the work completed up to the point of
                  cancellation, plus any non-refundable expenses incurred.
                </p>

                <h3 class="mt-5 mb-3">7. Exceptions</h3>
                <p>
                  EverythingEasy Technology reserves the right to deny refunds
                  in cases of:
                </p>
                <ul>
                  <li>
                    Refund requests made after 30 days of service delivery
                  </li>
                  <li>Service misuse or violation of terms and conditions</li>
                  <li>Third-party provider limitations or restrictions</li>
                </ul>

                <h3 class="mt-5 mb-3">8. Contact Us</h3>
                <p>
                  If you have any questions about our Return & Refund Policy,
                  please contact us at:
                </p>
                <p>
                  Email:
                  <a href="mailto:<?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?>"
                    ><?= e($companyInfo['company_email'] ?? 'info@everythingeasy.com') ?></a
                  ><br />
                  Phone: <a href="tel:<?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?>"><?= e($companyInfo['company_number'] ?? '+1 (844) EASY-WEB') ?></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
   <?php include "footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
      fetch("footer.html")
        .then((r) => r.text())
        .then((html) => {
          document.getElementById("footer-container").innerHTML = html;
        });
    </script>
  </body>
</html>
