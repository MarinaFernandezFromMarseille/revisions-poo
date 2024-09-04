<?php

class products
{
    private $id;
    private $name;
    private $photos = [];
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    public $category_id;



    public function getCategory(){
        return $this->category_id;
    }



    // Constructeur avec tous les paramètres optionnels
    public function __construct($id = null, $name = null, $photos = [], $description = null, $quantity = 0, DateTime $createdAt = null, DateTime $updatedAt = null, $category_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt ?? new DateTime(); // Date actuelle par défaut si non fournie
        $this->updatedAt = $updatedAt;
        $this->category_id = $category_id;
    }

    // Getters and setters
    // id getter
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
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null;
    }

    public function setUpdatedAt(DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt ?? new DateTime(); // Date actuelle par défaut si non fournie
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
    $category_id = $products[0]['category_id'];

    echo ($category_id);



}catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

    ?>

    
</body>
</html>