<?php
session_start();
include '../component/header.php';
require_once '../bdd/connexion_bdd.php';

// Rediriger si déjà connecté
if (isset($_SESSION['login'])) {
    header("Location: pagePrincipale.php");
    exit();
}

// Initialiser les variables pour garder les valeurs en cas d'erreur
$nom = $prenom = $login = $email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($nom) && !empty($prenom) && !empty($login) && !empty($email) && !empty($password)) {

        // Vérifier si login ou email existe déjà
        $stmt = $conn->prepare("SELECT login FROM users WHERE login = ? OR email = ?");
        $stmt->bind_param("ss", $login, $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res && $res->num_rows > 0) {
            echo '<div class="alert alert-danger text-center">Le login ou l\'email existe déjà.</div>';
        } else {
            // Insérer les données dans la base sans hash
            $stmt = $conn->prepare("INSERT INTO users (nom, prenom, login, email, mdp) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param($nom, $prenom, $login, $email, $password);

            if ($stmt->execute()) {
                $_SESSION['login'] = $login;
                header("Location: pagePrincipale.php");
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
            <input type="password" class="form-control mt-2" name="password"
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