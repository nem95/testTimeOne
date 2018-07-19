<?php
require '..\db.php';


/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 15/07/2018
 * Time: 15:31
 */

$conges_acquis = $_POST["acquis"];
$conges_pris = $_POST["pris"];
$salaries_id = $_POST["salaries_id"];

if (isset($conges_acquis) && is_int (intval($conges_acquis))
    && isset($conges_pris) && is_int (intval($conges_pris))
    && isset($salaries_id) && is_int (intval($salaries_id))) {
    $connexion->exec("UPDATE conges SET acquis = '$conges_acquis', pris = '$conges_pris' 
                      WHERE salaries_id = '$salaries_id'");

    header('Location: index.php');
}

?>