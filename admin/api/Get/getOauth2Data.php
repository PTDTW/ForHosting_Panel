<?php 
	require '../../../configuration.php';
	//獲取現在設定的theme 
    $oauth2 = [];
	$mysql_json = file_get_contents(BASE_DIR . '/application/conf/db_access.json');
	$jsonData = json_decode($mysql_json, true);
	// print_r($jsonData);
	$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
	$result = $conn->query("SELECT * FROM fhp_oauthlogin;");
	foreach ($result as $row){
        // echo json_encode($row);
        $platform = $row["name"];
        $id = $row["client_id"];
        $secret = $row["client_secret"];
        $scope = $row["client_scope"];
        $redirectUrl = $row["redirectUrl"];
        // ----資料處理----
        $oauth2[$platform]["cId"] = [];
        $oauth2[$platform]["cSecret"] = [];
        $oauth2[$platform]["cScope"] = [];
        $oauth2[$platform]["rUrl"] = [];
    	array_push($oauth2[$platform]["cId"], $id);
    	array_push($oauth2[$platform]["cSecret"], $secret);
    	array_push($oauth2[$platform]["cScope"], $scope);
    	array_push($oauth2[$platform]["rUrl"], $redirectUrl);
	    // print_r($themeList);
	}
	echo json_encode($oauth2);

	
?>