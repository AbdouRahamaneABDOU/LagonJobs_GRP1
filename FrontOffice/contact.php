<?php 
session_start();

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

    <form action="" method="GET" class="form">

    <div class="row">
      <label>
        Nom
        <input type="text" name="Nom" required>
      </label>

      <label>
        Email
        <input type="email" name="Email" required>
      </label>
    </div>

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

