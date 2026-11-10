<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>молодця</title></head>
<body>
    <h2><img src="congratulations-evangelion.gif" alt="Вітаємо!" width="512"></h2>
    <p>вхід успішний від: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
    
    <p>якщо ви тут значить все працює</p>
    
    <form method="POST" action="logout.php">
        <button type="submit">вийти з акаунта</button>
    </form>
</body>
</html>