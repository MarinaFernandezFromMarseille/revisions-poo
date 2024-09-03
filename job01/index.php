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

    public function __construct($id, $name, $photos, $description, $quantity, DateTime $createdAt, DateTime $updatedAt)
    {
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
}

$gourde = new Product (1, 'Gourde à  strass', ["https://img.ltwebstatic.com/images3_spmp/2024/03/01/b9/170928133826ff7d10ef4ee44ac2aa8cff5e58d64f_thumbnail_720x.webp"], 'Gourde girly à strass', 10, new DateTime('2020-02-02'), new DateTime('2024-03-02'));
var_dump($gourde);
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