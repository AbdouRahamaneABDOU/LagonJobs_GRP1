<?php
require_once(__DIR__ . '/bdd.php');

// Ajout de de la candidature en base

if (
    isset($_GET['AjoutPrenom']) && !empty($_GET['AjoutPrenom']) &&
    isset($_GET['AjoutNom']) && !empty($_GET['AjoutNom']) &&
    isset($_GET['AjoutCourriel']) && !empty($_GET['AjoutCourriel']) &&
    isset($_GET['AjoutMessage']) && !empty($_GET['AjoutMessage']) &&
    isset($_GET['AjoutPhone']) && !empty($_GET['AjoutPhone']) &&
    isset($_GET['AjoutAdresse']) && !empty($_GET['AjoutAdresse']) &&
    isset($_GET['AjoutCodePostal']) && !empty($_GET['AjoutCodePostal'])
)
      {
        $Prenom = $_GET['AjoutPrenom'];
        $Nom = $_GET['AjoutNom'];
        $Mail = $_GET['AjoutCourriel'];
        $Message = $_GET['AjoutMessage'];
        $Tel = $_GET['AjoutPhone'];
        $Adresse = $_GET['AjoutAdresse'];
        $CodePostal = $_GET['AjoutCodePostal'];

        // Faire l'insertion

      $insertCl = $mysqlClient-> prepare('INSERT INTO candidatures (MessageMotivation,Nom,Prenom,Courriel,Adresse,CodePostal,Tel) VALUES (:message,:nom,:prenom,:mail,:adresse,:codepostal,:tel)');
      $insertCl->execute([
        'message' => $Message,
        'nom' => $Nom,
        'prenom' => $Prenom,
        'mail' => $Mail,
        'adresse' => $Adresse,
        'codepostal' => $CodePostal,
        'tel'=> $Tel,
      ]);
}





$sqlQuery='SELECT * FROM  candidatures';
$selectcity=$mysqlClient->prepare($sqlQuery);
$selectcity->execute();
$City=$selectcity->fetchAll();

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LagonJobs – Candidatures</title>
    <link rel="icon" type="image/png" href="../img/Logo2.png">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.php">
                <img src="../img/Logo.png" alt="Logo">
            </a>

            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
            </nav>
        </div>
    </header>

    <section class="hero">
            <div class="container">
            <h1>Déposer une candidature spontanée</h1>
            

            <form action="candidatures.php" method="GET" class="form">

                <div class="row">
                    <div>
                        <label for="">Nom :</label>
                        <input type="text" name="AjoutNom" required>
                    </div>

                    <div>
                        <label for="">Prénom :</label>
                        <input type="text" name="AjoutPrenom" required>
                    </div>
                </div>

                <label>Message de motivation :
                    <textarea name="AjoutMessage" id=""></textarea required>
                </label>

                <div class="row">
                    <div>
                        <label for="">Courriel :</label>
                        <input type="mail" placeholder="Ex : Jean@gmail.com" name="AjoutCourriel" required>
                    </div>

                    <div>
                        <label for="">Téléphone :</label>
                        <input type="number" placeholder="Ex : 0639 03 10 07" name="AjoutPhone" required>
                    </div>
                    <div class="row">
                        <div>
                            <label for="">Adresse :</label>
                            <input type="text" placeholder="Ex : 500 rue de l'ecole primaire" name="AjoutAdresse" required>
                        </div>

                        <div>
                            <label for="">Code Postal :</label>
                            <input type="number" placeholder="Ex : 97600" name="AjoutCodePostal" required>
                        </div>
                    </div>

                </div>

                
                <button type="submit" class="btn actions">Envoyer</button>
                <button type="reset" class="btn">Reinitiliaser</button>
            
            </form>
    </section>




</body>

</html>