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

        $sqlQuery='SELECT Nom,Prenom,Mail,Password FROM Utilisateurs WHERE Mail = :mail';
        $selectusers=$mysqlClient->prepare($sqlQuery);
        $selectusers->execute([
        'mail' => $_POST['mail']
        ]);

        $utilisateur=$selectusers->fetch();

        if (!$utilisateur) {
            //die('Votre email ou mot de passe est incorrecte. 1');
            die('Aucun utilisateur n existe avec cet email');
        }

        if (password_verify($_POST["mdp"], $utilisateur["Password"])) {

                $_SESSION['user'] = [
                'email' => $utilisateur["Mail"],
                'nom' => $utilisateur["Nom"],
                'prenom' => $utilisateur["Prenom"],
            ];

            
            header('Location: index.php');
            exit;

        } else {
            die('Votre mot de passe est incorrecte.');
        }



    }
}
?>