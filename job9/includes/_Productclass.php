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

    public $dbname = "draft_shop";

    public $dbpass = "";

    public $dbuser = "root";

    public $dbhost = "localhost";




    public function getCategory()
    {
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

    public function findOneById(int $id): self|bool
    {
        // Requête SQL avec un paramètre préparé
        $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";

        $pdo = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8', $this->dbuser, $this->dbpass);
        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Lier le paramètre :id à la variable $id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();

        // Récupérer le résultat sous forme de tableau associatif
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si le produit est trouvé
        if ($result) {
            // Hydrater l'instance courante avec les données récupérées
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->description = $result['description'];
            $this->quantity = $result['quantity'];
            $this->createdAt = new DateTime($result['createdAt']);
            $this->updatedAt = $result['updatedAt'] ? new DateTime($result['updatedAt']) : null;
            $this->category_id = $result['category_id'];

            // Retourner l'instance actuelle du produit
            return $this;
        }

        // Si aucune ligne n'est trouvée, retourner false
        return false;
    }

    public function getAll()
    {
        // Requête SQL sans paramètre
        $sql = "SELECT * FROM products";

        $pdo = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8', $this->dbuser, $this->dbpass);
        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Exécuter la requête
        $stmt->execute();

        // Récupérer le résultat sous forme de tableau associatif
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si des produits sont trouvés
        if ($result) {
            // Retourner le tableau des produits
            return $result;
        }

        // Si aucun produit n'est trouvé, retourner un tableau vide
        return [];
    }
}
