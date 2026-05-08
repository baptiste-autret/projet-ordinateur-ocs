<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

$sqlOS = "SELECT OS, COUNT(*) as total FROM info_ordinateurs GROUP BY OS";
$resultOS = $pdo->query($sqlOS);

$labelsOS = [];
$dataOS = [];

while ($row = $resultOS->fetch()) {
    $labelsOS[] = $row['OS'];
    $dataOS[] = $row['total'];
}

$sqlClient = "SELECT Role, COUNT(*) as total FROM info_ordinateurs GROUP BY Role";
$resultClient = $pdo->query($sqlClient);

$labelsClient = [];
$dataClient = [];

while ($row = $resultClient->fetch()) {
    $labelsClient[] = $row['Role'];
    $dataClient[] = $row['total'];
}

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>
<div class="d-flex bd-highlight min-vh-100">

    <?php require_once '../component/navigation.php'; ?>

    <div class="p-2 flex-fill bd-highlight border w-75 min-vh-100">

        <div class="alert alert-success text-center" id="alerteUtilisateur">
            Connexion réussie !
        </div>

        <h1 class="text-center mt-2" style="font-weight: 700;">Statistiques globales</h1>
        <hr>

        

        <div class="container-fluid">
            <div class="row p-4">

                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card p-3 w-100" style="max-width: 450px;">
                        <h5 class="text-center mb-3">Répartition des OS</h5>

                        <div style="height: 300px;">
                            <canvas id="monGraphique"></canvas>
                        </div>

                        <script>
                            const labelsOS = <?= json_encode($labelsOS) ?>;
                            const dataOS = <?= json_encode($dataOS) ?>;
                        </script>

                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card p-3 w-100" style="max-width: 450px;">
                        <h5 class="text-center mb-3">Répartition des Rôles</h5>

                        <div style="height: 300px;">
                            <canvas id="monGraphique2"></canvas>
                        </div>

                        <script>
                            const labelsClient = <?= json_encode($labelsClient) ?>;
                            const dataClient = <?= json_encode($dataClient) ?>;
                        </script>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php
} else {
    header('Location: ../pages/login.php');
}
include '../component/footer.php';
?>