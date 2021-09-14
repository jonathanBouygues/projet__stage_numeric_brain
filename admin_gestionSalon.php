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
    <title>Brassart'Com - Gestion des salons</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/fullscreen.js"></script>
    <script src="js/salon.js" defer></script>
</head>
<body>

    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main class="gestionSalon">

        <button><a href="admin_accueil.php">Retour à l'accueil</a></button>
        
        <div>
            <form id="salonNew" action="codes/cod_salon.php" method="post">  
                <h2>Nouveau Salon</h2>  
                <label for="">Titre</label>
                <input type="text" name="salonNom">
                <label for="">Lieu</label>
                <input type="text" name="salonLieu">
                <label for="">Date début de l'évènement</label>
                <input type="date" name="salonDateDeb">
                <label for="">Date fin de l'évènement</label>
                <input type="date" name="salonDateFin">
                <div class="blocHeure">
                    <label for="">Horaire de début</label>
                    <div class="containerHeure">
                        <select name="salonHeureDeb"></select>
                        <span>:</span>
                        <select name="salonMinuteDeb"></select>
                    </div>
                </div>
                <div class="blocHeure">
                    <label for="">Horaire de fin</label>
                    <div class="containerHeure">
                        <select name="salonHeureFin"></select>
                        <span>:</span>
                        <select name="salonMinuteFin"></select>
                    </div>
                </div>
                <input type="submit" value="Go !">
            </form>
        </div>

        <div class="containerSalon">
            <h2>Gestion des salons</h2>
            <?php include('includes/inc_stockSalon.php'); ?>
        </div>

        <form id="deleteSalon" action="codes/cod_salon.php" method="post">    
                <input type="hidden" name="numSalon" value="">
        </form>

        <form id="modifySalon" action="codes/cod_salon.php" method="post">   
                <h2>Modification d'un Salon</h2> 

                <input type="hidden" name="salonNumMod" value="">
                <select name="salonChampsMod">
                    <option value="salon_nom">Titre</option>
                    <option value="salon_lieu">Lieu</option>
                    <option value="salon_dateDeb">Date de début</option>
                    <option value="salon_dateFin">Date de fin</option>
                    <option value="salon_heureDeb">Horaire de début</option>
                    <option value="salon_heureFin">Horaire de fin</option>
                </select>
                <input type="text" name="salonChampsValue" value="">
                <select name="salonHeureMod"></select>
                <select name="salonMinuteMod"></select>
                
                <input type="submit" value="Go !">
        </form>
    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>