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
        
         $stmt->execute([
            $this->getId(), 
            $this->getName(), 
         
           
        ]);
        return $conn->lastInsertId();

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

    public static function getTagsById($name) {
        $conn = Config::connect();         
        $sql = "SELECT id FROM tags WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id'];
    }
    
    
    
}




    


    


$Tages = new Tags(6,"Amir");
var_dump($Tages->getTagsById("Amir")) ;
;

?>
