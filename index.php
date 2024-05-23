<?php
require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';
require_once __DIR__ . '/Models/Game.php';
require_once __DIR__ . '/Models/Kennel.php';
require_once __DIR__ . '/Models/Category.php';
https://source.unsplash.com/random/200x300?dog

$dogs = new Category('Cani', 'https://source.unsplash.com/random/200x300?dog');
$cats = new Category('Gatti', 'https://placekitten.com/200/300');

$collare = new Product('Collare', 9.99, $dogs);
$crocchette = new Food('Crocchette', 12.00, $dogs, ['carne', 'carote']);
$crocchette->description = 'Le crocchette più buone del mondo';
$pallina = new Game('Pallina', 4.99, $cats);
$luxuryImperialKennel = new Kennel('Cuccia Luxury Imperial', 1100.00, $cats);
$luxuryImperialKennel->size = 5;

$products = [
    $collare,
    $crocchette,
    $pallina,
    $luxuryImperialKennel
];
?>

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
        <h1 class="text-center my-4">Negozio di animali</h1>
    </header>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($products as $product) { ?>
                    <?php $className = get_class($product); ?>
                    <?php $productType = 'Prodotto generico'; ?>
                    <?php if($className === 'Food') { $productType = 'Cibo'; } ?>
                    <?php if($className === 'Game') { $productType = 'Gioco'; } ?>
                    <?php if($className === 'Kennel') { $productType = 'Cuccia'; } ?>
                    <div class="col">
                        <div class="card h-100">
                        <div class="card-text">Categoria: <?php echo $product->category->name; ?> <img src="<?php echo $product->category->image; ?>"></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <?php if($product->description) { ?>
                                    <p class="card-text"><?php echo $product->description; ?></p>
                                <?php } ?>
                                <p class="card-text">Prezzo: <?php echo $product->price; ?> Euro</p>
                                <p class="card-text">Tipo di prodotto: <?php echo $productType ?></p>
                                <p class="card-text">Categoria: <?php echo $product->category->name; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NMJRhg+YAv0+C7SViAhtfm05mD8qkwlbdyN19aUmemrb4a" crossorigin="anonymous"></script>
</body>
</html>