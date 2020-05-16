<?php

// gestion d'inscription et de connexion des utilisateurs, probable évolution vers une classe User

function userRegister($pseudo,$mail,$password, $dataBase)
{
	$req = "INSERT INTO user(userPseudo, userMail, userPassword) 
			VALUES ('".$pseudo."', '".$mail."', '".$password."')";

	$dataBase->exec($req);

}

function userConnexion($pseudo, $password, $dataBase)
{
	$result['pseudo'] = "";
	$result['password'] = "";

	$req = "SELECT userPseudo, userPassword
			FROM user
			WHERE userPseudo = '".$pseudo."'";

	$dbAnswer = $dataBase->query($req);

	foreach ($dbAnswer as $key) {
		$result['pseudo'] = $key['userPseudo'];
		$result['password'] = $key['userPassword'];

	}

	if (!$result['pseudo'] == "" && !$result['password'] == "") {

		if ($result['password'] == $password) {

			if ($result['pseudo'] === 'admin') {
				$result['state'] = 4;
			} else {
				$result['state'] = 1;
			}
			
		} else {

			$result['state'] = 2;

		}

	} else {

		$result['state'] = 3;

	}

	return $result;

}


// gestionnaire des données

Class Data { // nécessite une évolution pour s'adapter à la nouvelle classe Author et aux données type User (et futures autres)


	private $dataBase;
	private $dataType;

	function __construct($dataBase,$dataType) {
		$this->dataBase = $dataBase;
		$this->dataType = $dataType;
	}

	function setData($name,$dataBase) {
		$req = "INSERT INTO ".$this->dataType."(".$this->dataType."Name)
				VALUES ('".$name."')";

		$dataBase->exec($req);
	}

	function getAllDatas($dataBase) {
		$req = "SELECT ".$this->dataType."Name
				FROM ".$this->dataType;

		$dbAnswer = $dataBase->query($req);
		$result = $dbAnswer->fetchAll(PDO::FETCH_COLUMN);

		return $result;
	}
}

Class Author extends Data { // gère les auteurs

	function addAuthor($firstName,$lastName,$pseudo, $dataBase) {
		$req = "INSERT INTO author(authorFirstName,authorLastName,authorPseudo)
				VALUES ('".$firstName."','".$lastName."','".$pseudo."')";

		$dataBase->exec($req);
	}
}


// connexion à la base de données

try {

	$dbConnexion = new PDO('mysql:host=localhost;dbname=******','******','******');
	$dbConnexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	print "Erreur : " . $e->getMessage();

}

?>