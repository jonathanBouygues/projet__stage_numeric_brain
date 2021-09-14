document.addEventListener('DOMContentLoaded', () => {

    // Initialisation
    let err;
    let tab_erreurs = [
        '',
        'Email manquant',
        'Mot de passe manquant',
        'Email et mot de passe manquant',
        'Problème interne, veuillez contacter l\'administrateur',
        'Désolé, vos identifiants sont incorrects'
    ];

    // Ciblages
    let btn_ident = document.getElementById('btn_ident');
    let frm_ident = document.getElementById('frm_mini');
    let email = document.getElementById('email');
    let mdp = document.getElementById('mdp');
    let aff_erreur = document.getElementById('erreur');
    let popup = document.getElementById('popup');

    // NETTOYAGE des INPUT au FOCUS
    email.addEventListener('focus', function () { this.classList.remove('alert') });
    mdp.addEventListener('focus', function () { this.classList.remove('alert') });

    // Actions générant l'envoi des identifiants
    // CLIC sur bouton VALIDER
    btn_ident.addEventListener('click', (e) => {
        e.preventDefault();
        checkIdent();
    });
    // APPUI sur la touche ENTRÉE
    document.addEventListener('keypress', (e) => {
        // Détection de la touche ENTRÉE
        if (e.which == 13) {
            checkIdent();
        }
    });

    // Gestion de l'identification (asynchrone)
    function checkIdent() {
        // Initialisation
        err = 0;
        // Vérifications
        if (email.value == '') {
            err += 1;
            email.classList.add('alert');
        }
        if (mdp.value == '') {
            err += 2;
            mdp.classList.add('alert');
        }
        // Conséquences
        if (err != 0) {
            checkErr(err);
        } else {
            // Apparition de la popup de loading
            popup.className = 'actif';
            // Récupération des données
            myFormData = new FormData(frm_ident);
            // Préparation des options
            let options = {
                method: 'POST',
                body: myFormData
            }
            // Traitement des données
            fetch('codes/cod_identification.php', options)
                .then(reponse => {
                    // Récupèration de la réponse et formatage
                    return reponse.text();
                })
                .then((data) => {
                    // Disparition de la popup de loading
                    popup.className = '';
                    // Traitement de la réponse formatée
                    checkErr(data);
                });
        }
    }

    // Gestion de l'affichage des erreurs
    function checkErr(num) {
        num = parseInt(num);
        switch (num) {
            // Identification correcte et redirection
            case 0:
                document.location.href = 'admin_accueil.php';
                break;
            // Erreur
            case 1:
                email.classList.add('alert');
                break;
            case 2:
                mdp.classList.add('alert');
                break;
            case 3:
                email.classList.add('alert');
                mdp.classList.add('alert');
                break;
            default:
                email.value = '';
                mdp.value = '';
        }
        // Affichage du message d'erreur
        aff_erreur.textContent = tab_erreurs[num];
    }

});