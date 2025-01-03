<?php

class Utilisateur {
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $phone;
    private $role;
    
    public function __construct($name, $lastname, $email, $phone) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
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
    
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    
    public function setRole($role) {
        $this->role = $role;
    }
    
    public function logIn() {
    }
    
    public function logOut() {

    }
    
    public function changerPassword() {
        
    }
    
    public function updateInfoUser() {
      
    }
    public function __toString()
    {
        return "Nom :" .$this->name."Nom :" .$this->name
        
    }

    
}
?>
