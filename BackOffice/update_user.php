<?php
require_once(__DIR__ . '/bdd.php');


if (isset($_GET['EditerId']) && empty($_GET['EditerId'])=== false)
  if (isset($_GET['EditerPrenom']) && empty($_GET['EditerPrenom'])=== false)
    if (isset($_GET['EditerNom']) && empty($_GET['EditerNom'])=== false)
        if (isset($_GET['EditerMail']) && empty($_GET['EditerMail'])=== false)
          if (isset($_GET['EditerIdRole']) && empty($_GET['EditerIdRole'])=== false)
      {
        $IdUser = $_GET['EditerId'];
        $PrenomUser = $_GET['EditerPrenom'];
        $NomUser = $_GET['EditerNom'];
        $MailUser = $_GET['EditerMail'];
        $IdRoleUser = $_GET['EditerIdRole'];

        // Modification dans la base

        $insertCl = $mysqlClient-> prepare('UPDATE Utilisateurs SET Prenom = :new_prenom, Nom = :new_nom, Mail = :new_mail, Id_Role = :new_id_role WHERE Id = :id_user ');
        $insertCl->execute([
        'new_prenom' => $PrenomUser,
        'new_nom' => $NomUser,
        'new_mail' => $MailUser,
        'new_id_role' => $IdRoleUser,
        'id_user' => $IdUser
        ]);
    }
    

?>