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
            <a href="index.php" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
                <a href="login.php" class="btn btn-outline">Connexion</a>
                <a href="inscription.php" class="btn btn-outline">Inscription</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">

            <h1>Offres d'emploi & stages</h1>

            <div class="container">
        
                <form action="offres.php" method="get" class="search-inline card">
                    <input type="text" placeholder="Mot-clé">

                    <label for="listbox" name="type">
                    <select name="type">
                        <option value="0">Type</option>
                        <option value="1">Stage</option>
                        <option value="2">CDD</option>
                    </select>

                    <label for="listbox" name="ville">
                    <select name="ville">
                        <option value="0">Ville</option>
                        <option value="1">Mamoudzou</option>
                        <option value="2">Cavani</option>
                    </select>

                    <label for="listbox" name="teletravail">
                    <select name="">
                        <option value="1">Télétravail</option>
                        <option value="2">Bureau</option>
                    </select>
           
                    <button type="submit" class="btn">Filtrer</button>
                    <button type="reset" class="btn">Réinitialiser</button>
                
                </form>
            </div>
        
            <br>
            <br>
            <div class="container">
                <div class="cards">
                    <article class="card">
                        <p class="badge">Stage</p>
                        <h3> Stagiaire Développeur Web</h2>
                    
                        <p>Mamoudzou - Hybride</p>
                    
                        <p>Participer au développement des sites vitrine et e-commerce.</p>
                        
                        <a href="detail_offre1.php" class="btn btn-outline">Détail</a>
                        
                    </article>  

                    <article class="card">
                        <p class="badge">CDD</p>
                        <h3> Technicien support</h2>
                    
                        <p>Dzaoudzi - Sur site</p>
                    
                        <p>Assistance utilisateur, résolution d'incidents et maintenance</p>
                        <a href="detail_offre2.php" class="btn btn-outline">Détail</a>    
                
                    </article>

                    <article class="card">
                        <P class="badge">CDD</P>
                        <h3> Admin systèmes junior </h2>
                    
                        <p>Koungou - Hybride</p>
                    
                        <p>Administration Linux/Windows, sauvegardes et supervision</p>
                        <a href="detail_offre2.php" class="btn btn-outline">Détail</a>
                    </article>
                </div>  
            
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