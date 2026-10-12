<?php
session_start();

$pastPurchases = isset($_COOKIE['past_purchases']) ? json_decode($_COOKIE['past_purchases'], true) : [];
//додавання 
if (isset($_POST['add_item']) && !empty($_POST['item_name'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = htmlspecialchars(trim($_POST['item_name']));
    header("Location: index.php");
    exit;
}

//оформлення
if (isset($_POST['checkout']) && !empty($_SESSION['cart'])) {
    $pastPurchases = array_merge($pastPurchases, $_SESSION['cart']);
    // Зберігаємо історію на 30 днів
    setcookie('past_purchases', json_encode($pastPurchases), time() + (30 * 24 * 3600), '/'); 
    unset($_SESSION['cart']); // Очищаємо поточну корзину
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head><meta charset="UTF-8"><title>Зcookie_session</title></head>
<body>
    <h2>корзина</h2>
    <form method="POST">
        <input type="text" name="item_name" placeholder="Назва товару" required>
        <button type="submit" name="add_item">додати в корзину</button>
    </form>

    <hr>
    <h3>моя корзина</h3>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item) echo "<li>$item</li>"; ?>
        <?php else: ?>
            <li>нічо :(</li>
        <?php endif; ?>
    </ul>
    <?php if (!empty($_SESSION['cart'])): ?>
        <form method="POST"><button type="submit" name="checkout">оформити замовлення</button></form>
    <?php endif; ?>

    <hr>
    <h3>попередні покупки</h3>
    <ul>
        <?php if (!empty($pastPurchases)): ?>
            <?php foreach ($pastPurchases as $item) echo "<li>$item</li>"; ?>
        <?php else: ?>
            <li>нічо не куплено :(</li>
        <?php endif; ?>
    </ul>
</body>
</html>