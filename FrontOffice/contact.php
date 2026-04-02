<?php 
session_start();
require_once(__DIR__ . '/bdd.php');

//Ajout d'une offre
if(isset($_POST['Nom']) && !empty($_POST['Nom']) && 
isset($_POST['Prenom']) && !empty($_POST['Prenom']) && 
isset($_POST['Email']) && !empty($_POST['Email']) && 
isset($_POST['Sujet']) && !empty($_POST['Sujet']) && 
isset($_POST['Message']) && !empty($_POST['Message'])){
  $nom=$_POST['Nom'];
  $prenom=$_POST['Prenom'];
  $mail=$_POST['Email'];
  $Sujet=$_POST['Sujet'];
  $Msg=$_POST['Message'];

  $sqlQuery = "INSERT INTO Messages (Nom, Prenom, Email, Sujet, Message) 
  VALUES (:nom,:prenom,:mail,:sujet,:message)";
  $insertalerte = $mysqlClient->prepare($sqlQuery);
  $insertalerte->execute([
    'nom'=>$nom,
    'prenom'=>$prenom,
    'mail'=>$mail,
    'sujet'=>$Sujet,
    'message'=>$Msg,
  ]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" type="image/png" href="../img/Logo2.png">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.php">
                <img src="../img/Logo.png" alt="Logo">
            </a>

            <nav class="nav">
                <a href="index.php">Accueil</a>
                <a href="offres.php">Offres</a>
                <a href="contact.php">Contact</a>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<a href="deconnexion.php" class="btn btn-outline">Déconnexion</a>';
                }else{
                    echo '<a href="login.php" class="btn btn-outline">Connexion</a>' . 
                    '<a href="inscription.php" class="btn btn-outline">Inscription</a>';
                }
                ?>
            </nav>
        </div>
    </header>

   <section class="hero">
    <div class="container">
      <h1>Contact</h1>
      <p>Une question ? Envoyez-nous un message et un administrateur vous répondra. </p>

    <form action="" method="POST" class="form">

    <div class="row">
      <label>
        Nom
        <input type="text" name="Nom" required>
      </label>

      <label>
        Prénom
        <input type="text" name="Prenom" required>
      </label>
    </div>

      <label>
        Email
        <input type="email" name="Email" required>
      </label>

      <label>
        Sujet
        <input type="text" name="Sujet" required>
      </label>


    <label>
      Message
      <textarea name="Message" required></textarea>
    </label>

    <div class="actions">
      <button type="submit" class="btn">Envoyer</button>
      <button type="reset" class="btn">Effacer</button>
    </div>

  </form>
  </div>
   </section>
   

    
</body>
<!-- FOOTER -->
<footer class="site-footer">
    <div class="container footer-inner">
        <p>© 2025 LagonJobs — Tous droits réservés</p>
        <b> Confidentialité  <a href="contact.php">Nous contacter</a> </b>
    </div>
</footer>

</html>

