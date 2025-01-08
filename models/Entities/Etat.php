<?php
namespace App\models;

class Etat {
    private $id;
    private $statut;
    
    public function __construct($id, $statut) {
        $this->id = $id;
        $this->statut = $statut;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStatut() {
        return $this->statut;
    }
    
    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function __toString() {
        return "Status: {$this->statut} || ID: {$this->id}";
    }
}

$etat = new Etat("1","confirmer");

echo $etat;
?>
