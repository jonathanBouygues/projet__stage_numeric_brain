<?php

// Session
session_start();

// Sécurité
if (empty($_SESSION['user_id'])) {
    // Retour à l'identification
    header('Location:index.php');
} else {
    // Espace
    $espace = 1;
    // Chargement de la configuration
    require_once('includes/inc_config.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brassart'Com - presentation</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/pres.css">
    <script src="js/fullscreen.js"></script>
    <script src="js/pres.js"></script>
</head>
<body>

    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main>

        <?php 
            include('includes/inc_stockSlide.php');

            if (in_array('pratique', $arraySlides)) {
                include('includes/inc_pratique.php');
            }
            if (in_array('planning', $arraySlides)) {
                include('includes/inc_planning.php');
            }
            if (in_array('newsBrassart', $arraySlides)) {
                include('includes/inc_newsBrassart.php');
            }
            if (in_array('jpoSpo', $arraySlides)) {
                include('includes/inc_jpospoSalon.php');
            } 
        ?>

    </main>
   
</body>
</html>