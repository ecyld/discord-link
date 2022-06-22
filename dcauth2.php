<?php

$servername = "localhost";

$username = "X";

$password = "X";



try {

  $conn = new PDO("mysql:host=$servername;dbname=DBNAME", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

  echo "DB Connection error!!: " . $e->getMessage();

}

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

ini_set('max_execution_time', 300); 



error_reporting(E_ALL);





define('OAUTH2_CLIENT_ID', 'YOUR_CLIENT_ID');

define('OAUTH2_CLIENT_SECRET', 'CLIENT_SECRET');





$authorizeURL = 'https://discord.com/api/oauth2/authorize';

$tokenURL = 'https://discord.com/api/oauth2/token';

$apiURLBase = 'https://discord.com/api/users/@me';

$apiURLGuilds = 'https://discord.com/api/users/@me/guilds';

$apiURLJoin = 'https://discord.com/api/guilds/GUILD_ID/members/';



session_start();



if(get('action') == 'login') {



  $params = array(

    'client_id' => OAUTH2_CLIENT_ID,

    'redirect_uri' => 'https://emircanyildirim.com/api/dcauth2.php',

    'response_type' => 'code',

    'scope' => 'identify guilds email guilds.join'

  );





  header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));

  die();

}







if(get('code')) {



  $token = apiRequest($tokenURL, array(

    "grant_type" => "authorization_code",

    'client_id' => OAUTH2_CLIENT_ID,

    'client_secret' => OAUTH2_CLIENT_SECRET,

    'redirect_uri' => 'FILE_URL',

    'code' => get('code')

  ));

  $_SESSION['access_token'] = $token->access_token;





  header('Location: ' . $_SERVER['PHP_SELF']);

}



if(session('access_token')) {

  $user = apiRequest($apiURLBase);

  $guilds = apiRequest($apiURLGuilds); 

  $userid =  $user->id;

  $url = "https://discord.com/api/guilds/YOUR_SERVER_ID/members/".$userid."";

 ?>



  <?php

  $kontrol= "SELECT * from baglananlar WHERE uye_id='$userid'";

  $id_kontrol = $conn->prepare($kontrol);

  $id_kontrol->execute();

  

  $count = $id_kontrol->rowCount();

  

  if($count < 1){

  

function joinapiRequest($url,$userid) {

  $url = $url;



$paramsx = '{"access_token" : "'.session('access_token').'"}';

  





  $ch = curl_init($url);



  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

  curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsx);



  $bottoken = "YOUR_BOT_TOKEN";

  $headers[] = 'Authorization: Bot ' . $bottoken;

  $headers[] = 'Content-Type: application/json';

  $headers[] = 'Content-Length: '.strlen($paramsx);

  

  

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  $response = curl_exec($ch);





  echo ' ';

print_r($response);

  



  if(empty($response)){

    echo "User added server";

  } else {

    echo "User add server failed";

  }





}

joinapiRequest($url,$userid);



function addroleRequest($url,$userid) {

  $url = "https://discord.com/api/guilds/YOUR_SERVER_ID/members/".$userid."/roles/YOUR_ROLE_ID";



$paramsx = '{"access_token" : "'.session('access_token').'"}';

  





  $ch = curl_init($url);



  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

  curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsx);



  $bottoken = "YOUR_BOT_TOKEN";

  $headers[] = 'Authorization: Bot ' . $bottoken;

  $headers[] = 'Content-Type: application/json';

  $headers[] = 'Content-Length: '.strlen($paramsx);

  

  

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  $response = curl_exec($ch);





  echo ' ';

print_r($response);

  



  if(empty($response)){

    echo "Role added";

  } else {

    echo "Role add failed";

  }





}

addroleRequest($url,$userid);

  $access_token = $_SESSION['access_token'];

$sql = "INSERT INTO baglananlar (uye_id, access_token) VALUES (?,?)";

$stmt= $conn->prepare($sql);

$stmt->execute([$userid, $access_token]);

$_SESSION["eslestirildi"] = "Your account linked succesfully.";

$_SESSION["userid"] = $userid;



  }else { //basla

      function joinapiRequest($url,$userid) {

  $url = $url;



$paramsx = '{"access_token" : "'.session('access_token').'"}';

  





  $ch = curl_init($url);



  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

  curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsx);



  $bottoken = "YOUR_BOT_TOKEN";

  $headers[] = 'Authorization: Bot ' . $bottoken;

  $headers[] = 'Content-Type: application/json';

  $headers[] = 'Content-Length: '.strlen($paramsx);

  

  

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  $response = curl_exec($ch);





  echo ' ';

print_r($response);

  



  if(empty($response)){

    echo "User added server";

  } else {

    echo "User didnt add server";

  }





}

joinapiRequest($url,$userid);



function addroleRequest($url,$userid) {

  $url = "https://discord.com/api/guilds/YOUR_SERVER_ID/members/".$userid."/roles/YOUR_ROLE_ID";



$paramsx = '{"access_token" : "'.session('access_token').'"}';

  





  $ch = curl_init($url);



  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

  curl_setopt($ch, CURLOPT_POSTFIELDS, $paramsx);



  $bottoken = "YOUR_BOT_TOKEN";

  $headers[] = 'Authorization: Bot ' . $bottoken;

  $headers[] = 'Content-Type: application/json';

  $headers[] = 'Content-Length: '.strlen($paramsx);

  

  

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  $response = curl_exec($ch);





  echo ' ';

print_r($response);

  



  if(empty($response)){

    echo "Role added";

  } else {

    echo "Role didnt add";

  }





}

//bitis

  addroleRequest($url,$userid);

    $access_token = $_SESSION['access_token'];





$sql = "UPDATE baglananlar SET access_token=? WHERE uye_id=?";

$stmt= $conn->prepare($sql); 

$stmt->execute([$access_token,$userid]);

  $access_token = $_SESSION['access_token'];



$_SESSION["eslestirildi"] = "Your account is already linked, information updated.";

$_SESSION["userid"] = $userid;

  }

  unset($_SESSION["access_token"]);







} else { ?> 

<!doctype html>

<html lang="en">

  <head>

      <title>Discord Account Linking System</title>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Discord hesap eşleştirme sistemi altyapısıdır. Bu altyapı sayesinde discord ile giriş yap sağlanabilir.">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <title>Doğrulama Sayfası</title>

  </head>

  <body>

      <?php

            if(isset($_SESSION["eslestirildi"])){

                echo $_SESSION["eslestirildi"];


                echo "</br>";

                echo $_SESSION["userid"];

            }else{

      if(isset($_SESSION["iddolu"])){

      $sa = $_SESSION["iddolu"];

      echo $sa;

      session_destroy();

      }

      ?>

      <hr>

    <p>Click to link your account. <br>

    <a href="?action=login"><button type="button" class="btn btn-primary">LINK</button>

</a>

    </p>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>

</html>

  

  

 <?php } }







function apiRequest($url, $post=FALSE, $headers=array()) {

  $ch = curl_init($url);

  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);



  $response = curl_exec($ch);





  if($post)

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));



  $headers[] = 'Accept: application/json';



  if(session('access_token'))

    $headers[] = 'Authorization: Bearer ' . session('access_token');



  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



  $response = curl_exec($ch);

  return json_decode($response);

}



function get($key, $default=NULL) {

  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;

}



function session($key, $default=NULL) {

  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;

}

?>

<br>

<hr>

<a href="https://github.com/Emircnyld/discord-link">Details</a>
