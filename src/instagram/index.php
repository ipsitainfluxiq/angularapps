<?php

/*$auth_url = 'https://www.instagram.com/oauth/authorize/?client_id=6c979874a1ee4410b442540bcdc3c8b2&redirect_uri=http://demo.artistxp.com/instagram/instaredirect.php&response_type=token&id='.$_GET['id'];
header('Location: ' . $auth_url);*/


$curl2 = curl_init();

curl_setopt_array($curl2, array(
    //CURLOPT_URL => 'https://api.instagram.com/v1/users/'.$res->data->id.'self/?access_token='.$_GET['access_token'],
    CURLOPT_URL => 'https://api.instagram.com/v1/users/'.$_REQUEST['userid'].'/media/recent/?access_token='.$_REQUEST['access_token'].'&count=100',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
$response1 = curl_exec($curl2);
$err1 = curl_error($curl2);

//echo "<pre>";
//print_r(json_decode($response1));
$response1=json_decode($response1);
echo json_encode($response1->data);
//echo "</pre>";