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
            <a href="index.html" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
            <nav class="nav">
                <a href="index.php">Tableau de bord</a>
                <a href="user.php">Utilisateurs</a>
                <a href="job.php">Métiers</a>
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
            
                    <form action="offres.html" method="get" class="search-inline">
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
                        <th>Status</th>
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
                                <form action="eleve.php" method="POST">
                                    <button type="submit">Supprimer</button >
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