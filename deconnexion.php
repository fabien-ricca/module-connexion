<?php include 'include/connect.php';
    session_destroy();   // On détruit la Session
    header("location: connexion.php");  // On redirige vers l'index
    ?>