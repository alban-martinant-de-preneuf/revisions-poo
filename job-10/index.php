<?php

include_once 'Product.php';

$product = new Product(
    null,
    'Jean rouge',
    ['jean-rouge.jpg'],
    9099,
    'Un jean rouge très jolie',
    10,
    new DateTime(),
    new DateTime(),
    2
);

$product = $product->create();
$idProduct = $product->getId();

echo "Le produit a été enregistré en bdd avec l'id : " . $idProduct . "<br>";
var_dump(Product::findOneById($idProduct));

$product->setName('Jean bleu')->setQuantity(24)->setDescription('Un jean bleu très jolie');

$product->update();

echo "Le produit a été mis à jour : <br>";
var_dump(Product::findOneById($idProduct));
