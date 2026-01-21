<?php
require_once(__DIR__ . '/bdd.php');

// Faire la suppression
if (isset($_GET['delete_id_user']))
{
  $id_user = $_GET['delete_id_user'];

  $insertCl = $mysqlClient-> prepare('DELETE FROM utilisateurs WHERE id = :id_utilisateurs');
  $insertCl->execute([
      'id_utilisateurs' => $id_user
    ]);
}

if (isset($_GET['AjoutPrenom']) && empty($_GET['AjoutPrenom'])=== false)
  if (isset($_GET['AjoutNom']) && empty($_GET['AjoutNom'])=== false)
    if (isset($_GET['AjoutMail']) && empty($_GET['AjoutMail'])=== false)
      if (isset($_GET['AjoutRole']) && empty($_GET['AjoutRole'])=== false)
        if (isset($_GET['AjoutMdp']) && empty($_GET['AjoutMdp'])=== false)
      {
        $Prenom = $_GET['AjoutPrenom'];
        $Nom = $_GET['AjoutNom'];
        $Mail = $_GET['AjoutMail'];
        $Role = $_GET['AjoutRole'];
        $Mdp = $_GET['AjoutMdp'];

        // Faire l'insertion

      $insertCl = $mysqlClient-> prepare('INSERT INTO utilisateurs (Prenom,Nom,Mail,Role,Password) VALUES (:prenom,:nom,:mail,:role,:motdepasse)');
      $insertCl->execute([
        'prenom' => $Prenom,
        'nom' => $Nom,
        'mail' => $Mail,
        'role' => $Role,
        'motdepasse' => $Mdp
        
      ]);
}




$sqlQuery='SELECT * FROM  utilisateurs';
$selectuser=$mysqlClient->prepare($sqlQuery);
$selectuser->execute();
$utilisateurs=$selectuser->fetchAll();

?>



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
                <a href="job.php">Métiers</a>
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

      <label for="Prenom">Prénom </label>
      <input type="text" name="AjoutPrenom">

      <label for="Nom">Nom </label>
      <input type="text" name="AjoutNom">

      <label for="Mail">Email </label>
      <input type="text" name="AjoutMail">

      <label for="Mdp">Password </label>
      <input type="password" name="AjoutMdp">



        <label for="Role">Rôle</label>
        <select name="AjoutRole">
        <?php
        for($i = 0; $i< count($utilisateurs); $i++) {
          echo '<option value= "'.$utilisateurs[$i]['Id'].'">'.$utilisateurs[$i]['Role'].'</option>';
        }
        ?>
        </select>
      </div>

      <div class="actions">
        <input  type="submit" value="Ajouter">
      </div>
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

        <?php
        for($i = 0; $i< count($utilisateurs); $i++) { ?>
  <tr>
   <td><?php echo $utilisateurs[$i]['Nom'].' '.$utilisateurs[$i]['Prenom']?></td>
   <td><?php echo $utilisateurs[$i]['Mail']?></td>
   <td><?php echo $utilisateurs[$i]['Role']?></td>
   <td><?php echo $utilisateurs[$i]['']?></td>
   
   <form action="user.php" method="GET">
   <input type="hidden" value="<?php echo $utilisateurs[$i]['Id']?>" name="delete_id_user">
   <button type="submit">Supprimer</button>
</form>
  </td>
  </tr>
<?php } ?>
        
        
        
      
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