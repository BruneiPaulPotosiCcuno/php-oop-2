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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Negozio di animali</title>
</head>
<body>
    <header>
        <h1 class="text-center">Negozio di animali</h1>
    </header>
    <main>
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#all-tab" role="tab" aria-controls="all" aria-selected="true">Tutti i prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#food-tab" role="tab" aria-controls="food" aria-selected="false">Cibo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#game-tab" role="tab" aria-controls="game" aria-selected="false">Giochi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kennel-tab" role="tab" aria-controls="kennel" aria-selected="false">Cucce</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-tab" role="tabpanel" aria-labelledby="all-tab">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-md-4">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product->name; ?></h5>
                                        <p class="card-text">Prezzo: <?php echo $product->price; ?> Euro</p>
                                        <p class="card-text">Categoria: <?php echo $product->category->name; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="food-tab" role="tabpanel" aria-labelledby="food-tab">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <?php if(get_class($product) === 'Food') { ?>
                                <div class="col-md-4">
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                                            <p class="card-text">Prezzo: <?php echo $product->price; ?> Euro</p>
                                            <p class="card-text">Categoria: <?php echo $product->category->name; ?></p>
                                            <p class="card-text">Ingredienti: <?php echo implode(', ', $product->ingredients); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="game-tab" role="tabpanel" aria-labelledby="game-tab">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <?php if(get_class($product) === 'Game') { ?>
                                <div class="col-md-4">
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                                            <p class="card-text">Prezzo: <?php echo $product->price; ?> Euro</p>
                                            <p class="card-text">Categoria: <?php echo $product->category->name; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="kennel-tab" role="tabpanel" aria-labelledby="kennel-tab">
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <?php if(get_class($product) === 'Kennel') { ?>
                                <div class="col-md-4">
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                                            <p class="card-text">Prezzo: <?php echo $product->price; ?> Euro</p>
                                            <p class="card-text">Categoria: <?php echo $product->category->name; ?></p>
                                            <?php if(isset($product->size)) { ?>
                                                <p class="card-text">Dimensione: <?php echo $product->size; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NMJRhg+YAv0+C7SViAhtfm05mD8qkwlbdyN19aUmemrb4a" crossorigin="anonymous"></script>
</body>
</html>