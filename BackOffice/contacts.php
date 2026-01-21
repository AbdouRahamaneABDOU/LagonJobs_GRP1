<!DOCTYPE html><!-- test commit -->
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
 
    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 LagonJobs — Tous droits réservés</p>
            <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
        </div>
    </footer>

</html>

