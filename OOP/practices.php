<?php
/*abstract class Shape
{
    abstract public function area();
}

class Circle
{
    private $radius;

    public function __construct($r)
    {
        $this->radius = $r;
    }

    public function area()
    {
        return 3.1416 * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo "Circle Area: " . $circle->area(); */


class BankAccount
{
    private $balance;

    public function __construct($initialBalance)
    {
        $this->balance = $initialBalance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        } else {
            echo "Invalid amount";
        }
    }
}

$account = new BankAccount(1000);
$account->deposit(500);
echo $account->getBalance();
