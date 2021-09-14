<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Weather API  █▄██▄█ 
$weather = [
    0 => ['nom' => 'Soleil', 'image' => 'sun'],
    1 => ['nom' => 'Peu nuageux', 'image' => 'sun'],
    2 => ['nom' => 'Ciel voilé', 'image' => 'cloud'],
    3 => ['nom' => 'Nuageux', 'image' => 'sunCloud'],
    4 => ['nom' => 'Très nuageux', 'image' => 'cloud'],
    5 => ['nom' => 'Couvert', 'image' => 'cloud'],
    6 => ['nom' => 'Brouillard', 'image' => 'cold'],
    7 => ['nom' => 'Brouillard givrant', 'image' => 'cold'],
    10 => ['nom' => 'Pluie faible', 'image' => 'rain'],
    11 => ['nom' => 'Pluie modérée', 'image' => 'rain'],
    12 => ['nom' => 'Pluie forte', 'image' => 'rain'],
    13 => ['nom' => 'Pluie faible verglaçante', 'image' => 'rain'],
    14 => ['nom' => 'Pluie modérée verglaçante', 'image' => 'rain'],
    15 => ['nom' => 'Pluie forte verglaçante', 'image' => 'rain'],
    16 => ['nom' => 'Bruine', 'image' => 'rain'],
    20 => ['nom' => 'Neige faible', 'image' => 'cold'],
    21 => ['nom' => 'Neige modérée', 'image' => 'cold'],
    22 => ['nom' => 'Neige forte', 'image' => 'rain'],
    30 => ['nom' => 'Pluie et neige mêlées faibles', 'image' => 'rain'],
    31 => ['nom' => 'Pluie et neige mêlées modérées', 'image' => 'rain'],
    32 => ['nom' => 'Pluie et neige mêlées fortes', 'image' => 'rain'],
    40 => ['nom' => 'Averses de pluie locales et faibles', 'image' => 'rain'],
    41 => ['nom' => 'Averses de pluie locales', 'image' => 'rain'],
    42 => ['nom' => 'Averses de pluie locales et fortes', 'image' => 'rain'],
    43 => ['nom' => 'Averses de pluie faibles', 'image' => 'rain'],
    44 => ['nom' => 'Averses de pluie', 'image' => 'rain'],
    45 => ['nom' => 'Averses de pluie fortes', 'image' => 'rain'],
    46 => ['nom' => 'Averses de pluie faibles et fréquentes', 'image' => 'rain'],
    47 => ['nom' => 'Averses de pluie fréquentes', 'image' => 'rain'],
    48 => ['nom' => 'Averses de pluie fortes et fréquentes', 'image' => 'rain'],
    60 => ['nom' => 'Averses de neige localisées et faibles', 'image' => 'cold'],
    61 => ['nom' => 'Averses de neige localisées', 'image' => 'cold'],
    62 => ['nom' => 'Averses de neige localisées et fortes', 'image' => 'cold'],
    63 => ['nom' => 'Averses de neige faibles', 'image' => 'cold'],
    64 => ['nom' => 'Averses de neige', 'image' => 'cold'],
    65 => ['nom' => 'Averses de neige fortes', 'image' => 'cold'],
    66 => ['nom' => 'Averses de neige faibles et fréquentes', 'image' => 'cold'],
    67 => ['nom' => 'Averses de neige fréquentes', 'image' => 'cold'],
    68 => ['nom' => 'Averses de neige fortes et fréquentes', 'image' => 'cold'],
    70 => ['nom' => 'Averses de pluie et neige mêlées localisées et faibles', 'image' => 'cold'],
    71 => ['nom' => 'Averses de pluie et neige mêlées localisées', 'image' => 'cold'],
    72 => ['nom' => 'Averses de pluie et neige mêlées localisées et fortes', 'image' => 'cold'],
    73 => ['nom' => 'Averses de pluie et neige mêlées faibles', 'image' => 'cold'],
    74 => ['nom' => 'Averses de pluie et neige mêlées', 'image' => 'cold'],
    75 => ['nom' => 'Averses de pluie et neige mêlées fortes', 'image' => 'cold'],
    76 => ['nom' => 'Averses de pluie et neige mêlées faibles et nombreuses', 'image' => 'cold'],
    77 => ['nom' => 'Averses de pluie et neige mêlées fréquentes', 'image' => 'cold'],
    78 => ['nom' => 'Averses de pluie et neige mêlées fortes et fréquentes', 'image' => 'cold'],
    100 => ['nom' => 'Orages faibles et locaux', 'image' => 'storm'],
    101 => ['nom' => 'Orages locaux', 'image' => 'storm'],
    102 => ['nom' => 'Orages fort et locaux', 'image' => 'storm'],
    103 => ['nom' => 'Orages faibles', 'image' => 'storm'],
    104 => ['nom' => 'Orages', 'image' => 'storm'],
    105 => ['nom' => 'Orages forts', 'image' => 'storm'],
    106 => ['nom' => 'Orages faibles et fréquents', 'image' => 'storm'],
    107 => ['nom' => 'Orages fréquents', 'image' => 'storm'],
    108 => ['nom' => 'Orages forts et fréquents', 'image' => 'storm'],
    120 => ['nom' => 'Orages faibles et locaux de neige ou grésil', 'image' => 'storm'],
    121 => ['nom' => 'Orages locaux de neige ou grésil', 'image' => 'storm'],
    122 => ['nom' => 'Orages locaux de neige ou grésil', 'image' => 'storm'],
    123 => ['nom' => 'Orages faibles de neige ou grésil', 'image' => 'storm'],
    124 => ['nom' => 'Orages de neige ou grésil', 'image' => 'storm'],
    125 => ['nom' => 'Orages de neige ou grésil', 'image' => 'storm'],
    126 => ['nom' => 'Orages faibles et fréquents de neige ou grésil', 'image' => 'storm'],
    127 => ['nom' => 'Orages fréquents de neige ou grésil', 'image' => 'storm'],
    128 => ['nom' => 'Orages fréquents de neige ou grésil', 'image' => 'storm'],
    130 => ['nom' => 'Orages faibles et locaux de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    131 => ['nom' => 'Orages locaux de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    132 => ['nom' => 'Orages fort et locaux de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    133 => ['nom' => 'Orages faibles de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    134 => ['nom' => 'Orages de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    135 => ['nom' => 'Orages forts de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    136 => ['nom' => 'Orages faibles et fréquents de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    137 => ['nom' => 'Orages fréquents de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    138 => ['nom' => 'Orages forts et fréquents de pluie et neige mêlées ou grésil', 'image' => 'storm'],
    140 => ['nom' => 'Pluies orageuses', 'image' => 'storm'],
    141 => ['nom' => 'Pluie et neige mêlées à caractère orageux', 'image' => 'storm'],
    142 => ['nom' => 'Neige à caractère orageux', 'image' => 'storm'],
    210 => ['nom' => 'Pluie faible intermittente', 'image' => 'rain'],
    211 => ['nom' => 'Pluie modérée intermittente', 'image' => 'rain'],
    212 => ['nom' => 'Pluie forte intermittente', 'image' => 'rain'],
    220 => ['nom' => 'Neige faible intermittente', 'image' => 'cold'],
    221 => ['nom' => 'Neige modérée intermittente', 'image' => 'cold'],
    222 => ['nom' => 'Neige forte intermittente', 'image' => 'cold'],
    230 => ['nom' => 'Pluie et neige mêlées', 'image' => 'cold'],
    231 => ['nom' => 'Pluie et neige mêlées', 'image' => 'cold'],
    232 => ['nom' => 'Pluie et neige mêlées', 'image' => 'cold'],
    235 => ['nom' => 'Averses de grêle', 'image' => 'cold']
];  

// API Test connexion (Météo Concept)
try {
    $file = file_get_contents('https://api.meteo-concept.com/api/forecast/nextHours?token=42b0a4afc2d684334fb1b4c766791fbccacca6f5fe1b448937c470f685c0d19a&insee=31555&hourly=true');
} catch(Exception $erreur) {
    exit('Problème de connexion à la DB.');
}
// Store the JSON data
$data = json_decode($file)->forecast;
$numWeather = $data[0]->weather; 
// initiation of $render
$render =  (string) '';
$render .= '<img src="images/'.$weather[$numWeather]['image'].'.png">';
$render .= '<span>Temp. : '.$data[0]->temp2m.'</span>';
// View
echo $render;