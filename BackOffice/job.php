<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
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
            <h1>Ajout un métier</h1>
            <form action="job.php" method="GET" class="form">

                <div>
                    <label>Titre</label>
                    <input type="text" name="Sujet" required>
                    
                    <label>description</label>
                    <textarea name="description" required></textarea>

                    <label>Missions</label>
                    <textarea name="mission" required></textarea>

                    <label>Profil</label>
                    <textarea name="profil" required></textarea>
                    
                    <button type="submit" class="btn">Ajouter</button>
                    
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



