<?php
$logFile = 'log.txt';

//якщо є форма - запис
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['log_text'])) {
    $text = htmlspecialchars(trim($_POST['log_text']));
    $date = date('Y-m-d H:i:s');
    
    // дата запису
    $entry = "[$date] $text" . PHP_EOL;
    file_put_contents($logFile, $entry, FILE_APPEND);
    
    echo "<p style='color:green;'>записано :D</p>";
}

echo "<h3>log.txt:</h3>";

if (file_exists($logFile)) {
    $content = file_get_contents($logFile);
    echo "<div style='background:#f4f4f4; padding:10px; border:1px solid #ccc;'>";
    echo nl2br(htmlspecialchars($content));
    echo "</div><br>";
} else {
    echo "<p>log.txt ще не існує або порожній :(</p>";
}

echo "<a href='index.html'>на головну</a>";
?>