<?php
$cacheDir = __DIR__ . '/cache';
$cacheFile = $cacheDir . '/report.html';
$cacheTime = 600; //10 хвилин у секундах

if (!is_dir($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    echo "<h3>завантажено з файлового кешу (створено: " . date('H:i:s', filemtime($cacheFile)) . ")</h3>";
    readfile($cacheFile);
    echo "<p><em>наступне оновлення: " . ($cacheTime - (time() - filemtime($cacheFile))) . " секунд.</em></p>";
} else {
    
    sleep(3);
    
    //генерація html
    ob_start(); 
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
    echo "<tr style='background-color:#ddd;'><th>№</th><th>ім'я</th><th>винен</th><th>дата</th></tr>";
    
    $names = ['льоха', 'гєнадій горін', 'жмишенко валєрій альбєртовіч', 'віталік', 'джоні сомалі', 'Grzegorz Brzęczyszczykiewicz', 'john american', 'jd vance', 'big yahu'];
    for ($i = 1; $i <= 1000; $i++) {
        $randomName = $names[array_rand($names)];
        $randomSum = rand(100, 10000) . " шекелей";
        $randomDate = date('Y-m-d', strtotime('-' . rand(0, 365) . ' days'));
        
        echo "<tr><td>$i</td><td>$randomName</td><td>$randomSum</td><td>$randomDate</td></tr>";
    }
    echo "</table>";
    
    $reportContent = ob_get_clean(); 
    file_put_contents($cacheFile, $reportContent);

    echo "<h3>звіт згенеровано і збережено в кеш, час: " . date('H:i:s') . "</h3>";
    echo $reportContent;
}
?>
<br><a href="index.html">на головну</a>