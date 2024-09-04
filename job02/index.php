<?php

class Product
{
    private $id;
    private $name;
    private $photos = [];
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $category_id;

    public function __construct($id, $name, $photos, $description, $quantity, DateTime $createdAt, DateTime $updatedAt, $category_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->category_id = $category_id;
    }

    //getters and setters
    //id getter

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhotos()
    {
        return $this->photos;
    }
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }
}


class Category
{

    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($id, $name, $description, DateTime $createdAt, DateTime $updatedAt)
    {

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    //getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id = (int) $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt()
    {
        $this->updatedAt = date("Y-m-d H:i:s");
    }
}


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
    $dbname = 'job02'; // Le nom de la base de données
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
    
</body>
</html>