<?php

// This module is responsible for building the json which encompasses the 
// mailchimp lists

$params=array();
$params['apikey']="32327d591a2aa4b77ec41141937e5b49-us13";
$params = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,"https://us13.api.mailchimp.com/2.0/lists/list.json");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$response_body = curl_exec($ch);

// Just for checking the response. Can be removed
// print($response_body)
?>
