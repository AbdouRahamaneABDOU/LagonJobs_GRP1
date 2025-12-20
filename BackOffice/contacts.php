<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.html">
                <span class="wave"></span>Lagon<span>Jobs</span>
            </a>

            <nav class="nav">
                <a href="index.html">Accueil</a>
                <a href="offres.html">Offres</a>
                <a href="login.html" class="btn btn-outline">Connexion</a>
                <a href="inscription.html" class="btn btn-outline">Inscription</a>
            </nav>
        </div>
    </header>

   <section class="hero">
    <div class="container">
      <h1>Contact</h1>

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
        <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
    </div>
</footer>

</html>

