<?php
/**
 * Created by PhpStorm.
 * User: iftekar
 * Date: 30/5/17
 * Time: 1:33 PM
 */

header('Content-type: text/html');
header('Access-Control-Allow-Origin: * ');  //I have also tried the * wildcard and get the same response
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
error_reporting(E_ALL);

/*GET ACCESS TOKEN*/
$ch = curl_init("https://graph.facebook.com/oauth/access_token?client_id=514543379015302&client_secret=a2aa869e0f605981514fccf0982757c5&redirect_uri=http://demo.artistxp.com/assets/facebook_test_ips/getaccesstoken.php&grant_type=client_credentials");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response= curl_exec($ch);
$response = json_decode($response);
$accesstoken=$response->access_token;
//echo $accesstoken;echo "<br>";
/*GET Oauth TOKEN*/
/*$ch1 = curl_init("https://graph.facebook.com/v3.2/oauth/access_token?
client_id=514543379015302&redirect_uri=http://demo.artistxp.com/assets/facebook_test_ips/getaccesstoken.php&client_secret=a2aa869e0f605981514fccf0982757c5&code=".$response->access_token);*/

if($accesstoken!=null){
$ch1 = curl_init("https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id=514543379015302&client_secret=a2aa869e0f605981514fccf0982757c5&fb_exchange_token=".$accesstoken);



curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$response1= curl_exec($ch1);
$response1 = json_decode($response1);
echo "<pre>";
print_r($response1);
echo "</pre>";
}
exit;