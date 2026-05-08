<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>

<div class="d-flex min-vh-100 bg-light">

    <?php require_once '../component/navigation.php'; ?>

    <div class="flex-fill p-4">
        
        <div class="card border-0 rounded-4 mb-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h1 class="fw-bold mb-1">
                            Toutes les machines
                        </h1>

                        <p class="text-muted mb-0">
                            Liste complète des postes enregistrés
                        </p>
                    </div>

                    <?php
                    $countMachines = $con->prepare("SELECT COUNT(id_ordinateur) AS Total FROM info_ordinateurs");
                    $countMachines->execute();
                    $resultatCount = $countMachines->get_result();
                    $totalMachine = $resultatCount->fetch_assoc();
                    ?>

                    <span class="badge bg-primary fs-6 px-4 py-3 rounded-pill">
                        <?= $totalMachine['Total']; ?> machines
                    </span>

                </div>

            </div>

        </div>

        <?php

        $toutesInformationsMachines = $con->prepare("SELECT * FROM info_ordinateurs");
        $toutesInformationsMachines->execute();
        $resultatMachines = $toutesInformationsMachines->get_result();

        ?>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>
                                <th class="ps-4">Nom du poste</th>
                                <th>OS</th>
                                <th>RAM</th>
                                <th>Stockage</th>
                                <th>Rôle</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($resultatMachines as $uneMachine) { ?>

                                <tr>

                                    <td class="ps-4">

                                        <a href="informationMachines.php?id=<?= $uneMachine['id_ordinateur'] ?>"
                                           class="text-decoration-none fw-semibold">

                                            <?= $uneMachine['nom_poste'] ?>

                                        </a>

                                    </td>

                                    <td>
                                        <span class="badge text-bg-secondary">
                                            <?= $uneMachine['OS'] ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= $uneMachine['Ram'] ?> Go
                                    </td>

                                    <td>
                                        <?= $uneMachine['Stockage'] ?> Go
                                    </td>

                                    <td>

                                        <span class="badge text-bg-primary">
                                            <?= $uneMachine['Role'] ?>
                                        </span>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
} else {
    header('Location: ./pages/login.php');
}

include '../component/footer.php';
?>