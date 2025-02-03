<?php
use App\models\Config; 
include_once("../../config/config.php");


class Role{
    private $id;
    private $type;
    private $description;
        
    public function __construct()
    {
        
    }
    
    public function setFullRole($id,$type, $description) {
        $this->id = $id;
        $this->type = $type;
        $this->description = $description;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getType() {
        return $this->type;
    }
    
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    // public function __toString() {
    //     return "Role ID: {$this->id} || Type: {$this->type} || Description: {$this->description}";
    // }
    public function saveRole() {
        $conn = Config::connect();
        
        $sql = "INSERT INTO role (id,Type,Description) 
                VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            $this->getId(), 
            $this->getDescription(), 
            $this->getType(),
           
        ]);
    }

    public function update() {
        $conn = Config::connect(); 
        $sql = "UPDATE role 
                SET Type=?, Description=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->getId(), 
            $this->getDescription(), 
            $this->getType(),
           
        ]);
    }

    public function delete() {
        $conn = Config::connect();      
        $sql = "DELETE FROM role WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$this->getId()]);
    }

    public static function getAll() {
        $conn = Config::connect();    
        $sql = "SELECT * FROM role";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $conn = Config::connect();         
        $sql = "SELECT * FROM role WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
}
// $roles = new Role();
// $roles->setFullRole(8,"sdnjsdk","hdgvnsl,kdm");
// $roles->saveRole();


// var_dump($roles);
?>
