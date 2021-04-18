<?php

namespace App\Model;

class Add_Ads
{
    public static function queryAdd($lastname, $firstname, $email, $start_price, $deadline, $brand, $model, $year_car, $color, $power_car, $kilometers, $picture_url, $description)
    {
        require __DIR__ . '../../includes/db.php';
        $query = $dbh->prepare('INSERT INTO ads (lastname, firstname, email, start_price, deadline, brand, model, year_car, color, power_car, kilometers, picture_url, description_car) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
        return $query->execute([$lastname, $firstname, $email, $start_price, $deadline, $brand, $model, $year_car, $color, $power_car, $kilometers, $picture_url, $description]);
    }
}
