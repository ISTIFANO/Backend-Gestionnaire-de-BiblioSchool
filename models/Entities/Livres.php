<?php
// namespace App\models;

  require_once '../../vendor/autoload.php';

use App\models\Config;
use App\models\Categories;


require_once("../../config/config.php");


// use App\models\Categories;
// use App\models\Tags;

require_once("./Categories.php");
include_once("./Tags.php");
class Livres {
    private $id;
    private $titre;
    private $auteur;
    private $photo;

    private $disponibilite;
    private  $tags = [];
    private $categorie;
    
    public function __construct($id,$titre, $auteur,$photo,$disponibilite) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->photo = $photo;

        $this->disponibilite =$disponibilite;
        $this->disponibilite = true;
        $this->id = NULL;
    }
    
    public function searchForBooks($Aamir) {
    }
    
    // public function addTag(Tags $tag) {
    //     $this->tags[] = $tag;
    // }
    public function getTag() {
       return $this->tags;
    }
    public function addCategorie(Categories $categor) {
        $this->categorie=$categor;
    }

       public function getCategorie() {
        return $this->categorie;
    }

    public function getAuteur() {
        return $this->auteur;
    }
    public function SetAuteur($auteur){
        $this->auteur=$auteur;
        }
    public function getTitre() {
        return $this->titre;
    }
    public function SetPhoto($photo){
        $this->photo=$photo;
        }
    public function getPhoto() {
        return $this->photo;
    }
public function SetTitre($titre){
$this->titre=$titre;
}
    public function getId() {
        return $this->id;
    }
public function SetId($id){
$this->id=$id;
}

    public function getDisponibilite() {
        return $this->disponibilite;
    }
    
    public function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }
    public function save() {
        $conn = Config::connect();      

        $sql = "INSERT INTO livres (titre, auteur, disponibilite, photo, categorie_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $this->getTitre(),
            $this->getAuteur(),
            $this->getDisponibilite(),

            $this->getPhoto(),
            $this->getCategorie()->getId() 
        ]);

    //     var_dump($this->getCategorie()->getId() 
    // );
        $this->id = $conn->lastInsertId(); 
        $this->saveTags(); 
    }

    private function saveTags() {
        $conn = Config::connect();      

        if (!empty($this->tags)) {
            foreach ($this->tags as $tag) {
                $sql = "INSERT INTO livre_tag (livre_id, tag_id) VALUES (?, ?)";
                $stmt =$conn->prepare($sql);
                $stmt->execute([$this->getId(), $tag->getId()]);
            }
        }
    }

    public function update() {
        $conn = Config::connect();      

        $sql = "UPDATE livres SET titre = ?, auteur = ?, disponibilite = ?, photo = ?, categorie_id = ? 
                WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $this->getTitre(),
            $this->getAuteur(),
            $this->getDisponibilite(),
            $this->getPhoto(),
            $this->getCategorie()->getId(),
            $this->getId()
        ]);
    }

    public function delete() {
        $conn = Config::connect();      

        $sql = "DELETE FROM livre_tag WHERE livre_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getId()]);

        $sql = "DELETE FROM livres WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$this->getId()]);
    }

    public static function getById($id) {
        $conn = Config::connect();
        $sql = "SELECT * FROM livres WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $livre = new Livres($result['titre'], $result['auteur'], $result['disponibilite'], $result['photo'], $result['id']);
            // $livre->setCategorie(Categories::getById($result['categorie_id'])); 
            return $livre;
        }
        return null;
    }

    public static function getAll() {
        $conn = Config::connect();
        $sql = "SELECT * FROM livres";
        $stmt = $conn->query($sql);
        $books = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livre = new Livres($row['id'],$row['Titre'], $row['Auteur'], $row['Disponibilite'], $row['Photo']);
            // $livre->setCategorie(Categories::getById($row['categorie_id']));
            $books[] = $livre;
        }
        return $books;
    }
    
    // Add a tag to the book (many-to-many relationship)
    // public function addTag(Tags $tag) {
    //     $this->tags[] = $tag;
    //     $this->saveTags(); // Save the tag in the related table
    // }
    // public function __construct($id,$titre, $auteur,$photo,$disponibilite) {


}
$categoriez = new Categories(6,"lmzika");
$id=$categoriez->getCategoryByName("lmzika");

$Tages = new Tags(7, "ANCKSQJKSK?Q?S");
var_dump($Tages->getTagsById("Fantasy"));;
$livres = new Livres(null,"fsfdddddddddddd","dsds","dssd.png","true");

$livres->addCategorie($categoriez);
$livres->getAll();
var_dump($livres->getAll()
);



// foreach( $livres->getAll() as $key ){
//     $livres = new Livres(null,"fsfdddddddddddd","dsds","dssd.png","true");


// // var_dump()
// }

// $livres->save();
var_dump($livres);

?>
