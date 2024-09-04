<?php

include 'includes/_Productclass.php';
$product1 = new products (1,'gourde',"https://www.sistersastro.com/cdn/shop/products/GOURDE_STRASS_XL_ROSE1_200x200_crop_center.jpg?v=1665225633", "gourde rose girly à strass 700ml", 10, new DateTime('2024-09-03 15:51:06'), new DateTime('2024-09-03 15:51:06'), 0);


include 'includes/_Categoryclass.php';
$category1 = new Category (0, 'Maison et Cuisine','objets du quotidien, ustensiles de cuisine, déco, ameublement', new DateTime('2024-09-03 16:06:53'), new DateTime('2024-09-03 16:06:53'));

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

    $sql = "SELECT * FROM products WHERE id = 7";
    $stmt = $pdo->query($sql);

    // Récupération des résultats
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Initialisation du tableau associatif
    $tableauAssociatif = [];

    foreach ($products as $product) {

        $tableauAssociatif[$product['id']] = [
            'name' => $product['name'],
            'description' => $product['description'],
            'photos' => $product['photos'],
            'quantity' => $product['quantity'],
            'category_id' => $product['category_id'],
            'createdAt' => $product['createdAt'],
            'updatedAt' => $product['updatedAt']
        ];
    }

    // Affichage du tableau associatif
    echo "<pre>";
    print_r($tableauAssociatif); // Affichage structuré pour mieux voir le tableau associatif
    echo "</pre>";
} catch (PDOException $e) {
    // En cas d'erreur, on affiche un message
    echo "Erreur : " . $e->getMessage();
}


?>
    
</body>
</html>