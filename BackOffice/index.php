<?php

require_once(__DIR__ . '/bdd.php');

//modification de l'offre


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
                                <form action="offre_edit.php" method="POST">
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
</body>
<footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>

</html>