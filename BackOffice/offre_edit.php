<?php
//modification de l'offre   
require_once(__DIR__ . '/bdd.php');

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
    <title>Modification de l'offre</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.html" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
        </a>
            <nav class="nav">
                <a href="index.php">Tableau de bord</a>
                <a href="user.php">Utilisateurs</a>
                <a href="offre.php">Offres</a>
                <a href="contacts.php">Contact</a>
                
            </nav>
        </div>
    </header>
    
    <main class="hero">

        <div class="container">
            <h1>Modification de l'offre</h1>
            <form action="offre.php" method="POST" class="form">

                <div>
                    <input name="mod_id" type="hidden" value="<?php echo $_POST['id_of_edit']?>">

                    <label>Titre</label>
                    <input type="text" name="mod_metier" value="<?php echo $_POST['Titre_of_edit']?>">
                    
                    <label>description</label>
                    <textarea name="mod_description" value="<?php echo $_POST['Desc_of_edit']?>"></textarea>

                    <label>Missions</label>
                    <textarea name="mod_mission" value="<?php echo $_POST['Mission_of_edit']?>"></textarea>

                    <label>Profil</label>
                    <textarea name="mod_profil" value="<?php echo $_POST['Profil_of_edit']?>"></textarea>
                    
                    <label for="listbox">Ville</label>
                    <select name="mod_ville" >
                        <?php 
                        for ($i=0;$i<count($Villes);$i++) {
                            if(isset($_POST['Ville_of_edit']) && $Villes[$i]['Id']===intval($_POST['Ville_of_edit'])) { 
                                echo "<option value=".$Villes[$i]['Id']."selected>".$Villes[$i]['NomVille']."</option>";
                            }else{
                                echo "<option value=".$Villes[$i]['Id'].">".$Villes[$i]['NomVille']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox">Mode de travail</label>
                    <select name="mod_modetravail" >
                        <?php 
                        for ($i=0;$i<count($ModeTravail);$i++) {
                            if(isset($_POST['Mode_of_edit']) && $ModeTravail[$i]['Id']===intval($_POST['Mode_of_edit'])) { 
                                echo "<option value=".$ModeTravail[$i]['Id']."selected>".$ModeTravail[$i]['NomModeTravail']."</option>";
                            }else{
                                echo "<option value=".$ModeTravail[$i]['Id'].">".$ModeTravail[$i]['NomModeTravail']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox">Contrat</label>
                    <select name="mod_contrat" >
                        <?php 
                        for ($i=0;$i<count($Contrats);$i++) {
                            if(isset($_POST['Contract_of_edit']) && $Contrats[$i]['Id']===intval($_POST['Contract_of_edit'])) { 
                                echo "<option value=".$Contrats[$i]['Id']."selected>".$Contrats[$i]['TypeContrat']."</option>";
                            }else{
                                echo "<option value=".$Contrats[$i]['Id'].">".$Contrats[$i]['TypeContrat']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox" name="categorie">Catégorie</label>
                    <select name="mod_categorie" >
                        <?php 
                        for ($i=0;$i<count($Cate);$i++) {
                            if(isset($_POST['Cat_of_edit']) && $Cate[$i]['Id']===intval($_POST['Cat_of_edit'])) { 
                                echo "<option value=".$Cate[$i]['Id']."selected>".$Cate[$i]['NomCategorie']."</option>";
                            }else{
                                echo "<option value=".$Cate[$i]['Id'].">".$Cate[$i]['NomCategorie']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox" name="statut">Statut</label>
                    <select name="mod_statut" >
                        <?php 
                        for ($i=0;$i<count($Statut);$i++) {
                            if(isset($_POST['Statut_of_edit']) && $Statut[$i]['Id']===intval($_POST['Statut_of_edit'])) { 
                                echo "<option value=".$Statut[$i]['Id']."selected>".$Statut[$i]['NomStatut']."</option>";
                            }else{
                                echo "<option value=".$Statut[$i]['Id'].">".$Statut[$i]['NomStatut']."</option>";
                            }
                        } ?>
                    </select>
                    
                    <button type="submit" class="btn">Modifier</button>
                    <button type="reset" class="btn">Réinitialiser</button>
                    
                </div>
            </form>
                    
        </div>
</main>
   
<footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>
</body>
</html>
