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
    <title>Brassart'Com - Gestion des news</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/fullscreen.js"></script>
    <script src="js/news.js" defer></script>
</head>
<body>
    
    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main class="gestionNews">

        <button><a href="admin_accueil.php">Retour à l'accueil</a></button>
        
        <div>
            <form id="formCom" action="codes/cod_news.php" method="post">  
                <h2>Nouvelle news</h2>  
                <label for="">Titre</label>
                <input type="text" name="titleCom">
                <label for="">Message</label>
                <textarea name="messageCom" id="" cols="30" rows="10"></textarea>
                <label for="">Date de l'évènement</label>
                <input type="date" name="dateCom">
                <input type="submit" value="Go !">
            </form>
        </div>

        <div class="containerNews">
            <h2>Gestion des news</h2>
            <?php include('includes/inc_stockNews.php'); ?>
        </div>

        <form id="deleteNews" action="codes/cod_news.php" method="post">    
                <input type="hidden" name="numNews" value="">
        </form>

        <form id="modifyNews" action="codes/cod_news.php" method="post">   
                <h2>Modification d'une news</h2> 
                <input type="hidden" name="numModNews" value="">
                <select name="champsModify">
                    <option value="post_title">Titre</option>
                    <option value="post_message">Message</option>
                    <option value="post_date">Date</option>
                </select>
                <input type="text" name="champsValue" value="">
                <input type="submit" value="Go !">
        </form>
    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>