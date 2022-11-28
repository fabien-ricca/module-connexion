<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');   // On se connecte à phpmyadmin pour récupérer la Base de donnée
    $request = $mysqli->query("SELECT login, nom, prenom, password FROM utilisateurs");       // On lance la requête pour récupérer la table
    $line = $request->fetch_array(MYSQLI_ASSOC);   
?>