<?php
include '../component/header.php'
?>

<h2>Connection à la base de donnée</h2>

<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Identifiant</label>
        <input type="text" class="form-control" name="id" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Saisissez votre identifiant ici" required>
        </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Saisissez votre mot de passe" required>
    </div>
    <a href=".\inscription.php">Aucun compte</a>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>




<?php
include '../component/footer.php'
    ?>