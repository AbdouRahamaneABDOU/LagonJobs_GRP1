<?php

require_once(__DIR__ . '/bdd.php');

//Modification d'une offre
if(isset($_POST['mod_id']) && 
isset($_POST['mod_metier']) &&
isset($_POST['mod_description']) &&
isset($_POST['mod_mission']) && 
isset($_POST['mod_profil']) &&
isset($_POST['mod_categorie']) &&
isset($_POST['mod_statut']) && 
isset($_POST['mod_contrat']) &&
isset($_POST['mod_modetravail']) &&
isset($_POST['mod_ville'])){
  $Mod_Id=$_POST['mod_id'];
  $Modmetier=$_POST['mod_metier'];
  $Moddescrip=$_POST['mod_description'];
  $Modmission=$_POST['mod_mission'];
  $Modprofil=$_POST['mod_profil'];
  $Modcate=$_POST['mod_categorie'];
  $Modville=$_POST['mod_ville'];
  $Modcontract=$_POST['mod_contrat'];
  $Modmodetravail=$_POST['mod_modetravail'];
  $Modstatut=$_POST['mod_statut'];

  $sqlQuery = "UPDATE `offres` SET `Titre`=:titre,`Description`=:des,`Profil`=:pro,`Missions`=:mis,`Id_Ville`=:IdV,`Id_Categorie`=:IdCa,`Id_Contrats`=:IdCo,`Id_ModeTravail`=:IdMo,`Id_Statut`=:IdSa WHERE Id=:id";
  $editOffre = $mysqlClient->prepare($sqlQuery);
  $editOffre->execute([
    'id'=> $Mod_Id,
    'titre'=> $Modmetier,
    'des'=>$Moddescrip,
    'pro'=> $Modprofil,
    'mis'=> $Modmission,
    'IdV'=> $Modville,
    'IdCa'=> $Modcate,
    'IdCo'=> $Modcontract,
    'IdMo'=> $Modmodetravail,
    'IdSa'=> $Modstatut
  ]);
}
//suppression d'une offre 
if (isset($_POST['supp_offre'])){
  $Supp_Offre=$_POST['supp_offre'];
  
  $sqlQuery = "DELETE FROM `offres` WHERE Id=:id";
  $suppressionoffre = $mysqlClient->prepare($sqlQuery);
  $suppressionoffre->execute([
    'id'=> $Supp_Offre
  ]);
}

//Jointure  
$sqlQuery = 
'SELECT of.Id,
of.Titre,
of.Description,
of.Missions,
of.Profil,
of.Id_Contrats,
of.Id_Ville,
of.Id_Statut,
of.Id_ModeTravail,
of.Id_Categorie,
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
JOIN modetravail mo on mo.Id = of.Id_ModeTravail;';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="./popup.js" defer></script>
</head>   
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.php" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
            <nav class="nav">
                <a href="index.php">Tableau de bord</a>
                <a href="user.php">Utilisateurs</a>
                <a href="offre.php">Offres</a>
                <a href="contacts.php">Contact</a>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">

            <h1>Gestion des emplois</h1>
            <br>
            <br>

            <div class="container card">
        
                <form action="index.php" method="POST" class="search-inline">
                    <label for="ajout">+Ajouter</label>
                    <input type="text" name="ajout">

                    <label for="listbox" name="categorie">Catégorie</label>
                    <select name="categorie" >
                        <?php 
                        for ($i=0;$i<count($Cate);$i++) {
                            if(isset($_POST['categorie']) && $Cate[$i]['Id']===intval($_POST['categorie'])) { 
                                echo "<option value=".$Cate[$i]['Id']."selected>".$Cate[$i]['NomCategorie']."</option>";
                            }else{
                                echo "<option value=".$Cate[$i]['Id'].">".$Cate[$i]['NomCategorie']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox" name="statut">Statut</label>
                    <select name="statut" >
                        <?php 
                        for ($i=0;$i<count($Statut);$i++) {
                            if(isset($_POST['statut']) && $Statut[$i]['Id']===intval($_POST['statut'])) { 
                                echo "<option value=".$Statut[$i]['Id']."selected>".$Statut[$i]['NomStatut']."</option>";
                            }else{
                                echo "<option value=".$Statut[$i]['Id'].">".$Statut[$i]['NomStatut']."</option>";
                            }
                        } ?>
                    </select>
                    
                    <button type="submit" class="btn">Filtrer</button>
                    <button type="reset" class="btn">Réinitialiser</button>
                    
                </form>
            </div>

            <br>
            <br>
            
            <table class="container card">
                
                <tr>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Catégorie</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    for ($i=0;$i<count($Offres);$i++) {
                ?>
                    <tr>
                        <td><?php echo $Offres[$i]['Titre']?></td> 
                        <td><?php echo $Offres[$i]['NomStatut']?></td>
                        <td><?php echo $Offres[$i]['NomCategorie']?></td>
                        <td><?php echo $Offres[$i]['Description']?></td>

                        <td>
                            <form action="offre_edit.php" method="POST">
                                <input type="hidden" name="id_of_edit" value="<?php echo $Offres[$i]['Id']?>">
                                <input type="hidden" name="Titre_of_edit" value="<?php echo $Offres[$i]['Titre']?>">
                                <input type="hidden" name="Desc_of_edit" value="<?php echo $Offres[$i]['Description']?>">
                                <input type="hidden" name="Profil_of_edit" value="<?php echo $Offres[$i]['Profil']?>">
                                <input type="hidden" name="Mission_of_edit" value="<?php echo $Offres[$i]['Missions']?>">
                                <input type="hidden" name="Cat_of_edit" value="<?php echo $Offres[$i]['Id_Categorie']?>">
                                <input type="hidden" name="Ville_of_edit" value="<?php echo $Offres[$i]['Id_Ville']?>">
                                <input type="hidden" name="Contract_of_edit" value="<?php echo $Offres[$i]['Id_Contrats']?>">
                                <input type="hidden" name="Mode_of_edit" value="<?php echo $Offres[$i]['Id_ModeTravail']?>">
                                <input type="hidden" name="Statut_of_edit" value="<?php echo $Offres[$i]['Id_Statut']?>">
                                <button type="submit" class="btn">Éditer</button >
                            </form>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="supp_offre" value="<?php echo $Offres[$i]['Id']?>">
                                <button type="submit" class="btn">Supprimer</button >
                            </form>
                        </td>
                        
                    </tr>
                <?php
                }
                ?>

            </table>
            
    </section>

    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 LagonJobs — Tous droits réservés</p>
            <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
        </div>
    </footer>

</body>
</html>