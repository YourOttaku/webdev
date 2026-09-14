<?php
//завдання 1
echo "Hello, World!<br>";  //вивід тексту на екран

//завдання 2    
$stringVar = "гии";  // рядок
$intVar = 25;    // ціле число
$floatVar = 3.75; // плаваюча кома
$boolVar = true;  // булеве значення

// вивід на екран
echo "рядок: $stringVar <br>";
echo "ііле число: $intVar <br>";
echo "дрібне число: $floatVar <br>";
echo "булеве значення (1 - true, пусто - false): $boolVar <br><br>";

// тип кожної змінної
var_dump($stringVar); echo "<br>";
var_dump($intVar); echo "<br>";
var_dump($floatVar); echo "<br>";
var_dump($boolVar); echo "<br>";

echo "<hr>"; //форматування для зручнішого читання

//завдання 3
$word1 = "біба ";
$word2 = "і боба";
// об'єднання рядків крапкою
$resultString = $word1 . $word2;

echo $resultString . "<br>";

echo "<hr>";

//завдання 4
$number = 69; //змінна з числовим значенням

// перевірка на залишок від ділення
if ($number % 2 == 0) {
    echo "число $number є парним.<br>";
} else {
    echo "число $number є непарним.<br>";
}

echo "<hr>";

//завдання 5
echo "for (1 -> 10):<br>";
//вивід чисел від 1 до 10 за допомогою for
for ($i = 1; $i <= 10; $i++) {
    echo $i . " "; // вивід числа на екран
}
echo "<br><br>";

echo "Цикл while (від 10 до 1):<br>";
$j = 10;
//вивід чисел від 10 до 1 за допомогою while 
while ($j >= 1) {
    echo $j . " ";
    $j--; // зменшення значення на 1
}
echo "<br>";

echo "<hr>";

// завдання 6
//асоціативний  массив
$student = [
    "name" => "хтось",
    "surname" => "якийсь",
    "age" => 19,
    "specialty" => "бездарь"
];

// вивід на екран
echo "ім'я: " . $student["name"] . "<br>";
echo "прізвище: " . $student["surname"] . "<br>";
echo "вік: " . $student["age"] . "<br>";
echo "спеціальність: " . $student["specialty"] . "<br><br>";

// середній бал
$student["average_grade"] = 6.9;

// вивід оновленного масиву
echo "Оновлений масив:<br>";
echo "<pre>"; // тег для читання в браузері
print_r($student);
echo "</pre>";

?>