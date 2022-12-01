<?php include 'include/connect.php' ?>

<?php 
        if(!isset($_SESSION) || $_SESSION['login'] == $loginAdmin)
        {
            header("location: index.php");
        }
            ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/f18b510552.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sahitya:wght@700&family=Trirong:wght@600&family=Trykker&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title><?php echo $_SESSION['login'] ?></title>
    </head>
    <body>
        <header><?php include 'include/header.php' ?></header>

        <main class="flex-row">
            <div class="flex-row" id="form-container">
                <form action="" Method="POST" class="flex-column">
                    <label for="login">Mon nom d'utilisateur</label>
                    <input type="text" id="login" name="login" required>

                    <label for="nom">Mon nom</label>
                    <input type="text" id="nom" name="nom" required>

                    <label for="prenom">Mon prénom</label>
                    <input type="text" id="prenom" name="prenom" required>

                    <label for="password">Nouveau mot de passe</label>
                    <input type="text" id="password" name="password" required>

                    <label for="password2">Confirmation</label>
                    <input type="text" id="password2" name="password2" required>

                    <input type="submit" id="mybutton" value="Modifier">
                </form>
            </div>
        </main>

        <footer><?php include 'include/footer.php' ?></footer>
    </body>
</html>