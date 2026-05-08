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
    
                if (password_verify($password, $utilisateur['mdp'])) {
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

<div class="my-5 container border border-1 border-muted rounded p-5 mt-5 bg-light">
    <h1 class="text-center fw-bold mt-2 text-dark">Connexion à DAMB</h1>
    <hr class="mb-5">

    <?php if (isset($error)): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="./login.php">
        <div class="form-group mb-4">
            <label><span class="fw-bold">Identifiant</span></label>
            <input type="text" class="form-control form-control-lg mt-2" name="login" required>
        </div>

        <div class="form-group mb-4">
            <label><span class="fw-bold">Mot de passe</span></label>
            <input type="password" class="form-control form-control-lg mt-2" name="password" required>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold shadow-sm py-3 mt-4">Se connecter</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="text-muted mb-0">Pas encore de compte ? 
            <a href="./inscription.php" class="text-decoration-none fw-bold">Créer un compte</a>
        </p>
    </div>
</div>

<?php include '../component/footer.php'; ?>