<?php
// namespace App\models;

include_once('./Role.php');

class Utilisateur{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $photo;

    private  $role;
    
    public function __construct($name, $lastname, $email,$password, $phone,$photo) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;

        $this->password = $password;


    }
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getLastname() {
        return $this->lastname;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getPhone() {
        return $this->phone;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    public function setPassword($password) {
        $this->password = $password;    }
    
    public function getPassword() {
        return $this->password;
    }
    public function setPhoto($photo) {
        $this->photo = $photo;    }
    
    public function getPhoto() {
        return $this->photo;
    }
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    
    public function setRole(Role $role) {
        $this->role = $role;
    }
    
    public function logIn() {
    }
    
    public function logOut() {

    }
    
    // public function changerPassword($instence) {
    //     $query = "UPDATE utilisateurs SET password = :password WHERE id = :id";
    //     $stmt = $connection->prepare($query);
    
    //     $Passwordupdate = $instence->getNom();
    //     $id = $instence->getId();
    
    
    //     $stmt->bindParam(':password', $Passwordupdate);
    //     $stmt->bindParam(':id', $id);
    
    
    //     if ($stmt->execute()) {
    //         echo $stmt->rowCount() . " record(s) updated.";
    //         exit; 
    //     } else {
    //         echo "Error updating record: " . implode(", ", $stmt->errorInfo());
    //     } 
    // }
    
    // public function updateInfoUser($instence){
    //     $query = "UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, phone = :phone WHERE id = :id";
    // $stmt = $connection->prepare($query);

    // $nom = $instence->getNom();
    // $prenom = $instence->getPrenom();
    // $email = $instence->getEmail();
    // $phone = $instence->getPhone();
    // $id = $instence->getId();


    // $stmt->bindParam(':nom', $nom);
    // $stmt->bindParam(':prenom', $prenom);
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':phone', $phone);
    // $stmt->bindParam(':id', $id);

    // if ($stmt->execute()) {
    //     echo $stmt->rowCount() . " record(s) updated.";
    //     // header("location: ../../index.php");
    //     exit; 
    // } else {
    //     echo "Error updating record: " . implode(", ", $stmt->errorInfo());
    // }
      
    // }
    // public function __toString()
    // {
    //     return "Nom :" .$this->name."Prenom :" .$this->lastname."Email :".$this->email."Telephone :".$this->phone;
        
    // }

  
    
}
// $ssq = new Utilisateur("vsdghg","qfesd","wcxvw","wcxvw",44555,"wcxvw");

// var_dump($ssq);

?>
