<?php

class Utilisateur {
    protected $id;
    protected $name;
    protected $lastname;
    protected $email;
    protected $phone;

    public function __construct($id, $name, $lastname, $email, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function login(): void {
        // Implémentation de la méthode login
    }

    public function logout(): void {
        // Implémentation de la méthode logout
    }

    public function changerPassword(): void {
        // Implémentation du changement de mot de passe
    }

    public function updateInfoUser(): void {
        // Implémentation de la mise à jour des informations
    }
}

class Gerant extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function gestionReservation(): void {
        // Gérer les réservations de livres
    }

    public function listerBooks(): array {
        // Retourner la liste des livres
        return [];
    }

    public function updateBooks(): void {
        // Mettre à jour les informations des livres
    }

    public function createBooks(): void {
        // Créer de nouveaux livres
    }
}

class Apprenant extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function consulter(): array {
        // Consulter le catalogue de livres
        return [];
    }

    public function annulerReserver(): void {
        // Annuler une réservation
    }

    public function validerReservation(): void {
        // Valider une réservation
    }

    public function archiverReservation(): void {
        // Archiver une réservation
    }

    public function reserver(): void {
        // Faire une nouvelle réservation
    }
}

class Admin extends Utilisateur {
    public function __construct($id, $name, $lastname, $email, $phone) {
        parent::__construct($id, $name, $lastname, $email, $phone);
    }

    public function gestionRole(): void {
        // Gérer les rôles des utilisateurs
    }

    public function createBooks(): void {
        // Créer de nouveaux livres
    }

    public function supprimerBooks(): void {
        // Supprimer des livres
    }

    public function updateBooks(): void {
        // Mettre à jour les informations des livres
    }

    public function listerBooks(): array {
        // Lister tous les livres
        return [];
    }
}

?>