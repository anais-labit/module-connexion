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
        include './includes/connect-ins.php';
        session_start();
        if (isset($_SESSION["login"])) {
            echo " <h1> Bienvenue " . ucwords($_SESSION['login']) . " !</h1>";
            // echo "Modifier vos informations";
            $login = $_SESSION['login'];
            $catchInfos = $conn->query("SELECT login, prenom, nom, password FROM utilisateurs WHERE login = '$login'");
            $displayInfos = $catchInfos->fetch_all();
            foreach ($displayInfos as $ligne) {
                foreach ($ligne as $value) {
                }
            }
        } else {
            header('Location: connexion.php');
        }
        ?>

     <div class="form_container">
         <div class="banner">
             <h3>Modifier vos informations</h3>
         </div>
         <form action="#" method="post">
             <input type="text" name="login" placeholder=" Login : <?php echo $_SESSION['login'] ?>">
             <input type="password" name="pwd" placeholder="Mot de passe : <?php echo $value ?>">
             <input type="password" name="pwd2" placeholder="Confirmation mot de passe">
             <input type="submit" value="Sauvegarder les changements" />
         </form>

         <a href="./includes/logout.php"> <br> Déconnexion</a>
         <?php include './includes/footer.php' ?>

 </body>

 </html>