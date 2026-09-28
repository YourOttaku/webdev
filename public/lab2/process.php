<?php
$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
    $file = $_FILES['uploaded_file'];

    if (is_uploaded_file($file['tmp_name'])) {
        
        $maxSize = 2 * 1024 * 1024; // 2мб у байтах
        $allowedExts = ['jpg', 'jpeg', 'png']; 
        
        // розширення у нижній регістр
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // розмір, тип
        if ($file['size'] > $maxSize) {
            die("надто великий файл<br><a href='index.html'>назад</a>");
        }
        if (!in_array($ext, $allowedExts)) {
            die("дозволені лише jpg, jpeg та png файли<br><a href='index.html'>назад</a>");
        }

        $fileName = $file['name'];
        $targetPath = $uploadDir . $fileName;

        // унікальний суфікс
        if (file_exists($targetPath)) {
            $baseName = pathinfo($file['name'], PATHINFO_FILENAME);
            $fileName = $baseName . '_' . time() . '.' . $ext;
            $targetPath = $uploadDir . $fileName;
            echo "<p style='color:orange;'>такий файл існує, нове ім'я: $fileName</p>";
        }

        // переміщення
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $sizeKb = round($file['size'] / 1024, 2);
            
            echo "<h3>успіх :D:</h3>";
            echo "<ul>";
            echo "<li><strong>name:</strong> $fileName</li>";
            echo "<li><strong>type:</strong> {$file['type']}</li>";
            echo "<li><strong>size:</strong> $sizeKb kb</li>";
            echo "</ul>";
            
            // завантажити назад
            echo "<a href='$targetPath' download>завантажити файл назад</a><br><br>";
        } else {
            echo "помилка збереження на сервері<br>";
        }
    } else {
        echo "помилка передачі<br>";
    }
} else {
    echo "неправильний запит<br>";
}

echo "<a href='index.html'>на головну</a>";
?>