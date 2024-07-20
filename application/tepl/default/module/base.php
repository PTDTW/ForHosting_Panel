<?php
define("MysqlConfig", "./application/conf/db_access.json");
class mysqlConnectConfig
{
    protected $conn;
    public function main()
    {
        $mysql_json = file_get_contents(MysqlConfig);
        $jsonData = json_decode($mysql_json, true);
        // print_r($jsonData);
        $this->conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
        if (!$this->conn) {
            mysqlErrorCode(mysqli_connect_errno());
        }
    }

    public function __construct()
    {
        $this->main();
    }
}

class panelTbGet extends mysqlConnectConfig
{
	public function getPanelSetting($whereName, $whereValue)
	{
		$query = "SELECT * FROM fhp_panelsetting WHERE ";
		if ($whereName != "" || $whereValue != "") {
			$con = $this->conn;
			$result = $con->query($query . "$whereName" . " = " . "'$whereValue'" . ";");
			// echo $query . "'$whereName'" . " = " . "'$whereValue'" . ";";
			if (!$result) {
				mysqlErrorCode($con->errno);
			}else{
				if(empty($result)){
					$result = "no result";
				}
				return $result;
			}
		}else{
			if(empty($result)){
				return $result = "no result";
			}
			$con = $this->conn;
			$result = $con->query($query . "(1=1)");
			if (!$result) {
				mysqlErrorCode($con->errno);
			}else{
				return $result;
			}
		}
	}
}

class panelOa2 extends mysqlConnectConfig
{
	public function getOauth()
	{
		$query = "SELECT * FROM fhp_oauthlogin;";
		$con = $this->conn;
		$result = $con->query($query);
		// echo $query . "'$whereName'" . " = " . "'$whereValue'" . ";";
		if (!$result) {
			mysqlErrorCode($con->errno);
		}else{
			if(empty($result)){
				$result = "no result";
			}
			return $result;
		}
	}
}
?>