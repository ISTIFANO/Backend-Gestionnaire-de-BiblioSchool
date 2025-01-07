<?php

use App\models\Config;
include("../../config/config.php");

class Categories {
    private $id;
    private $name;
    private $created_at;

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

    public  function getAllCategories() {
        $conn = Config::connect();    
        $sql = "SELECT * FROM categories";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

   
//     public static function getCategoryByName($name) {
//         $conn = Config::connect();         
//         $sql = "SELECT *FROM categories WHERE Name = "."'".$name."'";
//         // echo  $sql;
//         $stmt = $conn->prepare($sql);
//         $stmt->execute();
//             // $result = $stmt->fetch(PDO::FETCH_ASSOC);
// // var_dump($result);
//             return  $conn->lastInsertId();
//     }
public static function getCategoryByName($name) {
    $conn = Config::connect();         
    $sql = "SELECT id FROM categories WHERE Name = '$name'";
    $stmt = $conn->prepare($sql);
    print_r($stmt) ;
    $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result['id']);

        return $result['id'];
}

    
    
}

$category = new Categories(null, "ismail");
// $category->getCategoryByName("Flipo");
//  $category->getCategoryByName("ismail");

// var_dump($category->getCategoryByName("ismail"));
// var_dump( $category);

?>
