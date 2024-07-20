<?php
$panelDdata = new panelTbGet;
$dbClass = new panelOa2;
$oauthTypeName = [];
$oauth2Data = [];
$btnNotCount = 0;
// PanelData
$urlData = [];
foreach ($panelDdata->getPanelSetting("name", "panelDomain") as $row) {
    $panelDomain= $row["value"];
    $urlData["domain"] = $panelDomain;
}

foreach ($panelDdata->getPanelSetting("name", "panelDir") as $row) {
    $panelDir = $row["value"];
    $urlData["dir"] = $panelDir;
}
// return $urlData;


// Oauth2
foreach ($dbClass->getOauth() as $row) {
    array_push($oauthTypeName, $row["name"]);
    $oauth2Data[$row["name"]] = [];
    array_push($oauth2Data[$row["name"]], $row["client_id"]);
    array_push($oauth2Data[$row["name"]], $row["client_secret"]);
    array_push($oauth2Data[$row["name"]], $row["client_scope"]);
    array_push($oauth2Data[$row["name"]], $row["redirectUrl"]);
    
}

if (isset($oauthTypeName) && in_array("discord", $oauthTypeName)) {
    echo "<div class=\"text-center\">";
    echo "<a href=http://" . $urlData["domain"] . $urlData["dir"] ."oauth2.php?tp=discord><button type=\"button\" class=\"btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0\">Discord 登入</button></a>";
    echo "</div>";
}else{
    $btnNotCount = $btnNotCount+1;
}

if (isset($oauthTypeName) && in_array("google", $oauthTypeName)) {
    echo "<div class=\"text-center\">";
    echo "<a href=http://" . $urlData["domain"] . $urlData["dir"] ."oauth2.php?tp=google><button type=\"button\" class=\"btn btn-lg btn-lg w-100 mt-4 mb-0\">Google 登入</button></a>";
    echo "</div>";
}else{
    $btnNotCount = $btnNotCount+1;
}

if($btnNotCount >=2){
    echo "<b>面板管理員尚未設置任何登入方式</b>";
}

?>