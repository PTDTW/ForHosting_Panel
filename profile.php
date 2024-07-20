<?php
// session_start();
// print_r($_SESSION);
?>

<?php
// 初始動作
ini_set('display_errors', 0);

require __DIR__ . '\configuration.php';
require BASE_DIR . '\system\class\CheckInstallation.php';
require BASE_DIR . '\application\modules\mysql\getMysqlData.php';
require_once BASE_DIR . '\application\modules\errorLog.php';

$checkInstall = new CheckInstallation();
$checkInstall->CheckIsInstallation("client");
$getMysql = new mysqlGetData();
$reSql = $getMysql->getPanelSetting("name", "panelTemplate");
$teplName;
// 從資料庫抓取現在使用的模板
foreach ($reSql as $row) {
	$teplName = $row["value"];
}
// 獲取模板的設定檔
$theme_json = file_get_contents(BASE_DIR . '/application/tepl/' . $teplName . '/config.json');
$jsonData = json_decode($theme_json, true);
// 獲取模板的路徑設定檔
$theme_path_json = file_get_contents(BASE_DIR . '/application/tepl/' . $teplName . '/' . $jsonData["pathFile"]);
$jsonData2 = json_decode($theme_path_json, true);
// 導入面板頁面
$profile_page_fileName = $jsonData2["pages"]["accountProfile"];
$profile_page = BASE_DIR . '/application/tepl/' . $teplName . '/' . $profile_page_fileName = $jsonData2["pages"]["accountProfile"];
// echo $login_page;
if (!is_file($profile_page)) {
	error_Logger("此模板/主題登入檔案不存在，請聯絡管理員進行使用模板更改【accountProfile: {$profile_page_fileName}】",
	 "路徑: {$profile_page}");
}else{
	require BASE_DIR . '/application/tepl/' . $teplName . '/' . $profile_page_fileName = $jsonData2["pages"]["accountProfile"];
}
?>