<?php
session_start();

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];
    if ($age < 600) {
        //дані актуальні
        $data = $_SESSION['cached_data'];
        $source = 'з кешу сесії (швидко)';
    } else {
        //кеш застарів
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = 'оновлено кеш (застарів)';
    }
} else {
    //якщо кешу нема
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'створено новий кеш (повільно)';
}

function generateData() {
    sleep(2);
    return ['usd' => rand(41, 46), 'eur' => rand(48, 52)];
}

echo "<h2>курс валют</h2>";
echo "<p>дані: " . json_encode($data) . "</p>";
echo "<p>джерело: <strong>$source</strong></p>";
echo "<p>вік кешу: " . (isset($age) ? $age . " секунд" : "0 секунд") . "</p>";
?>
<br><a href="index.html">на головну</a>