<?php

/*
Consider the same basket as in use case 1. The shop owner wants to have a way to have 50% off every fruit. Can you find a way to implement the discount once, and re-use it efficiently for every fruit?
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
    private static float $discountRate = 0.5; // Static property for the discount rate

    public function __construct(string $name, int $quantity, float $price, float $taxRate)
    {
        parent::__construct($name, $quantity, $price);
        $this->taxRate = $taxRate;
    }

    public function getTaxAmount(): float
    {
        return $this->getTotalPrice() * $this->taxRate;
    }

    public function getDiscountedPrice(): float
    {
        return $this->getTotalPrice() * (1 - self::$discountRate); // Apply the discount
    }

    public static function setDiscountRate(float $rate): void
    {
        self::$discountRate = $rate; // Update the discount rate
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

// Apply discount to fruits
Fruit::setDiscountRate(0.5); // Set the discount rate for fruits

// Calculate total price
$totalPrice = $bananas->getDiscountedPrice() + $apples->getDiscountedPrice() + $wineBottles->getTotalPrice();

// Calculate total tax
$totalTax = $bananas->getTaxAmount() + $apples->getTaxAmount() + $wineBottles->getTaxAmount();

echo "Total Price: €" . $totalPrice . "\n";
echo "Total Tax: €" . $totalTax . "\n";

?>
