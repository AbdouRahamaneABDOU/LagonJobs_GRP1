<?php
session_start();
require_once(__DIR__ . '/bdd.php');



$sqlQuery = 
'SELECT Offres.Id, 
Ville.NomVille, 
Statut.NomStatut,
Offres.Titre,
Offres.Missions,
Offres.Profil,
Offres.Description,
Contrats.TypeContrat,
ModeTravail.NomModeTravail,
Categorie.NomCategorie
FROM Offres
JOIN Ville on Ville.Id = Offres.Id_Ville
JOIN Statut on Statut.Id = Offres.Id_Statut
JOIN Contrats on Contrats.Id = Offres.Id_Contrats
JOIN ModeTravail on ModeTravail.Id = Offres.Id_ModeTravail
JOIN Categorie on Categorie.Id = Offres.Id_Categorie WHERE 1 = 1';

if(isset($_GET['keyword'])){
    $sqlQuery.= ' AND Offres.Titre LIKE "%'.$_GET['keyword'].'%"';
}

if(isset($_GET['ville']) && $_GET['ville']!= 'Ville' ){
    $sqlQuery.= ' AND Offres.Id_Ville = '.$_GET['ville'];
}

if(isset($_GET['typeC']) && $_GET['typeC']!= 'TypeContrat' ){
    $sqlQuery.= ' AND Offres.Id_Contrats = '.$_GET['typeC'];
}

if(isset($_GET['ModeTravail']) && $_GET['ModeTravail']!= 'ModeTravail' ){
    $sqlQuery.= ' AND Offres.Id_ModeTravail = '.$_GET['ModeTravail'];
}



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
    <link rel="icon" type="image/png" href="../img/Logo2.png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
       <header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.php">
                <img src="../img/Logo.png" alt="Logo">
            </a>

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

            <h1>Offres d'emploi & stages</h1>

            <div class="container">
        
                <form action="offres.php" method="get" class="search-inline card">
                    <input type="text" placeholder="Mot-clé" name="keyword">

                    <label for="listbox">
                    <select name="typeC">
                        <option>TypeContrat</option>
                        <?php for($i = 0; $i< count($Contrats); $i++) {
                            if(isset($_GET['Ville_of_edit']) && $Contrats[$i]['Id']===intval($_GET['Ville_of_edit'])) { 
                            echo '<option value= "'.$Contrats[$i]['Id'].'">'.$Contrats[$i]['TypeContrat'].'</option>';
                            }
                        }?>
                    </select>

                    <label for="listbox">
                    <select name="ville">
                        <option>Ville</option>
                        <?php for($i = 0; $i< count($City); $i++) {
                            echo '<option value= "'.$City[$i]['Id'].'">'.$City[$i]['NomVille'].'</option>';
                            } ?>
                    </select>

                    <label for="listbox">
                    <select name="ModeTravail">
                        <option >ModeTravail</option>
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
                    <?php foreach($Offres as $Offre){ ?>
                        <article class="card">
                            <p class="badge"><?php echo $Offre['TypeContrat'] ?></p>
                            <h3> <?php echo $Offre['Titre'] ?></h2>

                            <p><?php echo $Offre['NomVille'] ?> - <?php echo $Offre['NomModeTravail']?></p>
                            <p><?php echo $Offre['Description'] ?></p>
                            <form action="detail_offre.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $Offre['Id'] ?>">
                                <input type="hidden" name="titre" value="<?php echo $Offre['Titre'] ?>">
                                <input type="hidden" name="mission" value="<?php echo $Offre['Missions'] ?>">
                                <input type="hidden" name="des" value="<?php echo $Offre['Description'] ?>">
                                <input type="hidden" name="profil" value="<?php echo $Offre['Profil'] ?>">
                                <input type="hidden" name="ville" value="<?php echo $Offre['NomVille'] ?>">
                                <input type="hidden" name="mode" value="<?php echo $Offre['NomModeTravail'] ?>">
                                <input type="hidden" name="TypeC" value="<?php echo $Offre['TypeContrat'] ?>">
                                
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