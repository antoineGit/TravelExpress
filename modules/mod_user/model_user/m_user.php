<?php 
class ModelUser extends DBMapper{
	
	public static function getUserInfo($idUser){
		$req = self::$database->prepare("SELECT * FROM amigo_User WHERE idUser = ?");
		$req->execute(array($idUser));
		$infosUser = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $infosUser;
	}
	
	public static function getCarInfo($idUser){
		$req = self::$database->prepare("SELECT * FROM amigo_Car WHERE idUser = ?");
		$req->execute(array($idUser));
		$infosCar = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $infosCar;
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
	
	public static function delCar($idCar, $idUser){
		$req = self::$database->prepare("DELETE FROM amigo_Car WHERE idUser=? AND idCar=?");
		$count = $req->execute(array($idUser, $idCar));
		
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