<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Va chercher le stock de news █▄█ 

// Connexion de la DB
include('includes/inc_connDB.php');
// Request to send
$requestNews = "SELECT * FROM `post` WHERE post_archive IS NULL";
// Send the request and get the datas
$resultNews = $connDB->query($requestNews);
// Mise en forme en tableau 
$tabNews = $resultNews->fetchAll(PDO::FETCH_ASSOC);
// Données d'affichage
$affNews = (string) '<table>';
$affNews .= '<thead><tr><td>Titre</td><td>Modifier</td><td>Supprimer</td>';
$affNews .= '</tr></thead><tbody>';
foreach($tabNews as $news) {
    $affNews .= '<tr data-num="'.$news['post_id'].'">';
    $affNews .= '<td>'.$news['post_title'].'</td>';
    $affNews .= '<td><img class="modifyImg" src="images/modify.png"></td>';
    $affNews .= '<td><img class="deleteImg" src="images/delete.png"></td>';
    $affNews .= '</tr>';
}
$affNews .= '</tbody></table>';
echo $affNews;

// Coupe de la connexion
include('includes/inc_decoDB.php');