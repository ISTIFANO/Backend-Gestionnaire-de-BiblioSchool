<?php
// namespace App\models;

 require_once '../../vendor/autoload.php';

 use App\models\config;
include("../../config/config.php");


// use App\models\Categories;
// use App\models\Tags;

include("./Categories.php");
include("./Tags.php");
class Livres {
    private $id;
    private $titre;
    private $auteur;
    private $disponibilite;
    private  $tags = [];
    private $categorie;
    
    public function __construct($id,$titre, $auteur,$disponibilite) {
        $this->titre = $titre;
        $this->auteur = $auteur;
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
        $this->categorie[]=$categor;
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
        $sql = "INSERT INTO livres (titre, auteur, disponibilite, photo, categorie_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([
            $this->getTitre(),
            $this->getAuteur(),
            $this->getDisponibilite(),
            $this->getPhoto(),
            $this->getCategorie()->getId() 
        ]);
        $this->id = $this->connexion->lastInsertId(); 
        $this->saveTags(); 
    }

    private function saveTags() {
        if (!empty($this->tags)) {
            foreach ($this->tags as $tag) {
                $sql = "INSERT INTO livre_tag (livre_id, tag_id) VALUES (?, ?)";
                $stmt = $this->connexion->prepare($sql);
                $stmt->execute([$this->getId(), $tag->getId()]);
            }
        }
    }

    public function update() {
        $sql = "UPDATE livres SET titre = ?, auteur = ?, disponibilite = ?, photo = ?, categorie_id = ? 
                WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
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
        $sql = "DELETE FROM livre_tag WHERE livre_id = ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([$this->getId()]);

        $sql = "DELETE FROM livres WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
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
            $livre = new Livres($row['titre'], $row['auteur'], $row['disponibilite'], $row['photo'], $row['id']);
            // $livre->setCategorie(Categories::getById($row['categorie_id']));
            $books[] = $livre;
        }
        return $books;
    }
    
    // Add a tag to the book (many-to-many relationship)
    public function addTag(Tags $tag) {
        $this->tags[] = $tag;
        $this->saveTags(); // Save the tag in the related table
    }
}
// $tag = new Tags(1, "csqguqso");
// $tagA = new Tags(2, "csqf,dk,kfguqso");
// $tagB = new Tags(341, "csojkfdnjnfqguqso");

// $tagC = new Tags(14, "cscnfdjqguqso");
// $tagD = new Tags(41, "csqguqso");

// $categor1 = new Categories(2, "dsfsd");

// $Per = new Livres(1, "dfsdfs", "SFKSKDOSD", "FANSE");

// $Per->addCategorie($categor1);
// $Per->addTag($tag);
// $Per->addTag($tagA);
// $Per->addTag($tagB);
// $Per->addTag($tagC);
// $Per->addTag($tagD);


// foreach($Per->getTag() as $kay){

// echo  $kay->getName();

// }



// var_dump($Per);
// $categor1 = new Categories(2, "dsfsd");

// $tag = new Tags(1, "csqguqso");
// $tag2 = new Tags(4, "ERERERE");
// $tag3 = new Tags(2, "ELAMIRI");
// $tag4 = new Tags(6, "AAMIR");
// $tag5 = new Tags(5, "REEREE");

// $Per->addTag($tag2);
// $Per->addTag($tag3);
// $Per->addTag($tag4);
// $Per->addTag($tag5);
// $Per->addTag($tag);

// var_dump($Per->getTag());
// foreach ($Per->getTag() as $t) {
//     echo $t->getName() . "<br>";
// }


// $Per->addCategorie($categor1);
// echo '<pre>';
// var_dump($Per);  
// echo '</pre>';

?>
