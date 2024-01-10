<?php

include_once 'vendor/autoload.php';

use App\Clothing;
use App\Electronic;

echo '<h3>Tests</h3>';

$clProduct = Clothing::findOneById(22);
echo 'Stock du Clothing avec l\'id 22 : ' . $clProduct->getQuantity() . '<br>';

$clProduct->addStocks(7);
echo 'Stock du Clothing avec l\'id 22 après ajout de 7 stocks : ' . $clProduct->getQuantity() . '<br>';

$clProduct->removeStocks(3);
echo 'Stock du Clothing avec l\'id 22 après retrait de 3 stocks : ' . $clProduct->getQuantity() . '<br>';

echo '<br />';

$elProduct = Electronic::findOneById(23);
echo 'Stock de l\'Electronic avec l\'id 23 : ' . $elProduct->getQuantity() . '<br>';

$elProduct->addStocks(7);
echo 'Stock de l\'Electronic avec l\'id 23 après ajout de 7 stocks : ' . $elProduct->getQuantity() . '<br>';

$elProduct->removeStocks(3);
echo 'Stock de l\'Electronic avec l\'id 23 après retrait de 3 stocks : ' . $elProduct->getQuantity() . '<br>';
