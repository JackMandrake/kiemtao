<?php
/**
 * Toutes les pages qui auront besoin de récupérer des valeurs stockées
*  en Session doivent commencer par un session_start
*/
// On démarre le système de session au début de chaque page
session_start();

// On inclut le fichier des fonctions
include 'inc/functions.php';

// Deconnexion de l'utilisateur
logoutUser();

// On redirige vers la page d'accueil (index.php)
header('Location: index.php');
exit;