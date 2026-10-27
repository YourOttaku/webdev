<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>ооопа</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; background: #ffe6e6; padding: 5px; border-left: 4px solid red; }
        .box { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; background: #f9f9f9; }
    </style>
</head>
<body>
    <h2>тест банківської системи</h2>

    <?php
    require_once 'BankAccount.php';
    require_once 'SavingsAccount.php';

    echo "<div class='box'>";
    echo "<h3>звич. рахунок (bank)</h3>";
    
    $account1 = new BankAccount("USD", 27400);
    echo "<p>створено рахунок, баланс: {$account1->getBalance()} {$account1->getCurrency()}</p>";

    try {
        echo "<p>спроба поповнити на 500$...</p>";
        $account1->deposit(500);
        echo "<p class='success'>процедура успішна, новий баланс: {$account1->getBalance()} {$account1->getCurrency()}</p>";

        echo "<p>спроба зняти 2000$...</p>";
        $account1->withdraw(2000); 
        echo "<p class='success'>процедура успішна, баланс: {$account1->getBalance()} {$account1->getCurrency()}</p>";
    } catch (Exception $e) {
        //недостатньо коштів
        echo "<p class='error'>помилка операції: " . $e->getMessage() . "</p>";
    }
    echo "</div>";


    echo "<div class='box'>";
    echo "<h3>накопич. рахунок (savings)</h3>";
    
    $savings = new SavingsAccount("EUR", 1326);
    echo "<p>створено рахунок, баланс: {$savings->getBalance()} {$savings->getCurrency()}</p>";
    echo "<p>поточна відсоткова ставка: " . (SavingsAccount::$interestRate * 100) . "%</p>";

    try {
        echo "<p>спроба нарахувати відсотки...</p>";
        $earned = $savings->applyInterest();
        echo "<p class='success'>відсотки нараховано (+{$earned}€), баланс: {$savings->getBalance()} {$savings->getCurrency()}</p>";

        echo "<p>спроба поповнити на від'ємну суму (-100€)...</p>";
        $savings->deposit(-100); 
    } catch (Exception $e) {
        // некорректна сума
        echo "<p class='error'>Помилка операції: " . $e->getMessage() . "</p>";
    }
    echo "</div>";
    ?>
</body>
</html>