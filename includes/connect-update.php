<?php
session_start();

// // attribution d'une valeur par défaut aux POST pour éviter les erreurs
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
    //     $_POST["pwd"] = "";
};


// connexion à ma db
$conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
// une requete pour parcourir les logins des utilisateurs et compter les éventuels doublons

