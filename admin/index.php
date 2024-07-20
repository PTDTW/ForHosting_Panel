<!-- 導入檔案 -->
<?php require '../configuration.php'; ?>
<?php require BASE_DIR . '\system\class\CheckInstallation.php'; ?>
<?php $checkInstall = new CheckInstallation(); ?>
<?php $checkInstall->CheckIsInstallation("admin"); ?>
<?php require './modules/mysql/getData.php'; ?>
<?php $adminMod = new mysqlGetData(); ?>
<?php $panelTitle; ?>
<?php
foreach ($adminMod->getPanelSetting("name", "panelTitle") as $row) {
  $panelTitle = $row["value"];
}
?>

<!-- 登入處理 -->
<?php
session_start();
if (isset($_SESSION['auth']["admin"]['logged'])) {
  header("location: ./dashboard.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $acc = $_POST['username'];
  $pwd = $_POST['password'];
  if (empty($acc) || empty($pwd)) {
    header("location: ./index.php?err=請輸入帳密");
    exit;
  }

  $sql = "SELECT * FROM fhp_users WHERE user_account = '$acc';";
  // $sql = "SELECT * FROM users ;";
  $mysql_json = file_get_contents('../application/conf/db_access.json');
  $jsonData = json_decode($mysql_json, true);
  $conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_array($result)) {
      if ($row["user_admin"] == 1) {
        if (password_verify($pwd, $row['user_password'])) {
          $_SESSION['auth']["admin"] = [
            'logged' => true,
            'username' => $row['user_name'],
            'Account' => $row['user_account'],
            'mail' => $row['user_email'],
            'code' => $row['user_id'],
            'loggedTime' => date('Y/m/d | h:i:sa')
          ];
          header("location: ./dashboard.php");
        } else {
          header("location: ./index.php?err=帳號與密碼輸入錯誤");
        }
      }
    }
  } else {
    header("location: ./index.php?err=帳號與密碼輸入錯誤");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $panelTitle; ?> - 管理員介面</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/vendor/driver.js/driver.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="" style="max-height: 50px;width: 50px">
                  <span class="d-none d-lg-block"><?php echo $panelTitle; ?> - 管理員</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"><b> 登入您的帳號 </b></h5>
                  </div>

                  <form class="row g-3 needs-validation" action="./index.php" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">帳號</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">請輸入帳號.</div>
                      </div>
                      <?php if (isset($_GET['err'])) : ?>
                        <div style="color: #ff0000"><?php echo htmlspecialchars($_GET["err"]); ?></div>
                      <?php endif ?>
                    </div>
                    <div class="invalid-feedback">請輸入帳號.</div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">密碼</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">請輸入密碼.</div>
                      <?php if (isset($_GET['err'])) : ?>
                        <div style="color: #ff0000"><?php echo htmlspecialchars($_GET["err"]); ?></div>
                      <?php endif ?>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">登入</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                由 <a href="#">PTDTW</a> 開發
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/driver.js/driver.js.iife.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>