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

// Connexion
include('../includes/inc_connDB.php');

// Test of presence
// Gestion pour une nouvelle news
if ((isset($_POST['titleCom'])) && (isset($_POST['messageCom'])) && (isset($_POST['dateCom']))) {

    // Get the datas
    $titleCom = (string) $_POST['titleCom'];
    $messageCom = (string) $_POST['messageCom'];
    $dateCom = (string) $_POST['dateCom'];
    // Request to send
    $requestInsert ="INSERT INTO `post` (`post_title`, `post_message`, `post_date`) VALUES 
    (:titleCom,:messageCom,:dateCom);";
    // Target to send
    $modele = $connDB->prepare($requestInsert);
    // Bind Value
    $modele->bindParam('titleCom', $titleCom);
    $modele->bindParam('messageCom', $messageCom);
    $modele->bindParam('dateCom', $dateCom);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionNews.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour supprimer ('archiver') une news
} elseif ((isset($_POST['numNews'])) && (is_string($_POST['numNews']))) {
    // Get the datas
    $numNews = (string) $_POST['numNews'];
    // Request to send
    $requestDelete = "UPDATE `post` SET `post_archive` = 'archive' WHERE `post_id` = :numNews";
    // Target to send
    $modele = $connDB->prepare($requestDelete);
    // Bind Value
    $modele->bindParam('numNews', $numNews);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionNews.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour modification d'une news
} elseif ((isset($_POST['numModNews'])) && (isset($_POST['champsModify'])) && (isset($_POST['champsValue']))) {
    // Get the datas
    $numModNews = (integer) $_POST['numModNews'];
    $champsModify = (string) $_POST['champsModify'];
    $champsValue = (string) $_POST['champsValue'];
    // Request to send
    $requestModify = "UPDATE `post` SET $champsModify = :champsValue WHERE `post_id` = :numModNews";
    // Target to send
    $modele = $connDB->prepare($requestModify);
    // Bind Value
    $modele->bindParam('numModNews', $numModNews);
    // $modele->bindParam('champsModify', $champsModify);
    $modele->bindParam('champsValue', $champsValue);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionNews.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

} else {
    // Go back to postNews
    header('Location: ../admin_gestionNews.php');
}

// link DB's cut off
if ($connDB) {
    unset($connDB);
}