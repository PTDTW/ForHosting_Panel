<?php require '../configuration.php'; ?>
<?php require BASE_DIR . '\system\class\CheckInstallation.php'; ?>
<?php 
session_start();
if(empty($_SESSION['auth']["admin"]['logged'])){
      header("location: ./index.php");
}
?>
<?php $thisPageTitle = "面板管理 > 基本管理" ?>
<?php $thisPageCag = "panelSetting" ?>
<?php $thisPageName = "BaseSetting" ?>
<?php require './components/header.php'; ?>


  <!-- ======= Sidebar ======== -->
<?php require './components/tabbar.php'; ?>
<?php require './components/navbar.php'; ?>
  

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>基本管理</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">面板管理</li>
          <li class="breadcrumb-item">基本管理</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>基本管理</b></h5>
              <p>管理面板的標題、logo、代幣名稱等</p>
              <!-- 控制區域 -->
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">面板標題</label>
                  <div class="col-9">
                    <input type="text" id="panelTitleInput" class="form-control" required/>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">代幣名稱</label>
                  <div class="col-9">
                    <input type="text" id="panelCoinNameInput" class="form-control" required/>
                  </div>
                </div> 
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Logo連結</label>
                  <div class="col-9">
                    <input type="text" id="panelLogoInput" class="form-control" required />
                  </div>
                </div>
                <div class="col-9">
                  <button type="button" class="btn btn-success col-lg-1 PanelDataChageBTN" onclick="updatePanelDATA()">
                      <div class="spinner-border text-light lodingBtn" role="status" style="display: none;height: 20px;width: 20px;">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div class="btnDefault">储存</div>
                  </button>
                </div>

            </div>
          </div>

        </div>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>外觀管理</b></h5>
              <p>管理用戶介面的主題/樣式</p>
              <!-- 控制區域 -->
                <div class="row mb-2">
                  <label class="col-2 col-form-label">主題選擇</label>
                  <div class="col-9">
                    <div class="themeRowSelect"></div>
                  </div>
                  <div class="col-9">
                    <button type="button" class="btn btn-success col-lg-1 themeChageBTN" onclick="changeTheme()">
                      <div class="spinner-border text-light lodingBtn" role="status" style="display: none;height: 20px;width: 20px;">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div class="btnDefault">更改</div>
                    </button>
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- GET -->
  <script type="text/javascript">
    // 獲取面板基本資訊
    $.ajax({
      url: "./api/Get/getPanelInfo.php",
      type: 'GET',
    success:function(response) {
        // console.log(response);
        var data = JSON.parse(response);
        console.log(data);
        $("#panelTitleInput").val(data.mysql.panelTitle);
        $("#panelCoinNameInput").val(data.mysql.panelCoinName);
        $("#panelLogoInput").val(data.mysql.panelLogoURL);

    },
    error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
        console.log('出現錯誤，無法完成!');
        console.log('Error:' + errorThrown);
        console.log('Status:' + status);
        console.dir(xhr);
    }
    })


    // 列出主題選單
    $.ajax({
      url: "./api/Get/rowThemeSelc.php",
      type: 'GET',
    success:function(response) {
        // console.log(response);
        var data = JSON.parse(response);

        var themeList = data.list;
        var themeSelected = data.isSelected;
        var themeSelectElem = "<select class=\"form-select\" aria-label=\"選擇主題\" id=\"thememSelector\">";
        var iSelected = "";
        var sected;
        themeSelected.forEach((ed) => {
          iSelected = ed;
        })
        themeList.forEach((e) => {
          if (iSelected == e) {
            sected = "Selected";
          }else{
            sected = "";
          }
          themeSelectElem += `<option value="${e}" ${sected}>${e}</option>`;
        });
        themeSelectElem += "</select>";

        $(".themeRowSelect").html(themeSelectElem);

    },
    error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
        console.log('出現錯誤，無法完成!');
        console.log('Error:' + errorThrown);
        console.log('Status:' + status);
        console.dir(xhr);
    }
    })
  </script>


  <!-- POST -->
  <script>
    // 面板相關資訊
    function updatePanelDATA(){
      $(".PanelDataChageBTN").prop("disabled",true);
      $(".PanelDataChageBTN > .btnDefault").hide();
      $(".PanelDataChageBTN > .lodingBtn").show();
      var panel1 = $("#panelTitleInput").val();
      var panel2 = $("#panelCoinNameInput").val();
      var panel3 = $("#panelLogoInput").val();
      $.ajax({
        url: "./api/Post/updatePanelData.php",
        type: 'POST',
        data:{
            pTitle: panel1,
            pCName: panel2,
            PLUrl: panel3
        },
      success:function(response) {
          // console.log(response);
          var data = JSON.parse(response);
          // console.log(data);
          // Swal.fire(
          //   '更改成功',
          //   `${data.text}`,
          //   'success'
          // );
          if(data.code == "200"){
            alertify.success(data.text);
            $(".PanelDataChageBTN").prop("disabled",false);
            $(".PanelDataChageBTN > .btnDefault").show();
            $(".PanelDataChageBTN > .lodingBtn").hide();
          }else{
            alertify.error(data.text);
            $(".PanelDataChageBTN").prop("disabled",false);
            $(".PanelDataChageBTN > .btnDefault").show();
            $(".PanelDataChageBTN > .lodingBtn").hide();
          }
      },
      error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
          console.log('出現錯誤，無法完成!');
          console.log('Error:' + errorThrown);
          console.log('Status:' + status);
          console.dir(xhr);
          alertify.error(data.errorThrown);
      }
      })
    }

    // 更改主題
    function changeTheme(){
      var theName = $("#thememSelector").val();
      $(".themeChageBTN").prop("disabled",true);
      $(".themeChageBTN > .btnDefault").hide();
      $(".themeChageBTN > .lodingBtn").show();
      $.ajax({
        url: "./api/Post/updateTheme.php",
        type: 'POST',
        data:{
            themeName: theName
        },
      success:function(response) {
          // console.log(response);
          var data = JSON.parse(response);
          // console.log(data);
          // Swal.fire(
          //   '更改成功',
          //   `${data.text}`,
          //   'success'
          // );
          if(data.code == "200"){
            alertify.success(data.text);
            $(".themeChageBTN").prop("disabled",false);
            $(".themeChageBTN > .btnDefault").show();
            $(".themeChageBTN > .lodingBtn").hide();
          }else{
            alertify.error(data.text);
            $(".themeChageBTN").prop("disabled",false);
            $(".themeChageBTN > .btnDefault").show();
            $(".themeChageBTN > .lodingBtn").hide();
          }
      },
      error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
          console.log('出現錯誤，無法完成!');
          console.log('Error:' + errorThrown);
          console.log('Status:' + status);
          console.dir(xhr);
      }
      })
    }
  </script>
<?php require './components/footer.php'; ?>
