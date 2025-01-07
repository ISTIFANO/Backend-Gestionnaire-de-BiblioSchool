<?php

use App\models\Config;
include("../../config/config.php");

class Categories {
    private $id;
    private $name;
    private $created_at;
    private $connexion; 

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = date('Y-m-d H:i:s'); 
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function __toString() {
        return "Category ID: {$this->id} || Name: {$this->name} || Created At: {$this->created_at}";
    }

    public function saveCategory() {
        $conn = Config::connect();
        
        $sql = "INSERT INTO categories (name, created_at) 
                VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            $this->getName(), 
            $this->getCreatedAt()
        ]);

        return $conn->lastInsertId();
    }

    public function updateCategory() {
        $conn = Config::connect(); 
        $sql = "UPDATE categories 
                SET name = ?, created_at = ?
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->getName(), 
            $this->getCreatedAt(), 
            $this->getId()
        ]);
    }

    public function deleteCategory() {
        $conn = Config::connect();      
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$this->getId()]);
    }

    public static function getAllCategories() {
        $conn = Config::connect();    
        $sql = "SELECT * FROM categories";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCategoryByName($name) {
        $conn = Config::connect();         
        $sql = "SELECT id FROM categories WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
       
        return $result ? $result['id'] : null;
    }
}

$category = new Categories(null, " miltafizi9a");
$category->saveCategory();
echo $category;  
?>
