<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');


require_once ('../test_twitter/TwitterAPIExchange.php');


//echo 56;exit;
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => '1036947658676432896-pOeYABVIkqQuShGuN63g4QyoFbM15I',
    'oauth_access_token_secret' => 'Eyj76XXAvN3PLaY1DchS3CC4RWiBYAu0M66FjLzV13CHY',
    'consumer_key' => "fhwawEUbSsyNG8L5667cmZpYZ",
    'consumer_secret' => "nHxQhn3ApgpNxYRIDfE5rBuL2U4fmLzVMBxBTls5CLOJz4fnKv"
);

$url = 'https://api.twitter.com/1.1/collections/list.json';
//$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
//$getfield = '?screen_name=VassYop&count=500';
$getfield = '?screen_name=GargiRo38390587&count=500';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$res= $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
$res1 = json_decode($res);
print_r($res1);
//print_r($res1->objects->timelines);
print_r($res1->response->results);
/*$resarr=json_decode($res);
$data['data']=$resarr;*/
$timeline_ids = $res1->response->results;


$url1 = 'https://api.twitter.com/1.1/collections/entries/add.json';
$requestMethod1 = 'POST';
foreach( $timeline_ids as $value ) {
    echo "Value is : ".$value->timeline_id."      ";
/*
    $postfields = array(
        'id' => 'custom-1068058961176223745'.time(),
        'tweet_id' => $value->timeline_id
    );
    $restval= $twitter->buildOauth($url1, $requestMethod1)
        ->setPostfields($postfields)
        ->performRequest();
   var_dump($restval);*/
}
?>