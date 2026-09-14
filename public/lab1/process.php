<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { // перевірка надсилання
    
    // очистка даних від зайвого
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);

    // перевірка на пустоту
    if (empty($name) || empty($surname)) {
        echo "error: усі поля мають бути заповнені<br>";
        echo "<a href='index.html'>назад</a>";
    } 
    // Перевіряємо, чи введено саме текст (чи не ввів користувач тільки цифри)
    elseif (!is_string($name) || !is_string($surname) || is_numeric($name) || is_numeric($surname)) {
        echo "error: поля мають містити текст<br>";
        echo "<a href='index.html'>назад</a>";
    } 
    else {
        echo "<h2>yippie</h2>";
        // Виводимо привітання користувачу з використанням його імені та прізвища
        echo "sup, $name $surname!";
    }
} else {
    // якшо запущений process без форми
    echo "заповни форму <a href='index.html'>тут</a>.";
}
?>