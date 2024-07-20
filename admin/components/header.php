<?php //session_start(); ?>
<!-- 導入檔案 -->
<?php //require '../configuration.php'; ?>
<?php require './modules/mysql/getData.php'; ?>
<?php $adminMod = new mysqlGetData(); ?>
<?php $panelTitle; ?>
<?php $panelLogoURL; ?>
<?php 
foreach ($adminMod->getPanelSetting("name", "panelTitle") as $row) {
  $panelTitle = $row["value"];
}

foreach ($adminMod->getPanelSetting("name", "panelLogoURL") as $row) {
  $panelLogoURL = $row["value"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $panelTitle; ?> - <?php echo $thisPageTitle; ?></title>
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
  <!-- <link href="assets/vendor/driver.js/driver.css" rel="stylesheet"> -->
      <!-- driver.js -->
      <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
  <!-- alertify -->
  <link rel="stylesheet" href="assets/css/alertify.css" />
  <link rel="stylesheet" href="assets/css/alertify.default.css" />
</head>

<body id="pageMain">
