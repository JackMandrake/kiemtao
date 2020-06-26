<?php
// On démarre le système de session au début de chaque page
session_start();

// On inclut le fichier des fonctions
include 'inc/functions.php';

// Par défaut username et email ne sont pas pré-remplie
// Mais si des cookies existent, alors ont les pré-rempli les champs

// echo $_COOKIE['CleCookie'];

// Notation ternaire : isset : is Set ==> est-ce défini ?
$usernameCookie = isset($_COOKIE['Username']) ? $_COOKIE['Username']:'';
$emailCookie = isset($_COOKIE['Email']) ? $_COOKIE['Email']:'';

// Equivalent de la notation ternaire avec la condition "if"
// if (isset($_COOKIE['Email'])) {
//     $emailCookie = $_COOKIE['Email'];
// } else {
//     $emailCookie = '';
// }

// Pré-remplissage du username + email avec les sessions
if (isset($_SESSION['connectedUser'])) {
    $usernameCookie = $_SESSION['connectedUser'];
} else {
    // Si on est pas connecté, alors on est redirigé vers la page
    // d'accueil (index.php)
    header('Location: index.php');
}

if (isset($_SESSION['connectedUserDetails'])) {
    $emailCookie = $_SESSION['connectedUserDetails']['email'];
}




// Formulaire soumis
if (!empty($_POST)) {
    // Si mon formulaire n'est pas vide, alors je peux récupérer des données
    // Le code ne rentre dans cette condition QUE si des données ont été envoyées en POST
    // Donc, à l'affichage du formulaire, le code ne rentre pas dans ce "if"

    // 1) On récupère les données
    $username = $_POST['username'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    // 2) On récupère la Liste de tous les Kiemtaos
    $kiemtaos = loadKiemtaos();

    // 3) On rajoute les nouvelles valeurs au tableau existant
    $kiemtaos[] = [
        'username' => $username,
        'email' => $email,
        'title' => $title,
        'message' => $message,
        'responses' => []
    ];
    
    // print_r($kiemtaos);
    // exit();

    // 4) On sauvegarde les Kiemtaos avec la fonction saveKiemtaos
    saveKiemtaos($kiemtaos);


    // 5) On sauvegarde les valeurs du username + email grâce aux cookies
    // setcookie('Username', $username, time()+3600);
    // setcookie('Email', $email, time()+3600);

    // 6) Après sauvegarde, on redirige vers la page d'accueil (index.php)
    header('Location: index.php');
    exit;
    
}

// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/add.tpl.php';
include 'inc/templates/footer.tpl.php';