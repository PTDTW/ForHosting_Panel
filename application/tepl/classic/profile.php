<?php session_start(); ?>
<?php
require "./application/tepl/default/module/base.php";
require "./application/tepl/default/module/preLoad/cdnUrl.php";
require "./application/tepl/default/module/preLoad/panelData.php";
?>
<?php
if (!isset($_SESSION['auth']["client"]['logged'])) {
  header("location: ./index.php");
}
?>

<?php
$pageNameCh = "個人資料";
$pageNameUs = "profile";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $panelData["logo"]; ?>">
  <link rel="icon" type="image/png" href="<?php echo $panelData["logo"]; ?>">
  <title>
    <?php
    echo $panelData["title"];
    ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/main.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php require './application/tepl/default/component/NavigationBar.php'; ?>

  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <?php require './application/tepl/default/component/TabBar.php'; ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-profile">
            <?php
            if (isset($_SESSION["auth"]["client"]["discord"]["banner_img"])) {
            ?>
              <img src="https://cdn.discordapp.com/banners/<?php echo $_SESSION["auth"]["client"]["discord"]["id"]; ?>/<?php echo $_SESSION["auth"]["client"]["discord"]["banner_img"]; ?>?size=1024" alt="banner" class="card-img-top">
              <!-- <img src="<?php //echo $_SESSION["auth"]["client"]["discord"]["banner_img"] ?>?size=1024" alt="banner" class="card-img-top"> -->
            <?php
            } else {
            ?>
              <div class="card-img-top" style="background-color: <?php echo $_SESSION["auth"]["client"]["discord"]["banner_color"]; ?>;height: 150px;"></div>
            <?php
            }
            ?>
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="https://cdn.discordapp.com/avatars/<?php echo $_SESSION["auth"]["client"]["discord"]["id"]; ?>/<?php echo $_SESSION["auth"]["client"]["discord"]["avatar"]; ?>?size=128" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
                <!-- <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a> -->
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center mx-4">
                      <span class="text-sm opacity-6">伺服器數量</span>
                      <span class="text-lg font-weight-bolder">22</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-sm opacity-8">代幣數量</span>
                      <span class="text-lg font-weight-bolder">10</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">編輯個人資料</p>
                <button class="btn btn-primary btn-sm ms-auto">儲存</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">面板資料</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">帳號編號</label>
                    <input class="form-control" type="email" value="TEST123">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">密碼</label>
                    <input class="form-control" type="password" value="1234">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">使用方案</label>
                    <input class="form-control" type="text" value="free" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">帳號創建時間</label>
                    <input class="form-control" type="text" value="time" disabled>
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">帳戶資料</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">電子郵件</label>
                    <input class="form-control" type="text" value="<?php echo $_SESSION["auth"]["client"]["discord"]["mail"]; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Discord Id</label>
                    <input class="form-control" type="text" value="<?php echo $_SESSION["auth"]["client"]["discord"]["id"]; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Discord稱號</label>
                    <input class="form-control" type="text" value="<?php echo $_SESSION["auth"]["client"]["username"]; ?>" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Discord名稱</label>
                    <input class="form-control" type="text" value="<?php echo $_SESSION["auth"]["client"]["discord"]["username"]; ?>" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © FHosting Panel 2023 - 2024. All rights reserved.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo $cdnUrl; ?>application/tepl/default/assets/js/core/popper.min.js"></script>
  <script src="<?php echo $cdnUrl; ?>application/tepl/default/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo $cdnUrl; ?>application/tepl/default/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo $cdnUrl; ?>application/tepl/default/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo $cdnUrl; ?>application/tepl/default/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>