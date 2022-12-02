<?php include 'include/connect.php';      //On joint la connexion à la base de donnée ?>

<!-- Sécurité pour que seul l'admin est accés à cette page -->
<?php if($_SESSION['login'] === $loginAdmin){ ?>

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
        <title>Administrateur</title>
    </head>
    <body>
        <header><?php include 'include/header.php' ?></header>

        <main class="flex-row">
            
            <section class="flex-column" id="table-container">
                <table>
                    <thead>
                        <tr>
                        <?php 
                            $request = $mysqli->query("SELECT login, nom, prenom FROM utilisateurs");       // On redéfinie la requête pour récupérer la table
                            $users = $request->fetch_array(MYSQLI_ASSOC);      // On récupère ligne par ligne

                            foreach ($users as $key => $value){             // Pour chaque élément du tableau (première ligne)
                                    echo '<th>' . $key . '</th>';           // On affiche la key
                                }
                            ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        
                            while($users != NULL){                               // Tant que $users n'est pas NULL (toujours la première ligne lors de la première boucle)
                                echo "<tr>";
                                foreach ($users as $key => $value){              // Pour chaque élément du tableau (ligne 1, 2, 3...)
                                        echo '<td>' . $value . '</td>';
                                    }
                                $users = $request->fetch_array(MYSQLI_ASSOC);    // On charge la seconde ligne, puis la troisième...
                                
                                echo "</tr>";
                            } 
                        ?>
                    </tbody>
                </table>
            </section>
        </main>

        <footer><?php include 'include/footer.php' ?></footer>
    </body>
</html>

<!-- S'il n'est pas un admin on redirige vers la page d'accueil -->
<?php } else{header('location: index.php');} ?>