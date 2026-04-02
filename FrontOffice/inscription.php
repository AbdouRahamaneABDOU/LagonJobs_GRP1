
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
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
                    <a href="offres.php" class="btn btn-outline">Offres</a>
                    <a href="contact.php" class="btn btn-outline">Contact</a>
                </nav>
            </div>
        </header>

    <section class="hero">
            <div class="container">
            <h1>Inscription</h1>
            

            <form action="login.php" method="GET" class="form">

                <div class="row">
                    <div>
                        <label for="">Prénom :</label>
                        <input type="text" name="AjoutPrenom">
                    </div>

                    <div>
                        <label for="">Nom :</label>
                        <input type="text" name="AjoutNom">
                    </div>
                </div>

                <label for="">Email :</label>
                <input type="mail" name="AjoutMail">

                <div class="row">
                    <div>
                        <label for="">Mot de passe :</label>
                        <input type="password" name="AjoutMdp">
                    </div>

                    <div>
                        <label for="">Confirmer :</label>
                        <input type="password" name="AjoutConfMdp">
                    </div>
                </div>

                
                <button type="submit" class="btn actions">Créer mon compte</button>
                <button type="submit" class="btn">Déjà inscrit ? </button>
            
            </form>
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