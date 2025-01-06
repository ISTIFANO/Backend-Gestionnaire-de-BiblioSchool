<?php
// namespace App\models;

// define('PROJECT_ROOT', dirname(dirname(__DIR__))); 
// require_once PROJECT_ROOT . '/vendor/autoload.php';
// echo PROJECT_ROOT;

use App\models\Config;

class Categories {
    private $id;
    private $name;
    private $created_at;
    private $connexion; 

    public function __construct($id,$name) {
        // $this->connexion = (new Config())::connect();
        $this->name = $name;
        $this->id = $id;

        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getConnexion() {
        return $this->connexion;
    }

    public function __toString() {
        return "Category ID: {$this->id} || Name: {$this->name} || Created At: {$this->created_at}";
    }
}

// Example of creating a new category
$category = new Categories(1,"Science Fiction");
echo $category;  // This will output: Category [ID: , Name: Science Fiction, Created At: 2025-01-04 12:00:00]
?>
