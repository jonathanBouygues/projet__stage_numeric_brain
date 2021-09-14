<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Afficher JPO/SPO █▄██▄█

// Data à afficher
$affGlobal = (string) '<section id="s4"><h2>JPO/SPO et Salon</h2>';

// Connexion de la DB
include('includes/inc_connDB.php');

// REQUEST JPO/SPO
$affGlobal .= '<div class="stockJpospo"><h3>JPO/SPO</h3>';
// Request to send
$requestJpospo = "SELECT * FROM `jpospo` WHERE `jpospo_archive` IS NULL ORDER BY `jpospo_date` ASC";
// Send the request and get the datas
$resultJpospo = $connDB->query($requestJpospo);
// Mise en forme en tableau 
$tabJpospo = $resultJpospo->fetchAll(PDO::FETCH_ASSOC);

foreach($tabJpospo as $jpospos) {
    // Renseignement des datas
    $affGlobal .= '<div class=itemJpospo>';
    $affGlobal .= '<h4>'.$jpospos['jpospo_nom'].'</h4>';
    $affGlobal .= '<span>'.$jpospos['jpospo_date'].'</span>';
    $affGlobal .= '<span>'.$jpospos['jpospo_heureDeb'].'</span>';
    $affGlobal .= '<span>'.$jpospos['jpospo_heureFin'].'</span>';
    $affGlobal .= '</div>';
}
$affGlobal .= '</div>';


// REQUEST SALON
$affGlobal .= '<div class="stockSalon"><h3>Salon</h3>';
// Request to send
$requestSalon = "SELECT * FROM `salon` WHERE `salon_archive` IS NULL ORDER BY `salon_dateDeb` ASC";
// Send the request and get the datas
$resultSalon = $connDB->query($requestSalon);
// Mise en forme en tableau 
$tabSalon = $resultSalon->fetchAll(PDO::FETCH_ASSOC);

foreach($tabSalon as $salons) {
    // Renseignement des datas
    $affGlobal .= '<div class=itemSalon>';
    $affGlobal .= '<h4>'.$salons['salon_nom'].'</h4>';
    $affGlobal .= '<span>'.$salons['salon_lieu'].'</span>';
    $affGlobal .= '<span>'.$salons['salon_dateDeb'].'</span>';
    $affGlobal .= '<span>'.$salons['salon_dateFin'].'</span>';
    $affGlobal .= '<span>'.$salons['salon_heureDeb'].'</span>';
    $affGlobal .= '<span>'.$salons['salon_heureFin'].'</span>';
    $affGlobal .= '</div>';
}
$affGlobal .= '</div>';




// Deconnexion de la DB
include('includes/inc_decoDB.php');

// Affichage
$affGlobal .= '</section>';
echo $affGlobal;