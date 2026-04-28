<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];

    // Vérification de l'ID passé en GET
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: toutesMachines.php');
        exit();
    }

    $idMachine = (int) $_GET['id'];

    $stmt = $con->prepare("SELECT * FROM `info_ordinateurs` WHERE id_ordinateur = ?");
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
    <div class="d-flex bd-highlight min-vh-100">
        <?php require_once '../component/navigation.php'; ?>

        <div class="p-2 flex-fill bd-highlight border w-75 min-vh-100">
            <h1 class="text-center mt-2">
                Fiche machine : <?= $machine['nom_poste'] ?>
            </h1>
            <hr>

            <table class="table table-bordered w-50">
                <tbody>
                    <tr>
                        <th>Nom du poste</th>
                        <td><?= $machine['nom_poste'] ?></td>
                    </tr>
                    <tr>
                        <th>Système d'exploitation</th>
                        <td><?= $machine['OS'] ?></td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td><?= $machine['Ram'] ?></td>
                    </tr>
                    <tr>
                        <th>Stockage</th>
                        <td><?= $machine['Stockage'] ?></td>
                    </tr>
                    <tr>
                        <th>Rôle de la machine</th>
                        <td><?= $machine['Role'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
} else {
    header('Location: ../pages/login.php');
    exit();
}

include '../component/footer.php';