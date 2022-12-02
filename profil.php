 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Gérer mon profil</title>
 </head>

 <body>
     <?php include './includes/header.php';
        include './includes/connect-update.php';

        if (isset($_SESSION["login"])) {
            echo " <h1> Salut " . ucwords($_SESSION['login']) . " !</h1>";

            // echo "Modifier vos informations";
            $login = $_SESSION['login'];
            $pwd = $_SESSION['pwd'];

            $catchInfos = $conn->query("SELECT login, prenom, nom, password FROM utilisateurs WHERE login = '$login'");
            $displayInfos = $catchInfos->fetch_all();
            if (isset($_POST['submit'])) {
                $confpwd = ($_POST['confpwd']);
                $newpwd2 = ($_POST['newpwd2']);
                $newpwd = ($_POST['newpwd']);
                $newlogin = ($_POST['login']);

                if (($confpwd == $pwd) && ($newpwd == $newpwd2)) {
                    $upInfo = $conn->query("UPDATE utilisateurs SET login ='$newlogin', password = '$newpwd' WHERE login='$login'");
                    echo "Les modifications ont bien été prises en compte";
                    $_SESSION['login'] = $newlogin;
                    $_SESSION['pwd'] = $newpwd;
                    header("Refresh:2");
                } else {
                    echo "Mots de passe invalides";
                }
            }
        } else {
            header('Location: inscription.php');
        }
        ?>

     <div class="form_container">
         <div class="banner">
             <h3>Modifier vos informations</h3>
         </div>
         <form action="#" method="post">
             <input type="text" name="login" placeholder=" Login : <?= $_SESSION['login'] ?> ou nouveau ?">
             <input type="password" name="confpwd" placeholder="Ancien mot de passe">
             <input type="password" name="newpwd" placeholder="Nouveau mot de passe">
             <input type="password" name="newpwd2" placeholder="Confirmation mot de passe">
             <input type="submit" name="submit" value="Sauvegarder les changements" />
         </form>

         <a href="./includes/logout.php"> <br> Déconnexion</a>
         <?php include './includes/footer.php' ?>

 </body>

 </html>