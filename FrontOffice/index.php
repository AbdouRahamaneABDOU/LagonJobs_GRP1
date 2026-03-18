<?php
// Verifier si la session existe
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
require_once(__DIR__ . '/bdd.php');

//Jointure  
$sqlQuery = 
'SELECT of.Id,
of.Titre,
of.Description,
of.Missions,
of.Profil,
ca.NomCategorie,
vi.NomVille,
st.NomStatut,
co.TypeContrat,
mo.NomModeTravail
FROM offres of 
JOIN categorie ca on ca.Id = of.Id_Categorie
JOIN ville vi on vi.Id = of.Id_Ville
JOIN statut st on st.Id = of.Id_Statut
JOIN contrats co on co.Id = of.Id_Contrats
JOIN modetravail mo on mo.Id = of.Id_ModeTravail ORDER BY Id DESC;';
$SelectOffres=$mysqlClient->prepare($sqlQuery);
$SelectOffres->execute();
$Offres=$SelectOffres->fetchAll();

$sqlQuery='SELECT * FROM  categorie';
$selectCat=$mysqlClient->prepare($sqlQuery);
$selectCat->execute();
$Cate=$selectCat->fetchAll();

$sqlQuery='SELECT * FROM  ville';
$selectVille=$mysqlClient->prepare($sqlQuery);
$selectVille->execute();
$Villes=$selectVille->fetchAll();

$sqlQuery='SELECT * FROM  statut';
$selectStatut=$mysqlClient->prepare($sqlQuery);
$selectStatut->execute();
$Statut=$selectStatut->fetchAll();

$sqlQuery='SELECT * FROM  contrats';
$selectContrat=$mysqlClient->prepare($sqlQuery);
$selectContrat->execute();
$Contrats=$selectContrat->fetchAll();

$sqlQuery='SELECT * FROM  modetravail';
$selectMode=$mysqlClient->prepare($sqlQuery);
$selectMode->execute();
$ModeTravail=$selectMode->fetchAll();


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
                    for ($i = 0; $i < count($Contrats); $i++) {
                        echo '<option value= "'.$Contrats[$i]['Id'].'">'.$Contrats[$i]['TypeContrat'].' </option>';
                        } 
                    ?>
                    </select>

                    <select name="job">
                        <option selected>ModeTravail</option>
                        <?php
                        for ($i = 0; $i < count($ModeTravail); $i++) {
                            echo '<option value= "'.$ModeTravail[$i]['Id'].'">'.$ModeTravail[$i]['NomModeTravail'].' </option>';
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
                <?php 
                for ($i=0;$i< 4;$i++) { ?>
                    <article class="card">
                        <p class="badge"><?php echo $Offres[$i]['TypeContrat']?></p>
                        <h3><?php echo $Offres[$i]['Titre']; ?></h3>
                        <p class="meta"><?php echo $Offres[$i]['NomVille']?> - <?php echo $Offres[$i]['NomModeTravail']?></p>
                        <p><?php echo $Offres[$i]['Description']?></p>
                        <form action="detail_offre.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $Offres[$i]['Id'] ?>">
                            <input type="hidden" name="titre" value="<?php echo $Offres[$i]['Titre'] ?>">
                            <input type="hidden" name="mission" value="<?php echo $Offres[$i]['Missions'] ?>">
                            <input type="hidden" name="des" value="<?php echo $Offres[$i]['Description'] ?>">
                            <input type="hidden" name="profil" value="<?php echo $Offres[$i]['Profil'] ?>">
                            <input type="hidden" name="ville" value="<?php echo $Offres[$i]['NomVille'] ?>">
                            <input type="hidden" name="mode" value="<?php echo $Offres[$i]['NomModeTravail'] ?>">
                            <input type="hidden" name="TypeC" value="<?php echo $Offres[$i]['TypeContrat'] ?>">
                            
                            <button type="submit" class="btn btn-outline">Voir</button>
                        </form>
                    </article>
                <?php 
                }?>

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
