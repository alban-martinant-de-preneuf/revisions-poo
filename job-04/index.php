<?php

include 'Product.php';

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

var_dump($product);
