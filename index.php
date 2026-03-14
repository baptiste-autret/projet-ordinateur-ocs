<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo '<div class="alert alert-success text-center" role="alert">Connexion réussie !</div>';
    echo '<div class="alert alert-success text-center" role="alert">Bienvenue, ' . $id . ' !</div>';
} else {
    $id = '';
    header('Location: ./pages/login.php');
}
