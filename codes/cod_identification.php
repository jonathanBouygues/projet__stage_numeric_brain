<?php

// Session
session_start();

// Initialisation
$erreur = 0;

// Identification
if ((isset($_POST['email'])) && (isset($_POST['mdp']))) {
    // Email manquant
    if ($_POST['email']=='') {
        $erreur += 1;
    }
    // Mot de passe manquant
    if ($_POST['mdp']=='') {
        $erreur += 2;
    }
    // Identifiants renseignés
    if ($erreur == 0) {
        // Formatage
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        // Configuration
        require_once('../includes/inc_config.php');
        // Connexion DB
        require_once('../includes/inc_connDB.php');
        // Formatage du MDP
        $mdpc = hash('sha256', $mdp);
        // Préparation de la requête
        $requete = "SELECT * FROM users INNER JOIN acces ON users_droit = acces_id WHERE users_email = '".$email."' AND users_mdp = '".$mdpc."' LIMIT 1";
        // Envoi de la requête et récupération du résultat
        $resultat = $connDB->query($requete);
        // Traitement de la réponse
        if ($tab_datas = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // Identification OK
            $_SESSION['user_id'] = $tab_datas['users_id'];
            $_SESSION['user_droit'] = $tab_datas['acces_desc'];
            $_SESSION['user_ident'] = ucfirst($tab_datas['users_prenom']).' '.ucfirst($tab_datas['users_nom']);
        } else {
            // Identification incorrecte
            $erreur = 5;
        }
        // Déconnexion DB
        require_once('../includes/inc_decoDB.php');
    }
} else {
    // PIRATAGE
    $erreur = 4;
}

// RENVOI
    echo $erreur;