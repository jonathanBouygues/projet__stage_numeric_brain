<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Tisseo API  █▄██▄█ 

// link on the API of Tisseo  
$file = new DOMDocument();
$file->load('https://api.tisseo.fr/v1/messages.xml?displayImportantOnly=1&key=cf5c751c-dc9d-4ae6-a383-a966eda86e22');

// Instanciation
$arrayMessage = array();

// Loop to display the datas
foreach ($file->getElementsByTagName('message') as $node) { 
    $text = $node->textContent;
    array_push($arrayMessage,$text);
}

if (empty($arrayMessage)) {
    echo 'Le service est optimal';
} else {
    echo $arrayMessage[0];
}
