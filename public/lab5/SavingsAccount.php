<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    // відсоткова ставка (0.05 = 5%)
    public static $interestRate = 0.05; 

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        return $interest;
    }
}
?>