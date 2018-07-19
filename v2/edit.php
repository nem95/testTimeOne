<?php
require '..\db.php';
include '..\header.php';

/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 15/07/2018
 * Time: 15:31
 */

$salaries_id = $_GET["id"];
$conges = $connexion->query("SELECT * FROM conges where salaries_id = '$salaries_id'");
$conges->setFetchMode(PDO::FETCH_OBJ);
$conges = $conges->fetch();
?>

<div class="edit">
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="acquis">Congés acquis</label>
            <input type="number" class="form-control" id="acquis" name="acquis" placeholder="42" value="<?php echo $conges->acquis ?>">
        </div>
        <div class="form-group">
            <label for="pris">Congés pris</label>
            <input type="number" class="form-control" id="pris" name="pris" placeholder="42"  value="<?php echo $conges->pris ?>">
        </div>
        <input type="hidden" class="form-control" id="salaries_id" name="salaries_id"   value="<?php echo $conges->salaries_id ?>">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include '..\footer.php'; ?>
