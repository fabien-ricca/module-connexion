<?php include 'include/connect.php'; ?>    //On joint la connexion à la base de donnée


<?php   if($_SESSION['login'] === NULL){
            header('location: index.php');
        } ?>


<?php 
    $msgError = "";         //Création de la variable qui contiendra le message d'erreur du mdp

    if ($_POST != NULL){
        $login=htmlspecialchars($_POST['login']);                 // On récupère le login saisi
        $nom=htmlspecialchars($_POST['nom']);                     // On récupère le nom saisi
        $prenom=htmlspecialchars($_POST['prenom']);               // On récupère le prenom saisi
        $newPassword=htmlspecialchars($_POST['newpassword']);           // On récupère le premier mdp saisi
        $confNewPassword=htmlspecialchars($_POST['confnewpassword']);   // On récupère le second mdp saisi
        $password=htmlspecialchars($_POST['password']);             // On récupère l'ancien mdp

        // On créée la regex pour la vérification du mdp
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        
        $testLogin = true;                      // On crée le booléen pour le test du login
        $sessionLogin = $_SESSION['login'];     // On attribut le $_SESSION['login'] pour simplifier les requêtes SQL


        // On vérifie l'ancien mot de passe (Aucune modification ne sera effectuée si le mdp n'est pas correct)
        if(password_verify($password, $_SESSION['password'])){
            
            // On vérifie si le contenue du champ est différent à l'information en BDD, si oui on le modifie et on déconnecte
            if($nom != $_SESSION['nom']){
                    $request = $mysqli->query("UPDATE `utilisateurs` SET nom='$nom' WHERE login='$sessionLogin'");
                    header('location: deconnexion.php');
            }

            // On vérifie si le contenue du champ est différent à l'information en BDD, si oui on le modifie et on déconnecte
            if($prenom != $_SESSION['prenom']){
                $request = $mysqli->query("UPDATE `utilisateurs` SET prenom='$prenom' WHERE login='$sessionLogin'");
                header('location: deconnexion.php');
            }

            // On vérifie si les deux mdp sont identiques
            if($newPassword === $confNewPassword){
                //On vérifie si le mdp est validée par la regex, si oui on le crypte et on le modifie et on déconnecte
                if(preg_match($password_regex, $newPassword)){
                    $cryptPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                    $request = $mysqli->query("UPDATE `utilisateurs` SET password='$cryptPassword' WHERE login='$sessionLogin'");
                    header('location: deconnexion.php');
                }
                //Sinon on affiche le message d'erreur
                else{
                    $msgError = "<p id='msgerror'> !! Le mot de passe doit contenir au moins 8 cractères dont
                    1 lettre majuscule, 1 lettre minuscule et 1 chiffre!! </p>";
                }

                //Si le login est différent de celui de la Session
                if($login != $sessionLogin){
                    // On vérifie s'il existe, si oui on pass $testLogin à false
                    foreach($users as $user){
                        if($user[0] === $login){                        
                            $msgError = "<p id='msgerror'>!! Le pseudo " . $login . ' est déjà utilisé !!</p>';
                            $testLogin = false;
                            break;
                        }
                    }
                    // Si $testLogin est true, on le modifie et on déconnecte
                    if ($testLogin){
                        $request = $mysqli->query("UPDATE `utilisateurs` SET login='$login' WHERE login='$sessionLogin'");
                        header('location: deconnexion.php');
                    }
                }

            }
            // Sinon message d'erreur
            else{
                $msgError = "<p id='msgerror'> !! Les mots de passe ne sont pas identiques !!</p>";
            }

        }
        // Sinon message d'erreur
        else{
            $msgError = "<p id='msgerror'> !! Le mot de passe est incorectes !!</p>";
        }


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
                    <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" >

                    <label for="nom">Mon nom</label>
                    <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" >

                    <label for="prenom">Mon prénom</label>
                    <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" >

                    <label for="newpassword">Nouveau mdp</label>
                    <input type="password" name="newpassword">

                    <label for="confnewpassword">Confirmer nouveau mdp</label>
                    <input type="password" name="confnewpassword">

                    <label for="password">Ancien mdp</label>
                    <input type="password" name="password" >

                    <input type="submit" id="mybutton" value="Modifier">
                    <?php echo $msgError; ?>          <!-- Le message sera affiché en cas derreur -->
                   
                    
                </form>
            </div>
        </main>

        <footer><?php include 'include/footer.php' ?></footer>
    </body>
</html>