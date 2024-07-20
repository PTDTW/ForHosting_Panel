<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//更改資料庫中的theme 
		$ePaneltitle = $_POST['pTitle'];
		$eCoinName = $_POST['pCName'];
		$eLogoURL = $_POST['PLUrl'];
		$mysql_json = file_get_contents('../../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$queryList = [
			"UPDATE fhp_panelsetting SET value='$ePaneltitle' WHERE name='panelTitle'",
			"UPDATE fhp_panelsetting SET value='$eCoinName' WHERE name='panelCoinName'",
			"UPDATE fhp_panelsetting SET value='$eLogoURL' WHERE name='panelLogoURL'"
		];
		foreach($queryList as $qSql){
			$result = $conn->query($qSql);
		}
		if ($result) {
			$repStats = array(
				"code" => "200",
				"text" => "面板相關資訊更改成功"
			);
		}else{
			$repStats = array(
				"code" => "500",
				"text" => "面板相關資訊更改失敗，錯誤:" . $conn->error
			);
		}
		echo json_encode($repStats);
	}else{
		http_response_code(403);
	}
?>