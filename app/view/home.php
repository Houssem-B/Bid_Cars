<?php

namespace App\view;

class Home
{
    public static function viewHome($ads)
    {

?>
        <!-- Début du fichier HTML  -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/Bid_cars/assets/styles/style.css" />

            <title>Accueil</title>
        </head>

        <body>
            <!-- Début header -->
            <header>
                <nav>
                    <h1 class="titleWebsite"> BID CARS </h1>
                    <ul>
                        <li>
                            <!-- Si session démarrée, affichage du prénom, sinon menu connexion inscription  -->
                            <div class="header_rightPart">
                                <?php if (isset($_SESSION['firstname']) == true) {
                                ?> <span class="name_session"> <?= 'Bonjour' . ' ' . $_SESSION['firstname']; ?></span>
                                    <form action="Deconnexion" method="POST">
                                        <button class="session_out" type="submit">Déconnexion</button>
                                    </form>
                                    <a href="/Bid_Cars">Accueil</a>

                                <?php } else { ?>
                                    <a href="Connexion">Connexion |</a>
                                    <a href="Inscription">Inscription |</a>
                                    <a href="/Bid_Cars">Accueil |</a>
                                    <a class="btn_add_ads" href="Ajouter_Annonce">Ajouter une annonce</a>

                                <?php } ?>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Fin header  -->

            <!-- Hero Section-->
            <section id="hero">
                <div class="hero container">
                    <h2 class="titleSite"> BID CARS | Spécialiste des enchères automobiles</h2>
                </div>
            </section>
            <!-- Fin Hero Section -->

            <div class="title_ContainerAd">
                <h3 class="favoriteTitle"> Nos annonces </h3>
            </div>

            <!-- Container Annonces  -->
            <div class="containerAds">
                <?php
                foreach ($ads as $ad) { ?>
                    <div class="ads">
                        <div class="topAd">
                            <span> <img class="picAds" src="<?= $ad['picture_url'] ?>"></span>
                        </div>
                        <div class="middleAd">
                            <span class="modelVehicle"> <?= $ad['brand'] . ' ' . $ad['model'] ?> </span>
                        </div>
                        <div class="separatorAd"></div>
                        <span class="actuPrice"> Prix actuel : </span><span class="price"><?= $ad['start_price'] ?> € </span>
                        <div class="bottomAd">
                            <div class="contentAd">
                                <span class="logo_kilometers"> <img width="15px" height="15px" src="./assets/img/icons8-vitesse-24.png"> </span>
                                <span> <?= $ad['kilometers'] ?> km </span>
                                <span class="calendar"> <img width="15px" height="15px" src="./assets/img/icons8-calendrier-26.png"></span>
                                <span> <?= $ad['year_car'] ?> </span>
                            </div>
                            <div class="btnWatch">
                                <a href="Annonce/<?= $ad['ID']; ?>"> Voir l'annonce </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Fin container annonces  -->

        </body>

        </html>
        <!-- Fin du fichier HTML -->
<?php
    }
}
