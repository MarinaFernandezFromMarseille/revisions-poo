<?php
include ('assets/includes/_Productclass.php');
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

try {
    // Connexion à la base de données
    $host = 'localhost'; // L'adresse du serveur de la base de données
    $dbname = 'draft_shop'; // Le nom de la base de données
    $username = 'root'; // Le nom d'utilisateur de la base de données
    $password = ''; // Le mot de passe de la base de données

    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurer PDO pour afficher les erreurs en mode Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT category_id FROM products WHERE id = 7";
    $stmt = $pdo->query($sql);

    // Récupération des résultats
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    $category_id = $products[0]['category_id']; // On récupère la valeur de getCategory_id()

    echo ($category_id);



}catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

    ?>

    
</body>
</html>