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
    <title>Brassart'Com - Gestion des JPO/SPO</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/fullscreen.js"></script>
    <script src="js/jpospo.js" defer></script>
</head>
<body>

    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main class="gestionJpospo">

        <button><a href="admin_accueil.php">Retour à l'accueil</a></button>
        
        <div>
            <form id="jpospoNew" action="codes/cod_jpospo.php" method="post">  
                <h2>Nouvelle JPO/SPO</h2>  
                <label for="">Titre</label>
                <input type="text" name="jpospoNom">
                <label for="">Date de l'évènement</label>
                <input type="date" name="jpospoDate">
                <div class="blocHeure">
                    <label for="">Heure de début</label>
                    <div class="containerHeure">
                        <select name="jpospoHeureDeb"></select>
                        <span>:</span>
                        <select name="jpospoMinuteDeb"></select>
                    </div>
                </div>
                <div class="blocHeure">
                    <label for="">Heure de fin</label>
                    <div class="containerHeure">
                        <select name="jpospoHeureFin"></select>
                        <span>:</span>
                        <select name="jpospoMinuteFin"></select>
                    </div>
                </div>

                <input type="submit" value="Go !">
            </form>
        </div>

        <div class="containerJpospo">
            <h2>Gestion des JPO/SPO</h2>
            <?php include('includes/inc_stockJpospo.php'); ?>
        </div>

        <form id="deleteJpospo" action="codes/cod_jpospo.php" method="post">    
                <input type="hidden" name="numJpospo" value="">
        </form>

        <form id="modifyJpospo" action="codes/cod_jpospo.php" method="post">   
                <h2>Modification d'une JPO/SPO</h2> 

                <input type="hidden" name="jpospoNumMod" value="">
                <select name="jpospoChampsMod">
                    <option value="jpospo_nom">Titre</option>
                    <option value="jpospo_date">Date</option>
                    <option value="jpospo_heureDeb">Heure de début</option>
                    <option value="jpospo_heureFin">Heure de Fin</option>
                </select>
                <input type="text" name="jpospoChampsValue" value="">
                <select name="jpospoHeureMod"></select>
                <select name="jpospoMinuteMod"></select>
                
                <input type="submit" value="Go !">
        </form>
    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>