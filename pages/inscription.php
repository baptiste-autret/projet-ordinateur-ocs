<?php
session_start();
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

// Rediriger si déjà connecté
if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit();
}

// Initialiser les variables pour garder les valeurs en cas d'erreur
$nom = $prenom = $login = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $mdp = $_POST['mdp'];

    if (!empty($nom) && !empty($prenom) && !empty($login) && !empty($email) && !empty($mdp)) {

        // Vérifier si login ou email existe déjà
        $stmt = $conn->prepare("SELECT login, email FROM utilisateurs WHERE login = ? OR email = ?");
        $stmt->bind_param("ss", $login, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();

        if ($res && $row['login'] === $login) {
            echo '<div class="alert alert-danger text-center">L\'identifiant est déjà utilisée.</div>';
        } 
        elseif ($res && $row['email'] === $email) {
            echo '<div class="alert alert-danger text-center">L\'adresse mail est déjà utilisée.</div>';
        }
        else {
            // Insérer les données dans la base sans hash
            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, login, email, mdp) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nom, $prenom, $login, $email, $mdp);

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

<h1 class="text-center fw-bold mt-2">- Créer un nouveau compte -</h1>

<div class="my-5 container border border-1 border-muted rounded p-5 mt-5 bg-light">
    <form method="post" action="./inscription.php">
        <div class="form-group mb-4">
            <label><span class="text-decoration-underline fw-bold">Nom</span> :</label>
            <input type="text" class="form-control mt-2" name="nom" placeholder="Saisissez votre nom"
                value="<?= htmlspecialchars($nom) ?>" required>
        </div>

        <div class="form-group mb-4">
            <label><span class="text-decoration-underline fw-bold">Prénom</span> :</label>
            <input type="text" class="form-control mt-2" name="prenom" placeholder="Saisissez votre prénom"
                value="<?= htmlspecialchars($prenom) ?>" required>
        </div>

        <div class="form-group mb-4">
            <label><span class="text-decoration-underline fw-bold">Identifiant</span> :</label>
            <input type="text" class="form-control mt-2" name="login"
                placeholder="Saisissez votre identifiant"
                value="<?= htmlspecialchars($login) ?>" required>
        </div>

        <div class="form-group mb-4">
            <label><span class="text-decoration-underline fw-bold">Adresse mail</span> :</label>
            <input type="email" class="form-control mt-2" name="email"
                placeholder="Saisissez votre adresse mail"
                value="<?= htmlspecialchars($email) ?>" required>
        </div>

        <div class="form-group">
            <label><span class="text-decoration-underline fw-bold">Mot de passe</span> :</label>
            <input type="password" class="form-control mt-2" name="mdp"
                placeholder="Saisissez votre mot de passe" required>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary w-100">Créer le compte</button>
        </div>
    </form>

    <a href="./login.php">
        <button type="button" class="btn btn-danger w-100 mt-2">- J'ai un compte -</button>
    </a>
</div>

<?php include '../component/footer.php'; ?>