<?php
require_once(__DIR__ . '/bdd.php');




if (isset($_POST['ajouter']) && !empty($_POST['Titre']) && !empty($_POST['ville']) && !empty($_POST['Description']) && !empty($_POST['statut']) && !empty($_POST['Categorie']))
{
    $des=$_POST['Description'];
    $tr=$_POST['Titre'];
    $cat=$_POST['Categorie'];
    $ins=$mysqlClient->prepare('INSERT INTO `job`( Titre, Description, Categorie) VALUES (:Titre, :Description, :Categorie)');
    $ins->execute ([ 'Titre'=> $tr, 'Description'=>$des, 'Categorie'=>$cat]); 


    $vil=$_POST['ville'];
    $stat=$_POST['statut'];
    $ins=$mysqlClient->prepare('INSERT INTO `offres`( Ville, Statut) VALUES (:Ville, :Statut)');
    $ins->execute ([ 'Ville'=> $vil, 'Statut'=>$stat]); 

}

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
                <a href="job.php">Métiers</a>
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
                            <input type="text" placeholder="Titre (ex : Développeur Web)" name="Titre" required>
                    </label>


                    <label>
                        Ville
                            <input type="text" placeholder="Ville (ex : Mamoudzou)" name="ville" required>
                    </label>
                </div>

                <label>
                Description
                    <textarea name="Description" placeholder="Description (ex : Développement et maintenance de site web)" required></textarea>
                </label>
            </div>

            <div class="row">
                <label>
                Statut
                    <input type="text" placeholder="statut (ex : CDI)" name="statut" required>
                </label>

                <label>
                Catégorie
                    <input type="text" placeholder="Categorie (ex : informatique)" name="Categorie" required>
                </label>
            </div>
            

            <div class="actions">
                <button type="submit" name="ajouter" class="btn">Enregistrer</button>
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



