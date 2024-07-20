<?php 
/**
* Name: CheckInstallation
* Version: 1.0.0
*/
class CheckInstallation
{
	public $siteConf = BASE_DIR . "/application/conf/setting.json";
	public $installFile = BASE_DIR . "/system/cache/isInstall.fbpf";
	public $isInstall = "false";

	public function CheckIsInstallation($nowUrl = "")
	{
		$json_data = file_get_contents($this->siteConf);
		$php_object = json_decode($json_data, true);
		if(!is_file($this->installFile) && $php_object["isIntalled"] == "false" or 
			!is_file($this->installFile) && $php_object["isIntalled"] == "true" or 
			is_file($this->installFile) && $php_object["isIntalled"] == "false"){
			if (isset($nowUrl) && $nowUrl == "admin") {
		 	   	header("location: ../fbh-installation/index.php");
			}else if(isset($nowUrl) && $nowUrl == "client"){
	 	   		header("location: ./fbh-installation/index.php");
			}else if(empty($nowUrl)){
				echo "無法自動導向，請輸入`/fbh-installation/index.php`進到安裝頁面，如果你是用戶請聯絡管理員";
			}
		}else{
			// exit();
		}
	}

}
 ?>