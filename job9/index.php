<?php

include './includes/_Categoryclass.php'; //categoryclass's file has been updtated
include './includes/_Productclass.php'; //productclass's file has been updtated

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Connexion à la base de données
    $dsn = "mysql:host=localhost;dbname=draft_shop";
    $pdo = new PDO($dsn, 'root', '');

    $product = new products();
    $foundProducts = $product->getAll();

    if ($foundProducts) {
        foreach ($foundProducts as $foundProduct) {
            echo "Product ID: " . $foundProduct['id'];
            echo "<br>";
            echo "Product Name: " . $foundProduct['name'];
            echo "<br>";
            echo "Product Description: " . $foundProduct['description'];
            echo "<br>";
            echo "Product Quantity: " . $foundProduct['quantity'];
            echo "<br>";
            echo "Product Created At: " . $foundProduct['createdAt'];
            echo "<br>";
            echo "Product Updated At: " . $foundProduct['updatedAt'];
            echo "<br><br>";
        }
    } else {
        echo "Aucun produit n'a été trouvé.";
    }

    ?>
