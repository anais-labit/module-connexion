 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Administrateur</title>
 </head>

 <body>
     <?php include './includes/header.php';
        session_start();
        if (($_SESSION["login"]) === "admin") {
            echo " <h1> Salut " . ucwords($_SESSION['login']) . " !</h1>";
            $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');
            $catchInfos = $conn->query("SELECT * FROM utilisateurs");
            $displayInfos = $catchInfos->fetch_all();
        ?>

         <table width="50%" align="center">
             <thead>
                 <th>ID</th>
                 <th>LOGIN</th>
                 <th>PRÉNOM</th>
                 <th>NOM</th>
                 <th>MOT DE PASSE</th>
             </thead>
             <tbody width="50%" align="center">
                 <?php
                    foreach ($displayInfos as $ligne) {
                        echo "<tr>";
                        foreach ($ligne as $value) {
                            echo "<td>" . $value;
                        }
                        echo "</tr>";
                    }
                    ?>
             </tbody>
         </table>
     <?php
        } else {
            header('Location: connexion.php');
        }
        ?>


     <div class="decon">
         <a href="./includes/logout.php"> <br> Déconnexion</a>
     </div>
     <?php include './includes/footer.php' ?>

 </body>

 </html>