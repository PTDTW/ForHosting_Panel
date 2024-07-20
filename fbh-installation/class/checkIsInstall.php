<?php 
/**
* Name: CheckIsInstallation
* Version: 1.0.0
*/
class CheckIsInstallation
{
	public $siteConf = "../application/conf/setting.json";
	public $installFile = "../system/cache/isInstall.fbpf";
	public $isInstall = "false";

	public function CheckIsInstallation()
	{
		$json_data = file_get_contents($this->siteConf);
		$php_object = json_decode($json_data, true);
		if(is_file($this->installFile) & $php_object["isIntalled"] == "true"){
	 	   header("location: ../index.php");
		}
	}

	function __construct()
	{
		$this->CheckIsInstallation();
	}
}
 ?>