<?php
// namespace App\models;
use App\models\Config; 
include("../../config/config.php");
class Tags{
    private $id;
    private $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getId() {
        return $this->id; 
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function __toString() {
        return "Tag ID: {$this->id} || Name: {$this->name}"; 
    }

    public function saveTags() {
        $conn = Config::connect();
        
        $sql = "INSERT INTO tags (id,name) 
                VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            $this->getId(), 
            $this->getName(), 
         
           
        ]);
    }

    public function updateTags() {
        $conn = Config::connect(); 
        $sql = "UPDATE tags 
                SET name=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->getId(), 
            $this->getName(), 
         
           
        ]);
    }

    public function deleteTags() {
        $conn = Config::connect();      
        $sql = "DELETE FROM tags WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$this->getId()]);
    }

    public static function getAllTags() {
        $conn = Config::connect();    
        $sql = "SELECT * FROM tags";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTagsById($id) {
        $conn = Config::connect();         
        $sql = "SELECT * FROM tags WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}




    


    


// $Tages = new Tags(3,"9or2an");
// $Tages->getTagsById(3);

// var_dump($Tages)

?>
