<?php

/* Namespace */

namespace App\controllers;

require __DIR__ . '../../model/home.php';
require __DIR__ . '../../view/home.php';

use App\view\Home as homeview;
use App\model\Home as homequery;


class Home // Affichage de la page d'accueil
{

    public function render() // Permet l'affichage de la page d'accueil
    {
        require __DIR__ . '../../includes/db.php';
        $ads = homequery::queryHome($dbh);
        $result = homeview::viewHome($ads);
    }
}
