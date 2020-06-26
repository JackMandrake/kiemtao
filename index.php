<?php
/**
 * Toutes les pages qui auront besoin de récupérer des valeurs stockées
 * en Session doivent commencer par un session_start
 */
// On démarre le système de session au début de chaque page
session_start();

// On inclut le fichier des fonctions
include 'inc/functions.php';

// La fonction loadKiemtaos renvoie un tableau avec la liste des kiemtaos
$kiemtaos = loadKiemtaos();

// Je crée un cookie avec 
// - la clé CleCookie
// - la valeur "Une valeur"
// Ce cookie durera 1H
// setcookie('CleCookie', 'Une valeur', time()+3600);
// setcookie('CleCookie2', 'Une valeur 2', time()+3600);

// print_r($_COOKIE);

// On affiche "Une valeur"
// echo $_COOKIE['CleCookie'];

// print_r($kiemtaos); // Debug

// Si la méthode du formulaire utilisée est post, alors 
// les données transmises seront dispo dans $_POST
// print_r($_POST);


// Si la méthode du formulaire utilisée est get, alors 
// les données transmises seront dispo dans $_GET
// print_r($_GET);

// Rendu visuel
include 'inc/templates/header.tpl.php';
include 'inc/templates/home.tpl.php';
include 'inc/templates/footer.tpl.php';