<?php require '../../application/modules/mysql.php'; ?>
<?php require '../func/locationToStep.php'; ?>
<?php require '../func/outputErr.php'; ?>
<?php 
/**
* Name: MysqlSetup
* Version: 1.0.0
*/
class MysqlSetup
{
	public $mysqlAccess = [];

	public function mysqlConnectTest($local, $acc, $pwd)
	{
		$conn = mysqli_connect($local, $acc, $pwd);
		if (!$conn) {
			mysqlErrorCode(mysqli_connect_errno(), 1);
			exit();
		}
		mysqli_close($conn);
	}

	public function mysqlDBSelectTest($local, $acc, $pwd, $db)
	{
		$conn = mysqli_connect($local, $acc, $pwd, $db);
		if (!$conn) {
			mysqlErrorCode(mysqli_connect_errno(), 1);
			// exit();
		}
		mysqli_close($conn);
	}

	public function mysqlAccSave($local, $acc, $pwd, $db)
	{
		$mysql_json = array(
			"host" => $local,
			"account" => $acc,
			"password" => $pwd,
			"database"=> $db
		);
		$jsonData = json_encode($mysql_json, JSON_PRETTY_PRINT);
		$jsonFilePath = '../../application/conf/db_access.json';
		if (file_put_contents($jsonFilePath, $jsonData)) {
			$this->MysqlSetupDB();
   			// toStep(2);
		} else {
			outputErr("資料處存錯誤", "1");
		}

	}

	public function MysqlSetupDB()
	{
		$mysql_json = file_get_contents('../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$sql_file = "../sql/dbSetup.sql";
		$sql = file_get_contents($sql_file);
		$queries = explode(';', $sql);
	    foreach ($queries as $value) {
	    	if (!empty($value)) {
	    		$result = $conn->query($value);
	    		if (!$result) {
		        	mysqlErrorCode($conn->errno, "1");
   				}
	    	}else{
				toStep(2);
	    	}
	    }
		// print_r($queries[1]);
		// foreach ($queries as $query) {
		//     if (!$result) {
		//         // mysqlErrorCode($conn->errno, "1");
   		// 		toStep(2);
		//     }else{
   		// 		toStep(2);
		//     }
		// }
	}
}
?>