<?php require BASE_DIR . '\application\modules\mysql.php'; ?>
<?php 
/**
 * 用於連接Mysql資料庫
 */
class conMysql
{	
	protected $conn;
	public function main()
	{
		$mysql_json = file_get_contents(BASE_DIR . '/application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$this->conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		if (!$this->conn) {
			mysqlErrorCode(mysqli_connect_errno());
		}
	}

	public function __construct(){
		$this->main();
	}
}
 ?>