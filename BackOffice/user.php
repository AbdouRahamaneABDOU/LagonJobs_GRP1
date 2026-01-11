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

    <!-- HERO -->
<section class="hero">
  <div class="container">
    <h1>Gestion des utilisateurs</h1>
    <p>Gérer les comptes des candidats, utilisateurs et administrateurs.</p>

    <!-- Filtres -->
    <form class="search-inline form" method="get">
      <div>
        <label for="search">Rechercher</label>
        <input type="text" id="search" name="search" placeholder="Nom ou email">
      </div>

      <div>
        <label for="role">Rôle</label>
        <select id="role" name="role">
          <option value="">Tous</option>
          <option value="user">Utilisateur</option>
          <option value="admin">Administrateur</option>
        </select>
      </div>

      <div>
        <label for="status">Statut</label>
        <select id="status" name="status">
          <option value="">Tous</option>
          <option value="actif">Publiée</option>
          <option value="suspendu">Suspendu</option>
        </select>
      </div>

      <button class="btn">Filtrer</button>
      <button type="reset" class="btn">Réinitialiser</button>
    </form>
  </div>
</section>

<!-- LISTE DES UTILISATEURS -->
<section class="section">
  <div class="container">
    <div class="card">
      <h2>Liste des utilisateurs</h2>

      <table width="100%" cellpadding="10">
        <thead>
          <tr>
            <th align="left">Nom</th>
            <th align="left">Email</th>
            <th align="left">Rôle</th>
            <th align="left">Statut</th>
            <th align="left">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Azaly </td>
            <td>azalymahaviteny@email.com</td>
            <td><span class="badge">Utilisateur</span></td>
            <td><span class="badge">Publiée</span></td>
            <td>
              <a href="" class="badge">Modifier</a>
              <a href="" class="badge">Suspendre</a>
            </td>
          </tr>

          <tr>
            <td>Abdou R.</td>
            <td>Abdou-rahamane@outlook.com</td>
            <td><span class="badge">Utilisateur</span></td>
            <td><span class="badge">Publiée</span></td>
            <td>
              <a href="" class="badge">Modifier</a>
              <a href="" class="badge">Suspendre</a>
            </td>
          </tr>

          <tr>
            <td>Djanfar</td>
            <td>djanfar@bana.fr</td>
            <td><span class="badge">Administrateur</span></td>
            <td><span class="badge">Publiée</span></td>
            <td>
              <a href="" class="badge">Modifier</a>
              <a href="" class="badge">Suspendre</a>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
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