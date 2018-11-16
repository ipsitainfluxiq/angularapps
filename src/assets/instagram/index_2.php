<?php
header('Content-type: text/html');
header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');


$auth_url = 'https://www.instagram.com/oauth/authorize/?client_id=6c979874a1ee4410b442540bcdc3c8b2&redirect_uri=http://demo.artistxp.com/assets/instagram/index_1.php&response_type=token';
header('Location: ' . $auth_url);
die();