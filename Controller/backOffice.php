<?php
	
	require "../model/dbManip.php";


	$category = new Data($dbConnexion,"category");
	if (array_key_exists("category_name", $_POST)) {

		
		$category->setData($_POST['category_name'],$dbConnexion);
	}

	$categoriesList = $category->getAllDatas($dbConnexion);

	$author = new Author($dbConnexion,"author");

	if (array_key_exists("author_FirstName", $_POST) && array_key_exists("author_LastName", $_POST)) {

		
		$author->addAuthor($_POST['author_FirstName'],$_POST['author_LastName'],$_POST['author_Pseudo'],$dbConnexion);
	}

	require "../view/backOffice/backOfficeSettings.html";
	require "../view/header.html";
	require "../view/backOffice/backOffice.html";
	require "../view/footer.html";
?>