<?php

include_once 'vendor/autoload.php';

use App\Clothing;

$clProduct = new Clothing(
    1000, // id qui n'existe pas pour tester
    'T-Shirt',
    ['tshirt.jpg'],
    100,
    'This is a T-Shirt',
    10,
    new DateTime('2021-01-01 00:00:00'),
    new DateTime('2021-01-01 00:00:00'),
    1,
    'M',
    'Black',
    'T-Shirt',
    10
);

echo '<h3>Créer le produit : </h3>';
var_dump($clProduct->save());

echo 'Un id a été généré au moment de l\'insertion : ' . $clProduct->getId() . '<br>';

echo '<h3>Modifier le produit et le sauvegarder : </h3>';
$clProduct->setName('T-Shirt 2');
$clProduct->setPrice(200);
$clProduct->setQuantity(20);

var_dump($clProduct->save());
