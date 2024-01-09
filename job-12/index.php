<?php

include_once 'Clothing.php';
include_once 'Electronic.php';

echo '<h3>Récupérer tous les clothings</h3>';
var_dump(Clothing::findAll());

echo '<h3>Récupérer tous les electronics</h3>';
var_dump(Electronic::findAll());

echo '<h3>Créer un clothing et le récupérer avec son id</h3>';
$clProduct = new Clothing(
    null,
    'T-shirt',
    ['tshirt.jpg'],
    10,
    'Un t-shirt',
    10,
    new DateTime(),
    new DateTime(),
    1,
    'M',
    'Noir',
    'Manche courte',
    1
);
$clProduct = $clProduct->create();
var_dump(Clothing::findOneById($clProduct->getId()));

echo '<h3>Créer un electronic et le récupérer avec son id</h3>';
$elProduct = new Electronic(
    null,
    'Tablette',
    ['tablette.jpg'],
    100,
    'Une tablette',
    10,
    new DateTime(),
    new DateTime(),
    2,
    'Apple',
    10
);
$elProduct = $elProduct->create();
var_dump(Electronic::findOneById($elProduct->getId()));

echo '<h3>Modifier un clothing</h3>';
$clProdToModify = Clothing::findOneById(11);
var_dump($clProdToModify);
$clProdToModify
    ->setPrice(2000)
    ->setColor("bleu");
$clProdToModify = $clProdToModify->update();
var_dump($clProdToModify);

echo '<h3>Modifier un electronic</h3>';
$elProdToModify = Electronic::findOneById(18);
var_dump($elProdToModify);
$elProdToModify
    ->setPrice(20000)
    ->setBrand("Samsung");
$elProdToModify = $elProdToModify->update();
var_dump($elProdToModify);
