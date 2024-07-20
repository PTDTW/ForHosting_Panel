<?php require './class/checkIsInstall.php'; ?>
<?php 
	new CheckIsInstallation;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	switch ($_POST['step']) {
		case '1':
			require "./views/step1.php";
			break;
		case '2':
			require "./views/step2.php";
			break;
		case '3':
			require "./views/step3.php";
			break;
		case '4':
			require "./views/step4.php";
			break;
		default:
			// code...
			break;
	}
}else{
	header("location: ./index.php");
}
?>