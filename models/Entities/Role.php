<?php 


class Role {
    private $id;
    private $type;
    private $description;
    
    public function __construct($type, $description) {
        $this->type = $type;
        $this->description = $description;
    }
    
    public function getPermission() {



        
        return $this->type;
    }
}




?>