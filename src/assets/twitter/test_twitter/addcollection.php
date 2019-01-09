<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');


require_once('../test_twitter/TwitterAPIExchange.php');
$settings = array(
    'oauth_access_token' => '1036947658676432896-pOeYABVIkqQuShGuN63g4QyoFbM15I',
    'oauth_access_token_secret' => 'Eyj76XXAvN3PLaY1DchS3CC4RWiBYAu0M66FjLzV13CHY',
    'consumer_key' => "fhwawEUbSsyNG8L5667cmZpYZ",
    'consumer_secret' => "nHxQhn3ApgpNxYRIDfE5rBuL2U4fmLzVMBxBTls5CLOJz4fnKv"
);

//$url = 'https://api.twitter.com/1.1/collections/add.json';
$url = 'https://api.twitter.com/1.1/collections/create.json';
$requestMethod = 'POST';

$twitter = new TwitterAPIExchange($settings);
$postfields = array(
    'name' => 'collectionC'.time(),
   // 'tweet_id' => '1036947658676432896'
);
echo "....".'44'.$url.print_r($postfields);
$restvala= $twitter->buildOauth($url, $requestMethod)
    ->setPostfields($postfields)
    ->performRequest();

var_dump($restvala);
exit;






















ini_set('display_errors', true);
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
require_once('../twitter/TwitterAPIExchange.php');
$settings = array(
    'oauth_access_token' => '1036947658676432896-pOeYABVIkqQuShGuN63g4QyoFbM15I',
    'oauth_access_token_secret' => 'Eyj76XXAvN3PLaY1DchS3CC4RWiBYAu0M66FjLzV13CHY',
    'consumer_key' => 'fhwawEUbSsyNG8L5667cmZpYZ',
    'consumer_secret' => 'nHxQhn3ApgpNxYRIDfE5rBuL2U4fmLzVMBxBTls5CLOJz4fnKv'
);

$url = 'https://api.twitter.com/1.1/collections/create.json';
$requestMethod = 'POST';
$postfields = array(
    'screen_name' => 'usernameToBlock',
    'skip_status' => '1'
);
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
    ->setPostfields($postfields)
    ->performRequest();
exit;


$url = 'https://api.twitter.com/1.1/collections/create.json';
$requestMethod = 'POST';
/** POST fields required by the URL above. See relevant docs as above **/
/*$postfields = array(
    'id' => 'custom-1068058961176223745',
    'tweet_id' => '1069851356675170304'
);*/
//$postfields = array('status' => 'testing');
$postfields = array(
 'in_reply_to_status_id' => '629358657864626176',
    'status' => 'TEST'
);
/** Perform a POST request and echo the response **/
echo $twitter->setPostfields($postfields)
    ->buildOauth($url, $requestMethod)
    ->performRequest();


/*$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=GargiRo38390587&count=50';
$requestMethod = 'GET';
echo $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();*/




