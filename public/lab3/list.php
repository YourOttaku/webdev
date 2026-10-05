<?php
$uploadDir = 'uploads/';

echo "<h2>файли у '$uploadDir'</h2>";

if (is_dir($uploadDir)) {
    $files = array_diff(scandir($uploadDir), array('.', '..'));
    
    if (count($files) > 0) {
        echo "<ul>";
        foreach ($files as $file) {
            $filePath = $uploadDir . $file;
            echo "<li>$file - <a href='$filePath' download>Завантажити</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>нема файлів :(</p>";
    }
} else {
    echo "<p '$uploadDir' не існує, закинь файл</p>";
}

echo "<br><a href='index.html'>на головну</a>";
?>