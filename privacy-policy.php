<?php
require __DIR__ . '/config.php';
$companyInfo = getCompanyInfo();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - EverythingEasy Technology</title>
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
          <h1 class="display-4 fw-bold mb-3">Privacy Policy</h1>
          <p class="lead">Your privacy is important to us</p>
        </div>
      </section>

      <!-- Content -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="content-box">
                <h2 class="mb-4">Privacy Policy</h2>

                <h3 class="mt-5 mb-3">1. Introduction</h3>
                <p>
                  EverythingEasy Technology ("we", "us", or "our") operates the
                  everythingeasy-usa.com website. This page informs you of our
                  policies regarding the collection, use, and disclosure of
                  personal data when you use our Service and the choices you
                  have associated with that data.
                </p>

                <h3 class="mt-5 mb-3">2. Information Collection and Use</h3>
                <p>
                  We collect several different types of information for various
                  purposes to provide and improve our Service to you.
                </p>
                <ul>
                  <li>
                    <strong>Personal Data:</strong> While using our Service, we
                    may ask you to provide us with certain personally
                    identifiable information that can be used to contact or
                    identify you ("Personal Data").
                  </li>
                  <li>
                    <strong>Usage Data:</strong> We may also collect information
                    on how the Service is accessed and used ("Usage Data").
                  </li>
                  <li>
                    <strong>Cookies and Similar Tracking Technologies:</strong>
                    We use cookies and similar tracking technologies to track
                    activity on our Service.
                  </li>
                </ul>

                <h3 class="mt-5 mb-3">3. Use of Data</h3>
                <p>
                  EverythingEasy Technology uses the collected data for various
                  purposes:
                </p>
                <ul>
                  <li>To provide and maintain our Service</li>
                  <li>To notify you about changes to our Service</li>
                  <li>
                    To allow you to participate in interactive features of our
                    Service
                  </li>
                  <li>To provide customer support</li>
                  <li>
                    To gather analysis or valuable information so that we can
                    improve our Service
                  </li>
                </ul>

                <h3 class="mt-5 mb-3">4. Security of Data</h3>
                <p>
                  The security of your data is important to us but remember that
                  no method of transmission over the Internet or method of
                  electronic storage is 100% secure. While we strive to use
                  commercially acceptable means to protect your Personal Data,
                  we cannot guarantee its absolute security.
                </p>

                <h3 class="mt-5 mb-3">5. Changes to This Privacy Policy</h3>
                <p>
                  We may update our Privacy Policy from time to time. We will
                  notify you of any changes by posting the new Privacy Policy on
                  this page and updating the "effective date" at the top of this
                  Privacy Policy.
                </p>

                <h3 class="mt-5 mb-3">6. Contact Us</h3>
                <p>
                  If you have any questions about this Privacy Policy, please
                  contact us at:
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
