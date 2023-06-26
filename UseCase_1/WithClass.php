<?php

/*
A basket contains the following things:

Banana's (6 pieces, costing €1 each)
Apples (3 pieces, costing €1.5 each)
Bottles of wine (2 bottles, costing €10 each)
Without using classes, do the following in your code:

Calculate the total price
Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)
USING classes
*/

class Item
{
    private string $name;
    private int $quantity;
    private float $price;

    public function __construct(string $name, int $quantity, float $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getTotalPrice(): float
    {
        return $this->quantity * $this->price;
    }
}

class Fruit extends Item
{
    private float $taxRate;

    public function __construct(string $name, int $quantity, float $price, float $taxRate)
    {
        parent::__construct($name, $quantity, $price);
        $this->taxRate = $taxRate;
    }

    public function getTaxAmount(): float
    {
        return $this->getTotalPrice() * $this->taxRate;
    }
}

class Wine extends Item
{
    private float $taxRate;

    public function __construct(string $name, int $quantity, float $price, float $taxRate)
    {
        parent::__construct($name, $quantity, $price);
        $this->taxRate = $taxRate;
    }

    public function getTaxAmount(): float
    {
        return $this->getTotalPrice() * $this->taxRate;
    }
}

// Create items
$bananas = new Fruit("Bananas", 6, 1, 0.06);
$apples = new Fruit("Apples", 3, 1.5, 0.06);
$wineBottles = new Wine("Bottles of Wine", 2, 10, 0.21);

// Calculate total price
$totalPrice = $bananas->getTotalPrice() + $apples->getTotalPrice() + $wineBottles->getTotalPrice();

// Calculate total tax
$totalTax = $bananas->getTaxAmount() + $apples->getTaxAmount() + $wineBottles->getTaxAmount();

echo "Total Price: €" . $totalPrice . "\n";
echo "Total Tax: €" . $totalTax . "\n";

?>