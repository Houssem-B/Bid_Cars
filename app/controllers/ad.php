<?php

/* Namespace */

namespace App\Controllers;

/* Création de la classe Ad */

class Ad
{
    /* Fonction render prenant en compte l'ID de l'annonce contenu dans l'URL ($value) */
    public function render($value)
    {

        require __DIR__ . "../../includes/db.php";

        /* Récupération de l'annonce en fonction de l'ID */
        $id = filter_var($value['id'], FILTER_SANITIZE_NUMBER_INT);
        $ad = $dbh->query("SELECT * FROM ads WHERE ID = $id")->FETCH();

?>
        <!-- Début du fichier HTML  -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/Bid_cars/assets/styles/style.css">
            <title>Annonce</title>
        </head>

        <!-- Début header -->
        <header>
            <nav>
                <h1 class="titleWebsite"> BID CARS </h1>
                <ul>
                    <li>
                        <!-- Si session démarrée, affichage du prénom, sinon menu connexion inscription  -->

                        <?php if (isset($_SESSION['firstname']) == true) {
                            echo 'Bonjour' . ' ' . $_SESSION['firstname'];
                        ?>
                            <form action="/Bid_Cars/Deconnexion" method="POST">
                                <button type="submit">Déconnexion</button>
                            </form>
                            <a href="/Bid_Cars">Accueil</a>

                        <?php } else { ?>
                            <a href="/Bid_Cars/Connexion">Connexion |</a>
                            <a href="/Bid_Cars/Inscription">Inscription |</a>
                            <a href="/Bid_Cars">Accueil</a>
                        <?php } ?>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- Fin header  -->

        <body>
            <!-- Container principal de la page  -->
            <div class="container_adDetail">
                <div class="adDetail">
                    <div class="left_adDetail">
                        <img width="662" height="421" class="" src='<?= $ad["picture_url"] ?>'>
                    </div>

                    <div class="right_adDetail">
                        <!-- Affichage des variables de l'annonce récupérées dans la base de données  -->
                        <span class="brand_adDetail"> <?= $ad['brand'] . ' ' . $ad['model'] ?></span>
                        <span class="separatorAd"></span>
                        <span class="year_adDetail"> <?= $ad['year_car'] ?></span>
                        <span class="color_adDetail"><?= $ad['color'] ?></span>
                        <span class="power_adDetail"><?= $ad['power_car'] ?></span>
                        <span class="kilometers_adDetail"><?= $ad['kilometers'] ?> km </span>
                        <span class="description_adDetail"><?= $ad['description_car'] ?></span>
                        <?php if (isset($_SESSION['ID']) == true) { ?>

                            <form method='POST'>
                                <label> Enchère </label>
                                <input type='number' name='enchere' placeholder="Saisissez un montant supérieur à <?= $ad['start_price'] ?>€">
                                <button type='submit'>Enchérir</button>
                            </form>

                        <?php } else { ?>

                            <span class="bidError"><a href='Inscription'>Connectez-vous pour enchérir !</a></span>

                        <?php } ?>

                        <!-- Affichage du prix actuel récupéré dans la base de données  -->
                        <?php
                        $bids = $dbh->query("SELECT * FROM bid")->fetchAll(\PDO::FETCH_ASSOC);

                        foreach ($bids as $bid) { ?>
                            <p> Prix actuel : <?= $ad['start_price'] ?>€</p>
                        <?php } ?>
                        <span class="deadline_adDetail">L'enchère se terminera le <?= $ad['deadline'] ?> à 14h59m59s </span>
                    </div>
                    <span class="date_adDetail"> Annonce ajoutée le <?= $ad['date_ad'] ?></span>
                </div>
                <!-- Champ d'enchère accessible uniquement pour un utilisateur connecté  -->

            </div>
        </body>

        </html>
        <!-- Fin du fichier HTML  -->
<?php }
}
?>

<?php
/* Création de la classe validate_Bid correspondant à la mise à jour du prix en fonction de l'entrée utilisateur */

class validate_Bid
{
    /* Création de la fonction de validation de l'enchère */
    public function validate_bid($value)
    {
        require __DIR__ . "../../includes/db.php";
        $id = filter_var($value['id'], FILTER_SANITIZE_NUMBER_INT);
        $bid = $dbh->query("SELECT * FROM bid WHERE ad_id = $id ")->fetch();
        $ads = $dbh->query("SELECT * FROM ads WHERE ID = $id ")->fetch();
        $newBid = $_POST['enchere'];
        $bidCompare = $ads['start_price'];

        /* Validation de l'enchère */
        if ($newBid > $bidCompare) {
            $result = $dbh->exec("UPDATE bid SET amount_bid=$newBid, user_id=$id WHERE ad_id = $id ");
            $result = $dbh->exec("UPDATE ads SET start_price=$newBid WHERE ID=$id");

            header('Location:Bid_Cars/Annonce/' . $id);
        } else {
            echo 'Vous devez enchérir un montant supérieur au prix actuel';
        }
    }
}
