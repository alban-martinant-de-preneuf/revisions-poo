<?php

include_once 'Product.php';

$db = new PDO(
    'mysql:host=localhost;dbname=draft-shop;charset=utf8',
    'root',
    ''
);

$query = 'SELECT * FROM product WHERE id = 7';

$statement = $db->query($query);

$result = $statement->fetch(PDO::FETCH_ASSOC);

$product = new Product(
    $result['id'],
    $result['name'],
    json_decode($result['photos']),
    $result['price'],
    $result['description'],
    $result['quantity'],
    new DateTime($result['created_at']),
    new DateTime($result['updated_at']),
    $result['category_id']
);

echo "La catégorie du produit 7 est : " . $product->getCategory()->getName() . "<br />";
echo "Les produits de la catégorie " . $product->getCategory()->getName() . " sont : <br />";
var_dump($product->getCategory()->getProducts());
