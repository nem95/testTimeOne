<?php
include '..\header.php';

/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 15/07/2018
 * Time: 15:31
 */
?>
<form action="add.php" method="post">
    <div class="form-group">
        <label for="firstName">Prénom</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Prénom">
    </div>
    <div class="form-group">
        <label for="lastName">Nom</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Nom">
    </div>
    <div class="form-group">
        <label for="address">Adresse</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Adresse">
    </div>
    <div class="form-group">
        <label for="dateBegin">Date d'arrivé</label>
        <input type="date" class="form-control" id="dateBegin" name="dateBegin" >
    </div>
    <div class="form-group">
        <label for="dateEnd">Date de départ</label>
        <input type="date" class="form-control" id="dateEnd" name="dateEnd" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include '..\footer.php'; ?>
