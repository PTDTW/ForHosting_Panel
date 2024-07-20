<?php
$dbClass = new panelTbGet;
$panelData = [];
foreach ($dbClass->getPanelSetting("name", "panelTitle") as $row) {
    $panelData["title"] = $row["value"];
}

foreach ($dbClass->getPanelSetting("name", "panelLogoURL") as $row) {
    $panelData["logo"] = $row["value"];
}
return $panelData;
?>