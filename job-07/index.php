<?php

include_once 'Product.php';

echo "Voici le produit avec l'id 7 : <br>";
var_dump(Product::findOneById(7));
