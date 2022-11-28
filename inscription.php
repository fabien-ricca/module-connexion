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
    <title>Je m'inscris</title>
</head>
<body>
    <header><?php include 'include/header.php' ?></header>

    <main class="flex-row">

        

    <?php 
        $loginError = "";
        $mdpError = "";
        $msgok = "";

        if ($_POST != NULL){
            $login=$_POST['login'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $password=$_POST['password'];
            $confpassword=$_POST['confpassword'];

           /* echo '1'.$login.' '.$nom.' '.$prenom.' '.$password.' '.$confpassword;*/
           
           if(isset($req['login'])){
                $loginError ='Le pseudo ' . $_POST['login'] . 'est déjà utilisé';
           }

            if($password === $confpassword){
                $request = $mysqli->query("INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$nom', '$prenom', '$password')");
                $msgok = "<p id='msgok'>Inscription validée :)</p>";
            }
            else{
                $mdpError = "<p id='mdperror'> !! Les mots de passes différents !! </p>";
            }
        }
    ?>
        


        <div class="flex-row" id="form-container">
            <form action="" Method="POST" class="flex-column">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="" id="login" name="login" required>
                <?php echo $loginError; ?>

                <label for="nom">Nom</label>
                <input type="text" class="" id="nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" class="" id="prenom" name="prenom" required>

                <label for="password">Mot de passe</label>
                <input type="password" class="" id="password" name="password" required>

                <label for="confpassword">Confirmation</label>
                <input type="password" class="" id="confpassword" name="confpassword" required>

                <input type="submit" class="" id="button" value="S'inscrire">
                <?php echo $msgok; ?>
                <?php echo $mdpError; ?>
            </form>
        </div>
    </main>

    <footer><?php include 'include/footer.php' ?></footer>
</body>
</html>