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


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=GargiRo38390587&count=200';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$res= $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
$res1 = json_decode($res);
print_r($res1);



//$url1= "https://api.twitter.com/1.1/collections/entries/add.json";
/*$url1= "https://api.twitter.com/1.1/collections/create.json";
$requestMethod1 = 'POST';*/
foreach( $res1 as $value ) {
    echo "Value is : ".$value->id."      ";

   /* $postfields = array(
        'id' => 'custom-1070305508903403520',
        'tweet_id' => $value->id
      //  'name' => $value->id.time()
    );*/
    /*$restval1=  $twitter->buildOauth($url1, $requestMethod1)
        ->setPostfields($postfields)
        ->performRequest();
   // var_dump($restval1);
    echo "<pre>";
    print_r($restval1);
    echo "</pre>";*/

}