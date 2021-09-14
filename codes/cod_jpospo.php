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
// Gestion pour une nouvelle JPO/SPO
if ((is_string($_POST['jpospoNom'])) && (isset($_POST['jpospoDate'])) && (!empty($_POST['jpospoHeureDeb'])) && (!empty($_POST['jpospoHeureFin']))) {

    // Get the datas
    $jpospoNom = (string) $_POST['jpospoNom'];
    $jpospoDate = (string) $_POST['jpospoDate'];
    $jpospoDeb = (string) $_POST['jpospoHeureDeb'].':'.$_POST['jpospoMinuteDeb'];
    $jpospoFin = (string) $_POST['jpospoHeureFin'].':'.$_POST['jpospoMinuteFin'];
    // Request to send
    $insertJpospo ="INSERT INTO `jpospo` (`jpospo_nom`, `jpospo_date`, `jpospo_heureDeb`, `jpospo_heureFin`) VALUES (:jpospoNom,:jpospoDate,:jpospoDeb,:jpospoFin);";
    // Target to send
    $modele = $connDB->prepare($insertJpospo);
    // Bind Value
    $modele->bindParam('jpospoNom', $jpospoNom);
    $modele->bindParam('jpospoDate', $jpospoDate);
    $modele->bindParam('jpospoDeb', $jpospoDeb);
    $modele->bindParam('jpospoFin', $jpospoFin);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionJpoSpo.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour supprimer ('archiver') une JPO/SPO
} elseif ((isset($_POST['numJpospo'])) && (is_string($_POST['numJpospo']))) {
    // Get the datas
    $numJpospo = (string) $_POST['numJpospo'];
    // Request to send
    $jpospoDelete = "UPDATE `jpospo` SET `jpospo_archive` = 'archive' WHERE `jpospo_id` = :numJpospo";
    // Target to send
    $modele = $connDB->prepare($jpospoDelete);
    // Bind Value
    $modele->bindParam('numJpospo', $numJpospo);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionJpoSpo.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour modification d'une news
} elseif ((is_string($_POST['jpospoNumMod'])) && (isset($_POST['jpospoChampsMod'])) && ((!empty($_POST['jpospoChampsValue'])) || ((is_string($_POST['jpospoHeureMod'])) && (is_string($_POST['jpospoMinuteMod']))))) {
    // Get the datas
    $numMod = (integer) $_POST['jpospoNumMod'];
    $champsModify = (string) $_POST['jpospoChampsMod'];
    if ($_POST['jpospoChampsValue'] !== "") {
        $champsValue = (string) $_POST['jpospoChampsValue'];
    } else {
        $champsValue = (string) $_POST['jpospoHeureMod'].':'.$_POST['jpospoMinuteMod'];
    }
    // Request to send
    $requestModJpospo = "UPDATE `jpospo` SET $champsModify = :champsValue WHERE `jpospo_id` = :numModJpospo";
    // Target to send
    $modele = $connDB->prepare($requestModJpospo);
    // Bind Value
    $modele->bindParam('numModJpospo', $numMod);
    // $modele->bindParam('champsModify', $champsModify);
    $modele->bindParam('champsValue', $champsValue);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionJpospo.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

} else {
    // Go back to postNews
    header('Location: ../admin_gestionJpoSpo.php');
}

// link DB's cut off
if ($connDB) {
    unset($connDB);
}