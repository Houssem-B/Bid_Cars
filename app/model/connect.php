<?php

namespace App\model;

class Connect
{
    public static function queryConnect($email)
    {

        require __DIR__ . '../../includes/db.php';
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Variable récupérant le contenu du champ Email et nettoyage
        $query = $dbh->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array('email' => $email));
        return $query->fetch(\PDO::FETCH_ASSOC); // Comparaison de l'email rentrée avec les emails stockés dans la BDD
    }
}
