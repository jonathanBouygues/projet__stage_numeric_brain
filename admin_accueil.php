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
    <title>Brassart'Com - ADMINISTRATION</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/fullscreen.js"></script>
</head>
<body>
    
    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main>
        <form id="frm_chx">
            <h2>ADMINISTRATION</h2>

        </form>

        <button><a href="admin_gestionSlide.php">Gestion de la présentation</a></button>
        <button><a href="admin_gestionNews.php">Gestion des news</a></button>
        <button><a href="admin_gestionJpoSpo.php">Gestion des JPO/SPO</a></button>
        <button><a href="admin_gestionSalon.php">Gestion des Salons</a></button>

    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>