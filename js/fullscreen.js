document.addEventListener('DOMContentLoaded', ()=>{
	// Fonction FULLSCREEN
	function goFS() {
		if (!mode_fs) {
			// On passe en FULLSCREEN
			if (document.documentElement.requestFullscreen) {
				document.documentElement.requestFullscreen();
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullscreen) {
				document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
			}
			// Enregistrement de l'option
			mode_fs = true;
		} else {
			// On sort du FULLSCREEN
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.msCancelFullScreen) {
				document.msCancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			}
			// Enregistrement de l'option
			mode_fs = false;
		}
	}

	// Initialisation
	let mode_fs = false;

	// Ciblage
	let btn_fs = document.getElementById('fs');

	// Gestion du clic
	btn_fs.addEventListener('click', goFS);
});
