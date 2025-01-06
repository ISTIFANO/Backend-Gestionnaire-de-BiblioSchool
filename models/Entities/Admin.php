<?php
use App\models\Config; 
include("Utilisateur.php");
include("../../config/config.php");

class Admin extends Utilisateur {

    public function __construct($name, $lastname, $email, $password, $phone, $photo) {
        parent::__construct($name, $lastname, $email, $password, $phone, $photo);
    }

    public function save() {
        $conn = Config::connect();
        
        $sql = "INSERT INTO utilisateur (name, lastname, email, password, phone, photo) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute([
            $this->getName(), 
            $this->getLastname(), 
            $this->getEmail(),
            $this->getPassword(), 
            $this->getPhone(),
            $this->getPhoto()
        ]);
    }

    public function update() {
        $conn = Config::connect(); 
        $sql = "UPDATE utilisateur 
                SET name=?, lastname=?, email=?, password=?, phone=?, photo=? 
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->getName(),
            $this->getLastname(),
            $this->getEmail(),
            $this->getPassword(),
            $this->getPhone(),
            $this->getPhoto(),
            $this->getId()
        ]);
    }

    public function delete() {
        $conn = Config::connect();      
        $sql = "DELETE FROM utilisateur WHERE id=?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$this->getId()]);
    }

    public static function getAll() {
        $conn = Config::connect();    
        $sql = "SELECT * FROM utilisateur";
        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $conn = Config::connect();         
        $sql = "SELECT * FROM utilisateur WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Exemple d'utilisation :
// $admin = new Admin("jdfnjd", "dijnd", "dsfdodf.com", "kdsjfj", "3434", "photo.jpg");
// $admin->save();

// var_dump($admin);
?>
