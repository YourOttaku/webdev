<?php
session_start();
require_once 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    #підготовлений запит для пошуку юзера
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    # перевірка наявності аккаунта та збігу пароля
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        # перенаправлення на захищену сторінку
        header("Location: welcome.php");
        exit;
    } else {
        $message = "<p style='color:red;'>невірне ім'я користувача або пароль</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>авторизація</title></head>
<body>
    <h2>форма входу</h2>
    <?= $message ?>
    <form method="POST" action="login.php">
        <label>ім'я аккаунту:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>пароль:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">login</button>
    </form>
    <br>
    <a href="register.php">немає аккаунту? створіть тут</a>
</body>
</html>