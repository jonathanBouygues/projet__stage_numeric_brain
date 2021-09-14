<?php

    // Connexion à la DB
    try {
        $connDB = new PDO(DB_DSN, DB_USER, DB_MDP);
    } catch(Exception $erreur) {
        exit('Problème de connexion à la DB.');
    }