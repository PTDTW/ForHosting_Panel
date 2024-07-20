<?php 
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		require '../../../configuration.php';

		$folder = BASE_DIR . '/application/tepl'; // 更改为要列出子目录的文件夹的路径
		$themeList["list"] = array();
		$themeList["isSelected"] = array();
		if (is_dir($folder)) {
		    $subdirectories = glob($folder . '/*', GLOB_ONLYDIR);

		    foreach ($subdirectories as $subdirectory) {
		        $subdirectory = basename($subdirectory);
	    		array_push($themeList["list"], $subdirectory);
		        // echo $subdirectory . "<br>";
		    }
		} else {
		    echo "未擁有可被使用的主題";
		}
		 

		//獲取現在設定的theme 
		$mysql_json = file_get_contents('../../../application/conf/db_access.json');
		$jsonData = json_decode($mysql_json, true);
		// print_r($jsonData);
		$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
		$result = $conn->query("SELECT * FROM fhp_panelsetting WHERE name = 'panelTemplate';");
		foreach ($result as $row){
	    	array_push($themeList["isSelected"], $row["value"]);
		    // print_r($themeList);
		}
		echo json_encode($themeList);
	}else{
		http_response_code(403);
	}
?>