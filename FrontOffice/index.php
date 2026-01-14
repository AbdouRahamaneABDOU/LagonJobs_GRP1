<?php
require_once(__DIR__ . '/bdd.php');


$sqlQuery = 'SELECT * FROM contrats';
$contratsStatement = $mysqlClient->prepare($sqlQuery);
$contratsStatement->execute();
$contrats = $contratsStatement->fetchAll();

$sqlQuery = 'SELECT * FROM modetravail';
$mdtrvlStatement = $mysqlClient->prepare($sqlQuery);
$mdtrvlStatement->execute();
$modetravail = $mdtrvlStatement->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LagonJobs – Accueil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.php">
                <span class="wave"></span>Lagon<span>Jobs</span>
            </a>

            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
                <a href="login.php" class="btn btn-outline">Connexion</a>
                <a href="inscription.php" class="btn btn-outline">Inscription</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="container grid">
            
            <div>
                <h1>Trouvez votre stage ou emploi facilement</h1>
                <p>
                    Des offres claires et à jour, pour étudiants et jeunes diplômés.  
                    Recherchez par mot-clé, lieu, type de contrat et télétravail.
                </p>
                <form class="search-inline card" action="" method="GET">
                    <input type="text" placeholder="Mot-clé (ex : PHP, support, réseau)" name="motcle">
                    <input type="text" placeholder="Ville (ex : Mamoudzou)" name="ville">

                    <select name="contrat">
                    <option selected>TypeContrat</option>
                   <?php
                    for ($i = 0; $i < count($contrats); $i++) {
                        echo '<option value= "'.$contrats[$i]['Id'].'">'.$contrats[$i]['TypeContrat'].' </option>';
                        } 
                    ?>
                    </select>

                    <select name="modetravail">
                        <option selected>ModeTravail</option>
                        <?php
                        for ($i = 0; $i < count($modetravail); $i++) {
                            echo '<option value= "'.$modetravail[$i]['Id'].'">'.$modetravail[$i]['NomModeTravail'].' </option>';
                            } 
                    ?>
                    </select>

                    <button class="btn" type="submit">Rechercher</button>
                </form>
            </div>

            <div class="card">


                <p><strong>Pourquoi LagonJobs ?</strong></p>

                <ul>
                    <li>Annonces adaptées aux profils SIO</li>
                    <li>Interface simple et lisible</li>
                    <li>Back-office pour administrateurs</li>
                </ul>
                <p>Astuce - Créer un compte pour sauvegarder des offices (plus tard).</p>
            </div>
        </div>
    </section>

    <!-- SECTION OFFRES -->
    <section class="section">
        <div class="container">
            <h2>Dernières offres</h2>

            <div class="cards">

                <article class="card">
                    <p class="badge">Stage</p>
                    <h3>Stagiaire – Développeur Web</h3>
                    <p class="meta">Mamoudzou - Hybride</p>
                    <p>Participer au développement du site e-commerce.</p>
                    <a class="btn btn-outline" href="detail_offre1.php">Voir</a>
                </article>

                <article class="card">
                    <p class="badge">CDD</p>
                    <h3>Technicien Support</h3>
                    <p class="meta">Dzaoudzi - Hybride</p>
                    <p>Assistance utilisateur, maintenance du matériel IT.</p>
                    <a class="btn btn-outline" href="detail_offre2.php">Voir</a>
                </article>

                <article class="card">
                    <p class="badge">CDI</p>
                    <h3>Admin Systèmes Junior</h3>
                    <p class="meta">Koungou - Télétravail</p>
                    <p>Gestion serveurs Linux / Windows, sauvegardes.</p>
                    <a class="btn btn-outline" href="detail_offre3.php">Voir</a>
                </article>

            </div>
        </div>
    </section>

</body>

<!-- FOOTER -->
<footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.php">Nous contacter</a> </b>
    </div>
</footer>

</html>
