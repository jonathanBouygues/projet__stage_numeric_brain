<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Va chercher le stock de JPO/SPO █▄█ 

// Connexion de la DB
include('includes/inc_connDB.php');
// Request to send
$stockJpospo = "SELECT * FROM `jpospo` WHERE `jpospo_archive` IS NULL";
// Send the request and get the datas
$resultJpospo = $connDB->query($stockJpospo);
// Mise en forme en tableau 
$tabJpospo = $resultJpospo->fetchAll(PDO::FETCH_ASSOC);
// Données d'affichage
$affJpospo = (string) '<table>';
$affJpospo .= '<thead><tr><td>Titre</td><td>Modifier</td><td>Supprimer</td>';
$affJpospo .= '</tr></thead><tbody>';
foreach($tabJpospo as $jpospos) {
    $affJpospo .= '<tr data-num="'.$jpospos['jpospo_id'].'">';
    $affJpospo .= '<td>'.$jpospos['jpospo_nom'].'</td>';
    $affJpospo .= '<td><img class="jpospoModImg" src="images/modify.png"></td>';
    $affJpospo .= '<td><img class="jpospoDelImg" src="images/delete.png"></td>';
    $affJpospo .= '</tr>';
}
$affJpospo .= '</tbody></table>';
echo $affJpospo;

// Coupe de la connexion
include('includes/inc_decoDB.php');