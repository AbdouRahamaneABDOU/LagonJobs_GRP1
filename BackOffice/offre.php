<?php
require_once(__DIR__ . '/bdd.php');


SELECT `job.Id, job.Titre, job.Description, job.Missions, job.Profil, job.Categorie, offres.Id_Titre, offres.Categorie, offres.Ville, offres.Statut` FROM `job` JOIN `offres` on `offres.Id_Titre = job.Id`;    









// INSERT INTO `job`(`Titre, Description, Missions, Profil, Categorie`) VALUES (' , , , , ');

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
        <form action="" method="GET" class="form">

            <div>
                <div class="row">
                    <label>
                    Titre
                    <input type="text" name="Sujet" required>
                    </label>

                    <label>
                        Ville
                            <input type="text" name="type_contrat" required>
                    </label>
                </div>

                <label>
                    description
                    <textarea name="description" required></textarea>
                </label>
            </div>

            <div class="row">
                <label>
                Statut
                    <select name="type_contrat" required>
                        <option value="CDI">publie</option>
                        <option value="Stage">dd</option>
                    </select>
                </label>

                <label>
                Catégorie
                    <select name="type_contrat" required>
                        <option value="CDI">catégorie</option>
                        <option value="CDD">CDD</option>
                        <option value="Stage">Stage</option>
                        <option value="Freelance">Freelance</option>
                    </select>
                </label>
            </div>
            

            <div class="actions">
            <button type="submit" class="btn">Annuler</button>
            <button type="reset" class="btn">Enregistrer</button>
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



