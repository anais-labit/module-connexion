    <?php

    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');

    // une requete pour fetch la bd et comparer le login, s'il n'existe pas alors, je passe à la suite (création)
    $catchUsers = $conn->query("SELECT login FROM utilisateurs");
    $users = $catchUsers->fetch_all();
    // var_dump($users);

    // une requete pour insérer les inputs des nouveaux utilisateurs dans les champs de la db à condition que le login n'existe pas déjà
    if ($users = $login) {

        // if (!$conn) {
        //     die("La connexion à la base de donnés a échoué");
        //     $conn->close();
        // }
        if (isset($login, $pwd)) {
            if (empty($login)) {
                echo "Login vide";
            } elseif (empty($prenom)) {
                echo "Prénom vide";
            } elseif (empty($nom)) {
                echo "Nom vide";
            } elseif (empty($pwd)) {
                echo "Mot de passe vide";
            } elseif ($pwd === $pwd2) {
                if ($conn->query($new_user) === TRUE) {
                    echo "Félicitations ! Votre compte a été créé avec succès";
                }
            } else {
                echo "Erreur lors de la création du compte: mots de passe différents";
            }
        }
    } else {
        echo "Erreur ce Login n'existe pas ";
    }

    ?>