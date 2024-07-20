<?php //require '../func/locationToStep.php'; ?>
<?php require '../../configuration.php'; ?>
<?php require '../class/panelSetup.php'; ?>
<?php 
if ($_POST['adminPwd'] !== $_POST['adminPwdRe']) {
	toStep(2);
}else{
	$panelSettingClass = new panelSetup;
	$panelSettingClass->adminInto($_POST['adminAcc'], $_POST['adminPwd'], $_POST['adminMail']);
}
	// toStep(2);
 ?>
