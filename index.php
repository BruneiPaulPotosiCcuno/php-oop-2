<?php


require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';
require_once __DIR__ . '/Models/Game.php';
require_once __DIR__ . '/Models/Kennel.php';
require_once __DIR__ . '/Models/Category.php';

$dogs = new Category('Cani', 'https://picsum.photos/200/300');
$cats = new Category('Felini', 'https://picsum.photos/200/300');

$collare = new Product('Collare in pelle', 19.99, $dogs);


$crocchette = new Food('Crocchette Premium', 24.50, $dogs, ['pollo', 'riso']);
$crocchette->description = 'Le crocchette più nutrienti e deliziose';


$pallina = new Game('Pallina Interattiva', 9.99, $cats);


$luxuryImperialKennel = new Kennel('Cuccia Regale', 899.00, $cats);
$luxuryImperialKennel->size = 8;

$products = [
    $collare,
    $crocchette,
    $pallina,
    $luxuryImperialKennel
];

?>


<!-- //template -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

</body>
</html>