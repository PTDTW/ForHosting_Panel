<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//更改資料庫中的theme 
		$eType = $_POST['o2Type'];
		$eCId = $_POST['o2Id'];
		$eCSecret = $_POST['o2Secret'];
		$eCScope = str_replace("&", "%20", $_POST['o2Scope']);
		$eCRUrl = $_POST['o2RUrl'];
		$mysql_json = file_get_contents('../../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$result = $conn->query("SELECT * FROM fhp_oauthlogin WHERE name='$eType';");
		if ($result->num_rows >= 1 ) {
			$result2 = $conn->query("UPDATE fhp_oauthlogin SET client_id='$eCId', client_secret='$eCSecret', client_scope='$eCScope', status='0' WHERE name='$eType' ");
			if ($result2) {
				$repStats = array(
					"code" => "200",
					"text" => "{$eType} 的oauth2已設置成功"
				);
			}else{
				$repStats = array(
					"code" => "500",
					"text" => "{$eType} 的oauth2已設置失敗，錯誤:" . $conn->error
				);
			}
		}else{
			$result3 = $conn->query("INSERT INTO fhp_oauthlogin (name, client_id, client_secret, client_scope, redirectUrl, status) 
									 VALUES ('$eType', '$eCId', '$eCSecret', '$eCScope', '$eCRUrl', '0')");
			if ($result3) {
				$repStats = array(
					"code" => "200",
					"text" => "{$eType} 的oauth2已設置成功"
				);
			}else{
				$repStats = array(
					"code" => "500",
					"text" => "{$eType} 的oauth2已設置失敗，錯誤:" . $conn->error
				);
			}
		}
		echo json_encode($repStats);
	}else{
		http_response_code(403);
	}
?>