<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <?php include 'header.php';
    include 'footer.php' ?>


    <div class="page">
        <div class="form_container">
            <div class="banner">
                <h1>Se connecter</h1>
            </div>
            <form action="connexion.php" method="post">
                <input type="text" name="login" placeholder="Login">
                <input type="password" name="pwd" placeholder="Mot de passe">
                <input type="submit" value="Se connecter" />
            </form>
        </div>
    </div>
</body>

</html>