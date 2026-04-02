<?php
require_once(__DIR__ . '/bdd.php');

$sqlQuery='SELECT * FROM  Messages ORDER BY Id DESC';
$selectMsg=$mysqlClient->prepare($sqlQuery);
$selectMsg->execute();
$Chat=$selectMsg->fetchAll();

?>


<!DOCTYPE html><!-- test commit -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="icon" type="image/png" href="../img/Logo2.png">
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
        <header class="site-header">
            <div class="container header-inner">
                <a href="index.html" class="logo">
                    <img src="../img/Logo.png" alt="Logo">
                <nav class="nav">
                    <a href="index.php">Tableau de bord</a>
                    <a href="user.php">Utilisateurs</a>
                    <a href="offre.php">Offres</a>
                    <a href="contacts.php">Messages</a>
                    
                </nav>
            </div>
        </header>

    <section class="hero">
        <div class="container">
        <h1>Messages reçus !!!</h1>
        <br>
         <?php
        for($i = 0; $i< count($Chat); $i++) { ?>
            <div class="card">
                <p><b>Nom, Prénom : </b> <?php echo $Chat[$i]['Nom'].' '.$Chat[$i]['Prenom']?></p>
                <p><b>Courriel : </b> <?php echo $Chat[$i]['Email']?></p>
                <p><b>Sujet : </b> <?php echo $Chat[$i]['Sujet']?></p>
                <b>Description : </b>
                <p><?php echo $Chat[$i]['Message']?></p>
            </div>
            <br>
        <?php }?>

        </div>
    </section>
    

        
    </body>
 
    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 LagonJobs — Tous droits réservés</p>
            <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
        </div>
    </footer>

</html>

