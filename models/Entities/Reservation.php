<?php
namespace App\models;
define('PROJECT_ROOT', dirname(dirname(__DIR__))); 

require_once PROJECT_ROOT . '/vendor/autoload.php';

use App\models\Etat;

class Reservation {
    private $id;
    private $user;
    private $livre;
    private $date_reservation;
    private $etat;
    
    public function __construct($user, $livre, $etat = null) {
        $this->user = $user;
        $this->livre = $livre;
        $this->date_reservation = date('Y-m-d H:i:s');

                if ($etat === null) {
            $this->etat = new Etat(2, 'En attente');
        } else {
            $this->etat = $etat;
        }
    }
        public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getLivre() {
        return $this->livre;
    }
    public function setLivre($livre) {
        $this->livre = $livre;
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

    public function __toString() {
        return "Reservation [ID: {$this->id}, User: {$this->user}, Livre: {$this->livre}, Date: {$this->date_reservation}, Etat: {$this->etat}]";
    }
}
?>
