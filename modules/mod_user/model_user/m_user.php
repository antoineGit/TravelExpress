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
	
	
	
}


?>