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
$foundProduct = $product->findOneById(7);

if ($foundProduct) {
    echo "Produit trouvé : " . $foundProduct->getName();
} else {
    echo "Produit non trouvé.";
}


?>


    
</body>
</html>
