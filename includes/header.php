<?php
include './includes/connect-con.php';
if (!isset($_POST["login"])) {
    $_POST["login"] = "";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Header</title>
</head>

<body>

    <header>

        <nav>
            <div class="navContainer">
                <ul>
                    <?php if ((isset($_SESSION['login'])) && ($_SESSION['login'] !== 'admin')) { ?>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="profil.php">Gérer mon profil</a></li>
                    <?php } elseif ((isset($_SESSION['login'])) && ($_SESSION['login'] === 'admin')) { ?>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="admin.php">Administrateur</a></li>
                        <li><a href="profil.php">Gérer mon profil</a></li>
                    <?php } else { ?>
                        <li><a href="index.php">Accueil</a></li>
                        <li> <a href="inscription.php">S'inscrire</a></li>
                        <li><a href="connexion.php">Se connecter</a></li>

                    <?php } ?>

                </ul>
            </div>

        </nav>
    </header>

</body>

</html>