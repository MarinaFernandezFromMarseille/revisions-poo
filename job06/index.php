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

// Instancier une catégorie avec un ID (par exemple, ID 1)
$category = new Category(3, "Maquillage et beauté", "maquillage, soins de la peau, soins du corps, faux ongles, soin des cheveux, manucure", new DateTime('2024-09-04 11:19:29'), new DateTime('2024-09-04 11:19:29'));

// Récupérer les produits de cette catégorie
$products = $category->getProducts($pdo);

// Afficher les produits récupérés
if (!empty($products)) {
    foreach ($products as $product) {
        echo "Product ID: " . $product->getId() . "<br>";
        echo "Product Name: " . $product->getName() . "<br>";
        echo "Quantity: " . $product->getQuantity() . "<br>";
        echo "Created At: " . $product->getCreatedAt() . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucun produit trouvé pour cette catégorie.";
}
?>


    
</body>
</html>
