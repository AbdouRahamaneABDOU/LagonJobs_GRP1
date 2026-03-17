<?php

require_once(__DIR__ . '/bdd.php');

//Modification d'une offre
if(isset($_POST['mod_id']) && 
isset($_POST['mod_metier']) &&
isset($_POST['mod_description']) &&
isset($_POST['mod_categorie']) &&
isset($_POST['mod_statut'])){
  $ModId=$_POST['mod_id'];
  $Mod_Metier=$_POST['mod_metier'];
  $Mod_Descrip=$_POST['mod_description'];
  $Mod_Cate=$_POST['mod_categorie'];
  $Mod_Statut=$_POST['mod_statut'];

  $sqlQuery = "UPDATE `offres` SET `Titre`=:titre,`Description`=:des,`Id_Categorie`=:IdCa,`Id_Statut`=:IdSa WHERE Id=:id";
  $editOffre = $mysqlClient->prepare($sqlQuery);
  $editOffre->execute([
    'id'=> $ModId,
    'titre'=> $Mod_Metier,
    'des'=>$Mod_Descrip,
    'IdCa'=> $Mod_Cate,
    'IdSa'=> $Mod_Statut
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

$sqlQuery = 
'SELECT Offres.Id, 
Ville.NomVille, 
Statut.NomStatut,
Offres.Titre,
Offres.Description,
Offres.Id_Categorie,
Offres.Id_Statut,
Categorie.NomCategorie
FROM Offres
JOIN Statut on Statut.Id = Offres.Id_Statut
JOIN Categorie on Categorie.Id = Offres.Id_Categorie
JOIN Ville on Ville.Id = Offres.Id_Ville;';

$SelectOffres=$mysqlClient->prepare($sqlQuery);
$SelectOffres->execute();
$Offres=$SelectOffres->fetchAll();

$sqlQuery='SELECT * FROM  statut';
$selectStatut=$mysqlClient->prepare($sqlQuery);
$selectStatut->execute();
$Statut=$selectStatut->fetchAll();

$sqlQuery='SELECT * FROM  categorie';
$selectCat=$mysqlClient->prepare($sqlQuery);
$selectCat->execute();
$Cate=$selectCat->fetchAll();

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

                    <label for="listbox" name="status">Statut</label>
                    <select name="stat">
                        <?php 
                        for ($i=0;$i<count($Statut);$i++) {
                            if(isset($_POST['stat']) && $Statut[$i]['Id']===intval($_POST['stat'])) { 
                                echo "<option value=".$Statut[$i]['Id']."selected>".$Statut[$i]['NomStatut']."</option>";
                            }else{
                                echo "<option value=".$Statut[$i]['Id'].">".$Statut[$i]['NomStatut']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox" name="categorie">Catégorie</label>
                    <select name="cat">
                        <?php 
                        for ($i=0;$i<count($Cate);$i++) {
                            if(isset($_POST['cat']) && $Cate[$i]['Id']===intval($_POST['cat'])) { 
                                echo "<option value=".$Cate[$i]['Id']."selected>".$Cate[$i]['NomCategorie']."</option>";
                            }else{
                                echo "<option value=".$Cate[$i]['Id'].">".$Cate[$i]['NomCategorie']."</option>";
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
                            <form action="edit_index.php" method="POST">
                                <input type="hidden" name="id_edit" value="<?php echo $Offres[$i]['Id']?>">
                                <input type="hidden" name="Titre_edit" value="<?php echo $Offres[$i]['Titre']?>">
                                <input type="hidden" name="Desc_edit" value="<?php echo $Offres[$i]['Description']?>">
                                <input type="hidden" name="Statut_edit" value="<?php echo $Offres[$i]['Id_Statut']?>">
                                <input type="hidden" name="Cat_edit" value="<?php echo $Offres[$i]['Id_Categorie']?>">
                                <button type="submit" class="btn" >Éditer</button >
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

    <!--<div class="popup-fond">
        <div class="popup-content">
            <form>
                <label>Titre</label>
                <input type="text" name="title" />
                <label>Description</label>
                <textarea type="text" name="desc"></textarea>
                <label>Description</label>
                <textarea type="text" name="desc"></textarea>
                <button type="submit" class="btn">Modifier</button>
                <a href="javascrip:void(0)" class="popup-exit" onclick="openPopup()">Annuler</a>
            </form>
        </div>

    </div>-->
</body>
</html>