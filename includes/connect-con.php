<?php

// // attribution d'une valeur par défaut aux POST pour éviter les erreurs
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
    //     $_POST["pwd"] = "";
};

$login = $_POST["login"];
// $pwd = $_POST["pwd"];

// connexion à ma db
$conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
// une requete pour parcourir les logins des utilisateurs et compter les éventuels doublons
$catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
$users = mysqli_num_rows($catchUsers);

// une requete pour valiser la connexion si le login n'existe déjà
if ($users === 1) {
    if (isset($login, $_POST["pwd"])) {
        echo "Félicitations ! Vous êtes bien connecté"  . "<br>";
        session_start();
        $_SESSION["login"] = $login;
        echo "Connexion réussie" . "<br>";
        // header("Location: index.php");
        if (empty($login)) {
            echo "Login vide";
        } elseif (empty($_POST["pwd"])) {
            echo "Mot de passe vide";
        } elseif ($login === "admin") {
            include 'admin.php';
            echo "Vous êtes connecté en tant qu'admin";
        }
    }
} elseif ($users === 0) {
    echo "Ce login n'existe pas";
}
