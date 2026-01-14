<?php
require_once(__DIR__ . '/bdd.php');
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
            <a href="index.html" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.html">Contact</a>
                <a href="login.php" class="btn btn-outline">Connexion</a>
                <a href="inscription.html" class="btn btn-outline">Inscription</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <a href="offres.php">← Retour aux offres</a>
</br>   
</br>
            <div >
                <p class="badge btn">Stage</p>
                <h1> Stagiaire Développeur Web</h1>
            
                <p>Mamoudzou - Hybride - 3 à 6 mois </p>
            
                <p><b>Missions</b> : Intégrer des maquettes, corriger les bugs, participer aux revues de codes (niveau débutant)</p>
                <p><b>Profil </b>: motivation, bases HTML/CSS/JS, notions PHP bienvenues</p>
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
        <b> Confidentialité <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>
</html>