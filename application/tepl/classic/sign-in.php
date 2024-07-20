<?php session_start(); ?>
<?php
require "./application/tepl/default/module/base.php";
require "./application/tepl/default/module/preLoad/cdnUrl.php";
require "./application/tepl/default/module/preLoad/panelData.php";
?>
<?php
if (isset($_SESSION['auth']["client"]['logged'])) {
  header("location: ./dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $panelData["logo"]; ?>">
  <title>
    <?php
    echo $panelData["title"];
    ?>
  </title>
  <link rel="icon" type="image/png" href="<?php echo $panelData["logo"]; ?>">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <!-- <link href="<?php //echo BASE_DIR . "/application/tepl/" . $teplName 
                    ?>/assets/css/nucleo-icons.css" rel="stylesheet" /> -->
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo $cdnUrl; ?>application/tepl/default/assets/css/main.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              <?php
              echo $panelData["title"];
              ?>
            </a>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <!-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li> -->
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://discord.gg/gPqWEDsW95" class="btn btn-sm mb-0 me-1 btn-primary">支援Discord群組</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-body">
                  <form role="form">
                    <?php require "./application/tepl/default/module/preLoad/panelOauth2.php"; ?>
                    <!-- <div class="text-center">
                      <a><button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Discord 登入</button></a>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-lg btn-lg w-100 mt-4 mb-0">Google 登入</button>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('<?php echo $cdnUrl; ?>application/tepl/default/assets/img/logo-wallpaper.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"創造屬於你的自由世界"</h4>
                <p class="text-white position-relative">使用FHP面板讓主機創建更簡單.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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