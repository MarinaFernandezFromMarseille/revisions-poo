<?php

class Product {
    private $id;
    private $name;
    private $photos = [];
    private $description;
    private $quantity;

    private $createdAt;
    private $updatedAt;

    public function __construct($id, $name, $photos, $description, $quantity, DateTime $createdAt, DateTime $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    //getters and setters
    //id getter

    public function getId() {
        return $this->id;
       

    }

    public function getName() {
        return $this->name;
    }

    public function getPhotos() {
        return $this->photos;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
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
    
</body>
</html>