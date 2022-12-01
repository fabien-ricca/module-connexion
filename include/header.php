<header class="flex-row">
    <nav class="flex-row">

        <!-- Si aucune Session n'est ouverte -->
        <?php if(!isset($_SESSION['login'])){ ?> 
            <a href="index.php">Accueil</a>
            <a href="inscription.php">Créer un compte</a>
            <a href="connexion.php">Se connecter</a>

        <!-- Sinon, si le login de la Session ouverte est "admin" -->
        <?php } elseif($_SESSION['login'] === "admin"){?>
                <a href="admin.php">Information Utilisateurs</a>
                <a href="deconnexion.php">Se déconnecter</a>

        <!-- Si une Session user est ouverte -->
        <?php } else{?>
            <a href="deconnexion.php">Se déconnecter</a>

        <?php } ?>
    </nav>
</header>