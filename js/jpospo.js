//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Ajoute des données Heure/Minutes avec une boucle █▄█ 

// Targets
let heureDeb = document.querySelector('select[name=jpospoHeureDeb]');
let minuteDeb = document.querySelector('select[name=jpospoMinuteDeb]');
let heureFin = document.querySelector('select[name=jpospoHeureFin]');
let minuteFin = document.querySelector('select[name=jpospoMinuteFin]');

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
// █▄█ Supprimer les jpospo █▄█ 

// Targets
let jpospoDel = document.querySelectorAll('.jpospoDelImg');
let jpospoValueDel = document.querySelector('input[name=numJpospo]');
let deleteJpospo = document.getElementById('id');


// Boucle pour connaitre quel est la cible et le data-num
jpospoDel.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id de la jpospo
		data.value = element.dataset.num;
		// Envoi du formulaire
		deleteJpospo.submit();
	});
});



//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Modifier les JPO/SPO █▄█ 

// Targets
let tabJpospoMod = document.querySelectorAll('.jpospoModImg');
let jpospoNumMod = document.querySelector('input[name=jpospoNumMod]');
let modifyJpospo = document.getElementById('modifyJpospo');
let containerJpospo = document.querySelector('.containerJpospo');
let jpospoNew = document.getElementById('jpospoNew');
let jpospoChampsValue = document.querySelector('input[name=jpospoChampsValue]');
let jpospoChampsMod = document.querySelector('select[name=jpospoChampsMod]');
let jpospoHeureMod = document.querySelector('select[name=jpospoHeureMod]');
let jpospoMinuteMod = document.querySelector('select[name=jpospoMinuteMod]');

// Boucle pour connaitre quel est la cible et le data-num
tabJpospoMod.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id de la JPO/SPO
		jpospoNumMod.value = this.parentNode.parentNode.dataset.num;
		// Gestion de l'affichage
		containerJpospo.style.display = "none";
		jpospoNew.style.display = "none";
		modifyJpospo.style.display = "flex";
		// Changement du type de l'input selon le champ
		jpospoChampsMod.addEventListener('change', function () {
			// Initialisation pour affichage
			jpospoChampsValue.style.display = "flex";
			jpospoHeureMod.style.display = "none";
			jpospoMinuteMod.style.display = "none";
			// Affichage selon choix du champs
			if (jpospoChampsMod.value === 'jpospo_date') {
				jpospoChampsValue.type = "date";
			} else if ((jpospoChampsMod.value === 'jpospo_heureDeb') || (jpospoChampsMod.value === 'jpospo_heureFin')) {
				jpospoChampsValue.style.display = "none";
				boucleTemps(jpospoHeureMod, 'heure');
				boucleTemps(jpospoMinuteMod, 'minute');
				jpospoHeureMod.style.display = "flex";
				jpospoMinuteMod.style.display = "flex";
			} else {
				jpospoChampsValue.type = "text";
			}
		});
	});
});
