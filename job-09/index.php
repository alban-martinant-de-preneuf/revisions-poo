<?php

include_once 'Product.php';

$product = new Product(
    null,
    'T-shirt',
    ['t-shirt.jpg'],
    1000,
    'Un t-shirt très jolie',
    10,
    new DateTime(),
    new DateTime(),
    1
);

$product = $product->create();

echo "Le produit a été enregistré en bdd avec l'id : " . $product->getId() . "<br>";
var_dump($product);
