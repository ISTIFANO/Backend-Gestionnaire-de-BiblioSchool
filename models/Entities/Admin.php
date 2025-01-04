<?php 

class Admin extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function gestionRole(): void {
    }

    public function createBooks(): void {
    }

    public function supprimerBooks(): void {
    }

    public function updateBooks(): void {
    }

    public function listerBooks(): array {
        return [];
    }
}



?>