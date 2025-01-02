<?php
class Livres {
    private $id;
    private $titre;
    private $auteur;
    private $disponibilite;
    private $tags = [];
    private $categorie;
    
    public function __construct($titre, $auteur, $categorie) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->categorie = $categorie;
        $this->disponibilite = true;
    }
    
    public function searchForBooks($Aamir) {
    }
    
    public function addTag($tag) {
        $this->tags[] = $tag;
    }
    

    public function getTitre() {
        return $this->titre;
    }
    
    public function getDisponibilite() {
        return $this->disponibilite;
    }
    
    public function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }
}


?>
