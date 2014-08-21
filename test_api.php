<?php

$key = "550da7661f578f9751be1f58c058aaff0b21c398";
$secret = "1ec48566eccb6d2614ce10bfc5951ac78bd00466";

$requestId = '1'; // arbitrary number or string id

$request = array(
  'key' => $key,
  'method' => 'game',
  'params' => array(
    array(
      'gid' => 1264
    )
  ),
  'id' => $requestId
);

$requestBody = json_encode($request);

//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"seasons", "params":[], "id":"1"}';
//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"season.teams", "params":[{"season":2013}], "id":"1"}';
//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"season.games", "params":[{"season":2013}], "id":"1"}';
//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"season.stat", "params":[{"season":2013}], "id":"1"}';
//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"game", "params":[{"gid":1264}], "id":"1"}';
//$requestBody = '{"key":"550da7661f578f9751be1f58c058aaff0b21c398", "method":"team.players", "params":[{"tid":17}], "id":"1"}';

$signature = sha1($secret.':'.$requestBody);
$requestUrl = 'http://jegkorongblog.hu/api.php?sig='.$signature;

$ch = curl_init($requestUrl); 
curl_setopt_array($ch, array(
  CURLOPT_POST => 1, 
  CURLOPT_RETURNTRANSFER => 1, 
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json", 
    "Cache-Control: max-age=0", 
    "User-Agent: Jegkorongblog.API (CURL)"
  ),
  CURLOPT_POSTFIELDS => $requestBody
));
$response = curl_exec($ch); 
curl_close($ch);  

$responseObj = json_decode($response);
if(empty($responseObj)) {
return false;
}		

print_r($responseObj);
