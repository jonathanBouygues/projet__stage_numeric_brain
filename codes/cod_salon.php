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
// Gestion pour un nouveau salon
if ((is_string($_POST['salonNom'])) && (isset($_POST['salonLieu'])) && (isset($_POST['salonDateDeb'])) && (isset($_POST['salonDateFin'])) && (!empty($_POST['salonHeureDeb'])) && (!empty($_POST['salonMinuteDeb']))  && (!empty($_POST['salonHeureFin'])) && (!empty($_POST['salonMinuteFin']))) {

    // Get the datas
    $salonNom = (string) $_POST['salonNom'];
    $salonLieu = (string) $_POST['salonLieu'];
    $salonDateDeb = (string) $_POST['salonDateDeb'];
    $salonDateFin = (string) $_POST['salonDateFin'];
    $salonHeureDeb = (string) $_POST['salonHeureDeb'].':'.$_POST['salonMinuteDeb'];
    $salonHeureFin = (string) $_POST['salonHeureFin'].':'.$_POST['salonMinuteFin'];
    // Request to send
    $insertSalon = "INSERT INTO `salon` (`salon_nom`, `salon_lieu`, `salon_dateDeb`, `salon_dateFin`, `salon_heureDeb`, `salon_heureFin`) VALUES (:salonNom,:salonLieu,:salonDateDeb,:salonDateFin,:salonHeureDeb,:salonHeureFin);";
    // Target to send
    $modele = $connDB->prepare($insertSalon);
    // Bind Value
    $modele->bindParam('salonNom', $salonNom);
    $modele->bindParam('salonLieu', $salonLieu);
    $modele->bindParam('salonDateDeb', $salonDateDeb);
    $modele->bindParam('salonDateFin', $salonDateFin);
    $modele->bindParam('salonHeureDeb', $salonHeureDeb);
    $modele->bindParam('salonHeureFin', $salonHeureFin);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionSalon.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour supprimer ('archiver') un salon
} elseif ((isset($_POST['numSalon'])) && (is_string($_POST['numSalon']))) {
    // Get the datas
    $numSalon = (string) $_POST['numSalon'];
    // Request to send
    $salonDelete = "UPDATE `salon` SET `salon_archive` = 'archive' WHERE `salon_id` = :numSalon";
    // Target to send
    $modele = $connDB->prepare($salonDelete);
    // Bind Value
    $modele->bindParam('numSalon', $numSalon);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionSalon.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

// Gestion pour modification d'un salon
} elseif ((is_string($_POST['salonNumMod'])) && (isset($_POST['salonChampsMod'])) && ((!empty($_POST['salonChampsValue'])) || ((is_string($_POST['salonHeureMod'])) && (is_string($_POST['salonMinuteMod']))))) {
    // Get the datas
    $numMod = (integer) $_POST['salonNumMod'];
    $champsModify = (string) $_POST['salonChampsMod'];
    if ($_POST['salonChampsValue'] !== "") {
        $champsValue = (string) $_POST['salonChampsValue'];
    } else {
        $champsValue = (string) $_POST['salonHeureMod'].':'.$_POST['salonMinuteMod'];
    }
    // Request to send
    $requestModSalon = "UPDATE `salon` SET $champsModify = :champsValue WHERE `salon_id` = :numModSalon";
    // Target to send
    $modele = $connDB->prepare($requestModSalon);
    // Bind Value
    $modele->bindParam('numModSalon', $numMod);
    // $modele->bindParam('champsModify', $champsModify);
    $modele->bindParam('champsValue', $champsValue);
    // Send the request and check the result
    if ($modele->execute()) {
        // Go back to postNews
        header('Location: ../admin_gestionSalon.php');
    } else {
        echo 'La requête n\'a pas fonctionné';
        var_dump($modele->errorInfo());
        die();
    }

} else {
    // Go back to postNews
    header('Location: ../admin_gestionSalon.php');
}

// link DB's cut off
if ($connDB) {
    unset($connDB);
}