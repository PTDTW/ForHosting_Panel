<?php
// // 初始化
$mysql_json = file_get_contents('../application/conf/db_access.json');
$jsonData = json_decode($mysql_json, true);
// print_r($jsonData);
$conn = mysqli_connect($jsonData["host"], $jsonData["account"], $jsonData["password"], $jsonData["database"]);
$result = $conn->query("SELECT * FROM fhp_oauthlogin WHERE name='discord';");
$discordOauth2Data = [];
foreach ($result as $row) {
    // echo json_encode($row);
    $discordOauth2Data["id"] = [];
    $discordOauth2Data["secret"] = [];
    $discordOauth2Data["scope"] = [];
    $discordOauth2Data["redirectUrl"] = [];
    array_push($discordOauth2Data["id"], $row["client_id"]);
    array_push($discordOauth2Data["secret"], $row["client_secret"]);
    array_push($discordOauth2Data["scope"], $row["client_scope"]);
    array_push($discordOauth2Data["redirectUrl"], $row["redirectUrl"]);
    // ----資料處理----
}
// print_r($discordOauth2Data);
session_start();
// ============================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['logged_in'])) {
    // $_SESSION['logged_in']=false;
    header('Location: ../dashboard.php?status=ok');
    exit();
}
if (!isset($_GET['code'])) {
    header('Location: ../');
    exit();
}

$discord_code = $_GET['code'];


$payload = [
    'code' => $discord_code,
    'client_id' => $discordOauth2Data["id"][0],
    'client_secret' => $discordOauth2Data["secret"][0],
    'grant_type' => 'authorization_code',
    'redirect_uri' => $discordOauth2Data["redirectUrl"][0],
    'scope' => "identify%20guilds"
];

$payload_string = http_build_query($payload);
$discord_token_url = "https://discord.com/api/oauth2/token";
$header = array("Content-Type: application/x-www-form-urlencoded");

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL, $discord_token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);

if (!$result) {
    echo curl_error($ch);
}
$result = json_decode($result, true);

$access_token = $result['access_token'];

$discord_users_url = "https://discord.com/api/users/@me";
$header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL, $discord_users_url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($ch);

$result = json_decode($result, true);


print_r($result);

$_SESSION["auth"]["client"] = [
    "logged" => true,
    "platfrom" => "discord",
    "username" => $result["global_name"],
    "loggedTime" => date('Y/m/d | h:i:sa'),
    "discord" => [
        "mail" => $result["email"],
        "id"  => $result["id"],
        "username"  => $result["username"],
        "avatar" => $result["avatar"],
        "banner_color" => $result["banner_color"]
    ]
];
// $result["banner"] = "https://cdn.discordapp.com/banners/747071881169076264/12ea07cd51503444dd10978fc7dcb542.png";
// $result["banner"] = "12ea07cd51503444dd10978fc7dcb542";
if($result["banner"]){
    $_SESSION["auth"]["client"]["discord"]["banner_img"] = $result["banner"];
}else{
    $_SESSION["auth"]["client"]["discord"]["banner_color"] = $result["banner_color"];
}
// // 紀錄登入log
header("location: ../dashboard.php");   
exit();
?>