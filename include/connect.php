<?php 
    session_start(); // On ouvre la session, le 'include' doit être présent sur chaque pages en première ligne


    $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');   // On se connecte à phpmyadmin pour récupérer la Base de donnée
    $request = $mysqli->query("SELECT login, nom, prenom, password FROM utilisateurs");       // On lance la requête pour récupérer la table
    $users = $request->fetch_all();

    $loginAdmin = "admin";
?>