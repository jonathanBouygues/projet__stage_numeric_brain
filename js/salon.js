//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Ajoute des données Heure/Minutes avec une boucle █▄█ 

// Targets
let heureDeb = document.querySelector('select[name=salonHeureDeb]');
let minuteDeb = document.querySelector('select[name=salonMinuteDeb]');
let heureFin = document.querySelector('select[name=salonHeureFin]');
let minuteFin = document.querySelector('select[name=salonMinuteFin]');

function boucleTemps(cible, selection) {

	if ((selection === 'heure') && (cible.innerHTML === "")) {
		for (a = 8; a <= 23; a++) {
			if (a < 10) {
				cible.innerHTML += '<option>0' + a + '</option>';
			} else {
				cible.innerHTML += '<option>' + a + '</option>';
			}
		}
	}
	if ((selection === 'minute') && (cible.innerHTML === "")) {
		for (a = 00; a <= 45; a += 15) {
			if (a === 0) {
				cible.innerHTML += '<option>0' + a + '</option>';
			} else {
				cible.innerHTML += '<option>' + a + '</option>';
			}
		}
	}
}

// Injection des options sur select
boucleTemps(heureDeb, 'heure');
boucleTemps(minuteDeb, 'minute');
boucleTemps(heureFin, 'heure');
boucleTemps(minuteFin, 'minute');


//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Supprimer les salons █▄█ 

// Targets
let salonDel = document.querySelectorAll('.salonDelImg');
let salonValueDel = document.querySelector('input[name=numSalon]');
let deleteSalon = document.getElementById('deleteSalon');

// Boucle pour connaitre quel est la cible et le data-num
salonDel.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id du salon
		salonValueDel.value = this.parentNode.parentNode.dataset.num;
		// Envoi du formulaire
		deleteSalon.submit();
	});
});



//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Modifier un salon █▄█ 

// Targets
let tabSalonMod = document.querySelectorAll('.salonModImg');
let salonNumMod = document.querySelector('input[name=salonNumMod]');
let modifySalon = document.getElementById('modifySalon');
let containerSalon = document.querySelector('.containerSalon');
let salonNew = document.getElementById('salonNew');
let salonChampsValue = document.querySelector('input[name=salonChampsValue]');
let salonChampsMod = document.querySelector('select[name=salonChampsMod]');
let salonHeureMod = document.querySelector('select[name=salonHeureMod]');
let salonMinuteMod = document.querySelector('select[name=salonMinuteMod]');

// Boucle pour connaitre quel est la cible et le data-num
tabSalonMod.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id du salon
		salonNumMod.value = this.parentNode.parentNode.dataset.num;
		// Initialisation pour affichage
		containerSalon.style.display = "none";
		salonNew.style.display = "none";
		modifySalon.style.display = "flex";
		// Changement du type de l'input selon le champ
		salonChampsMod.addEventListener('change', function () {
			// Initialisation
			salonChampsValue.style.display = "flex";
			salonHeureMod.style.display = "none";
			salonMinuteMod.style.display = "none";
			// Affichage selon choix du champs
			if ((salonChampsMod.value === 'salon_dateDeb') || (salonChampsMod.value === 'salon_dateFin')) {
				salonChampsValue.type = "date";
			} else if ((salonChampsMod.value === 'salon_heureDeb') || (salonChampsMod.value === 'salon_heureFin')) {
				salonChampsValue.style.display = "none";
				boucleTemps(salonHeureMod, 'heure');
				boucleTemps(salonMinuteMod, 'minute');
				salonHeureMod.style.display = "flex";
				salonMinuteMod.style.display = "flex";
			} else {
				salonChampsValue.type = "text";
			}
		});
	});
});