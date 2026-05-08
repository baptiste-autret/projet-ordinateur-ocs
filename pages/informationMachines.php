<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {

    $id = $_SESSION["login"];

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: toutesMachines.php');
        exit();
    }

    $idMachine = (int) $_GET['id'];

    $stmt = $con->prepare("SELECT * FROM info_ordinateurs WHERE id_ordinateur = ?");
    $stmt->bind_param("i", $idMachine);
    $stmt->execute();

    $result = $stmt->get_result();
    $machine = $result->fetch_assoc();

    // Machine introuvable
    if (!$machine) {
        header('Location: toutesMachines.php');
        exit();
    }

?>

<div class="d-flex min-vh-100 bg-light">

    <?php require_once '../component/navigation.php'; ?>

    <div class="flex-fill p-4">

        <div class="card border-0 rounded-4 mb-4">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <h1 class="fw-bold mb-1">
                        <?= $machine['nom_poste'] ?>
                    </h1>

                    <p class="text-muted mb-0">
                        Fiche détaillée de la machine
                    </p>

                </div>

                <span class="badge text-bg-primary fs-6 px-4 py-3 rounded-pill">
                    <?= $machine['Role'] ?>
                </span>

            </div>

        </div>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">

                <table class="table align-middle mb-0">

                    <tbody>

                        <tr>
                            <th class="ps-4 py-3 w-25">
                                Nom du poste
                            </th>

                            <td class="py-3">
                                <?= $machine['nom_poste'] ?>
                            </td>
                        </tr>

                        <tr>
                            <th class="ps-4 py-3">
                                Système d'exploitation
                            </th>

                            <td class="py-3">
                                <span class="badge text-bg-secondary">
                                    <?= $machine['OS'] ?>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th class="ps-4 py-3">
                                RAM
                            </th>

                            <td class="py-3">
                                <?= $machine['Ram'] ?> Go
                            </td>
                        </tr>

                        <tr>
                            <th class="ps-4 py-3">
                                Stockage
                            </th>

                            <td class="py-3">
                                <?= $machine['Stockage'] ?> Go
                            </td>
                        </tr>

                        <tr>
                            <th class="ps-4 py-3">
                                Rôle
                            </th>

                            <td class="py-3">
                                <span class="badge text-bg-primary">
                                    <?= $machine['Role'] ?>
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>
        
        <div class="mt-4">

            <a href="toutesMachines.php" class="btn btn-outline-primary rounded-pill px-4">
                ← Retour aux machines
            </a>

        </div>

    </div>

</div>

<?php

} else {

    header('Location: ../pages/login.php');
    exit();

}

include '../component/footer.php';
?>