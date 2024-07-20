<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
  header("location: ./dashboard.php?status=ok");
  exit();
}
$mysql_json = file_get_contents('./application/conf/db_access.json');
$platform = $_GET["tp"];
if($platform == trim("discord")){
  $discordOauth2Data = [];
  $jsonData = json_decode($mysql_json, true);
  // print_r($jsonData);
  $conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
  $result = $conn->query("SELECT * FROM fhp_oauthlogin WHERE name='discord';");
  foreach ($result as $row){

      $discordOauth2Data["id"] = [];
      $discordOauth2Data["secret"] = [];
      $discordOauth2Data["scope"] = [];
      $discordOauth2Data["redirectUrl"] = [];
      array_push($discordOauth2Data["id"], $row["client_id"]);
      array_push($discordOauth2Data["secret"], $row["client_secret"]);
      array_push($discordOauth2Data["scope"], $row["client_scope"]);
      array_push($discordOauth2Data["redirectUrl"], $row["redirectUrl"]);
  }
    $discord_url = "https://discord.com/api/oauth2/authorize?client_id=" . $discordOauth2Data["id"][0] .
    "&redirect_uri=" .$discordOauth2Data["redirectUrl"][0] .
    "&response_type=code" .
    "&scope=" . $discordOauth2Data["scope"][0];
    print_r($discordOauth2Data);
    header("Location: $discord_url");
    exit();
}

?>