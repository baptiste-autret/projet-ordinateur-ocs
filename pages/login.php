<?php
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        
        if ($stmt) {
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res && $res->num_rows === 1) {
                $utilisateur = $res->fetch_assoc();

                // Vérification du mot de passe en clair
                if ($password === $utilisateur['mdp']) {
                    $_SESSION['login'] = $utilisateur['login'];
                    header("Location: ../index.php");
                    exit;
                } else {
                    echo '<div class="alert alert-danger text-center" role="alert">Identifiant ou mot de passe incorrect.</div>';
                }
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">Identifiant ou mot de passe incorrect.</div>';
            }
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger text-center" role="alert">Erreur SQL</div>';
        }
    } else {
        echo '<div class="alert alert-danger text-center" role="alert">Veuillez remplir tous les champs.</div>';
    }
}
?>

<h1 class="text-center fw-bold mt-2">- Connection à la base de donnée -</h1>

<div class="my-5 container border border-1 border-muted rounded p-5 mt-5 bg-light">
    <form method="post" action="./login.php">
        <div class="form-group mb-4">
            <label for="inputIdentifiant"><span class="text-decoration-underline fw-bold">Identifiant</span> :</label>
            <input type="text" class="form-control mt-2" name="login" id="inputIdentifiant"
                placeholder="Saisissez votre identifiant ici" required>
        </div>
        <div class="form-group">
            <label for="inputPassword"><span class="text-decoration-underline fw-bold">Mot de passe</span> :</label>
            <input type="password" class="form-control mt-2" id="inputPassword" name="password" placeholder="Saisissez votre mot de passe" required>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mr-5 w-100">Se connecter</button>
        </div>
    </form>

    <a href="./inscription.php"><button type="button" class="btn btn-danger mr-5 w-100 mt-2">- Aucun compte -</button></a>
</div>


<?php
include '../component/footer.php'
?>