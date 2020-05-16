/*gestion de l'inscription avec javascript
*
* nombreux bouts de codes redondants, probable évolution vers une classe, ou au moins la création de fonctions
*/

document.getElementById("signin").addEventListener("click", function(){

	//retire formulaire connexion si actif

	if (document.getElementById("loginForm")) {
		var header = document.getElementsByTagName("header")[0];
		var loginForm = document.getElementById("loginForm");
		header.removeChild(loginForm);
	}

	// crée formulaire inscription si n'existe pas déja

	if (!document.getElementById("signinForm")) {

		var signinForm = document.createElement("form");

		var signinFormContent = "<fieldset><legend>Inscription</legend>"
								+"<label for='pseudo'>Pseudo : </label>"
								+"<input type='text' name='user_pseudo' id='pseudo'>"
								+"<label for='mail'>Mail : </label>"
								+"<input type='text' name='user_mail' id='mail'>"
								+"<label for='mdp'>Mot de passe : </label>"
								+"<input type='text' name='user_mdp' id='mdp'>"
								+"<input type='submit' id='submit' value='Valider'>"
								+"<button type='button' id='cancelSignin'>Annuler</button></fieldset>";

		var header = document.getElementsByTagName("header")[0];

		header.appendChild(signinForm);

		signinForm.id = "signinForm";
		signinForm.method = "POST";
		signinForm.innerHTML = signinFormContent;

	}

	//annule le formulaire

	document.getElementById("cancelSignin").addEventListener("click", function(){
		var header = document.getElementsByTagName("header")[0];
		var signinForm = document.getElementById("signinForm");
		header.removeChild(signinForm);
	});
});


//gestion formulaire connexion

document.getElementById("login").addEventListener("click", function(){

	//retire formulaire inscription si actif

	if (document.getElementById("signinForm")) {
		var header = document.getElementsByTagName("header")[0];
		var signinForm = document.getElementById("signinForm");
		header.removeChild(signinForm);
	}

	// crée formulaire connexion si n'existe pas déja

	if (!document.getElementById("loginForm")) {

		var loginForm = document.createElement("form");

		var loginFormContent = "<fieldset><legend>Connexion</legend>"
								+"<label for='pseudo'>Pseudo : </label>"
								+"<input type='text' name='user_pseudo' id='pseudo'>"
								+"<label for='mdp'>Mot de passe : </label>"
								+"<input type='text' name='user_mdp' id='mdp'>"
								+"<input type='submit' id='submit' value='Valider'>"
								+"<button type='button' id='cancelLogin'>Annuler</button></fieldset>";

		var header = document.getElementsByTagName("header")[0];

		header.appendChild(loginForm);

		loginForm.id = "loginForm";
		loginForm.method = "POST";
		loginForm.innerHTML = loginFormContent;

	}

	//annule le formulaire

	document.getElementById("cancelLogin").addEventListener("click", function(){
		var header = document.getElementsByTagName("header")[0];
		var loginForm = document.getElementById("loginForm");
		header.removeChild(loginForm);
	});
});

