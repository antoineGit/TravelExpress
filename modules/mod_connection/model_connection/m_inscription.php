<?php
// if(!defined("TEST_INCLUDE")
// die("Vous ne pouvez pas accéder à cette page du site");
class ModelInscription extends DBMapper {
	public static function userExistInDataBase($pseudo) {
		$req = self::$database->prepare ( "select * from amigo_User where nickname=?" );
		$params [0] = $pseudo;
		$req->execute ( $params );
		$count = $req->rowCount ();
		if ($count === 0)
			return false;
		if ($count > 0)
			return true;
	}
	public static function addUser( $civility, $name, $surname, $birth, $country, $city, $cellphone, $email,  $pseudo, $mdp, $isDriver){
		$req = self::$database->prepare ( "INSERT INTO amigo_User (civility, name, surname, birthDate, country, city, cellNumber, mail, nickname, pass, licenseCountry, licenseDate, isDriver, nbPathDriver,nbPathPassenger)
				VALUES (?,?,?,?,?,?,?,?,?,?,'null','null',0,0,0)" );
		
		$params [0] = $civility;
		$params [1] = $name;
		$params [2] = $surname;
		$params [3] = $birth;
		$params [4] = $country;
		$params [5] = $city;
		$params [6] = $cellphone;
		$params [7] = $email;
		$params [8] = $pseudo;
		$params [9] = $mdp; // TODO HASHAGE DU MOT DE PASSE !
		
		$count = $req->execute ( $params );
		
		if ($count === false || $count === 0) {
			// echo"requete �chou�e";
			return false;
		}
		else {
			// echo"requete r�ussie !";
			return true;
		}
	}
	public static function addUserDriver($civility, $name, $surname, $birth, $country, $city, $cellphone, $email, $pseudo, $mdp, 
			$licenseCountry, $licenseDate, $brand,$model, $carAge, $color, $state){
		$req = self::$database->prepare ( "INSERT INTO amigo_User (civility, name, surname, birthDate, country, city, cellNumber, mail, nickname, pass, licenseCountry, licenseDate, isDriver, nbPathDriver,nbPathPassenger) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,1,0,0)" );
		$params [0] = $civility;
		$params [1] = $name;
		$params [2] = $surname;
		$params [3] = $birth;
		$params [4] = $country;
		$params [5] = $city;
		$params [6] = $cellphone;
		$params [7] = $email;
		$params [8] = $pseudo;
		$params [9] = $mdp; // TODO HASHAGE DU MOT DE PASSE !
		$params [10] = $licenseCountry;
		$params [11] = $licenseDate;
		
		$count = $req->execute ( $params );
		
		if ($count === false || $count === 0) {
			// echo"requete �chou�e";
			return false;
		}
		else {
			$idUser = ModelInscription::getId($email, $pseudo);
			$creationCarSuccess = ModelInscription::createCar($idUser['idUser'], $brand, $model, $carAge, $color, $state);

			if($creationCarSuccess)
			// echo"requete r�ussie !";
				return true;
			else 
				return false;
			
		}
		
		
	}
	
	public static function getId($email,  $pseudo){
		$req = self::$database->prepare ('SELECT idUser FROM amigo_User where mail = ? AND nickname = ?');
		$params = array($email, $pseudo);
		$req->execute($params);
		
		$result = $req->fetch(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public static function createCar($idUser, $brand, $model, $carAge, $color, $state){
		$req = self::$database->prepare(" INSERT INTO amigo_Car (idUser, brand, model, purchaseDate, color, state) VALUES (?,?,?,?,?,?)");
		
		$params [0] = $idUser;
		$params [1] = $brand;
		$params [2] = $model;
		$params [3] = $carAge;
		$params [4] = $color;
		$params [5] = $state;
		
		$count = $req -> execute($params);
		
		if ($count === false || $count === 0) {
			// echo"requete �chou�e";
			return false;
		}
		else {
			// echo"requete r�ussie !";
			return true;
		}

	}

}

?>
