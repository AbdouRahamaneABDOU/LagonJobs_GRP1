<?php
session_start();
require_once(__DIR__ . '/bdd.php');

if(isset($_POST['id']) && 
isset($_POST['titre']) &&
isset($_POST['mission']) &&
isset($_POST['des']) &&
isset($_POST['ville']) &&
isset($_POST['mode']) &&
isset($_POST['TypeC']) &&
isset($_POST['profil'])){
    $Id = $_POST['id'];
    $Titr = $_POST['titre'];
    $Miss = $_POST['mission'];
    $Prof = $_POST['profil'];
    $des = $_POST['des'];
    $city = $_POST['ville'];
    $Mdt = $_POST['mode'];
    $TC = $_POST['TypeC'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.php" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<a href="deconnexion.php" class="btn btn-outline">Déconnexion</a>';
                }else{
                    echo '<a href="login.php" class="btn btn-outline">Connexion</a>' . 
                    '<a href="inscription.php" class="btn btn-outline">Inscription</a>';
                }
                ?>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div >
                <p class="badge btn"><?php echo $TC?></p>
                <h1> <?php echo $Titr?></h1>
            
                <p><?php echo $city?> - <?php echo $Mdt?> - 3 à 6 mois </p>
                <p><b>Description</b> : <?php echo $des?></p>
                <p><b>Missions</b> : <?php echo $Miss?></p>
                <p><b>Profil </b>: <?php echo $Prof?></p>
                <a href="postuler.php" class="btn btn-outline">Postuler</a>
                <a href="offres.php" class="btn btn-outline">Autres offres</a>  
            </div>  
    
        </div>
    </section>

</body><br><br>
<footer class="site-footer">
    <div class="container footer-inner">
        <!--Racourci clavier Copyright © : alt + 0169  -->
        <p> © 2025 LagonJobs - Tous droits réservés </p> 
        <b> Confidentialité <a href="contact.php">Nous contacter</a> </b>
    </div>
</footer>
</html>