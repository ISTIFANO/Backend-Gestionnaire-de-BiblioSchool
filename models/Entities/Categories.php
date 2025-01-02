<?php

class Categories {
    private $id;
    private $name;
    private $created_at;
    
    public function __construct($name) {
        $this->name = $name;
        $this->created_at = date('Y-m-d H:i:s');
    }
    
    public function createCategories() {
       
    }
    
    public function deleteCategories() {
        
    }
    
    public function listerCategories() {
    
    }
    
    public function updateCategories() {
        
    }
}
?>
