<?php 

class Gerant extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function gestionReservation(): void {
    }

    public function listerBooks(): array {
        return [];
    }

    public function updateBooks(): void {
    }

    public function createBooks(): void {
    }
}


?>