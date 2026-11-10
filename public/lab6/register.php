<?php
require_once 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //хешування 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // запит для запобігання SQL ін'єкціям
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
        $message = "<p style='color:green;'>реєстрація успішна :D <a href='login.php'>Увійти</a></p>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $message = "<p style='color:red;'>аккаунт з таким ім'ям або email вже існує</p>";
        } else {
            $message = "<p style='color:red;'>error: " . $e->getMessage() . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>реєстрація</title></head>
<body>
    <h2>форма реєстрації</h2>
    <?= $message ?>
    <form method="POST" action="register.php">
        <label>ім'я аккаунту:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>пароль:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">створити аккаунт</button>
    </form>
    <br>
    <a href="login.php">маєте акаунт? увійти тут</a>
</body>
</html>