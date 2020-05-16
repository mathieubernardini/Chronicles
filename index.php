<?php

	require "model/dbManip.php"; // call dataBase managing methods

	if (!empty($_POST)) {

		if (array_key_exists("user_mail", $_POST)) { // allow a new user to register

			userRegister($_POST['user_pseudo'], $_POST['user_mail'], $_POST['user_mdp'], $dbConnexion);

		} else { // connexion manager

			if (!array_key_exists("user_mail", $_POST) && array_key_exists("user_pseudo", $_POST)) {

				$verifConnexion = userConnexion($_POST['user_pseudo'], $_POST['user_mdp'], $dbConnexion);

				if ($verifConnexion['state'] == 1 || $verifConnexion['state'] == 4) {

					if ($verifConnexion['state'] == 1) { // connect a normal user to the site

						$_SESSION['user']['pseudo'] = $verifConnexion['pseudo'];

					} else { // redirection to back office if user is admin

						header('Location: Controller/backOffice.php');

					}

				} else { // connexion error manager

					if ($verifConnexion['state'] == 2) {

						$_SESSION['message'] = 'Le mot de passe est erroné.';

					} else {
						
						$_SESSION['message'] = "L'utilisateur n'a pas été trouvé.";
					}
				}
			}


		}
	}

	require "view/homePage/homePageSettings.html";
	require "view/header.html";
	require "view/homePage/homePage.html";
	require "view/footer.html";

?>