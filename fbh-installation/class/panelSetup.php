<?php require '../../application/modules/mysql.php'; ?>
<?php require '../func/locationToStep.php'; ?>
<?php require '../func/outputErr.php'; ?>
<?php 
/**
* Name: panelSetup
* Version: 1.0.0
*/
class panelSetup
{

	public function adminInto($acc, $pwd, $mail)
	{
		$mysql_json = file_get_contents('../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$encodePWD= password_hash($pwd, PASSWORD_DEFAULT);
		$query = "INSERT INTO fhp_users (user_id, user_account, user_name, user_password, user_email, user_platform, user_coin, user_admin)";
		$query .= "VALUES (NULL, '$acc', '$acc', '$encodePWD', '$mail', 'FHP', '0', 1)";
		// $query .= "";
		$result = $conn->query($query);
		if (!$result) {
			// toStep(2);
			mysqlErrorCode($conn->errno, 2);
			// echo $query;
			// echo $conn->errno;
		}else{
			toStep(3);
		}
	}

	public function panelConfigInto($panelTitle, $panelCoNa, $panelLo, $panelPteroAPI)
	{
		$mysql_json = file_get_contents('../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$query = "INSERT INTO fhp_panelsetting (name, value) ";
		$queryInsert = [
			"VALUES ('panelTitle', '$panelTitle')", 
			"VALUES ('panelCoinName', '$panelCoNa')", 
			"VALUES ('panelLogoURL', '$panelLo')", 
			"VALUES ('panelPteroAPI', '$panelPteroAPI')",
			"VALUES ('panelTemplate', 'default')"
		];
		foreach ($queryInsert as $value) {
			$result = $conn->query($query . $value);
			if (!$result) {
				mysqlErrorCode($conn->errno, 3);
			}
		}
		// header("location: ../finish.php");
	}

	public function panelDirInto($HttpType, $panelDir, $panelDomain)
	{
		$mysql_json = file_get_contents('../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$query = "INSERT INTO fhp_panelsetting (name, value) ";
		$queryInsert = [
			"VALUES ('panelHttp', '$HttpType')", 
			"VALUES ('panelDomain', '$panelDomain')", 
			"VALUES ('panelDir', '$panelDir')", 
		];
		foreach ($queryInsert as $value) {
			$result = $conn->query($query . $value);
			if (!$result) {
				mysqlErrorCode($conn->errno, 3);
			}
		}
		// header("location: ../finish.php");
	}
	public function installFinish()
	{	
		$setup_json = array(
			"isIntalled" => "true",
			"version" => "1.0.0"
		);
		$jsonData = json_encode($setup_json, JSON_PRETTY_PRINT);
		$installFile = "../../system/cache/isInstall.fbpf";
		$jsonFilePath = '../../application/conf/setting.json';
		file_put_contents($installFile, $jsonData);
		if (file_put_contents($jsonFilePath, $jsonData)) {
			header("location: ../finish.php");
		} else {
			outputErr("資料處存錯誤", "3");
		}
	}
}
?>