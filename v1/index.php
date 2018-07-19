<?php
require '..\db.php';
include '..\header.php';

/**
 * Created by PhpStorm.
 * User: Naïm Chatti
 * Date: 15/07/2018
 * Time: 15:31
 */
?>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#salaries" role="tab" data-toggle="tab">Salariés</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#conges" role="tab" data-toggle="tab">Congés</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Salariés | Congés</a>
    </li>
</ul>
<div class="tab-content">
<?php
    $salaries = $connexion->query("SELECT * FROM salaries");
    $salaries->setFetchMode(PDO::FETCH_OBJ);
?>
    <div role="tabpanel" class="tab-pane fade show active" id="salaries">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Date arrivée</th>
            </tr>
            </thead>
            <tbody>
<?php while($salarie = $salaries->fetch()) { ?>
            <tr>
                <th scope="row"> <?php echo $salarie->id; ?> </th>
                <td> <?php echo $salarie->firstName; ?> </td>
                <td> <?php echo $salarie->lastName; ?> </td>
                <td> <?php echo $salarie->address; ?> </td>
                <td> <?php echo $salarie->dateBegin; ?> </td>
            </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<?php
    $salaries->closeCursor();

    $conges = $connexion->query("SELECT * FROM conges");
    $conges->setFetchMode(PDO::FETCH_OBJ);
?>
    <div role="tabpanel" class="tab-pane fade" id="conges">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID Salariés</th>
                <th scope="col">Acquis</th>
                <th scope="col">Pris</th>
            </tr>
            </thead>
            <tbody>
<?php while( $conge = $conges->fetch() ) { ?>
             <tr>
                <th scope="row"> <?php echo $conge->salaries_id; ?> </th>
                <td> <?php echo $conge->acquis; ?> </td>
                <td> <?php echo $conge->pris; ?> </td>
            </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<?php $conges->closeCursor(); ?>

    <div role="tabpanel" class="tab-pane fade" id="references">
        <?php
            $full = $connexion->query("SELECT * FROM salaries RIGHT JOIN conges ON salaries.id = conges.salaries_id");
            $full->setFetchMode(PDO::FETCH_OBJ);
        ?>
        <div role="tabpanel" class="tab-pane fade show active" id="salaries">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Date arrivée</th>
                    <th scope="col">Acquis</th>
                    <th scope="col">Pris</th>
                </tr>
                </thead>
                <tbody>
                <?php while($salarie = $full->fetch()) { ?>
                    <tr>
                        <th scope="row"> <?php echo $salarie->id; ?> </th>
                        <td> <?php echo $salarie->firstName; ?> </td>
                        <td> <?php echo $salarie->lastName; ?> </td>
                        <td> <?php echo $salarie->address; ?> </td>
                        <td> <?php echo $salarie->dateBegin; ?> </td>
                        <td> <?php echo $salarie->acquis; ?> </td>
                        <td> <?php echo $salarie->pris; ?> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '..\footer.php'; ?>
