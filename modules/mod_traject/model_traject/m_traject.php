<?php 
class ModelTraject extends DBMapper{
	public static function get10Trajects(){
		$req = self::$database->prepare("SELECT * FROM amigo_Path LIMIT 2");
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
	
	public static function createTraject($idUser, $idCar, $date, $departureCity, $departureAddress, $departureHour, $arrivalCity, $arrivalAddress, $nbPassenger, $nbReservation, $smoking, $animals, $talker, $music, $luggage, $price){
		$req = self::$database->prepare("INSERT INTO amigo_Path (idUser,idCar,date,departureCity,departureAddress,departureHour,arrivalCity,arrivalAddress,nbPassenger,nbReservation,smoking,animals,talker,music,luggage,price)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$req->execute(array($idUser,$idCar,$date,$departureCity,$departureAddress,$departureHour,$arrivalCity, $arrivalAddress,$nbPassenger,$nbReservation,$smoking,$animals,$talker,$music,$luggage,$price));
	}
	
	public static function getTraject($id){
		$req = self::$database->prepare('SELECT * FROM amigo_Path WHERE idPath = ?');
		$req->execute(array($id));
		$infosPath = $req->fetchAll(PDO::FETCH_ASSOC);
		
		return $infosPath;
	}
	
	
}


?>