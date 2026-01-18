<?php
require_once(__DIR__ . '/bdd.php');


$tabl=[];
$fr=$mysqlClient->prepare('SELECT offres.Id, offres.Id_job, offres.Statut, offres.Ville, 
job.Titre,job.Categorie, job.Description, job.Missions, job.Profil
 FROM offres LEFT JOIN job ON job.Id = offres.Id_job;');
$fr->execute();
$tabl=$fr->fetchAll();



?>


<!DOCTYPE html>
<html lang="fr">
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
        </a>
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
        <form action="" method="POST" class="form">

            <div>
                <div class="row">
                    <label>
                        Titre
                            <select name="Titre" required>
                                <?php
                                    for ($i = 0; $i < count($tabl); $i++) {
                                        echo '<option value="'.$tabl[$i]['Titre'].'">'. 
                                        $tabl[$i]['Titre'].
                                        '</option>';}
                                ?>
                            </select>
                    </label>


                    <label>
                        Ville
                            <select name="ville" required>
                                <?php
                                    for ($i = 0; $i < count($tabl); $i++) {
                                        echo '<option value="'.$tabl[$i]['Ville'].'">'. 
                                        $tabl[$i]['Ville'].
                                        '</option>';}
                                ?>
                            </select>
                    </label>
                </div>

                <label>
                description
                    <select name="description" required>
                        <?php
                            for ($i = 0; $i < count($tabl); $i++) {
                                echo '<option value="'.$tabl[$i]['description'].'">'. 
                                $tabl[$i]['description'].
                                '</option>';}
                        ?>
                    </select>
                </label>
            </div>

            <div class="row">
                <label>
                Statut
                    <select name="statut" required>
                        <?php
                            for ($i = 0; $i < count($tabl); $i++) {
                                echo '<option value="'.$tabl[$i]['Statut'].'">'. 
                                htmlspecialchars($tabl[$i]['Statut']) .
                                '</option>';}
                        ?>
                    </select>
                </label>

                <label>
                Catégorie
                    <select name="categorie" required>
                         <?php
                            for ($i = 0; $i < count($tabl); $i++) {
                                echo '<option value="'.$tabl[$i]['Categorie'].'">'. 
                                $tabl[$i]['Categorie'].
                                '</option>';}
                         ?>
                    </select>
                </label>
            </div>
            

            <div class="actions">
                <button type="submit" name="Enregistrer" class="btn">Enregistrer</button>
                <button type="reset" name="effacer" class="btn">effacer</button>
            </div>

        </form>
    </div>
   </section>
   
<footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>
</body>
</html>



