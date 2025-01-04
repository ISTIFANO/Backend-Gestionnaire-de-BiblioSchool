<?php

namespace App\models;

class Role {
    private $id;
    private $type;
    private $description;
    
    public function __construct($id, $type, $description) {
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

    public function __toString() {
        return "Role ID: {$this->id} || Type: {$this->type} || Description: {$this->description}";
    }
}

// $roles = new Role(1,"Administrateur","MOL CHI");

// echo $roles ;
?>
