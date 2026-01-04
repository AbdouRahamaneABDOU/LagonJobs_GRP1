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
                <a href="offre.php">Offres</a>
                <a href="contacts.php">Contact</a>
            </nav>
        </div>
    </header>

        <section class="hero">
            <div class="container">

                <h1>Gestion des emplois</h1>
                <br>
                <br>

                <div class="container">
            
                    <form action="offres.html" method="get" class="search-inline">
                        <label for="ajout">+Ajouter</label>
                        <input type="text" name="ajout">

                        <label for="listbox" name="status">Status</label>
                        <select name="type">
                            <option value="0">Publiée</option>
                        </select>

                        <label for="listbox" name="categorie">Catégorie</label>
                        <select name="ville">
                            <option value="0"></option>
                        </select>

                    
                        <button type="submit" class="btn">Filtrer</button>
                        <button type="reset" class="btn">Réinitialiser</button>
                       
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