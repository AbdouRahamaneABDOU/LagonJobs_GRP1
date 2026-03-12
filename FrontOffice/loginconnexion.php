<?php
require_once(__DIR__ . '/bdd.php');


$sqlQuery='SELECT * FROM  utilisateurs';
$selectusers=$mysqlClient->prepare($sqlQuery);
$selectusers->execute();
$utilisateurs=$selectusers->fetchAll();

$postData = $_POST;

// Validation du formulaire
if (isset($postData['mail']) && isset($postData['mdp'])) {
    if (!filter_var($postData['mail'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Il faut un mail valide pour soumettre le formulaire.';
    } else {
        foreach ($utilisateurs as $utilisateur) {
            if (
                $utilisateur['Mail'] === $postData['mail'] && 
                $utilisateur['Password'] === $postData['mdp']
            ) {
                $loggedUser = [
                    'mail' => $utilisateur['Mail'],
                ];

            }
        }

        if (!isset($loggedUser)) {
            $errorMessage = sprintf(
                'Les informations envoyés ne permettent pas de vous identifier : (%s/%s)',
                $postData['mail'],
                strip_tags($postData['mdp'])
            );
            header('Location: login.php');
            exit();
        }
    }
    header('Location: index.php');
    exit();

}
?>