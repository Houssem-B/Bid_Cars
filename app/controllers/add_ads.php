<?php

namespace App\Controllers;

/* Page permettant le dépôt d'annonce

/* Namespace */

require __DIR__ . '../../model/add_ads.php';

use App\model\Add_Ads as queryAds;
use App\view\Add_Ads as viewAds;

/* Création de la classe Add_Ads */

class Add_Ads
{

    /* Création de la fonction traitement de données du formulaire */
    public function data_process()
    {
        /* Déclaration des variables et nettoyage */
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $start_price = filter_var($_POST['start_price'], FILTER_SANITIZE_NUMBER_FLOAT);
        $deadline = $_POST['deadline'];
        $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
        $model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);
        $year_car = $_POST['year_car'];
        $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
        $power_car = filter_var($_POST['power_car'], FILTER_SANITIZE_NUMBER_INT);
        $kilometers = filter_var($_POST['kilometers'], FILTER_SANITIZE_NUMBER_INT);
        $picture_url = filter_var($_POST['picture_url'], FILTER_SANITIZE_URL);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $data_validated = true;

        if (filter_var($_POST['email'] . FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['start_price'] . FILTER_VALIDATE_FLOAT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['power_car'] . FILTER_VALIDATE_INT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['kilometers'] . FILTER_VALIDATE_INT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['picture_url'] . FILTER_VALIDATE_URL) === false) {
            $data_validated = false;
        }

        /* Ecriture des données dans la base de données */
        if ($data_validated === true) {
            $results = queryAds::queryAdd($lastname, $firstname, $email, $start_price, $deadline, $brand, $model, $year_car, $color, $power_car, $kilometers, $picture_url, $description);
?>
<?php
            /*Redirection vers la page d'accueil */
            header("Location: /Bid_Cars/");
        }
    }

    /* Fonction de rendu */

    public function render()
    {
        viewAds::viewAddAds();
    }
}
