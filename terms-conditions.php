<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Terms & Conditions - EverythingEasy Technology</title>
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
    <?php include "nabar.php"; ?>
    <script src="js/navigation.js"></script>

    <main style="margin-top: 70px">
      <!-- Page Header -->
      <section class="py-5" style="background: #004da6; color: white">
        <div class="container">
          <h1 class="display-4 fw-bold mb-3">Terms & Conditions</h1>
          <p class="lead">Please read these terms carefully</p>
        </div>
      </section>

      <!-- Content -->
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="content-box">
                <h2 class="mb-4">Terms & Conditions</h2>

                <h3 class="mt-5 mb-3">1. Agreement to Terms</h3>
                <p>
                  By accessing and using this website, you accept and agree to
                  be bound by the terms and provision of this agreement. If you
                  do not agree to abide by the above, please do not use this
                  service.
                </p>

                <h3 class="mt-5 mb-3">2. Use License</h3>
                <p>
                  Permission is granted to temporarily download one copy of the
                  materials (information or software) on EverythingEasy
                  Technology's website for personal, non-commercial transitory
                  viewing only. This is the grant of a license, not a transfer
                  of title, and under this license you may not:
                </p>
                <ul>
                  <li>Modifying or copying the materials</li>
                  <li>
                    Using the materials for any commercial purpose or for any
                    public display (commercial or non-commercial)
                  </li>
                  <li>
                    Attempting to decompile or reverse engineer any software
                    contained on the website
                  </li>
                  <li>
                    Removing any copyright or other proprietary notations from
                    the materials
                  </li>
                  <li>
                    Transferring the materials to another person or "mirroring"
                    the materials on any other server
                  </li>
                </ul>

                <h3 class="mt-5 mb-3">3. Disclaimer</h3>
                <p>
                  The materials on EverythingEasy Technology's website are
                  provided on an 'AS IS' basis. EverythingEasy Technology makes
                  no warranties, expressed or implied, and hereby disclaims and
                  negates all other warranties including, without limitation,
                  implied warranties or conditions of merchantability, fitness
                  for a particular purpose, or non-infringement of intellectual
                  property or other violation of rights.
                </p>

                <h3 class="mt-5 mb-3">4. Limitations</h3>
                <p>
                  In no event shall EverythingEasy Technology or its suppliers
                  be liable for any damages (including, without limitation,
                  damages for loss of data or profit, or due to business
                  interruption) arising out of the use or inability to use the
                  materials on the website, even if EverythingEasy Technology or
                  an authorized representative has been notified orally or in
                  writing of the possibility of such damage.
                </p>

                <h3 class="mt-5 mb-3">5. Accuracy of Materials</h3>
                <p>
                  The materials appearing on EverythingEasy Technology's website
                  could include technical, typographical, or photographic
                  errors. EverythingEasy Technology does not warrant that any of
                  the materials on its website are accurate, complete, or
                  current.
                </p>

                <h3 class="mt-5 mb-3">6. Links</h3>
                <p>
                  EverythingEasy Technology has not reviewed all of the sites
                  linked to its website and is not responsible for the contents
                  of any such linked site. The inclusion of any link does not
                  imply endorsement by EverythingEasy Technology of the site.
                  Use of any such linked website is at the user's own risk.
                </p>

                <h3 class="mt-5 mb-3">7. Modifications</h3>
                <p>
                  EverythingEasy Technology may revise these terms of service
                  for its website at any time without notice. By using this
                  website, you are agreeing to be bound by the then current
                  version of these Terms and Conditions of Use.
                </p>

                <h3 class="mt-5 mb-3">8. Contact Us</h3>
                <p>
                  If you have any questions about these Terms & Conditions,
                  please contact us at:
                </p>
                <p>
                  Email:
                  <a href="mailto:info@everythingeasy.com"
                    >info@everythingeasy.com</a
                  ><br />
                  Phone: <a href="tel:+18448327932">+1 (844) 832-7932</a>
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
