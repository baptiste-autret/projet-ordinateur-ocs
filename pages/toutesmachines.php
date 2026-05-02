<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>
    <div class="d-flex bd-highlight min-vh-100">

        <?php require_once '../component/navigation.php'; ?>


        <div class="p-2 flex-fill bd-highlight border w-75 min-vh-100">
            <h1 class="text-center mt-2">Toutes les machines</h1>
            <hr>
            
            <br>

            <?php

            $toutesInformationsMachines = $con->prepare("SELECT * FROM `info_ordinateurs`");
            $toutesInformationsMachines->execute();
            $resultatMachines = $toutesInformationsMachines->get_result();
            $machines = $resultatMachines->fetch_all();


            $countMachines = $con->prepare("SELECT COUNT(id_ordinateur) AS 'Total' FROM `info_ordinateurs`");
            $countMachines->execute();
            $resultatCount = $countMachines->get_result();
            $totalMachine = $resultatCount->fetch_assoc();?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom du poste</th>
                        <th>OS</th>
                        <th>RAM</th>
                        <th>Stockage</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultatMachines as $uneMachine) {
                    ?>
                        <tr>
                            <td><a href="informationMachines.php?id=<?= $uneMachine['id_ordinateur'] ?>" class="text-primary"><?= $uneMachine['nom_poste'] ?></a></td>
                            <td><?= $uneMachine['OS'] ?></td>
                            <td><?= $uneMachine['Ram'] ?></td>
                            <td><?= $uneMachine['Stockage'] ?></td>
                            <td><?= $uneMachine['Role'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php echo "Nombre de machines : " . $totalMachine['Total']; ?>
        </div>
    </div>
<?php
} else {
    $id = '';
    header('Location: ./pages/login.php');
}


include '../component/footer.php';
