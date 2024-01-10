<?php

include_once 'Clothing.php';
include_once 'Electronic.php';

echo '<h3>Object Clothing initiale</h3>';
$clProduct = Clothing::findOneById(22);
echo "Quantity: " . $clProduct->getQuantity() . "<br>";

echo '<h3>Après appel de la méthode addStocks(10)</h3>';
$clProduct->addStocks(10);
echo "Quantity: " . Clothing::findOneById(22)->getQuantity();

echo '<h3>Après appel de la méthode removeStocks(5)</h3>';
$clProduct->removeStocks(5);
echo "Quantity: " . Clothing::findOneById(22)->getQuantity();

echo '<h3>Object Electronic initiale</h3>';
$elProduct = Electronic::findOneById(23);
echo "Quantity: " . $elProduct->getQuantity() . "<br>";

echo '<h3>Après appel de la méthode addStocks(10)</h3>';
$elProduct->addStocks(10);
echo "Quantity: " . Electronic::findOneById(23)->getQuantity();

echo '<h3>Après appel de la méthode removeStocks(5)</h3>';
$elProduct->removeStocks(5);
echo "Quantity: " . Electronic::findOneById(23)->getQuantity();
