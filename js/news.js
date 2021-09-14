//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Supprimer les news █▄█ 

// Targets
let tabDelete = document.querySelectorAll('.deleteImg');
let valueDelete = document.querySelector('input[name=numNews]');
let deleteNews = document.getElementById('deleteNews');


// Boucle pour connaitre quel est la cible et le data-num
tabDelete.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id de la news
		valueDelete.value = this.parentNode.parentNode.dataset.num;
		// Envoi du formulaire
		deleteNews.submit();
	});
});



//╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩╔╩
// █▄█ Modifier les news █▄█ 

// Targets
let tabModify = document.querySelectorAll('.modifyImg');
let valueModify = document.querySelector('input[name=numModNews]');
let modifyNews = document.getElementById('modifyNews');
let containerNews = document.querySelector('.containerNews');
let formCom = document.getElementById('formCom');
let inputChampsValue = document.querySelector('input[name=champsValue]');
let selectChampsModify = document.querySelector('select[name=champsModify]');

// Boucle pour connaitre quel est la cible et le data-num
tabModify.forEach(element => {

	element.addEventListener('click', function () {
		// Récupération de l'id de la news
		valueModify.value = this.parentNode.parentNode.dataset.num;
		// Initialisation pour affichage
		containerNews.style.display = "none";
		formCom.style.display = "none";
		modifyNews.style.display = "flex";
		// Changement du type de l'input selon le champ
		selectChampsModify.addEventListener('change', function () {
			if (selectChampsModify.value === 'post_date') {
				inputChampsValue.type = "date";
			};
			if (selectChampsModify.value === 'post_title') {
				inputChampsValue.type = "text";
			};
		});
	});
});