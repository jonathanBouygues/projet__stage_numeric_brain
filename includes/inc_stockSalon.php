<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Va chercher le stock de salon █▄█ 

// Connexion de la DB
include('includes/inc_connDB.php');
// Request to send
$stockSalon = "SELECT * FROM `salon` WHERE `salon_archive` IS NULL";
// Send the request and get the datas
$resultSalon = $connDB->query($stockSalon);
// Mise en forme en tableau 
$tabSalon = $resultSalon->fetchAll(PDO::FETCH_ASSOC);
// Données d'affichage
$affSalon = (string) '<table>';
$affSalon .= '<thead><tr><td>Titre</td><td>Modifier</td><td>Supprimer</td>';
$affSalon .= '</tr></thead><tbody>';
foreach($tabSalon as $salons) {
    $affSalon .= '<tr data-num="'.$salons['salon_id'].'">';
    $affSalon .= '<td>'.$salons['salon_nom'].'</td>';
    $affSalon .= '<td><img class="salonModImg" src="images/modify.png"></td>';
    $affSalon .= '<td><img class="salonDelImg" src="images/delete.png"></td>';
    $affSalon .= '</tr>';
}
$affSalon .= '</tbody></table>';
echo $affSalon;

// Coupe de la connexion
include('includes/inc_decoDB.php');