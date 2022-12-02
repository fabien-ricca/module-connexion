<?php 
    session_start(); // On ouvre la session, le 'include' doit être présent sur chaque pages en première ligne


    $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');   // On se connecte à la BDD EN LOCAL
    //$mysqli = new mysqli('localhost', 'padawan', 'Bonj@ur123', 'fabien-ricca_moduleconnexion');   // On se connecte à la BDD sur Plesk
    $request = $mysqli->query("SELECT login, nom, prenom, password FROM utilisateurs");       // On lance la requête pour récupérer la table
    $users = $request->fetch_all();

    $loginAdmin = "admin";
?>