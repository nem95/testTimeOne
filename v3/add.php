<?php
require '..\db.php';

/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 18/07/2018
 * Time: 22:57
 */

$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$address = htmlspecialchars($_POST["address"]);
$dateBegin = htmlspecialchars($_POST["dateBegin"]);
$dateEnd = htmlspecialchars($_POST["dateEnd"]);

if ($dateEnd == '') { $dateEnd = $dateBegin; }

if (isset($firstName) && isset($lastName) && isset($address) && isset($dateBegin) && isset($dateEnd)) {
    $newSalaries = $connexion->prepare("INSERT INTO salaries (firstName, lastName, address, dateBegin, dateEnd)
        VALUES('$firstName','$lastName','$address', '$dateBegin', '$dateEnd')");
    $newSalaries->execute();
    if ($connexion->lastInsertId()) {
        $last_id = $connexion->lastInsertId();
        $newConges = $connexion->prepare("INSERT INTO conges (salaries_id, acquis, pris)
        VALUES($last_id,'0','0')");
        $newConges->execute();
    }

    header('Location: index.php');
}