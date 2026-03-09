<?php
require_once(__DIR__ . '/bdd.php');

$sqlQuery = 
'SELECT Offres.Id, 
Ville.NomVille, 
Statut.NomStatut,
Offres.Titre,
Offres.Description,
Categorie.NomCategorie
FROM Offres
JOIN Ville on Ville.Id = Offres.Id_Ville
JOIN Statut on Statut.Id = Offres.Id_Statut
JOIN Categorie on Categorie.Id = Offres.Id_Categorie;';
$SelectOffres=$mysqlClient->prepare($sqlQuery);
$SelectOffres->execute();
$Offres=$SelectOffres->fetchAll();

$sqlQuery='SELECT * FROM  Ville';
$selectcity=$mysqlClient->prepare($sqlQuery);
$selectcity->execute();
$City=$selectcity->fetchAll();

$sqlQuery='SELECT * FROM  Contrats';
$selectcontrats=$mysqlClient->prepare($sqlQuery);
$selectcontrats->execute();
$Contrats=$selectcontrats->fetchAll();

$sqlQuery='SELECT * FROM  ModeTravail';
$selectwork=$mysqlClient->prepare($sqlQuery);
$selectwork->execute();
$Travail=$selectwork->fetchAll();
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

                    <label for="listbox">
                    <select name="type">
                        <option selected>TypeContrat</option>
                        <?php for($i = 0; $i< count($Contrats); $i++) {
                            echo '<option value= "'.$Contrats[$i]['Id'].'">'.$Contrats[$i]['TypeContrat'].'</option>';
                            } ?>
                    </select>

                    <label for="listbox">
                    <select name="ville">
                        <option selected>Ville</option>
                        <?php for($i = 0; $i< count($City); $i++) {
                            echo '<option value= "'.$City[$i]['Id'].'">'.$City[$i]['NomVille'].'</option>';
                            } ?>
                    </select>

                    <label for="listbox">
                    <select name="ModeTravail">
                        <option selected>ModeTravail</option>
                        <?php for($i = 0; $i< count($Travail); $i++) {
                            echo '<option value= "'.$Travail[$i]['Id'].'">'.$Travail[$i]['NomModeTravail'].'</option>';
                            } ?>
                    </select>
           
                    <button type="submit" class="btn">Filtrer</button>
                    <button type="reset" class="btn">Réinitialiser</button>
                
                </form>
            </div>
        
            <br>
            <br>
            <div class="container">
                <div class="cards">
                    <?php foreach($Offres as $Offres){ ?>
                        <article class="card">
                            <p class="badge"><?php echo $Offres['Categorie'] ?></p>
                            <h3> <?php echo $Offres['Titre'] ?></h2>

                            <p><?php echo $Offres['Ville'] ?></p>

                            <p><?php echo $Offres['Description'] ?></p>
                            <form action="detail_offre.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $Offres['Id'] ?>">
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