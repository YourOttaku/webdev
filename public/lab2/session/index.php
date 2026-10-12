<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Обробка входу
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'], $_POST['password'])) {
    // 
    if ($_POST['login'] === 'dr.house' && $_POST['password'] === '1234') {
        $_SESSION['user'] = $_POST['login'];
        header("Location: index.php");
        exit;
    } else {
        $error = "невірний логін/пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>session</title></head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <h2>опа, <?= htmlspecialchars($_SESSION['user']) ?> вхід успішний</h2>
        <a href="?logout=1"><button>вийти</button></a>
    <?php else: ?>
        <h2>форма входу</h2>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            логін: <input type="text" name="login" required><br><br>
            пароль: <input type="password" name="password" required><br><br>
            <button type="submit">увійти</button>
        </form>
    <?php endif; ?>
</body>
</html>