<?php include 'include/connect.php' ?>
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
    <title>Je me connecte</title>
</head>
<body>
    <header><?php include 'include/header.php' ?></header>

    <main class="flex-row">


        <?php 
            var_dump($line) 
        ?>


        <div class="flex-row" id="form-container">
            <form action="" Method="POST" class="flex-column">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="" id="login" name="login" required>

                <label for="password">Mot de passe</label>
                <input type="text" class="" id="password" name="password" required>

                <input type="submit" class="" id="button" value="S'inscrire">
            </form>
            
        </div>
    </main>

    <footer><?php include 'include/footer.php' ?></footer>
</body>
</html>