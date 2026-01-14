<?php
require_once(__DIR__ . '/bdd.php');

if(isset($_GET['envoi'])){
    if(!empty($_GET['mail']) AND !empty($_GET['mdp'])){

    }else{
        echo "Veuillez compléter tous les champs... ";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
                <a href="contact.html">Contact</a>
                <a href="login.php" class="btn btn-outline">Connexion</a>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container center">
            <div class="stack auth-card">
                <h1>Connexion</h1>
            
                <form action="index.php" method="get" class="form ">
                    <label for="mail">Email</label>
                    <input type="email" name="mail">

                    <label for="mdp" class="stack actions">Mot de passe</label>
                    <input type="password" name="mdp" >

                    <input type="submit" name="envoi" class="btn actions">Se connecter </input>
                    <button type="submit" class="btn">Créer un compte</button>

                    

                    <a href="" class="stack actions">Mot de passe oublié ?</a>
                </form>
            </div>
        </div>
    </section>
</body>
<footer class="site-footer">
    <div class="container footer-inner">
        <!--Racourci clavier Copyright © : alt + 0169  -->
        <p> © 2025 LagonJobs - Tous droits réservés </p> 
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>
</html>