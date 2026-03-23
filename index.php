<?php
include './component/header.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
    ?>

    <div class="alert alert-success text-center" role="alert">Connexion réussie !</div>
    <h1 class="text-center">Bienvenue, « <?= $id ?> » sur cette incroyable page !</h1>
    <hr>
    <?php
} else {
    $id = '';
    header('Location: ./pages/login.php');
}
