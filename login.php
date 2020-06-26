<?php

// On démarre le système de session au début de chaque page
session_start();

// On inclut le fichier des fonctions
include 'inc/functions.php';

// Si déjà connecté, pas besoin d'afficher le formulaire de connexion
// on redirige vers la page d'accueil
if (isset($_SESSION['connectedUser'])) {
    header('Location: index.php');
}


// #3 Soumission du formulaire
// Récupération des données utilisateur (login + mot de passe)

if (isset($_POST['username']) && isset($_POST['password'])) {

    // Si les clés username et password existent, 
    // alors...on peut du traitement
    // htmlspecialchars permet de netoyage nos éléments (c'est une sécurité en plus)
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);


    /**
     * Vérifier si le username soumis existe dans le tableau $users
     */
    // 1) Récupérer l'ensemble des utilisateurs
    // include 'data/users';
    // $userList = loadUsers();

    // On récupère des utilisateurs avec mot de passes hachés
    $userList = loadUsers('users_hash');
    
    // 2) On vérifie si le username existe dans la liste
    if (array_key_exists($username, $userList)) {
        echo 'L\'utilisateur ' . $username . ' existe';

        // if ($userList[$username]['password'] === $password) {
        if (password_verify($password, $userList[$username]['password'])) {
            // L'utilisateur existe. 
            // On vérifie si le mot de passe est le bon        
            echo 'Le mot de passe est bon !';

            /**
             * Une fois que l'utilisateur a passé toutes les barrières
             * de sécurité, on va pouvoir confirmer son statut
             * de VIP (il est connecté)
             */

            // stocker le username de l'utilisateur connecté : connectedUser
            // setcookie('connectedUser', $username);

            // setcookie('userPassword', $userList[$username]['password']);
            $_SESSION['connectedUser'] = $username;

            // print_r($userList[$username]);

            // stocker toutes les données sur cet utilisateur : connectedUserDetails
            // setcookie('connectedUserDetails', $userList[$username]);
            $_SESSION['connectedUserDetails'] = $userList[$username];

            // On redirige vers la page d'accueil (index.php)
            header('Location: index.php');
            exit;

        } else {
            echo 'Le mot de passe est incorrect !';
        }

    } else {
        echo 'L\'utilisateur ' . $username .' n\'existe pas';
    }


}


// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/login.tpl.php';
include 'inc/templates/footer.tpl.php';
