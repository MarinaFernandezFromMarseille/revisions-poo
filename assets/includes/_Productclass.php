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
    private $category_id;

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
