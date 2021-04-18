<?php

namespace App\view;

class Add_Ads
{

    public static function viewAddAds()
    {
?>
        <!-- Début du fichier HTML -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="assets/styles/style.css" />

            <title>Document</title>
        </head>

        <body>
            <header>
                <nav>
                    <h1 class="titleWebsite"> BID CARS </h1>
                    <ul>
                        <li>
                            <?php if (isset($_SESSION['firstname']) == true) {
                                echo 'Bonjour' . ' ' . $_SESSION['firstname'];
                            ?>
                                <a href="/Bid_Cars">Accueil</a>
                            <?php } else { ?>
                                <a href="Connexion">Connexion |</a>
                                <a href="Inscription">Inscription |</a>
                                <a href="/Bid_Cars">Accueil</a>


                            <?php } ?>
                        </li>
                    </ul>
                </nav>
            </header>

            <body>

                <div class="title_page">
                    <h2> Déposer une annonce </h2>
                    <div class="separator_title"></div>
                </div>
                <!-- Formulaire dépôt d'annonce  -->
                <div class="container_form_ads">
                    <div class="left_part">
                        <form action="Ajouter_Annonce" method="POST">
                            <label for="lastname">Votre nom</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Votre Nom">
                            <label for="firstname">Votre prénom</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Votre Prénom">
                            <label for="email">Votre mail</label>
                            <input type="text" name="email" id="email" placeholder="Votre email">
                            <label for="deadline">Date de fin d'enchère</label>
                            <input type="date" name="deadline" id="deadline">
                            <label for="brand">Marque du véhicule</label>
                            <input type="brand" name="brand" id="brand" placeholder="Peugeot,Renault,Mercedes...">
                            <label for="model">Modèle du véhicule</label>
                            <input type="text" name="model" id="model" placeholder="308, Talisman, Classe A">
                    </div>
                    <div class="right_part">
                        <label for="year_car">Date de mise en circulation</label>
                        <input type="number" min="1950" max=2021 name="year_car" id="year_car" placeholder="1995,2002,2020...">
                        <label for="color">Couleur du véhicule</label>
                        <input type="text" name="color" id="color" placeholder="Rouge, Noire, Grise...">
                        <label for="power_car">Puissance du véhicule (Chevaux Din)</label>
                        <input type="text" name="power_car" id="power_car" placeholder="90ch, 120ch, 234ch...">
                        <label for="kilometers">Kilométrage du véhicule</label>
                        <input type="text" name="kilometers" id="kilometers" placeholder="24000km, 35220km, 127342km...">
                        <label for="picture_url">Photo du véhicule (sous forme de lien)</label>
                        <input type="text" name="picture_url" id="picture_url" placeholder="www.googleimage.fr/monvehicule">
                        <label for="start_price">Prix de départ du véhicule</label>
                        <input type="text" name="start_price" id="start_price" placeholder="Prix de départ">
                    </div>
                    <div class="description_part">
                        <textarea rows="16" cols="70" name="description" placeholder="Véhicule en parfait état, non fumeur, et voilà..."></textarea>
                    </div>
                    <button type="submit" class="validation"> Valider mon annonce </button>


                    <!-- Fin du formulaire -->
                    </form>
                </div>
            </body>

        </html>
        <!-- Fin du fichier HTML -->
<?php

    }
}
