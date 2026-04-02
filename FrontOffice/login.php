<?php
require_once(__DIR__ . '/bdd.php');

// Insertion en base

if (isset($_GET['AjoutPrenom']) && empty($_GET['AjoutPrenom'])=== false)
  if (isset($_GET['AjoutNom']) && empty($_GET['AjoutNom'])=== false)
    if (isset($_GET['AjoutMail']) && empty($_GET['AjoutMail'])=== false)
        if (isset($_GET['AjoutMdp']) && empty($_GET['AjoutMdp'])=== false)
          if (isset($_GET['AjoutConfMdp']) && empty($_GET['AjoutConfMdp'])=== false)
      {
        $Prenom = $_GET['AjoutPrenom'];
        $Nom = $_GET['AjoutNom'];
        $Mail = $_GET['AjoutMail'];
        $Mdp = $_GET['AjoutMdp'];
        $ConfMdp = $_GET['AjoutConfMdp'];

        if ($ConfMdp !== $Mdp){
            echo "Les mots de passe saisis ne sont pas identiques !";
           
       
            
        }else {
             // Faire l'insertion
            $insertCl = $mysqlClient-> prepare('INSERT INTO utilisateurs (Prenom,Nom,Mail,Password) VALUES (:prenom,:nom,:mail,:motdepasse)');
            $insertCl->execute([
                'prenom' => $Prenom,
                'nom' => $Nom,
                'mail' => $Mail,
                'motdepasse' => password_hash($Mdp, PASSWORD_DEFAULT),
                
            ]);
            
        }
}



?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="../img/Logo2.png">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.php" class="logo">
                <img src="../img/Logo.png" alt="Logo">
            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
                <a href="inscription.php" class="btn btn-outline">Inscription</a>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container center">
            <div class="stack auth-card">
                <h1>Connexion</h1>
            
                <form action="loginconnexion.php" method="POST" class="form ">
                    <label for="mail">Email</label>
                    <input type="email" name="mail">

                    <label for="mdp" class="stack actions">Mot de passe</label>
                    <input type="password" name="mdp" >

                    <button type="submit" name="envoi" class="btn actions">Se connecter </button>

                    

                    <a href="inscription.php" class="stack actions">Vous n'avez pas de compte ? Inscrivez-vous.</a>
                </form>
            </div>
        </div>
    </section>
</body>
<footer class="site-footer">
    <div class="container footer-inner">
        <!--Racourci clavier Copyright © : alt + 0169  -->
        <p> © 2025 LagonJobs - Tous droits réservés </p> 
        <b> Confidentialité  <a href="contact.php">Nous contacter</a> </b>
    </div>
</footer>
</html>