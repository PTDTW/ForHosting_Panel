<?php require '../configuration.php'; ?>
<?php require BASE_DIR . '\system\class\CheckInstallation.php'; ?>
<?php 
session_start();
if(empty($_SESSION['auth']["admin"]['logged'])){
      header("location: ./index.php");
}
?>
<?php $thisPageTitle = "面板管理 > 第三方登入管理" ?>
<?php $thisPageCag = "panelSetting" ?>
<?php $thisPageName = "oauth2Setting" ?>
<?php require './components/header.php'; ?>


  <!-- ======= Sidebar ======== -->
<?php require './components/tabbar.php'; ?>
<?php require './components/navbar.php'; ?>
  

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>第三方登入管理</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">面板管理</li>
          <li class="breadcrumb-item">第三方登入管理</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <!-- Discord Oauth2 Setting -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Discord登入</b></h5>
              <p>Discord登入設定，讓用戶可以使用Discord登入面板 <a href="https://discord.dev">Discord開發者平台</a></p>
              <!-- 控制區域 -->
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Client ID</label>
                  <div class="col-9">
                    <input type="text" id="ocid" class="form-control" required/>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Client Secret</label>
                  <div class="col-9">
                    <input type="text" id="ocSecret" class="form-control" required/>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Scope</label>
                  <div class="col-9">
                    <input type="text" id="ocScope" value="identify&guilds&email" class="form-control" placeholder="ex: identify&guids&guilds.members.read" required disabled/>
                  </div>
                </div> 
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Redirect Url</label>
                  <div class="col-9">
                    <input type="text" id="dcUri" class="form-control" value="" disabled/>
                  </div>
                </div>
                <div class="col-9">
                  <button type="button" class="btn btn-success col-lg-1 oauthDataSetBTN" onclick="oauthSet('discord')">
                      <div class="spinner-border text-light lodingBtn" role="status" style="display: none;height: 20px;width: 20px;">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div class="btnDefault">储存</div>
                  </button>
                </div>
            </div>
          </div>
        </div>


        <!-- Google Oauth2 Setting -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><b>Google登入</b></h5>
              <p>Google登入設定，讓用戶可以使用Google登入面板 <a href="https://console.cloud.google.com/">Google開發者平台</a></p>
              <!-- 控制區域 -->
              <h4 style="text-align: center;">Google登入正在開發中</h4>

                <!-- <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Client ID</label>
                  <div class="col-9">
                    <input type="text" id="ocid2" class="form-control" required/>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Client Secret</label>
                  <div class="col-9">
                    <input type="text" id="ocSecret2" class="form-control" required/>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Scope</label>
                  <div class="col-9">
                    <input type="text" id="ocScope2" class="form-control" placeholder="ex: identify&guids&guilds.members.read" required/>
                  </div>
                </div> 
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Redirect Url</label>
                  <div class="col-9">
                    <input type="text" id="googleUri" class="form-control" value="" name="ocRUrl2" disabled/>
                  </div>
                </div>
                <div class="col-9">
                  <button type="button" class="btn btn-success col-lg-1 oauthDataSetBTN2" onclick="oauthSet('google')">
                      <div class="spinner-border text-light lodingBtn" role="status" style="display: none;height: 20px;width: 20px;">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div class="btnDefault">储存</div>
                  </button>
                </div> -->
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->


  <script type="text/javascript">
    // 設置oauth
    function oauthSet(oType){
        if (oType == "discord") {
          $(".oauthDataSetBTN").prop("disabled",true);
          $(".oauthDataSetBTN > .btnDefault").hide();
          $(".oauthDataSetBTN > .lodingBtn").show();
          var oauth1 = $("#ocid").val();
          var oauth2 = $("#ocSecret").val();
          var oauth3 = $("#ocScope").val().replaceAll("&", "%20");
          var oauth4 = $("#dcUri").val();
          if(!oauth1 || !oauth2 || !oauth3){
            alertify.error('Discord資料不得為空!');
            $(".oauthDataSetBTN").prop("disabled",false);
            $(".oauthDataSetBTN > .btnDefault").show();
            $(".oauthDataSetBTN > .lodingBtn").hide();
            return false;
          }
          $.ajax({
            url: "./api/Post/insertOauth.php",
            type: 'POST',
            data:{
                o2Type: oType,
                o2Id: oauth1,
                o2Secret: oauth2,
                o2Scope: oauth3,
                o2RUrl: oauth4
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
                $(".oauthDataSetBTN").prop("disabled",false);
                $(".oauthDataSetBTN > .btnDefault").show();
                $(".oauthDataSetBTN > .lodingBtn").hide();
              }else{
                alertify.error(data.text);
                $(".oauthDataSetBTN").prop("disabled",false);
                $(".oauthDataSetBTN > .btnDefault").show();
                $(".oauthDataSetBTN > .lodingBtn").hide();
              }
          },
          error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
              console.log('API出現錯誤，無法完成!');
              console.log('Error:' + errorThrown);
              console.log('Status:' + status);
              console.dir(xhr);
              alertify.error(data.errorThrown);
          }
          })
        }else if (oType == "google") {
          $(".oauthDataSetBTN2").prop("disabled",true);
          $(".oauthDataSetBTN2 > .btnDefault").hide();
          $(".oauthDataSetBTN2 > .lodingBtn").show();
          var oauth1 = $("#ocid2").val();
          var oauth2 = $("#ocSecret2").val();
          var oauth3 = $("#ocScope2").val().replaceAll("&", "%20");
          var oauth4 = $("#googleUri").val();
          if(!oauth1 || !oauth2 || !oauth3){
            alertify.error('Google資料不得為空!');
            $(".oauthDataSetBTN2").prop("disabled",false);
            $(".oauthDataSetBTN2 > .btnDefault").show();
            $(".oauthDataSetBTN2 > .lodingBtn").hide();
            return false;
          }
          $.ajax({
            url: "./api/Post/insertOauth.php",
            type: 'POST',
            data:{
                o2Type: oType,
                o2Id: oauth1,
                o2Secret: oauth2,
                o2Scope: oauth3,
                o2RUrl: oauth4
            },
          success:function(response) {
              console.log(response);
              var data = JSON.parse(response);
              // console.log(data);
              // Swal.fire(
              //   '更改成功',
              //   `${data.text}`,
              //   'success'
              // );
              if(data.code == "200"){
                alertify.success(data.text);
                $(".oauthDataSetBTN2").prop("disabled",false);
                $(".oauthDataSetBTN2 > .btnDefault").show();
                $(".oauthDataSetBTN2 > .lodingBtn").hide();
              }else{
                alertify.error(data.text);
                $(".oauthDataSetBTN2").prop("disabled",false);
                $(".oauthDataSetBTN2 > .btnDefault").show();
                $(".oauthDataSetBTN2 > .lodingBtn").hide();
              }
          },
          error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
              console.log('API出現錯誤，無法完成!');
              console.log('Error:' + errorThrown);
              console.log('Status:' + status);
              console.dir(xhr);
              alertify.error(data.errorThrown);
          }
        })
      }
    }
  </script>
  <script type="text/javascript">
    // 獲取面板基本資訊
    $.ajax({
      url: "./api/Get/getPanelInfo.php",
      type: 'GET',
    success:function(response) {
        // console.log(response);
        var data = JSON.parse(response);
        const rdUri = `${data.other.cdnUrl}LoginAuth/discord.php`;
        $("#dcUri").val(rdUri);
        const rdUri2 = `${data.other.cdnUrl}LoginAuth/google.php`;
        $("#googleUri").val(rdUri2);
    },
    error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
        console.log('出現錯誤，無法完成!');
        console.log('Error:' + errorThrown);
        console.log('Status:' + status);
        console.dir(xhr);
    }
    })

    // 抓取oauth

    // ----Discord---- //
    $.ajax({
      url: "./api/Get/getOauth2Data.php",
      type: 'GET',
    success:function(response) {
      var data = JSON.parse(response);
      // console.log(data);
        $("#ocid").val(data.discord["cId"][0]);
        $("#ocSecret").val(data.discord["cSecret"][0]);
        $("#ocScope").val(data.discord["cScope"][0].replaceAll("%20", "&"));
    },
    error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
        console.log('出現錯誤，無法完成!');
        console.log('Error:' + errorThrown);
        console.log('Status:' + status);
        console.dir(xhr);
    }
    })



    // ----Google---- //
    $.ajax({
      url: "./api/Get/getOauth2Data.php",
      type: 'GET',
    success:function(response) {
      var data = JSON.parse(response);
      // console.log(data);
        $("#ocid2").val(data.google["cId"][0]);
        $("#ocSecret2").val(data.google["cSecret"][0]);
        $("#ocScope2").val(data.google["cScope"][0].replaceAll("%20", "&"));
    },
    error:function( xhr, status, errorThrown ) { // 取得失敗時執行的階段程式碼
        console.log('出現錯誤，無法完成!');
        console.log('Error:' + errorThrown);
        console.log('Status:' + status);
        console.dir(xhr);
    }
    })
  </script>
<?php require './components/footer.php'; ?>
