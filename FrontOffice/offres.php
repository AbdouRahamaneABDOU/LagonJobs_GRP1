<?php
require_once(__DIR__ . '/bdd.php');

$sqlQuery = 
'SELECT of.Id, 
of.Ville, 
of.Statut,
jb.Titre,
jb.Description,
jb.Categorie
FROM offres of 
JOIN job jb on jb.Id = of.Id_job;';
$SelectOffres=$mysqlClient->prepare($sqlQuery);
$SelectOffres->execute();
$Offres=$SelectOffres->fetchAll();

$sqlQuery='SELECT * FROM  job';
$selectjob=$mysqlClient->prepare($sqlQuery);    
$selectjob->execute();
$Jobs=$selectjob->fetchAll();

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
                        <?php foreach($Offres as $offre){ ?>
                            <option value="<?= $offre['Ville'] ?>"><?= $offre['Ville'] ?></option>
                        <?php } ?>
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
                    <?php foreach($Offres as $offre){ ?>
                        <article class="card">
                            <p class="badge"><?php echo $offre['Categorie'] ?></p>
                            <h3> <?php echo $offre['Titre'] ?></h2>

                            <p><?php echo $offre['Ville'] ?></p>

                            <p><?php echo $offre['Description'] ?></p>
                            <form action="detail_offre.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $offre['Id'] ?>">
                                <button type="submit" class="btn btn-outline">Détail</button>
                            </form>
                        </article>  

                    <?php } ?>
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