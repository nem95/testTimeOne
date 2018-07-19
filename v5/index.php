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
        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Salariés supprimés</a>
    </li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade show active" id="references">
        <?php
        $full = $connexion->query("SELECT * FROM salaries RIGHT JOIN conges ON salaries.id = conges.salaries_id WHERE salaries.isDeleted=true");
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
                <?php
                while($salarie = $full->fetch()) {
                    if ($salarie->isDeleted) {
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $salarie->id; ?> </th>
                            <td> <?php echo $salarie->firstName; ?> </td>
                            <td> <?php echo $salarie->lastName; ?> </td>
                            <td> <?php echo $salarie->address; ?> </td>
                            <td> <?php echo $salarie->dateBegin; ?> </td>
                            <td> <?php echo $salarie->acquis; ?> </td>
                            <td> <?php echo $salarie->pris; ?> </td>

                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include '..\footer.php'; ?>
