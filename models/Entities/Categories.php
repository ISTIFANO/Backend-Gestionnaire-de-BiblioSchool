<?php

class Categories {
    private $id;
    private $name;
    private $created_at;
    public $connexion;

    
    public function __construct($name) {
        $this->connexion = (new config())::connect();

        $this->name = $name;
        $this->created_at = date('Y-m-d H:i:s');
    }
    
    public function create($name) {
        $query = "INSERT INTO Categories (Name) VALUES ('$name')";
        return $this->connexion->query($query);
    }
    
    public function read($id = null) {
        if ($id) {
            $query = "SELECT * FROM Categories WHERE id = $id";
        } else {
            $query = "SELECT * FROM Categories";
        }
        return $this->connexion->query($query);
    }
    
    public function update($id, $name) {
        $query = "UPDATE Categories SET Name = '$name' WHERE id = $id";
        return $this->connexion->query($query);
    }
    
    public function delete($id) {
        $query = "DELETE FROM Categories WHERE id = $id";
        return $this->connexion->query($query);
    }
}
?>
