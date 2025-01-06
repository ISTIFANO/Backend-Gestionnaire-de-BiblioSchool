<?php
// namespace App\models;

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
    
}


$Tages = new Tags(3,"9or2an");
// echo $Tages;

?>
