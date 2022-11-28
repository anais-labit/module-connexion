    <?php

    $login = $_POST["login"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
    $new_user = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$pwd')";

    if (!$conn) {
        die("La connexion à la base de donnés a échoué");
        $conn->close();
    }

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

    ?>