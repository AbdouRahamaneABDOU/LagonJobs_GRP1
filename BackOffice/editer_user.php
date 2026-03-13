<?php
require_once(__DIR__ . '/bdd.php');


$sqlQuery = 
'SELECT utilisateurs.Id,
utilisateurs.Nom, 
utilisateurs.Prenom, 
utilisateurs.Mail,
utilisateurs.Password,
utilisateurs.Id_Role,
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
    <title>Modification utilisateurs</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<section class="hero">
  <div class="container">
    <h1>Modifier un utilisateur</h1>

    <!-- Filtres -->
    <form class="search-inline form" action="user.php" method="get">
        <input type="hidden" name="EditerId" value="<?php echo $_GET['updated_id_user'] ?>">
      <div class="row"> 
        <div>
            <label for="Prenom">Prénom </label>
            <input type="text" name="EditerPrenom" value="<?php echo $_GET['updated_prenom'] ?>">
        </div>
        <div>
            <label for="Nom">Nom </label>
            <input type="text" name="EditerNom" value="<?php echo $_GET['updated_nom'] ?>">
        </div>
      </div>
      <div class="row">
        <div>
          <label for="Mail">Email </label>
          <input type="text" name="EditerMail" value="<?php echo $_GET['updated_mail'] ?>">
        </div>
        <div>
            <label for=""> Rôle</label>
            <select name="EditerIdRole" value="<?php echo $_GET['updated_id_role'] ?>">
            <?php
            for($i = 0; $i< count($Role); $i++) {
              if (isset($_GET['updated_id_role']) && $Role[$i]['Id'] === intval($_GET['updated_id_role'])) {
                echo '<option value= "'.$Role[$i]['Id'].'" selected>'.$Role[$i]['NomRole'].'</option>';
                }
                else{
                    echo '<option value= "'.$Role[$i]['Id'].'">'.$Role[$i]['NomRole'].'</option>';
            }
    }
            ?>
            </select>

        </div>
      </div>

      <div class="actions">
        <input  type="submit" value="Modifier">
      </div>
    </form>
  </div>
</section>

</html>