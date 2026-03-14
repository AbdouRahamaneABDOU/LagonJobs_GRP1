<?php
require_once(__DIR__ . '/bdd.php');
require_once(__DIR__ . '/update_user.php');

// Bloquer un utilisateur
if (isset($_GET['bloquer_id_user'])){

  $id_user = $_GET['bloquer_id_user'];

  $req = $mysqlClient->prepare('UPDATE utilisateurs SET Bloque = 1 WHERE Id = :id_user');
  $req->execute([
    'id_user' => $id_user
  ]);
}

// Débloquer un utilisateur 
if (isset($_GET['debloquer_id_user'])){

  $id_user = $_GET['debloquer_id_user'];

  $req = $mysqlClient->prepare('UPDATE utilisateurs SET Bloque = 0 WHERE Id = :id_user');
  $req->execute([
    'id_user' => $id_user
  ]);
}






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
        'motdepasse' => password_hash($Mdp, PASSWORD_DEFAULT),
        'id_role' => $IDrole
        
      ]);
}

$sqlQuery = 
'SELECT utilisateurs.Id,
utilisateurs.Nom, 
utilisateurs.Prenom, 
utilisateurs.Mail,
utilisateurs.Password,
utilisateurs.Id_Role,
utilisateurs.Bloque,
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
    <form class="search-inline form" action="user.php" method="get">
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
            </select>
        </div>
        <div class="btn-ajouter">
          <label>&nbsp;</label>
          <input  type="submit" value="Ajouter">
        </div>
      </div>

      <div class="btn-ajouter">
        <input type="reset" value="Rénitialiser">
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
        for($i = 0; $i< count($User); $i++) { ?>
  <tr>
   <td><?php echo $User[$i]['Nom'].' '.$User[$i]['Prenom']?></td>
   <td><?php echo $User[$i]['Mail']?></td>
   <td><?php echo $User[$i]['NomRole']?></td>

   <td>
    <?php if($User[$i]['Bloque'] == 1){
      echo "Bloqué";
      } else{
        echo "Actif";
        }
    ?>
</td>

   <td><form action="user.php" method="GET">
      <input type="hidden" value="<?php echo $User[$i]['Id']?>" name="delete_id_user">
      <button type="submit">Supprimer</button>
  </form>
    <form action="editer_user.php" method="GET">
      <input type="hidden" value="<?php echo $User[$i]['Id']?>" name="updated_id_user">
      <input type="hidden" value="<?php echo $User[$i]['Prenom']?>" name="updated_prenom">
      <input type="hidden" value="<?php echo $User[$i]['Nom']?>" name="updated_nom">
      <input type="hidden" value="<?php echo $User[$i]['Mail']?>" name="updated_mail">
      <input type="hidden" value="<?php echo $User[$i]['Id_Role']?>" name="updated_id_role">
      <button type="submit">Editer</button>
    </form>

    <?php if($User[$i]['Bloque'] == 0){ ?>
    <form action="user.php" method="GET">
      <input type="hidden" value="<?php echo $User[$i]['Id']?>" name="bloquer_id_user">
      <button type="submit">Bloquer</button>
    </form>
    <?php } else { ?>
    <form action="user.php" method="GET">
      <input type="hidden" value="<?php echo $User[$i]['Id']?>" name="debloquer_id_user">
      <button type="submit">Débloquer</button>
    </form>
    <?php } ?>
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