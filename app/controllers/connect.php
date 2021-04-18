<?php

/* Page de connexion */

/* NameSpace */

namespace App\controllers;

require __DIR__ . '../../model/connect.php';
require_once __DIR__ . '../../view/connect.php';

use App\model\Connect as queryConnect;
use App\view\Connect as connectview;

/*Création de la classe Connect */

class Connect
{

    /* Début de la fonction Login permettant la connexion utilisateur */
    public function login($email)
    {
        $result = queryConnect::queryConnect($email);
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']); // Variable dé-hachage et vérification du mot de passe

        if (!$result) { // Identification incorrecte
            echo 'Identifiant ou mot de passe incorrect !';
        } else {
            if ($isPasswordCorrect) { // Mot de passe correct
                $_SESSION['ID'] = $result['ID'];
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $result['firstname'];
                echo 'Vous êtes connecté !';
                header('Location:/Bid_Cars');
            } else { // Mot de passe incorrect
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

    public function render() // Permet l'affichage de la page connexion
    {
        connectview::renderConnect();
    }
}
