<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    public const MIN_BALANCE = 0; // Мінімальний баланс
    
    protected $balance;
    protected $currency;

    public function __construct($currency = "UAH", $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            //виняток якщо сума <=0
            throw new Exception("некоректна сума: поповнення має бути більшим за нуль");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            //виняток некорректної суми
            throw new Exception("некоректна сума: зняття має бути більшим за нуль");
        }
        if (($this->balance - $amount) < self::MIN_BALANCE) {
            //виняток якщо сума > рахунку
            throw new Exception("недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getCurrency() {
        return $this->currency;
    }
}
?>