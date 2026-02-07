<?php
require_once(__DIR__ . '/bdd.php');

// Faire la suppression
if (isset($_GET['delete_id_user']))
{
  $id_user = $_GET['delete_id_user'];

  $insertCl = $mysqlClient-> prepare('DELETE FROM utilisateurs WHERE id = :id_user');
  $insertCl->execute([
      'id_user' => $id_user
    ]);
}

if (isset($_GET['AjoutPrenom']) && empty($_GET['AjoutPrenom'])=== false)
  if (isset($_GET['AjoutNom']) && empty($_GET['AjoutNom'])=== false)
    if (isset($_GET['AjoutMail']) && empty($_GET['AjoutMail'])=== false)
        if (isset($_GET['AjoutMdp']) && empty($_GET['AjoutMdp'])=== false)
          if (isset($_GET['AjoutRole']) && empty($_GET['AjoutRole'])=== false)
      {
        $Prenom = $_GET['AjoutPrenom'];
        $Nom = $_GET['AjoutNom'];
        $Mail = $_GET['AjoutMail'];
        $Mdp = $_GET['AjoutMdp'];
        $IDrole = $_GET['AjoutRole'];

        // Faire l'insertion

      $insertCl = $mysqlClient-> prepare('INSERT INTO utilisateurs (Prenom,Nom,Mail,Password,Id_Role) VALUES (:prenom,:nom,:mail,:motdepasse,:id_role)');
      $insertCl->execute([
        'prenom' => $Prenom,
        'nom' => $Nom,
        'mail' => $Mail,
        'motdepasse' => $Mdp,
        'id_role' => $IDrole
        
      ]);
}

$sqlQuery = 
'SELECT utilisateurs.Id,
utilisateurs.Nom, 
utilisateurs.Prenom, 
utilisateurs.Mail,
utilisateurs.Password,
Role.NomRole
FROM utilisateurs
JOIN Role on Role.Id = utilisateurs.Id_Role;';
$Selectuser=$mysqlClient->prepare($sqlQuery);
$Selectuser->execute();
$User=$Selectuser->fetchAll();

$sqlQuery='SELECT * FROM  Role';
$selectrole=$mysqlClient->prepare($sqlQuery);
$selectrole->execute();
$Role=$selectrole->fetchAll();


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
      <div class="row"> 
        <div>
            <label for="Prenom">Prénom </label>
            <input type="text" name="AjoutPrenom">
        </div>
        <div>
            <label for="Nom">Nom </label>
            <input type="text" name="AjoutNom">
        </div>
      </div>
      <div class="row">
        <div>
          <label for="Mail">Email </label>
          <input type="text" name="AjoutMail">
        </div>
        <div>
          <label for="Mdp">Password </label>
          <input type="password" name="AjoutMdp">
        </div>
      </div>


      <div class="row">
        <div>
            <label for="Role">Rôle</label>
            <select name="AjoutRole">
            <?php
            for($i = 0; $i< count($Role); $i++) {
              echo '<option value= "'.$Role[$i]['Id'].'">'.$Role[$i]['NomRole'].'</option>';
            }
            ?>
        </div>
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
            <th align="left">Actions</th>
          </tr>
        </thead>

        <?php
        for($i = 0; $i< count($User); $i++) { ?>
  <tr>
   <td><?php echo $User[$i]['Nom'].' '.$User[$i]['Prenom']?></td>
   <td><?php echo $User[$i]['Mail']?></td>
   <td><?php echo $User[$i]['NomRole']?></td>
   
   <form action="user.php" method="GET">
   <input type="hidden" value="<?php echo $User[$i]['Id']?>" name="delete_id_user">
   <td><button type="submit">Supprimer</button></td>
</form>
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