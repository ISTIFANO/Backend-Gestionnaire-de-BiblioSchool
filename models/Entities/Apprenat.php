<?php 
class Apprenant extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function consulter(): array {
        return [];
    }

    public function annulerReserver(): void {
    }

    public function validerReservation(): void {
    }

    public function archiverReservation(): void {
    }

    public function reserver(): void {
    }
}



?>