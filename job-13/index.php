<?php

include_once 'Clothing.php';
include_once 'Electronic.php';

echo '<h3>Test Clothing findOneById</h3>';
var_dump(Clothing::findOneById(14));

echo '<h3>Test Clothing findAll</h3>';
var_dump(Clothing::findAll());

echo '<h3>Test Electronic findOneById</h3>';
var_dump(Electronic::findOneById(19));

echo '<h3>Test Electronic findAll</h3>';
var_dump(Electronic::findAll());
