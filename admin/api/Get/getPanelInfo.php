<?php 
	require '../../../configuration.php';
	//獲取現在設定的theme 
	$panelInfo = [];
	$mysql_json = file_get_contents(BASE_DIR . '/application/conf/db_access.json');
	$jsonData = json_decode($mysql_json, true);
	// print_r($jsonData);
	$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
	$result = $conn->query("SELECT * FROM fhp_panelsetting;");
	foreach ($result as $row){
		$lineName = $row['name'];
		$lineValue = $row['value'];
		// echo $row['name'];
		$panelInfo["mysql"][$lineName] = [];
    	array_push($panelInfo["mysql"][$lineName], $lineValue);
	    // print_r($themeList);
	}

	$cdnUrl = $panelInfo["mysql"]["panelHttp"][0] . $panelInfo["mysql"]["panelDomain"][0] . $panelInfo["mysql"]["panelDir"][0];
	$panelInfo["other"]["cdnUrl"] = [];
	array_push($panelInfo["other"]["cdnUrl"], $cdnUrl);
	echo json_encode($panelInfo);
	
?>