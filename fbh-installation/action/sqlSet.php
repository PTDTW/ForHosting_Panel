<?php require '../../configuration.php'; ?>
<?php require '../class/mysqlSetup.php'; ?>
<?php 
$mysqlClass = new MysqlSetup;
if ($_POST['sqlPwd'] == "NOPwd") {
	$DBPWD = "";
}else{
	$DBPWD = $_POST['sqlPwd'];
}
$mysqlClass->mysqlConnectTest($_POST['sqlLocal'], $_POST['sqlAcc'], $DBPWD);
$mysqlClass->mysqlDBSelectTest($_POST['sqlLocal'], $_POST['sqlAcc'], $DBPWD, $_POST["sqlDB"]);
$mysqlClass->mysqlAccSave($_POST['sqlLocal'], $_POST['sqlAcc'], $DBPWD, $_POST["sqlDB"]);
 ?>