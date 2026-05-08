<div class="sidebar p-2 text-light d-flex flex-column text-bg-dark w-25"
style="border-right: 5px solid #050505;">
    <div class="zone-pdp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg" class="pdp" alt="">
    </div>

    <h2 class="text-center mt-2"><?= $id ?></h2>

    <a href="../index.php" class="mt-4">
        <button type="submit" class="btn w-100 btnRedirection">
            Statistiques globales
        </button>
    </a>

    <a href="../pages/toutesMachines.php" class="mt-4">
        <button type="submit" class="btn w-100 btnRedirection">
            Toutes les machines
        </button>
    </a>

    <a href="https://docs.google.com/forms/d/e/1FAIpQLScZUZXpnUB3ZyOY2D-E1SJR1TPA61Qd7sCmdTu0nqNPrB3Phw/viewform?usp=publish-editor" target="_blank" class="mt-4">
        <button type="submit" class="btn w-100 btnRedirection">
            Tickets
        </button>
    </a>

    <a href="../pages/deconnexion.php" class="mt-auto">
        <button type="submit" class="btn btn-danger w-100 mb-3">
            <i class="bi bi-box-arrow-left"></i> Se déconnecter
        </button>
    </a>
</div>