<?php
$CONSUMER_KEY = 'fhwawEUbSsyNG8L5667cmZpYZ';
$CONSUMER_SECRET = 'nHxQhn3ApgpNxYRIDfE5rBuL2U4fmLzVMBxBTls5CLOJz4fnKv';

$x= require_once('../test_twitter/codebird-php-develop/src/codebird.php');
\Codebird\Codebird::setConsumerKey('fhwawEUbSsyNG8L5667cmZpYZ','nHxQhn3ApgpNxYRIDfE5rBuL2U4fmLzVMBxBTls5CLOJz4fnKv');
$cb = \Codebird\Codebird::getInstance();

session_start();
/*unset($_SESSION['oauth_verify']);
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
unset($_SESSION['oauth_verifier']);
exit;*/

if( (strlen($_GET["id"])>5)){
    $_SESSION['loginid'] = $_GET["id"];
};

if (! isset($_SESSION['oauth_token'])) {
    $reply = $cb->oauth_requestToken(array(
        'oauth_callback' => 'https://demo.artistxp.com/assets/twitter/test_twitter/index.php'
    ));
  /*  echo "<pre>";
    print_r($reply);
    echo "</pre>";*/

    // store the token
    $cb->setToken($reply->oauth_token, $reply->oauth_token_secret);         //short-term token
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
    $_SESSION['oauth_verify'] = true;

    // redirect to auth website
    $auth_url = $cb->oauth_authorize();
   // echo 'url=  '.$auth_url;
    header('Location: ' . $auth_url);
    die();

} elseif (isset($_GET['oauth_verifier']) && isset($_SESSION['oauth_verify'])) {
    echo 'verify token';
    // verify the token
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_verify']); //ask

    // get the access token
    $reply = $cb->oauth_accessToken(array(
        'oauth_verifier' => $_GET['oauth_verifier']
    ));
   /* echo '==========================================';
    echo "<pre>";
    print_r($reply);
    echo "</pre>";*/
    // store the token (which is different from the request token!)
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;

    // send to same URL, without oauth GET parameters
    header('Location: ' . basename(__FILE__));
    die();
}
$cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);


$twitter_token = $_SESSION['oauth_token'];
$twitter_token_secret = $_SESSION['oauth_token_secret'];

echo 'twitter token     '.$twitter_token;
echo '<br>';
echo 'twitter_token_secret   '.$twitter_token_secret;

