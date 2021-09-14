document.addEventListener('DOMContentLoaded', ()=>{

    // Initialisation
    let num = 1;
    let menu = 0;
    let oldMenu = 0; 

    // Ciblages
    let header = document.querySelector('header');
    let tab_sections = document.querySelectorAll('main section');

    // Nonmbre de slides
    let nbr_slides = tab_sections.length;

    // Affichage du premier slide
    tab_sections[0].classList.add('actif');

    // Gestion du MENU
    document.addEventListener('mousemove', function(e){
        if (e.clientY<50 && oldMenu==0) {
            oldMenu = 1;
        }
        if (e.clientY>180 && oldMenu==1) {
            oldMenu = 0;
        }
        if (menu!=oldMenu) {
            if (menu==0) {
                menu=1;
                header.classList.add('actif');
            } else {
                menu=0;
                header.classList.remove('actif');
            }
        }
    });

    // Fonction d'affichage
    function affSlide() {

        // DEBUG
        // console.log(num);

        // ########## Gestion des classes
        // FADE IN
        tab_sections[num].classList.add('actif');
        // FADE OUT
        if (num==0) {
            tab_sections[nbr_slides-1].classList.remove('actif');
        } else {
            tab_sections[num-1].classList.remove('actif');
        }     

        // On décale
        num++;

        // Rebouclage
        if (num == nbr_slides) {
            num = 0;
        }     

    } 
    
    // Timing
    if (nbr_slides>1) {
        setInterval(affSlide,4000);
    }

});