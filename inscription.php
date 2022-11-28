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

<!----------------------------------------------------------- PHP ------------------------------------------------------------------->      

    <?php 

        $loginError = "";       //Création de la variable qui contiendra le message d'erreur du login
        $mdpError = "";         //Création de la variable qui contiendra le message d'erreur du mdp
        $msgok = "";            //Création de la variable qui contiendra le message de validation

        if ($_POST != NULL){
            $login=$_POST['login'];                 // On récupère le login saisi
            $nom=$_POST['nom'];                     // On récupère le nom saisi
            $prenom=$_POST['prenom'];               // On récupère le prenom saisi
            $password=$_POST['password'];           // On récupère le premier mdp saisi
            $confpassword=$_POST['confpassword'];   // On récupère le second mdp saisi

            $mdpUpper = preg_match('@[A-Z]@', $password);       // Regex pour les Maj dans le mdp
            $mdpLower = preg_match('@[a-z]@', $password);       // Reges pour les Min dans le mdp
            $mdpNumber = preg_match('@[0-9]@', $password);      // Regex pour le nombre de caractères dans le mdp
            
           $testLogin = true;
            
            foreach($users as $user){
                /*echo $users[$i][0]. '<br>';*/
                if($user[0] === $login){       // On vérifie que le Login n'existe pas déjà, Si oui on créé le message d'erreur et on sort de la boucle
                    $loginError = "<p id='msgerror'>!! Le pseudo " . $_POST['login'] . ' est déjà utilisé !!</p>';
                    $testLogin = false;
                    echo $testLogin. 'a';
                }
            }   

            
            if($password != $confpassword){         // Si Les mdp sont différents 
                $mdpError = "<p id='msgerror'> !! Les mots de passes différents !! </p>";
            }
            else if(!$mdpUpper || !$mdpLower || !$mdpNumber || strlen($password) < 8){
                $mdpError = "<p id='msgerror'> !! Le mot de passe doit contenir au moins 8 cractères dont
                            1 lettre majuscule, 1 lettre minuscule et 1 chiffre!! </p>";
            }
            
             
            if($password === $confpassword && $testLogin === true){        // Si les deux mots de passes sont identiques, on crée le nouvel user
                $cryptPassword = password_hash($password, PASSWORD_BCRYPT);        //On crypte le mot de passe
                $request = $mysqli->query("INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$nom', '$prenom', '$cryptPassword')");
                $msgok = "<p id='msgok'>Inscription validée :)</p>";    // Message de confirmation
                header("location: connexion.php");
            }
            
                echo $testLogin. 'c';
        }
       
    ?>
<!----------------------------------------------------------------------------------------------------------------------------------->  
        


        <div class="flex-row" id="form-container">
            <form action="" Method="POST" class="flex-column">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="" id="login" name="login" required>
                <?php echo $loginError; ?>      <!--Le message sera affiché en cas d'erreur -->

                <label for="nom">Nom</label>
                <input type="text" class="" id="nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" class="" id="prenom" name="prenom" required>

                <label for="password">Mot de passe</label>
                <input type="password" class="" id="password" name="password" required>

                <label for="confpassword">Confirmation</label>
                <input type="password" class="" id="confpassword" name="confpassword" required>
                <?php echo $mdpError; ?>        <!-- Le message sera affiché en cas d'erreur -->

                <input type="submit" class="" id="button" value="S'inscrire">
                <?php echo $msgok; ?>           <!-- Le message sera affiché en cas de réussite -->
            </form>
        </div>
    </main>

    <footer><?php include 'include/footer.php' ?></footer>
</body>
</html>