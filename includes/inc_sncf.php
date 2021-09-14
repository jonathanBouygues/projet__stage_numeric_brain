<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ SNCF API  █▄██▄█ 


// Link on the API of SNCF
try {
    $fileSncf = file_get_contents('https://89ed3df7-78a2-42ee-9147-1d6ccfb7b5d7@api.sncf.com/v1/coverage/sncf/stop_areas/stop_area:OCE:SA:87611004/departures?count=5');
} catch(Exception $erreur) {
    exit('Problème de connexion à la DB.');
}
// Instanciation
    $dataSncf = json_decode($fileSncf);
$dataDepartures = [];
$affSncf = (string) '';
// Loop to integrate in a array the results
foreach ($dataSncf->departures as $datas) {
    // Direction
    $direction = $datas->display_informations->direction;
    $direction = preg_split('/[ ][(]/', $direction, -1, PREG_SPLIT_OFFSET_CAPTURE);
    // Headsign
    $number = $datas->display_informations->headsign;
    // Get the base start time 
    $timeBase = $datas->stop_date_time->base_departure_date_time;
    $startDt = new DateTime ($timeBase);
    $timeBase = $startDt->format ( 'H:i' );
    // Get the real time
    $timeReal = $datas->stop_date_time->departure_date_time;
    $realDt = new DateTime ($timeReal);
    $timeReal = $realDt->format ( 'H:i' );
    // Delay or not
    if ($timeReal === $timeBase) {
        $statut = (string) "à l'heure";
    } else {
        $delay = date_diff($realDt, $startDt);
        $delay = $delay->format('%hh%im');
        $statut = (string) "en retard de ".$delay;
    }
    // Set the array
    $tempArray = [$direction[0][0],$number,$timeReal,$statut];
    array_push($dataDepartures,$tempArray);

}
// Display the view
$affSncf .= (string) '<table><thead><tr><th>Direction</th><th>Heure actuelle</th><th>Statut</th></tr></thead><tbody>';
foreach ($dataDepartures as $dataDep) {
    $affSncf .= '<tr><td>'.$dataDep[0].' - '.$dataDep[1].'</td><td>'.$dataDep[2].'</td><td>'.$dataDep[3].'</td></tr>';
}
$affSncf .= '</tbody></table>';
echo $affSncf;

