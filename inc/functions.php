<?php

function saveKiemtaos($kiemtaoArray)
{
    if (is_array($kiemtaoArray)) {
        $phpContent = '<?php' . PHP_EOL . PHP_EOL;
        $phpContent .= '$data = ' . var_export($kiemtaoArray, 1) . ';' . PHP_EOL;

        // file_put_contents — Écrit des données dans un fichier
        file_put_contents('data/kiemtaos.php', $phpContent);

        return true;
    } else {
        echo '$kiemtaoArray n\'est pas un tableau<br>';
        return false;
    }
}

/**
 * la fonction loadKiemtaos retourne la liste de tous 
 * les kiemtaos du fichier
 *
 * @return void
 */
function loadKiemtaos()
{
    if (file_exists('data/kiemtaos.php')) {
        include 'data/kiemtaos.php';
        return $data;
    } else {
        echo 'le fichier de données "data/kiemtaos.php" n\'existe pas<br>';
    }

    return false;
}



/**
 * la fonction loadUsers retourne la liste de tous 
 * les users du fichier
 *
 * @return void
 */
function loadUsers($filename = 'users')
{
    if (file_exists('data/' . $filename . '.php')) {
        include 'data/' . $filename . '.php';
        return $users;
    } else {
        echo 'le fichier de données ' . $filename. 'n\'existe pas<br>';
    }

    return false;
}

function logoutUser()
{
    // Détruit toutes les variables de session
    $_SESSION = array();

    // Puis, on détruit la session.
    session_destroy();
}
