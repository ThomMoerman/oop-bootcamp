<?php

/*
A basket contains the following things:

Banana's (6 pieces, costing €1 each)
Apples (3 pieces, costing €1.5 each)
Bottles of wine (2 bottles, costing €10 each)
Without using classes, do the following in your code:

Calculate the total price
Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)
WITHOUT using classes
*/

$bananaQuantity = 6;
$bananaPrice = 1;

$appleQuantity = 3;
$applePrice = 1.5;

$wineQuantity = 2;
$winePrice = 10;

$fruitTaxRate = 0.06;
$wineTaxRate = 0.21;

$totalPrice = ($bananaQuantity * $bananaPrice) + ($appleQuantity * $applePrice) + ($wineQuantity * $winePrice);

$fruitTax = ($bananaQuantity * $bananaPrice * $fruitTaxRate) + ($appleQuantity * $applePrice * $fruitTaxRate);
$wineTax = $wineQuantity * $winePrice * $wineTaxRate;

$totalTax = $fruitTax + $wineTax;

echo "Total Price: €" . $totalPrice . "\n";
echo "Total Tax: €" . $totalTax . "\n";

?>