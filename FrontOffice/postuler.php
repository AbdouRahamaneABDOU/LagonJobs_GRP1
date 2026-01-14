<?php
require_once(__DIR__ . '/bdd.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
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
        <h1>Postuler</h1>

            <form action="" method="GET" class="form">

                <label>Sujet</label>
                <input type="text" name="Sujet">
                

                <label>Message</label>
                <textarea name="Message" placeholder="Description"></textarea>
                <button type="submit" class="btn">Envoyer</button>

            </form> 
        </div>
    </section>



</body>
<footer class="site-footer">
    <div class="container footer-inner">
        <!--Racourci clavier Copyright © : alt + 0169  -->
        <p> © 2025 LagonJobs - Tous droits réservés </p> 
        <b> Confidentialité <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>
</html>