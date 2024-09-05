<?php



class Category
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct($id = null, $name = null, $description = null, DateTime $createdAt = null, DateTime $updatedAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->updatedAt = $updatedAt;
    }

    // Getters and setters...

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return (string) $this->name;
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
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null;
    }

    public function setUpdatedAt(DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt ?? new DateTime();
    }

    // Méthode pour récupérer les produits de la catégorie
    public function getProducts(PDO $pdo)
    {
        // Initialisation d'un tableau vide pour les produits
        $products = [];

        // Préparation de la requête pour récupérer les produits liés à cette catégorie
        $query = "SELECT * FROM products WHERE category_id = :category_id";
        $stmt = $pdo->prepare($query);

        // Liaison de l'ID de la catégorie à la requête
        $stmt->bindParam(':category_id', $this->id, PDO::PARAM_INT);

        // Exécution de la requête
        $stmt->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $productRows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si des produits sont trouvés, on crée des instances de la classe products
        foreach ($productRows as $row) {
            $products[] = new products(
                $row['id'],
                $row['name'],
                json_decode($row['photos'], true), // On suppose que les photos sont stockées sous forme de tableau JSON
                $row['description'],
                $row['quantity'],
                new DateTime($row['createdAt']),
                isset($row['updatedAt']) ? new DateTime($row['updatedAt']) : null,
                $row['category_id']
            );
        }

        // Retourner le tableau de produits (vide si aucun produit n'est trouvé)
        return $products;
    }
}


