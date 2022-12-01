<?php include 'include/connect.php';
    session_destroy();   // On détruit la Session
    header("location: index.php");  // On redirige vers l'index
    ?>