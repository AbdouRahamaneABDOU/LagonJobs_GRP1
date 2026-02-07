<?php

require_once(__DIR__ . '/bdd.php');

//modification de l'offre
/*
if (isset($_POST['Edit_Id']) && isset($_POST['Edit_Id_Titre']) && isset($_POST['Edit_Id_Ville']) && isset($_POST['Edit_Id_Statut']) && isset($_POST['Mod_Description']) && isset($_POST['Mod_Categorie'])) {
  $Id_offre_edit=$_POST['Edit_Id'];
  $T_offre_edit=$_POST['Edit_Id_Titre'];
  $V_offre_edit=$_POST['Edit_Id_Ville'];
  $S_offre_edit=$_POST['Edit_Id_Statut'];
  $sqlQuery = "UPDATE offres SET Id_Titre=:offre_titre,Statut=:offre_statut,Ville=:offre_ville  WHERE Id=:id";
  $editOffre = $mysqlClient->prepare($sqlQuery);
  $editOffre->execute([
    'id' => $Id_offre_edit,
    'offre_titre' => $T_offre_edit,
    'offre_statut' => $S_offre_edit,
    'offre_ville' => $V_offre_edit
  ]);
 
}*/

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

                <div class="container">
            
                    <form action="offres.html" method="POST" class="search-inline">
                        <label for="ajout">+Ajouter</label>
                        <input type="text" name="ajout">

                        <label for="listbox" name="status">Statut</label>
                        <select name="type">
                            <option value="0">Publiée</option>
                        </select>

                        <label for="listbox" name="categorie">Catégorie</label>
                        <select name="ville">
                            <option value="0"></option>
                        </select>

                    
                        <button type="submit" class="btn">Filtrer</button>
                        <button type="reset" class="btn">Réinitialiser</button>
                       
                    </form>
                </div>

                <br>
                <br>
                
                <table class="container">
                    
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
                            <td><?php echo $Offres[$i]['Statut']?></td>
                            <td><?php echo $Offres[$i]['Categorie']?></td>
                            <td><?php echo $Offres[$i]['Description']?></td>

                            <td>
                                <form action="offre_edit.php" method="POST">
                                    <button type="submit">Éditer</button >
                                </form>
                                <form action="index.php" method="POST">
                                    <button type="submit">Supprimer</button>
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