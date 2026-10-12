<?php
header('Content-Type: text/css; charset=UTF-8');

//кешування на 1 день
$secondsToCache = 86400;
$ts = gmdate("D, d M Y H:i:s", time() + $secondsToCache) . " GMT";

header("Cache-Control: public, max-age=$secondsToCache");
header("Expires: $ts");
sleep(2);

echo "
body {
    font-family: Arial, sans-serif;
    background-color: #222222;
    color: #000000;
    padding: 20px;
}
.cache-box {
    border: 2px solid #0bfcac;
    padding: 15px;
    background-color: #bae9d9;
    border-radius: 7px;
    margin-bottom: 15px;
}
";
?>