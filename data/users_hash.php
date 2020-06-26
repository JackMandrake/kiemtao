<?php

/**
 * Mot de passes hashés avec password_hash
 * Documentation : https://www.php.net/password_hash
 * 
 * Pour tester la validité d'un mot de passe hashé, on peut utiliser
 * password_verify(motDePasseEnClair, motDePasseHashé)
 * 
 *
 * 
 */
$users = [
    'arthur' => [
        'email' => 'arthur@oclock.io',
        'password' => '$2y$10$Xw01XmiMYd6KVnM1PxcEkOHIA5W1nmWcRvueLLl2rxL7r5T9Glcwu', // kaamelott
    ],
    'perceval' => [
        'email' => 'perceval@oclock.io',
        'password' => '$2y$10$h9sj.ZeVZ.xv20fw8zS4YOlslRNKQHdR022KiBf7slDHIiZldG9su', // pas faux
    ]    
];


// Ici on renvoie true, parce que le mot de passe est correcte
// password_verify(motDePasseEnClair, motDePasseHashé)
if (password_verify('kaamelott', '$2y$10$Xw01XmiMYd6KVnM1PxcEkOHIA5W1nmWcRvueLLl2rxL7r5T9Glcwu')) {
    return true;
} else {
    return false;
}