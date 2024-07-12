<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-12 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>BCPC</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Developed by <a href="https://facebook.com/saimon.student"><strong>Saimon Islam</strong></a>
          </div>
        </div>
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js   "></script>
  <script src="   assets/vendor/aos/aos.js"></script>
  <script src="   assets/vendor/bootstrap/js/bootstrap.bundle.min.js   "></script>
  <script src="   assets/vendor/glightbox/js/glightbox.min.js   "></script>
  <script src="   assets/vendor/isotope-layout/isotope.pkgd.min.js   "></script>
  <script src="   assets/vendor/swiper/swiper-bundle.min.js   "></script>
  <script src="   assets/vendor/php-email-form/validate.js   "></script>

  <!-- Template Main JS File -->
  <script src="   assets/js/main.js   "></script>
  <script>
    var nav = document.querySelector('header');
    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 110) {
            nav.classList.remove('transparent-nav');
            nav.classList.add('scrolled-nav', 'shadow');
            document.getElementsByClassName("img-srolled")[0].src = "assets/img/bcpc1.png";
        }
        else {
            nav.classList.remove('scrolled-nav');
            nav.classList.add('transparent-nav');
            document.getElementsByClassName("img-srolled")[0].src = "assets/img/bcpc-logo2.png";
        }
    });
    </script>

</body>

</html>
