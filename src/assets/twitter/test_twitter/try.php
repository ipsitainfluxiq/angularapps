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

$url1= "https://api.twitter.com/1.1/collections/entries/add.json";
//$url1= "https://api.twitter.com/1.1/collections/entries/curate.json";
$requestMethod = 'POST';

$twitter = new TwitterAPIExchange($settings);
$postfields = array(
    'id' => 'custom-1070305508903403520',
    'tweet_id' => '1044820182475173889'
);

$restvala= $twitter->buildOauth($url1, $requestMethod)
    ->setPostfields($postfields)
    ->performRequest();

echo "<pre>";
print_r($restvala);
echo "</pre>";
