    <!-- <?php

    if (!isset($_POST["login"])) {
        $_POST["login"] = "";
        $_POST["pwd"] = "";
        $_POST["pwd2"] = "";
    };

    $login = $_POST["login"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');

    // une requete pour fetch la bd et comparer le login, s'il n'existe pas alors, je passe à la suite (création)
    $catchUsers = $conn->query("SELECT login FROM utilisateurs");
    $users = $catchUsers->fetch_all();
    // var_dump($users);

    // une requete pour valiser la connexion si le login n'existe déjà
    if ($users = $login) {
        if (isset($login, $pwd)) {
            if (empty($login)) {
                echo "Login vide";
            } elseif (empty($pwd)) {
                echo "Mot de passe vide";
            } elseif ($pwd === $pwd2) {
                include 'profil.php';
                echo "Félicitations ! Vous êtes bien connecté";
                if ($login['admin']) {
                    include 'admin.php';
                    echo "Vous êtes connecté en tant qu'admin";
                }
            } else {
                echo "Erreur : mots de passe différents";
            }
        }
    } else {
        echo "Erreur ce Login n'existe pas ";
        header("Location: inscription.php");
    }

    ?> -->