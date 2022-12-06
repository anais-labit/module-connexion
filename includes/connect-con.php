<?php

// // attribution d'une valeur par défaut aux POST pour éviter les erreurs
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
    // $_SESSION["login"] = "";
    //     $_POST["pwd"] = "";
};

$login = $_POST["login"];
// $pwd = $_POST["pwd"];

// connexion à ma db
$conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
// une requete pour parcourir les logins des utilisateurs et compter les éventuels doublons
$catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
$users = mysqli_num_rows($catchUsers);
$userInfo = $catchUsers->fetch_all();
// var_dump($userInfo);
// var_dump ($userInfo[0][4]);


// une requete pour valiser la connexion si le login existe déjà et que le mot de passe corresponde à celui en DB
if (($users === 1) && ($_POST["pwd"] === $userInfo[0][4])) {
    if (isset($login, $_POST["pwd"])) {
        $pwd = $_POST["pwd"];
        $_SESSION["login"] = $login;
        $_SESSION["pwd"] = $pwd;
        // echo "Connexion réussie" . "<br>";
        header("refresh:2; url=profil.php");
        if (empty($login)) {
            echo "Login vide";
        } elseif (empty($_POST["pwd"])) {
            echo "Mot de passe vide";
        } elseif ($login === "admin") {
            $_SESSION["login"] == $login;
            header("refresh:2; url=admin.php");
        }
    }
}
