<!DOCTYPE html>
<html>
<head>
    <title>Page Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #1a1d24;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .content {
            color: white;
            padding: 20px;
            text-align: center;
            max-width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
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


    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php
$jsonDataFilePath = $_SERVER['DOCUMENT_ROOT'] . '/test/data/data-whitelist.txt'; // ini folder pathnya yg bs diedit
$jsonData = file_get_contents($jsonDataFilePath);
$ipWhitelist = json_decode($jsonData, true);
$userIP = $_SERVER['HTTP_CF_CONNECTING_IP']; //cuman work buat cf user doang keknya |||| kabarin klo gak work ip asli, cek data ip di panel
$allowAccess = isset($ipWhitelist[$userIP]) && $ipWhitelist[$userIP] === '1';

$recaptcha_secret = "6Lfkk-wnAAAAAGr0Im4trnxaNsodvFF0ABRXfRk7";  // gan ini secretkey ganti versi kamu... bikin di https://www.google.com/recaptcha/admin/
$recaptcha_response = $_POST['g-recaptcha-response'];

if ($allowAccess) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        echo "<div class='content'>";
        echo "<h1>Nandakoin</h1>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response";
            $recaptcha_response_data = json_decode(file_get_contents($recaptcha_url));

            if ($recaptcha_response_data->success) {
                                if (isset($ipWhitelist[$userIP]) && $ipWhitelist[$userIP] === '1') {
                    $ipWhitelist[$userIP] = '2';
                    $modifiedJsonData = json_encode($ipWhitelist);
                    file_put_contents($jsonDataFilePath, $modifiedJsonData);
                } else {}
                header("Location: https://linkpays.in/x4O7Ju05"); // ganti shortlinknya agan, bisa mana aja bole |||||||||||||||||||||||||||
                exit();
            } else {
                echo "<p class='error'>Please solve the reCAPTCHA first</p>";
            }
        }

        echo "<form method='post'>";
        echo "<div class='g-recaptcha' data-sitekey='6Lfkk-wnAAAAADrZ73C1nNctjH51el2f-MkQGOQ4'></div>";  // gan ini site key ganti versi kamu... bikin di https://www.google.com/recaptcha/admin/
        echo "<button type='submit' class='button'>Submit</button>";
        echo "</form>";

        echo "</div>";
    } else {
        echo "<p style='color:red'>Please don't skip the ads</p>"; // ini versi echo
                // Yang atas ini versi echo show tulisan.. kalo bawah versi redirect. hapus // kalau mau pake
        // header("Location: https://nandakoin.blogspot.com");
    }
} else {
        echo "<p style='color:red'>Please don't skip the ads</p>"; // ini versi echo
        // Yang atas ini versi echo show tulisan.. kalo bawah versi redirect. hapus // kalau mau pake
        // header("Location: https://nandakoin.blogspot.com");
    }

?>

</body>
</html>
