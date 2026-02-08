<?php
require_once(__DIR__ . '/bdd.php');

//Ajout d'une offre
if(isset($_POST['metier']) && !empty($_POST['metier']) && 
isset($_POST['description']) && !empty($_POST['description']) && 
isset($_POST['mission']) && !empty($_POST['mission']) && 
isset($_POST['profil']) && !empty($_POST['profil']) && 
isset($_POST['categorie']) && !empty($_POST['categorie']) && 
isset($_POST['statut']) && !empty($_POST['statut']) && 
isset($_POST['contrat']) && !empty($_POST['contrat']) && 
isset($_POST['modetravail']) && !empty($_POST['modetravail']) && 
isset($_POST['ville']) && !empty($_POST['ville'])){
  $metier=$_POST['metier'];
  $descrip=$_POST['description'];
  $mission=$_POST['mission'];
  $profil=$_POST['profil'];
  $cate=$_POST['categorie'];
  $ville=$_POST['ville'];
  $contract=$_POST['contrat'];
  $modetravail=$_POST['modetravail'];
  $statut=$_POST['statut'];
    
  $sqlQuery = "INSERT INTO `offres`(`Titre`, `Description`, `Profil`, `Missions`, `Id_Ville`, `Id_Categorie`, `Id_Contrats`, `Id_ModeTravail`, `Id_Statut`) 
  VALUES (:Titre,:Descrip,:Profil,:Mission,:IdVille,:IdCate,:IdCont,:IdMode,:IdStat)";
  $insertJob = $mysqlClient->prepare($sqlQuery);
  $insertJob->execute([
    'Titre'=>$metier,
    'Descrip'=>$descrip,
    'Profil'=>$profil,
    'Mission'=>$mission,
    'IdVille'=>$ville,
    'IdCate'=>$cate,
    'IdCont'=>$contract,
    'IdMode'=>$modetravail,
    'IdStat'=>$statut
  ]);
}

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
    <title>Jobs</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.html" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
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
            <h1>Ajout d'une offre</h1>
            <form action="offre.php" method="POST" class="form">

                <div>
                    <label>Titre</label>
                    <input type="text" name="metier" required>
                    
                    <label>description</label>
                    <textarea name="description" required></textarea>

                    <label>Missions</label>
                    <textarea name="mission" required></textarea>

                    <label>Profil</label>
                    <textarea name="profil" required></textarea>
                    
                    <label for="listbox">Ville</label>
                    <select name="ville" >
                        <?php 
                        for ($i=0;$i<count($Villes);$i++) {
                            if(isset($_POST['ville']) && $Villes[$i]['Id']===intval($_POST['ville'])) { 
                                echo "<option value=".$Villes[$i]['Id']."selected>".$Villes[$i]['NomVille']."</option>";
                            }else{
                                echo "<option value=".$Villes[$i]['Id'].">".$Villes[$i]['NomVille']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox">Mode de travail</label>
                    <select name="modetravail" >
                        <?php 
                        for ($i=0;$i<count($ModeTravail);$i++) {
                            if(isset($_POST['modetravail']) && $ModeTravail[$i]['Id']===intval($_POST['modetravail'])) { 
                                echo "<option value=".$ModeTravail[$i]['Id']."selected>".$ModeTravail[$i]['NomModeTravail']."</option>";
                            }else{
                                echo "<option value=".$ModeTravail[$i]['Id'].">".$ModeTravail[$i]['NomModeTravail']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox">Contrat</label>
                    <select name="contrat" >
                        <?php 
                        for ($i=0;$i<count($Contrats);$i++) {
                            if(isset($_POST['contrat']) && $Contrats[$i]['Id']===intval($_POST['contrat'])) { 
                                echo "<option value=".$Contrats[$i]['Id']."selected>".$Contrats[$i]['TypeContrat']."</option>";
                            }else{
                                echo "<option value=".$Contrats[$i]['Id'].">".$Contrats[$i]['TypeContrat']."</option>";
                            }
                        } ?>
                    </select>

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
                    
                    <button type="submit" class="btn">Ajouter</button>
                    <button type="reset" class="btn">Réinitialiser</button>
                    
                </div>
            </form>


        </div>
</br>

        <div class="container card">
            <h2>Liste des métiers</h2>
            <table >
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Profil</th>
                    <th>Missions</th>
                    <th>Catégorie</th>
                    <th>Ville</th>
                    <th>Contrat</th>
                    <th>Mode de travail</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                <?php 

                for ($i=0;$i<count($Offres);$i++) {
                ?>  
                    <tr>
                        <td>
                            <?php echo $Offres[$i]['Titre']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['Description']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['Profil']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['Missions']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['NomCategorie']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['NomVille']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['TypeContrat']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['NomModeTravail']; ?>
                        </td>
                        <td>
                            <?php echo $Offres[$i]['NomStatut']; ?>
                        </td>
                         <td>
                            <form action="offre_edit.php" method="POST">
                                <input type="hidden" name="id_of_edit" value="<?php echo $Offres[$i]['Id']?>">
                                <input type="hidden" name="Titre_of_edit" value="<?php echo $Offres[$i]['Titre']?>">
                                <input type="hidden" name="Desc_of_edit" value="<?php echo $Offres[$i]['Description']?>">
                                <input type="hidden" name="Profil_of_edit" value="<?php echo $Offres[$i]['Profil']?>">
                                <input type="hidden" name="Mission_of_edit" value="<?php echo $Offres[$i]['Missions']?>">
                                <input type="hidden" name="Cat_of_edit" value="<?php echo $Offres[$i]['NomCategorie']?>">
                                <input type="hidden" name="Ville_of_edit" value="<?php echo $Offres[$i]['NomVille']?>">
                                <input type="hidden" name="Contract_of_edit" value="<?php echo $Offres[$i]['TypeContrat']?>">
                                <input type="hidden" name="Mode_of_edit" value="<?php echo $Offres[$i]['NomModeTravail']?>">
                                <input type="hidden" name="Statut_of_edit" value="<?php echo $Offres[$i]['NomStatut']?>">
                                <button type="submit">Éditer</button >
                            </form>
                            <form action="offre.php" method="POST">
                                <input type="hidden" name="supp_offre" value="<?php echo $Offres[$i]['Id']?>">
                                <button type="submit">Supprimer</button >
                            </form>
                        </td>
                       
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </main>
   
    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 LagonJobs — Tous droits réservés</p>
            <b> Confidentialité  <a href="contacts.php">Nous contacter</a> </b>
        </div>
    </footer>
</body>
</html>



