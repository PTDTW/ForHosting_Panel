<?php
$dbClass = new panelTbGet;
$cdnDataCache = [];
foreach ($dbClass->getPanelSetting("name", "panelHttp") as $row) {
    $panelHttp= $row["value"];
    $cdnDataCache["http"] = $panelHttp;
}

foreach ($dbClass->getPanelSetting("name", "panelDomain") as $row) {
    $panelDomain= $row["value"];
    $cdnDataCache["domain"] = $panelDomain;
}

foreach ($dbClass->getPanelSetting("name", "panelDir") as $row) {
    $panelDir = $row["value"];
    $cdnDataCache["dir"] = $panelDir;
}
$cdnUrl = $cdnDataCache["http"] . $cdnDataCache["domain"] . $cdnDataCache["dir"];
return $cdnUrl;
?>