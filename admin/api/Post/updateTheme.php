<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//更改資料庫中的theme 
		$eThemeName = $_POST['themeName'];
		$mysql_json = file_get_contents('../../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$result = $conn->query("UPDATE fhp_panelsetting SET value='$eThemeName' WHERE name='panelTemplate'");
		if ($result) {
			$repStats = array(
				"code" => "200",
				"text" => "主題更改成功"
			);
		}else{
			$repStats = array(
				"code" => "500",
				"text" => "主題更改失敗，錯誤:" . $conn->error
			);
		}
		echo json_encode($repStats);
	}else{
		http_response_code(403);
	}
?>