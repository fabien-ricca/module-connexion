<!----------------------------------------------------------- PHP ------------------------------------------------------------------->      

<?php include 'include/connect.php';      //On joint la connexion à la base de donnée
    
    $loginError = "";       //Création de la variable qui contiendra le message d'erreur du login

    if ($_POST != NULL){
        $login=htmlspecialchars($_POST['login']);                 // On récupère le login saisi
        $password=htmlspecialchars($_POST['password']);           // On récupère le premier mdp saisi
        
        $testConnexion = false;          // On crée le booléen pour le test du login
        
        // On vérifie chaque login de la BDD
        for($i=0; isset($users[$i]); $i++){
            //Si les login correspondent et que les mdp correspondent
            if($users[$i][0] === $login && password_verify($password, $users[$i][3])){
                $testConnexion = true;                  // On passe sur true
                $_SESSION['login'] = $users[$i][0];     // On attribue des $_SESSION[''] avec les infos de l'user en BDD
                $_SESSION['nom'] = $users[$i][1];
                $_SESSION['prenom'] = $users[$i][2];
                $_SESSION['password'] = $users[$i][3];
                break;
            }
        }

        // Si $testConnexion est true : la connexion est ok
        if($testConnexion){
            header("location: index.php");   
        }
        // Si $testConnexion est false : connexion échouée
        else{
            $loginError = "<p id='msgerror'>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
?>
<!----------------------------------------------------------------------------------------------------------------------------------->

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
            <div class="flex-row" id="form-container">
                <form action="" Method="POST" class="flex-column">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" id="mybutton" value="Se connecter">
                    <?php echo $loginError; ?>
                    
                    <p>Mot de passe admin : Admin@!!123</p>
                </form>
            </div>
            
        </main>

        <footer><?php include 'include/footer.php' ?></footer>
    </body>
</html>