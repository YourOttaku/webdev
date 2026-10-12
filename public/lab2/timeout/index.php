<?php
session_start();

$timeoutDuration = 5 * 60; // 5 хвилин у секундах

// Перевірка часу неактивності
if (isset($_SESSION['last_activity'])) {
    $elapsedTime = time() - $_SESSION['last_activity'];
    if ($elapsedTime > $timeoutDuration) {
        session_unset();
        session_destroy();
        $timeoutMessage = "Ваша сесія завершилася через неактивність (більше 5 хвилин).";
    }
}

// Оновлення часу останньої активності при кожному завантаженні
$_SESSION['last_activity'] = time();

// Вхід для тестування
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['test_login'])) {
    $_SESSION['test_user'] = htmlspecialchars($_POST['test_login']);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Завдання 5: Тайм-аут</title></head>
<body>
    <h2>Перевірка тайм-ауту сесії</h2>
    <?php if (isset($timeoutMessage)) echo "<h3 style='color:red;'>$timeoutMessage</h3>"; ?>

    <?php if (isset($_SESSION['test_user'])): ?>
        <p>Ви увійшли як: <strong><?= $_SESSION['test_user'] ?></strong></p>
        <p>Час останньої активності: <?= date('H:i:s', $_SESSION['last_activity']) ?></p>
        <p><em>Оновіть сторінку, щоб скинути таймер. Якщо почекати більше 5 хвилин і оновити сторінку, сесія зникне.</em></p>
    <?php else: ?>
        <form method="POST">
            <input type="text" name="test_login" placeholder="Введіть будь-який логін" required>
            <button type="submit">Створити сесію</button>
        </form>
    <?php endif; ?>
</body>
</html>