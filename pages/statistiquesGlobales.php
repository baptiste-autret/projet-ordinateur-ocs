<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>
    <div class="d-flex bd-highlight min-vh-100">

        <?php require_once '../component/navigation.php'; ?>

        <div class="p-2 flex-fill bd-highlight border w-75 min-vh-100">
            <div class="alert alert-success text-center" id="alerteUtilisateur">Connexion réussie !</div>
            <h1 class="text-center mt-2">Statistiques globales</h1>
            <hr>

            <br>
            
            <canvas id="monGraphique"></canvas>
        </div>


    </div>
<?php
} else {
    $id = '';
    header('Location: ../pages/login.php');
}


include '../component/footer.php';
