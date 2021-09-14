<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Va chercher le stock de slide et renvoi les slides actif (valeur 1) █▄█ 

// Connexion de la DB
include('includes/inc_connDB.php');
// Request to send
$requestSlides = "SELECT sli_desc FROM `slides` WHERE `sli_statut` = 1";
// Send the request and get the datas
$resultSlides = $connDB->query($requestSlides);
// Mise en forme en tableau 
$tabSlides = $resultSlides->fetchAll(PDO::FETCH_ASSOC);
// Restore the data
$arraySlides = (array) [];
foreach($tabSlides as $slides) {
    array_push($arraySlides, $slides['sli_desc']);
}
// Coupe de la connexion
include('includes/inc_decoDB.php');
