<?php
use App\models\Config; 
include("Utilisateur.php");
include("../../config/config.php");

class Admin extends Utilisateur {

    public function __construct($name, $lastname, $email, $password, $phone, $photo) {
        parent::__construct($name, $lastname, $email, $password, $phone, $photo);
    }


}

// Exemple d'utilisation :
// $admin = new Admin("jdfnjd", "dijnd", "dsfdodf.com", "kdsjfj", "3434", "photo.jpg");
// $admin->save();

// var_dump($admin);
?>
