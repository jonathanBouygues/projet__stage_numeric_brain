<section>
    <nav>
<?php
    if (!empty($_SESSION['user_id'])) {
        echo '<ul>';
        // Gestion du mode ESPACE
        if ($espace==0) {
            // Mode ADMINISTRATION
            echo '<li><a href="presentation.php">Basculer en mode PRÉSENTATION</a></li>';
        } else {
            // Mode PRÉSENTATION
            echo '<li><a id="fs" href="#" title="mode FULLSCREEN">&#x26F6;</a></li>';
            echo '<li><a href="admin_accueil.php">Basculer en mode ADMINISTRATION</a></li>';
        }
        echo '</ul>';
    }
?>
    </nav>
    <span>
<?php
    if (!empty($_SESSION['user_id'])) {
        echo $_SESSION['user_ident'];
        echo ' <a href="index.php">Déconnexion</a>';
    }
?>
    </span>
</section>