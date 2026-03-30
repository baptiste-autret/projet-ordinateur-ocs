<?php
include './component/header.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>
    <div class="d-flex bd-highlight min-vh-100">
        <div class="p-2 flex-fill bd-highlight border border-dark w-25 bg-dark text-light zone-utilisateur">
            <div class="zone-pdp">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg" class="pdp" alt=""></div>
            <h2 class="text-center mt-2">- <?= $id ?> -</h2>
        </div>


        <div class="p-2 flex-fill bd-highlight border w-75 min-vh-100">
            <div class="alert alert-success text-center" id="alerteUtilisateur">Connexion réussie !</div>
            <h1 class="text-center mt-2">Bienvenue !</h1>
            <hr>
        </div>
    </div>
    <?php
} else {
    $id = '';
    header('Location: ./pages/login.php');
}


include './component/footer.php';
