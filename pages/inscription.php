<?php
session_start();
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

// Rediriger si déjà connecté
if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit();
}

// Initialiser les variables
$nom = $prenom = $login = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $mdp = $_POST['mdp'];

    if (!empty($nom) && !empty($prenom) && !empty($login) && !empty($email) && !empty($mdp)) {

        // Vérifier si login ou email existe déjà
        $stmt = $con->prepare("SELECT login, email FROM utilisateurs WHERE login = ? OR email = ?");
        $stmt->bind_param("ss", $login, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();

        if ($res && $row['login'] === $login) {
            echo '<div class="alert alert-danger text-center">L\'identifiant est déjà utilisée.</div>';
        } elseif ($res && $row['email'] === $email) {
            echo '<div class="alert alert-danger text-center">L\'adresse mail est déjà utilisée.</div>';
        } else {
            // Insérer les données dans la base de données
            $stmt = $con->prepare("INSERT INTO utilisateurs (nom, prenom, login, email, mdp) VALUES (?, ?, ?, ?, ?)");
            $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
            $stmt->bind_param("sssss", $nom, $prenom, $login, $email, $hashedMdp);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                echo '<div class="alert alert-danger text-center">Erreur lors de l\'inscription.</div>';
            }
        }
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger text-center">Veuillez remplir tous les champs.</div>';
    }
}
?>



<div class="my-5 container border border-1 border-muted rounded p-5 mt-5 bg-light">
    <h1 class="text-center fw-bold mt-2 text-dark">Créer un nouveau compte</h1>
    <hr class="mb-5">
    <div class="row mb-4 ">
        <div class="col-md-6">
            <form method="post" action="./inscription.php">
                <div class="form-group">
                    <label><span class="fw-bold">Nom</span></label>
                    <input type="text" class="form-control form-control-lg mt-2" name="nom"
                        value="<?= htmlspecialchars($nom) ?>" required>
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><span class="fw-bold">Prénom</span></label>
                <input type="text" class="form-control form-control-lg mt-2" name="prenom"
                    value="<?= htmlspecialchars($prenom) ?>" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-4">
        <label><span class="fw-bold">Identifiant</span></label>
        <input type="text" class="form-control form-control-lg mt-2" name="login"
            value="<?= htmlspecialchars($login) ?>" required>
    </div>

    <div class="form-group mb-4">
        <label><span class="fw-bold">Adresse mail</span></label>
        <input type="email" class="form-control form-control-lg mt-2" name="email"
            value="<?= htmlspecialchars($email) ?>" required>
    </div>

    <div class="form-group">
        <label><span class="fw-bold">Mot de passe</span></label>
        <input type="password" class="form-control form-control-lg mt-2" name="mdp"
             required>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold shadow-sm py-3 mt-4">S'inscrire</button>
    </div>
    </form>
    <div class="text-center mt-4">
        <p class="text-muted mb-0">Déjà inscrit ? <a href="./login.php" class="text-decoration-none fw-bold">Se connecter</a></p>
    </div>
</div>

<?php include '../component/footer.php'; ?>