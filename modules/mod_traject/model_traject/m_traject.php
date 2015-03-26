<?php 
class ModelTraject extends DBMapper{
	public static function get10Trajects(){
		$req = self::$database->prepare("SELECT * FROM amigo_Pathr LIMIT 10");
		$req->execute();
		$trajects = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $trajects;
	}
	
	public static function getTrajectsByDate($date){
		$req = self::$database->prepare("SELECT * FROM amigo_Car WHERE idUser = ?");
		$req->execute(array($idUser));
		$infosCar = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $infosCar;
	}
	
	
	
}


?>