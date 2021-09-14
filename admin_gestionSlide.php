<?php

// Session
session_start();

// Sécurité
if (empty($_SESSION['user_id'])) {
    // Retour à l'identification
    header('Location:index.php');
} else {
    // Récupération des droits d'admin
    $user_droit = $_SESSION['user_droit'];
    // Numéro de page
    $espace = 0;
    // Chargement de la configuration
    require_once('includes/inc_config.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brassart'Com - Gestion de la présentation</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/fullscreen.js"></script>
</head>
<body>
    
    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main>
        <form id="chx_pres" action="codes/cod_presentation.php" method="post">
            <h2>Gestion des slides</h2>

            <label for="pratique">Pratique</label>
            <input type="checkbox" id="pratique" name="presentation[]" value="1">
            <label for="planning">Planning</label>
            <input type="checkbox" id="planning" name="presentation[]" value="2">
            <label for="news">News Brassart</label>
            <input type="checkbox" id="news" name="presentation[]" value="3">
            <label for="jpoSpo">JPO/SPO</label>
            <input type="checkbox" id="jpoSpo" name="presentation[]" value="4">

            <input type="submit" value="Go !">
        </form>
    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>