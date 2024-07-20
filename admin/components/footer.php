
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright ©2023 - 2023 <strong><span>PTDTW</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      由 <a href="https://ptdtw.xyz/">PTDTW</a> 開發
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <script>
  const driver = window.driver.js.driver;
  function howUse(){
    const driverObj = driver({
      prevBtnText: "上一步",
      nextBtnText: "下一步",
      doneBtnText: "完成",
      closeBtnText: "關閉",
      allowClose: true,
      animate: true,
      opacity: 0.75,
      showProgress: true,
      steps: [
        { element: '.pageMain', popover: { title: '歡迎使用FHP管理系統', description: '接下來我將會告訴你如何使用' } },
        { element: '.sidebar', popover: { title: '這裡是選單欄', description: '你可以從這找到你要設定/查看的頁面' } },
        { element: '.main', popover: { title: '主要區域', description: '用來設定或查看的地方' } }
      ]
    });
    driverObj.drive();
  }
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <!-- <script src="assets/vendor/driver.js/driver.js.iife.js"></script> -->
  
  
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- sweetalert2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.11/alertify.min.js" integrity="sha512-2R8JJ9GapQ1VCvcazWIP4F7rOrMs6mzorqtZlXpvakAU0O/iw4n90CFrmG9+BwI//xxtnHxb5rbpkIF2s6z39w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- alertify -->
  <script src="assets/js/alertify.min.js"></script>

</body>

</html>