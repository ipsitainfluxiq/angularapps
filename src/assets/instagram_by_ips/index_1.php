<?php
/*
$auth_url = 'https://www.instagram.com/oauth/authorize/?client_id=6c979874a1ee4410b442540bcdc3c8b2&redirect_uri=http://demo.artistxp.com/assets/instagram/index_1.php&response_type=token';
header('Location: ' . $auth_url);*/
//print_r($_REQUEST);

if($_GET['access_token']!=null) {

    $headers = [];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.instagram.com/v1/users/self/?access_token=' . $_GET['access_token'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    /*echo "<pre>";
    print_r(json_decode($response));
    echo "</pre>";*/
    $response = json_decode($response);
  //  echo($response->data->counts->followed_by);

    https://api.instagram.com/v1/users/599203198/media/recent/?access_token=599203198.6c97987.67c5eca1482241e789b438febd3e6bcc



    $curl2 = curl_init();
    curl_setopt_array($curl2, array(
        CURLOPT_URL => 'https://api.instagram.com/v1/users/'.$response->data->id.'/media/recent/?access_token='.$_GET['access_token'].'&count=100',
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

    echo "<pre>";
    print_r(json_decode($response1));
    echo "</pre>";

}
?>

<script>
    //alert(window.location.href);
    if(window.location.href.indexOf('#access')>0){
        //alert(window.location.href.split('#access_token='));
        window.location.href=window.location.href.replace("#access_token=",'?access_token=');
    }

</script>
