<?php
require_once(__DIR__ . '/bdd.php');

if(isset($_POST['metier']) && !empty($_POST['metier']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['mission']) && !empty($_POST['mission']) && isset($_POST['profil']) && !empty($_POST['profil']) && isset($_POST['categorie']) && !empty($_POST['categorie'])){
  $metier=$_POST['metier'];
  $descrip=$_POST['description'];
  $mission=$_POST['mission'];
  $profil=$_POST['profil'];
  $cate=$_POST['categorie'];
    
  $sqlQuery = "INSERT INTO job(`Titre`,`Description`,`Missions`,`Profil`,`Categorie`) VALUES (:Titre,:Descrip,:Mission,:Profil,:Cate)";
  $insertJob = $mysqlClient->prepare($sqlQuery);
  $insertJob->execute([
    'Titre'=>$metier,
    'Descrip'=>$descrip,
    'Mission'=>$mission,
    'Profil'=>$profil,
    'Cate'=>$cate
  ]);
}

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
                <a href="job.php">Métiers</a>
                <a href="offre.php">Offres</a>
                <a href="contacts.php">Contact</a>
                
            </nav>
        </div>
    </header>
    
    <section class="hero">

        
        <div class="container">
            <h1>Ajout un métier</h1>
            <form action="job.php" method="POST" class="form">

                <div>
                    <label>Titre</label>
                    <input type="text" name="metier" required>
                    
                    <label>description</label>
                    <textarea name="description" required></textarea>

                    <label>Missions</label>
                    <textarea name="mission" required></textarea>

                    <label>Profil</label>
                    <textarea name="profil" required></textarea>

                    <label>Catégorie</label>
                    <input type="text" name="categorie" required>

                    <button type="submit" class="btn">Ajouter</button>
                    
                </div>
            </form>

        </div>

        <div class="container card">
            <h2>Liste des métiers</h2>
            <table >
                <tr>
                    <th>Métier</th>
                    <th>Description</th>
                    <th>Missions</th>
                    <th>Profil</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
                <?php

                for ($i=0;$i<count($Jobs);$i++) {
                ?>  
                    <tr>
                        <td>
                            <?php echo ($i+1); ?>
                        </td>
                        <td>
                            <?php echo $Jobs[$i]['Titre']; ?>
                        </td>
                        <td>
                            <?php echo $Jobs[$i]['Description']; ?>
                        </td>
                        <td>
                             <?php echo $Jobs[$i]['Missions']; ?>
                        </td>
                        <td>
                             <?php echo $Jobs[$i]['Profil']; ?>
                        </td>
                        <td>
                             <?php echo $Jobs[$i]['Categorie']; ?>
                        </td>
                         <td>
                            <button type="submit">Éditer</button >
                            <button type="submit">Supprimer</button >
                        </td>
                       
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
   </section>
   
<body>
    <footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>

</html>



