<?php
session_start();
require_once(__DIR__ . '/bdd.php');





// Validation du formulaire
if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Il faut un mail valide pour soumettre le formulaire.';
    } else {
        // On recupère de l'utilisateur à partir de l'email 
        // SELECT `Email`, `MDP` FROM `user` WHERE 1

        $sqlQuery='SELECT Id,Mail,Password,Id_Role FROM Utilisateurs WHERE Mail = :mail';
        $selectusers=$mysqlClient->prepare($sqlQuery);
        $selectusers->execute([
        'mail' => $_POST['mail']
        ]);

        $utilisateur=$selectusers->fetchAll();

        if (count($utilisateur) <= 0) {
            //die('Votre email ou mot de passe est incorrecte. 1');
            die('Aucun utilisateur n existe avec cet email');
        }

        
        
        if (password_verify($_POST["mdp"], $utilisateur[0]["Password"])) {
            echo 'Password is valid!';
        } else {
            die('Votre mot de passe est incorrecte.');
        }


        $_SESSION['user'] = [
            'iduser' => $utilisateur[0]["Id"],
            'mail' => $utilisateur[0]["Mail"],
            'LeRole' => $utilisateur[0]["Id_role"],
        ];

        header('Location: index.php');
        exit;

    }
}
?>