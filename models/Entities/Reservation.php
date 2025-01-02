<?php
class Reservation {
    private $id;
    private $user;
    private $livre;
    private $date_reservation;
    private $etat;
    
    public function __construct($user, $livre) {
        $this->user = $user;
        $this->livre = $livre;
        $this->date_reservation = date('Y-m-d H:i:s');
        $this->etat = new Etat('En attente');
    }
    
    public function getDateReservation() {
        return $this->date_reservation;
    }
    
    public function getEtat() {
        return $this->etat;
    }
    
    public function setEtat($etat) {
        $this->etat = $etat;
    }
}


?>
