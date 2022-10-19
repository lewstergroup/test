<?php
error_reporting(1);
header('Content-Type: application/json');
$url = $_GET['url'];
$type = $_GET['type'];
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            $id = $match[1];
            
if (empty($url) || empty ($type)) {

$work = array(
"message" => "api is working",
"parameter" => "https://api.xzcode.app/ytt?url=https://youtu.be/CYDP_8UTAus&type=mp3"
);

echo json_encode($work, JSON_PRETTY_PRINT);

} else if ($type == "mp3"){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ytmp4.buzz/api/json/mp3/$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
//echo $chresult;
curl_close($ch);
$result = json_decode($chresult, true);

$link1 = $result['vidInfo']['0']['dloadUrl'];
$link2 = $result['vidInfo']['1']['dloadUrl'];
$link3 = $result['vidInfo']['2']['dloadUrl'];
$link4 = $result['vidInfo']['3']['dloadUrl'];

$work = array(
"title" => $result['vidTitle'],
"thumb" => $result['vidThumb'],
"download" => array(
"320" => $link1,
"192" => $link2,
"128" => $link3,
"64" => $link4)
);

echo json_encode($work, JSON_PRETTY_PRINT);

} else if ($type == "mp4"){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ytmp4.buzz/api/json/videos/$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$chresult = curl_exec($ch);
//echo $chresult;
curl_close($ch);
$result = json_decode($chresult, true);

$link1 = $result['vidInfo']['0']['dloadUrl'];
$link2 = $result['vidInfo']['1']['dloadUrl'];

$work = array(
"title" => $result['vidTitle'],
"thumb" => $result['vidThumb'],
"download" => array(
"720p" => $link1,
"360p" => $link2)
);

echo json_encode($work, JSON_PRETTY_PRINT);
} else {
$work = array(
"message" => "error"
);

echo json_encode($work, JSON_PRETTY_PRINT);
}
?>
