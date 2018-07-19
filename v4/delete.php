<?php
require '..\db.php';

/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 18/07/2018
 * Time: 22:57
 */

$salarier_id = $_GET["id"];

if ($salarier_id) {
    $deleteSalarie = $connexion->exec("UPDATE salaries SET isDeleted=true WHERE id = '$salarier_id'");

    header('Location: index.php');
}