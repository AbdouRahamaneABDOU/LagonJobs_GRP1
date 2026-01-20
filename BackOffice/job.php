<?php
require_once(__DIR__ . '/bdd.php');

if (isset($_POST['metier']) && !empty($_POST['metier'])
&& isset($_POST['desciption']) && !empty($_POST['desciption'])
&& isset($_POST['mission']) && !empty($_POST['mission'])
&& isset($_POST['profil']) && !empty($_POST['profil'])){
  $metier=$_POST['metier'];
  $descrip=$_POST['description'];
  $mission=$_POST['mission'];
  $profil=$_POST['profil'];
  $sqlQuery = 'INSERT INTO job(`Titre`,`Description`,`Titre`,`Titre`) VALUES (:Nom_Classe)';
  $insertJob = $mysqlClient->prepare($sqlQuery);
  $insertJob->execute([
    'Nom_Classe'=>$nom_classe,
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
            <form action="job.php" method="GET" class="form">

                <div>
                    <label>Titre</label>
                    <input type="text" name="metier" required>
                    
                    <label>description</label>
                    <textarea name="description" required></textarea>

                    <label>Missions</label>
                    <textarea name="mission" required></textarea>

                    <label>Profil</label>
                    <textarea name="profil" required></textarea>

                    <button type="submit" class="btn">Ajouter</button>
                    
                </div>
            </form>
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



