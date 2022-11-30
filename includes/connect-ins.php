    <?php

    // attribution d'une valeur par défaut aux POST pour éviter les erreurs
    if (!isset($_POST["login"])) {
        $_POST["login"] = "";
        $_POST["prenom"] = "";
        $_POST["nom"] = "";
        $_POST["pwd"] = "";
        $_POST["pwd2"] = "";
    };

    // création des variables issues des POST
    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    // connexion à ma db
    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
    // une requete pour parcourir les logins des utilisateurs et compter les éventuels doublons
    $catchUsers = $conn->query("SELECT * FROM utilisateurs WHERE login='$login';");
    $users = mysqli_num_rows($catchUsers);
    // une requete pour insérer les inputs des nouveaux utilisateurs dans les champs de la db à condition que le login n'existe pas déjà
    $new_user = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$pwd')";

    if ($users === 0) {
        if (isset($login, $pwd)) {
            if (empty($login)) {
                echo "Renseignez un login";
            } elseif (empty($prenom)) {
                echo "Renseignez un Prénom";
            } elseif (empty($nom)) {
                echo "Renseignez un Nom";
            } elseif (empty($pwd)) {
                echo "Renseignez un Mot de passe";
            }
            if ($pwd === $pwd2) {
                if ($conn->query($new_user) === TRUE) {
                    echo "Félicitations ! Votre compte a été créé avec succès <br>" .
                        "<h3><a href=connexion.php>Se connecter</a></h3>";
                }
            } elseif ($users === 1) {
                echo "Erreur lors de la création du compte: Login déjà utilisé ";
            } else {
                echo "Erreur lors de la création du compte: mots de passe différents";
            }
        }
    }


    ?>
