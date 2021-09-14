<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Afficher les news brassart  █▄██▄█ 

// Data à afficher
$affPost = (string) '';
$affPost .= '<section id="s3">';
$affPost .= '<h2>News Brassart</h2>';

// Connexion de la DB
include('includes/inc_connDB.php');
// Request to send
$requestPost = "SELECT * FROM `post` WHERE `post_archive` IS NULL ORDER BY `post_date` DESC";
// Send the request and get the datas
$resultPost = $connDB->query($requestPost);
// Mise en forme en tableau 
$tabPost = $resultPost->fetch(PDO::FETCH_ASSOC);
// Coupe de la connexion
include('includes/inc_decoDB.php');

// Renseignement des datas
$affPost .= '<div class=containerPosts>';
$affPost .= '<h3>'.$tabPost['post_title'].'</h3>';
$affPost .= '<span>'.$tabPost['post_date'].'</span>';
$affPost .= '<p>'.$tabPost['post_message'].'</p>';
$affPost .= '</div>';
$affPost .= '</section>';

// Affichage
echo $affPost;