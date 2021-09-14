<?php

// Session
session_start();

// Sécurité
if (empty($_SESSION['user_id'])) {
    // Retour à l'identification
    header('Location:index.php');
} else {
    // Récupération des droits d'admin
    $user_droit = $_SESSION['user_droit'];
    // Numéro de page
    $espace = 0;
    // Chargement de la configuration
    require_once('../includes/inc_config.php');
}

if (isset($_POST)) {
    // Initialisation of slide's array
    $slide = [
        0 => ['statut' => 0],
        1 => ['statut' => 0],
        2 => ['statut' => 0],
        3 => ['statut' => 0]
    ];
    
    // loop of the different array to send request SQL
    foreach($slide as $key => $item) {
    
        foreach($_POST['presentation'] as $arraySlides) {
            $temp = (int) $arraySlides-1;
            if ($key === $temp) {
                $slide[$temp]['statut'] = 1;
            }
        }
        // Initialisation
        $keyTemp = $key + 1;
        $valueTemp = $slide[$key]['statut'];
        // Chargement de la configuration
        include('../includes/inc_connDB.php');
        // Request to send
        $requestSlide = "UPDATE `slides` SET `sli_statut` = '$valueTemp' WHERE `sli_id` ='$keyTemp'";
        // Send the request and get the datas
        $resultSlide = $connDB->exec($requestSlide);
        // Deconnexion
        include('../includes/inc_decoDB.php');
    }
    
} 

// Retour à l'identification
header('Location:../admin_accueil.php');