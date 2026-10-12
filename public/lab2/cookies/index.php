<?php
if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600, '/'); 
    header("Location: index.php");
    exit;
}

//сейв на 7 днів
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    setcookie('username', $username, time() + (7 * 24 * 60 * 60), '/'); 
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>cookies</title></head>
<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <h2>Привіт, <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
        <form method="POST">
            <button type="submit" name="delete_cookie">видалити cookie</button>
        </form>
    <?php else: ?>
        <h2>введіть ім'я</h2>
        <form method="POST">
            <input type="text" name="username" required>
            <button type="submit">зберегти</button>
        </form>
    <?php endif; ?>
    <br><a href="/">назад</a>
</body>
</html>