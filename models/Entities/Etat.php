<?php
class Etat {
    private $id;
    private $statut;
    
    public function __construct($statut) {
        $this->statut = $statut;
    }
    
    public function getStatut() {
        return $this->statut;
    }
    
    public function setStatut($statut) {
        $this->statut = $statut;
    }
}

?>
