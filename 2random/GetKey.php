<?php
$recaptchaSecretKey = '6Lfkk-wnAAAAAGr0Im4trnxaNsodvFF0ABRXfRk7'; // gan ini secretkey ganti versi kamu... bikin di https://www.google.com/recaptcha/admin/

function verifyRecaptcha($recaptchaSecretKey, $recaptchaResponse) {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = array(
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);
    return isset($response['success']) && $response['success'] === true;
}

$recaptchaResponse = $_POST['g-recaptcha-response'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verifyRecaptcha($recaptchaSecretKey, $recaptchaResponse)) {


// Yang versi ini aku edit gan, karna aku ga pake mysql di server aku. nanti edit aja kayak kode asli kamu =====
    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $keyy = generateRandomString(16);
// =============================================================================================

}
?>


<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Xontwol genkey</title>

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />

   <style type="text/css">
 {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  height: 100%;
  background-color: #577eff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.texthead {
  margin: 30px 0px;
  padding: 30px;
}
.texthead h1{
  font-size: 16px;
  color: #fff;
  text-align: center;
}
.container {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 10px;
  margin: -10px 30px;
}
.container h1{
  font-weight: 1000;
  font-size: 16px;
  margin-bottom: -5px;
}
.container h2{
  font-weight: 500;
  font-size: 14px;
  margin-bottom: -8px;
}
.container input {
  font-size: 16px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #000000;
  text-align: center;
  margin-top: 15px;
}
.container button {
  font-size: 18px;
  padding: 10px 20px;
  background-color: #577eff;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  text-align: center;
  margin-top: 10px;
}

.btn23{
  margin-top: 50px;
}
.btn23 button{
  font-size: 18px;
  padding: 10px 20px;
  background-color: #fff;
  color: #000;
  border: none;
  border-radius: 5px;
  text-align: center;
  margin-top: 10px;
}
.button {
position: relative;
margin-top:5px;
padding: 9px 30px;
font-size: 1.1em;
background: #ededed;
border: none;
 outline: none;
border-radius: 2px;
cursor: pointer;
}
.content {
color: white;
padding: 20px;
text-align: center;
max-width: 90%;
}

   </style>
   
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <body>


    <?php
        

    if (isset($_SERVER['HTTP_REFERER'])) {
$jsonDataFilePath = $_SERVER['DOCUMENT_ROOT'] . '/test/data/data-whitelist.txt'; //ini bisa diedit foldernya. kalau ngedit folder ini, smua yang ada kek gini harus diedit, nanti pake fitur search by keyword ya di tiap php yang ada beginian.
$jsonData = file_get_contents($jsonDataFilePath);
$ipWhitelist = json_decode($jsonData, true);
$userIP = $_SERVER['HTTP_CF_CONNECTING_IP']; //cuman work buat cf user doang keknya
$allowAccess = isset($ipWhitelist[$userIP]) && $ipWhitelist[$userIP] === '2';

if ($allowAccess) {
// Ini gw ga ngotak ngatik htmlnya kecuali versi captcha, kalau nt mau ngedit htmlnya, usahain pake format echo kek gini. mau digabung per tags html juga gpp.
        if (isset($keyy)) {
            echo '<meta http-equiv="refresh" content="25;url=https://nandakoin.blogspot.com/p/key-generator-concept-01-09-23.html">'; //ganti ke website sender agan.. link paling awal yang ada tombol
            echo '<div class="texthead"><h1>Welcome Xontwol hax key generator..!!</h1></div>';
            echo '<div class="container">';
            echo '<h1>Registration!!</h1>';
            echo '<h2>Game : pubg</h2>';
            echo '<h2>Duration : 6 hours</h2>';
            echo '<h2>Device reached : 1</h2>';
            echo '<input id="text-1" value="' . $keyy . '" readonly="readonly"/>';
            echo '<button onclick="copy(\'text-1\')"><i class="fa fa-copy"></i> Copy Text</button>';
            echo '</div>';
            echo '<div class ="btn23">';
            echo '<a href="https://xontwolhax.com/myapp/xontwol hax.apk">';
            echo '<button><i class="fa fa-download"></i> Download app</button>';
            echo '</a>';
            echo '<a href="https://xontwolhax.com">';
            echo '<button><i class="fa fa-home"></i> Back home</button>';
            echo '</a>';
            echo '</div>';
    $jsonDataFilePath = $_SERVER['DOCUMENT_ROOT'] . '/test/data/data-whitelist.txt';
    $jsonData = file_get_contents($jsonDataFilePath);
    $ipWhitelist = json_decode($jsonData, true);
    $userIP = $_SERVER['HTTP_CF_CONNECTING_IP']; //cuman work buat cf user doang keknya
    if (isset($ipWhitelist[$userIP])) {
        unset($ipWhitelist[$userIP]);

        $modifiedJsonData = json_encode($ipWhitelist);
        file_put_contents($jsonDataFilePath, $modifiedJsonData);
    }
        } else {
            echo '<div class="texthead"><h1>Welcome Xontwol hax key generator..!!</h1></div>';
            echo '<div class="container">';
            echo '<div class="content">';
            echo '<form method="POST">';
            echo "<div class='g-recaptcha' data-sitekey='6Lfkk-wnAAAAADrZ73C1nNctjH51el2f-MkQGOQ4'></div>";  // gan ini sitekey ganti versi kamu... bikin di https://www.google.com/recaptcha/admin/
            echo '<button class="button" type="submit">Submit</button>';
            echo '</form>';
            echo "</div>";
            echo "</div>";
        }
    } else {
                header("Location: https://nandakoin.blogspot.com/p/key-generator-concept-01-09-23.html"); //ganti link ini ke mana aja boleh, atau ganti echo aja buat ngasih note bisa.
        exit();
    }
} else {
     echo '<p style="color:red">Did you just skip something?</p>';
    exit();
}
?>
    <script>
    function lmaodek() {
    setTimeout(function() {
  window.location.href = "https://nandakoin.blogspot.com/p/key-generator-concept-01-09-23.html"; // ganti ke website sender kamu gan
    }, 2000);
}

      function copy(idtext = "idtext") {
        document.getElementById(idtext).select();
         document.execCommand("copy");
         lmaodek();
      }      

    </script>
  </body>
</html>
