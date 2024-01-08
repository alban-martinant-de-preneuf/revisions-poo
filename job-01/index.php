<?php

include_once 'Product.php';

$product = new Product(
    1,
    'T-shirt',
    [
        'https://photo.com/1',
        'https://photo.com/2'
    ],
    15,
    'T-shirt bleu',
    10,
    new DateTime('2021-01-01'),
    new DateTime('2021-01-01')
);

function dumpProduct(Product $product): void
{
    var_dump($product->getId());
    var_dump($product->getName());
    var_dump($product->getPhotos());
    var_dump($product->getPrice());
    var_dump($product->getDescription());
    var_dump($product->getQuantity());
    var_dump($product->getCreatedAt());
    var_dump($product->getUpdatedAt());
}

echo 'avant modification' . PHP_EOL;
dumpProduct($product);

$product->setId(2);
$product->setName('pantalon');
$product->setPhotos([
    'https://photo.com/3',
    'https://photo.com/4'
]);
$product->setPrice(20);
$product->setDescription('pantalon rouge');
$product->setQuantity(5);
$product->setUpdatedAt(new DateTime('2021-01-02'));

echo 'après modification' . PHP_EOL;
dumpProduct($product);
