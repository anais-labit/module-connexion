<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>

    <?php include './includes/header.php' ?>

    <div class="text">
        <?php
        session_start();
        if (isset($_SESSION["login"])) {
            echo " <h1> Bienvenue " . ucwords($_SESSION['login']) . " !</h1>";
        } else {
            echo "Bienvenue !";
        }
        ?>
    </div>

    <?php include './includes/footer.php'; ?>
</body>

</html>