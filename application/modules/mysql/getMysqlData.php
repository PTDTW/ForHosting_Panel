<?php require BASE_DIR . '\application\modules\mysql\mysqlCon.php'; ?>
<?php 
/**
 * Name: mysqlGetData
 */
class mysqlGetData extends conMysql
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
 ?>