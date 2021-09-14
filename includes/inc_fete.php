<?php

//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄██▄█ Saint of the day  █▄██▄█

// Get the file RSS
$file = new DOMDocument();
$file->load('http://www.ephemeride-jour.fr/rss/rss_saints.php');

// Get the data by RegExp
$data = $file->textContent;
$view = preg_split('#<B>#', $data, -1, PREG_SPLIT_OFFSET_CAPTURE);
$view = preg_split('#([,]{0,})</B>#', $view[1][0], -1, PREG_SPLIT_OFFSET_CAPTURE);
echo '<br>Saint du jour : '.$view[0][0];