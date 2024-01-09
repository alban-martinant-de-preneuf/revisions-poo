<?php

include_once 'Clothing.php';
include_once 'Electronic.php';

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

$elProduct = new Electronic(
    null,
    'Ordinateur',
    ['ordi.jpg'],
    999,
    'Un ordinateur puissant',
    10,
    new DateTime(),
    new DateTime(),
    null,
    'Asus',
    10
);

echo "Le produit Clothing "
    . $clProduct->getName()
    . " a été créé, il est de couleur "
    . $clProduct->getColor() .
    " et de taille "
    . $clProduct->getSize()
    . "<br>";

echo "Le produit Electronic "
    . $elProduct->getName()
    . " a été créé, il est de marque "
    . $elProduct->getBrand()
    . "<br>";
