    <?php

    if (!isset($_POST["login"])) {
        $_POST["login"] = "";
        $_POST["prenom"] = "";
        $_POST["nom"] = "";
        $_POST["pwd"] = "";
        $_POST["pwd2"] = "";
    };

    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');

    // une requete pour fetch la bd et comparer le login, s'il n'existe pas alors, je passe à la suite (création)
    // $catchUsers = $conn->query("SELECT login FROM utilisateurs");
    // $users = $catchUsers->fetch_all();
    // var_dump($users);

    // une requete pour insérer les inputs des nouveaux utilisateurs dans les champs de la db à condition que le login n'existe pas déjà
    // if ($users = !$login) {
    $new_user = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$pwd')";

    // if (!$conn) {
    //     die("La connexion à la base de donnés a échoué");
    //     $conn->close();
    // }
    $catchUsers = $conn->query("SELECT * FROM `utilisateurs` WHERE login='$login';");
    $users = mysqli_num_rows($catchUsers);
    if ($users === 0) {
        if (isset($login, $pwd)) {
            if (empty($login)) {
                echo "Erreur lors de la création du compte: Login vide";
            } elseif (empty($prenom)) {
                echo "Erreur lors de la création du compte: Prénom vide";
            } elseif (empty($nom)) {
                echo "Erreur lors de la création du compte: Nom vide";
            } elseif (empty($pwd)) {
                echo "Erreur lors de la création du compte: Mot de passe vide";
            } elseif ($pwd === $pwd2) {
                if ($conn->query($new_user) === TRUE) {
                    echo "Félicitations ! Votre compte a été créé avec succès";
                }
            } else {
                echo "Erreur lors de la création du compte: mots de passe différents";
            }
        }
    } else {
        echo "Erreur lors de la création du compte: Login déjà utilisé ";
    }

    ?>