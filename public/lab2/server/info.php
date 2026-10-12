<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>інформація про сервер</title></head>
<body>
    <h2>дані до server</h2>
    <ul>
        <li><strong>ip-адреса:</strong> <?= htmlspecialchars($_SERVER['REMOTE_ADDR']) ?></li>
        <li><strong>браузер:</strong> <?= htmlspecialchars($_SERVER['HTTP_USER_AGENT']) ?></li>
        <li><strong>скрипт:</strong> <?= htmlspecialchars($_SERVER['PHP_SELF']) ?></li>
        <li><strong>метод запиту:</strong> <?= htmlspecialchars($_SERVER['REQUEST_METHOD']) ?></li>
        <li><strong>шлях до файлу:</strong> <?= htmlspecialchars($_SERVER['SCRIPT_FILENAME']) ?></li>
    </ul>
    <a href="index.php">назад</a>
</body>
</html>