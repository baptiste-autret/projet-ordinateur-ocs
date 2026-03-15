<?php
include '../component/header.php'
?>


<h1 class="text-center fw-bold mt-2">- Créer un nouveau compte -</h1>

<div class="my-5 container border border-1 border-muted rounded p-5 mt-5 bg-light">
    <form method="post" action="./login.php">

        <div class="form-group mb-4">
            <label for="inputNom"><span class="text-decoration-underline fw-bold">Nom</span> :</label>
            <input type="nom" class="form-control mt-2" id="inputNom" name="nom" placeholder="Saisissez votre nom" required>
        </div>
        <div class="form-group mb-4">
            <label for="inputPrenom"><span class="text-decoration-underline fw-bold">Prénom</span> :</label>
            <input type="prenom" class="form-control mt-2" id="inputPrenom" name="prenom" placeholder="Saisissez votre prénom" required>
        </div>



        <div class="form-group mb-4">
            <label for="inputIdentifiant"><span class="text-decoration-underline fw-bold">Identifiant</span> :</label>
            <input type="text" class="form-control mt-2" name="id" id="inputIdentifiant"
                placeholder="Saisissez votre identifiant" required>
        </div>
        <div class="form-group mb-4">
            <label for="inputAdresseMail"><span class="text-decoration-underline fw-bold">Adresse mail</span> :</label>
            <input type="email" class="form-control mt-2" name="email" id="inputAdresseMail"
                placeholder="Saisissez votre adresse mail" required>
        </div>
        <div class="form-group">
            <label for="inputPassword"><span class="text-decoration-underline fw-bold">Mot de passe</span> :</label>
            <input type="password" class="form-control mt-2" id="inputPassword" name="password" placeholder="Saisissez votre mot de passe" required>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mr-5 w-100">Créer le compte</button>
        </div>
    </form>

    <a href="./login.php"><button type="button" class="btn btn-danger mr-5 w-100 mt-2">- J'ai un compte -</button></a>
</div>

<?php
include '../component/footer.php'
?>
