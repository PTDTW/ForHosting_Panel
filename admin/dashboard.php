<?php require '../configuration.php'; ?>
<?php require_once '../system/class/CheckInstallation.php'; ?>
<?php
session_start();
if (empty($_SESSION['auth']["admin"]['logged'])) {
  header("location: ./index.php");
}
?>
<?php $thisPageTitle = "控制面板" ?>
<?php $thisPageCag = "dashboard" ?>
<?php $thisPageName = "dashboard" ?>
<?php require './components/header.php'; ?>


<!-- ======= Sidebar ======= -->
<?php require './components/tabbar.php'; ?>
<?php require './components/navbar.php'; ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>控制面板</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
        <li class="breadcrumb-item active">控制面板</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- UserCount Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title"><b>用戶 <span>總數</span></b></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-user-plus"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1 位用戶</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End UserCount Card -->

          <!-- ServerCount Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title"><b>伺服器 <span>總數</span></b></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-server"></i>
                  </div>
                  <div class="ps-3">
                    <h6>0 臺伺服器</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End ServerCount Card -->

          <!-- AdminCount Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title"><b>管理員 <span>總數</span></b></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-cog"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1 位管理員</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End ServerCount Card -->

          <!-- UserCount Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title"><b>面板 <span>版本</span></b></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxs-info-square"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1.0.0</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End UserCount Card -->


          <div class="card" id="Area-nodeList">
            <div class="card-body">
              <h5 class="card-title"><b>節點狀態 〔0/0〕</b></h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">名稱</th>
                    <th scope="col">記憶體/儲存空間</th>
                    <th scope="col">公開</th>
                    <th scope="col">狀態</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- <div>未擁有節點</div> -->
                  <!-- <tr>未擁有節點</tr> -->
                  <!--                       <tr>
                        <th scope="row">1</th>
                        <td>Brandon Jacob</td>
                        <td>Designer</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr> -->
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>

        </div>
  </section>

</main><!-- End #main -->

<?php require './components/footer.php'; ?>