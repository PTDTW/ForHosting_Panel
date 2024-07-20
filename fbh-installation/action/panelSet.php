<?php //require '../func/locationToStep.php'; ?>
<?php require '../../configuration.php'; ?>
<?php require '../class/panelSetup.php'; ?>
<?php 
$panelSettingClass = new panelSetup;
$panelTitleVal = (empty($_POST['panelTitle'])) ? "FBPanel" : $_POST['panelTitle'];
$panelCoinNameVal = (empty($_POST['coninName'])) ? "FBC" : $_POST['coninName'];
$panelLogoVal = (empty($_POST['panelLogo'])) ? "https://media.discordapp.net/attachments/1109305091590209546/1154533941781475338/FHP.png" : $_POST['panelLogo'];
$panelSettingClass->panelConfigInto($panelTitleVal, $panelCoinNameVal, $panelLogoVal, $_POST['pteroAPI']);
$panelSettingClass->installFinish();
	// toStep(2);
 ?>
