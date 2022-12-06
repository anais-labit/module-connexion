 <?php
    session_start();
    ?>

 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles.css" />
     <title>Inscription</title>
 </head>

 <body>
     <?php
        include './includes/header.php';

        include './includes/connect-ins.php';
        ?>


     <div class="page">
         <div class="form_container">
             <div class="banner">
                 <h1>S'inscrire</h1>
             </div>
             <form action="inscription.php" method="post">
                 <input type="text" name="login" placeholder="Login">
                 <input type="text" name="prenom" placeholder="Prénom">
                 <input type="text" name="nom" placeholder="Nom">
                 <input type="password" name="pwd" placeholder="Mot de passe">
                 <input type="password" name="pwd2" placeholder="Confirmation du mot de passe">
                 <input type="submit" value="Créer mon compte" />
             </form>
         </div>
     </div>

     <?php
        include './includes/footer.php';
        ?>
 </body>

 </html>