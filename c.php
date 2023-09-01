<?php
// Yang ini bisa diedit file pathnya *kalau* mau dipindah ke folder lain atau dmana aja. dibiarin gini juga aslinya gpp asal folder data-whitelist.txt ga diganti. kalau mau direname, semua yang ada di php juga harus direname 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $referer = $_SERVER['HTTP_REFERER'];

    $receivedData = file_get_contents('php://input');
    $userIP = $_SERVER['HTTP_CF_CONNECTING_IP'];
    $filePath = 'data/data-whitelist.txt'; // ini folder pathnya yg bs diedit
    if (file_exists($filePath)) {
        $jsonData = file_get_contents($filePath);
        $existingData = json_decode($jsonData, true);
    } else {
        $existingData = array();
    }
    $existingData[$userIP] = $receivedData;
    $updatedJsonData = json_encode($existingData);
    file_put_contents($filePath, $updatedJsonData);
} else {

}
?>
