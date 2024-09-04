<?php
class Category
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    // Constructeur avec tous les paramètres optionnels
    public function __construct($id = null, $name = null, $description = null, DateTime $createdAt = null, DateTime $updatedAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt ?? new DateTime(); // Créé l'heure actuelle si non fournie
        $this->updatedAt = $updatedAt;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int) $id;
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
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt ? $this->updatedAt->format('Y-m-d H:i:s') : null;
    }

    public function setUpdatedAt()
    {
        $this->updatedAt = new DateTime(); // Définit l'heure actuelle
    }
}
?>

