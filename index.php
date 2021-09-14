<?php

    // Session
    session_start();

    // Déconnexion
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        session_destroy();
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brassart'Com - Identification</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/ident.js"></script>
</head>
<body>
    
    <header>
        <?php require_once('includes/inc_header.php'); ?>
    </header>

    <main>
        <form id="frm_mini" method="post">
            <h2>IDENTIFICATION</h2>
            <input type="text" class="focus" id="email" name="email" placeholder="email" value="">
            <input type="password" class="focus" id="mdp" name="mdp" placeholder="mot de passe" value="">
            <button class="pos" id="btn_ident">VALIDER</button>
            <span id="erreur"></span>
            <div id="popup">
                <h4>Identification en cours</h4>
                <img src="images/loading.gif">
            </div>
        </form>
    </main>

    <footer>
        <?php require_once('includes/inc_footer.php'); ?>
    </footer>

</body>
</html>