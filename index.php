<?php
include './component/header.php';
require_once './bdd/connexion_bdd.php';

if (isset($_SESSION["login"])) {
    $id = $_SESSION["login"];
?>
    <div class="d-flex bd-highlight min-vh-100">
        <div class="p-2 flex-fill bd-highlight border w-25 text-light zone-utilisateur d-flex flex-column min-vh-100" style="background-color: #c3cfd9; border-color: #c3cfd9;">
            <div class="zone-pdp">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg" class="pdp" alt="">
            </div>

            <h2 class="text-center mt-2">- <?= $id ?> -</h2>

            <a href="" class="mt-4">
                <button type="submit" class="btn w-100 btnRedirection">
                    Statistiques globales
                </button>
            </a>

            <a href="./pages/toutesmachines.php" class="mt-4">
                <button type="submit" class="btn w-100 btnRedirection">
                    Toutes les machines
                </button>
            </a>

            <a href="" class="mt-4">
                <button type="submit" class="btn w-100 btnRedirection">
                    Tickets
                </button>
            </a>

            <a href="./pages/deconnexion.php" class="mt-auto">
                <button type="submit" class="btn btn-danger w-100">
                    Se déconnecter
                </button>
            </a>
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