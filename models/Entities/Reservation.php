<?php
// namespace App\models;
// define('PROJECT_ROOT', dirname(dirname(__DIR__))); 

require_once PROJECT_ROOT . '/vendor/autoload.php';
// require_once '../../vendor/autoload.php';
 use App\models\Etat;

include_once('./Utilisateur.php');
include_once('./Livres.php');
include_once('./Etat.php');


    // include('./Tags.php');
include_once('./Categories.php');





class Reservation {
    private $id;
    private $user;
    private $livre;
    private $date_reservation;
    private $etat;
    
    public function __construct(Utilisateur $user, Livres $livre, $etat = null) {
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

// $categor1 = new Categories(4, "dsbbjxbs");
// $tag = new Tags(1, "csqguqso");

// $Per = new Livres(1, "dfsdfs", "SFKSKDOSD", "FANSE");

// $Per->addCategorie($categor1);
// $Per->addTag($tag);

// public function __construct($id, $type, $description) {
    // public function __construct($name, $lastname, $email, $phone,$role) {
        // public function __construct($name, $lastname, $email,$password, $phone,$photo) {

    $Role = new Role();
    $Role->setFullRole(null,"nsbhbsdj","jnsdjsn");
    var_dump($Role); 
        $Role->saveRole();
    $user = new Utilisateur("AKDSK","jsdubdn","HJDSJNC","JBDHBS",123456789,"dhsvujb");

    $user->setRole($Role);

    var_dump($user);


    // public function __construct(Utilisateur $user, Livres $livre, $etat = null) {

    // $Reservation = new Reservation($user,$Per,"panding");

    // var_dump($Reservation);


?>
