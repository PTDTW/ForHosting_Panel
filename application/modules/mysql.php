<?php require BASE_DIR . '\application\modules\errorLog.php'; ?>
<?php 
/**
 * 說明: 用於Mysql連接或除錯
 * */
 ?>
<?php 
function mysqlErrorCode($code="", $formNum=""){
	$errText = [
    "1000" => "通用錯誤",
    "1005" => "創建表失敗，可能是由於錯誤的表定義或外鍵約束問題。",
    "1007" => "創建資料庫物件失敗，可能是由於重複的物件名稱。",
    "1050" => "創建表失敗，因為表已經存在。",
    "1062" => "插入或更新數據時違反了唯一約束。",
    "1064" => "SQL語法錯誤，可能是由於錯誤的SQL語句或表達式。",
    "1091" => "alert Table語句中的某個外鍵約束找不到關聯的鍵。",
    "1049" => "找不到相關資料庫",
    
    "2000" => "存儲引擎錯誤",
    "2002" => "無法連接到MySQL服務器。",
    "2006" => "MySQL服務器超時。",
    "2013" => "無法連接到遠程MySQL服務器。",
    "2014" => "無法連接到本地MySQL服務器通過套接字。",
    "2020" => "InnoDB存儲引擎錯誤，可能是由於表空間不足或文件損壞。",

    "3000" => "存儲過程和函數錯誤",
    "3008" => "存儲過程或函數不存在。",
    "3012" => "存儲過程或函數已經存在。",
    "3024" => "存儲過程或函數的語法錯誤。",
    "3037" => "存儲過程或函數執行過程中遇到了錯誤。",

    "4000" => "語句和客戶端錯誤",
    "1042" => "無法連接到MySQL服務器，可能是由於錯誤的主機名或端口號。",
    "1045" => "訪問被拒絕，可能是由於錯誤的用戶名或密碼。",
    "1054" => "未知列名，可能是由於引用了不存在的列。",
    "1065" => "查詢為空，可能是由於查詢結果為空。",
    "1146" => "表不存在，可能是由於引用了不存在的表。",
    "1142" => "您的訪問權限不足，無法繼續進行動作",

    "5000" => "語法錯誤或解析器錯誤",
    "5006" => "錯誤的DDL語句，可能是由於DDL語句的語法錯誤。",
	];

	if (isset($code)) {
		if (isset($errText[$code])) {
		    $errorDescription = $errText[$code];
	    	$errDec = "<br/>錯誤代碼：$code <br/>錯誤說明：$errorDescription";
		    if(isset($formNum) && $formNum !== ""){
			    stepOneSqlErr($errDec, $formNum);
			    exit();
		    }else{
		    	error_Logger($errDec);
		    }
		} else {
	    	$errDec = "<br/>未知錯誤代碼：$code";
		    if(isset($formNum) || $formNum !== ""){
			    stepOneSqlErr($errDec, $formNum);
			    exit();
		    }else{
		    	error_Logger($errDec);
		    }
		}
	}

}


?>
 <?php
function stepOneSqlErr($text, $formNum) {
	?>
	<HTML>
	<HEAD>
	<TITLE> New Document </TITLE>
	</HEAD>
	<BODY onload="frmUser.submit();">
	<FORM METHOD="POST" ACTION="../install-page.php" Name="frmUser">
    	<input type="hidden" name="step" value="<?php echo $formNum ?>">
    	<input type="hidden" name="err" value="<?php echo $text ?>">
    	
	</FORM>
	</BODY>
	</HTML>
	<?php
}

?>