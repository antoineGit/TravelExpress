<?php
class ModelTraject extends DBMapper {
	public static function isAlreadyCreate($idUser, $date, $departureHour) {
		$req = self::$database->prepare ( "SELECT idPath FROM amigo_Path WHERE idUser? AND date=? AND departureHour=?" );
		$req->execute ( array (
				$idUser,
				$date,
				$departureHour 
		) );
		$count = $req->fetch ( PDO::FETCH_ASSOC );
		
		if ($count === false || $count === 0)
			return false;
		else
			return true;
	}
	public static function get10Trajects() {
		$req = self::$database->prepare ( "SELECT * FROM amigo_Path LIMIT 4" );
		$req->execute ();
		$trajects = $req->fetchAll ( PDO::FETCH_ASSOC );
		
		return $trajects;
	}
	public static function getTrajectReserved($idUser) {
		$req = self::$database->prepare ( "SELECT idPath FROM amigo_Reserved WHERE idUser=? " );
		$req->execute ( array (
				$idUser 
		) );
		$trajectReserved = $req->fetchAll ( PDO::FETCH_ASSOC );
		
		return $trajectReserved;
	}
	public static function getTrajectsByDate($date) {
		$req = self::$database->prepare ( "SELECT * FROM amigo_Car WHERE idUser = ?" );
		$req->execute ( array (
				$idUser 
		) );
		$infosCar = $req->fetchAll ( PDO::FETCH_ASSOC );
		
		return $infosCar;
	}
	public static function delTraject($idUser,$idPath){
		$req = self::$database->prepare("DELETE FROM amigo_Path WHERE idUser=? AND idPath=?");
		$req->execute(array($idUser,$idPath));
	}
	public static function delReserved($idPath){
		$req = self::$database->prepare("DELETE FROM amigo_Reserved WHERE idPath=?");
		$req->execute(array($idPath));
	}
	
	public static function createTraject($idUser, $idCar, $date, $departureCity, $departureAddress, $departureHour, $arrivalCity, $arrivalAddress, $nbPassenger, $nbReservation, $smoking, $animals, $talker, $music, $luggage, $price) {
		$req = self::$database->prepare ( "INSERT INTO amigo_Path (idUser,idCar,date,departureCity,departureAddress,departureHour,arrivalCity,arrivalAddress,nbPassenger,nbReservation,smoking,animals,talker,music,luggage,price)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
		$req->execute ( array (
				$idUser,
				$idCar,
				$date,
				$departureCity,
				$departureAddress,
				$departureHour,
				$arrivalCity,
				$arrivalAddress,
				$nbPassenger,
				$nbReservation,
				$smoking,
				$animals,
				$talker,
				$music,
				$luggage,
				$price 
		) );
	}
	public static function hasAlreadyReserved($idUser,$idPath){
		$req = self::$database->prepare("SELECT idUser FROM amigo_Reserved WHERE idUser=? AND idPath=?");
		$count = $req->execute(array($idUser,$idPath));
		
		if ($count === false || $count === 0)
			return false;
		else
			return true;
	}
	public static function getTraject($id) {
		$req = self::$database->prepare ( 'SELECT * FROM amigo_Path WHERE idPath = ?' );
		$req->execute ( array (
				$id 
		) );
		$infosPath = $req->fetchAll ( PDO::FETCH_ASSOC );
		
		return $infosPath [0];
	}
	public static function reserve($idUser, $idPath) {
		$traject = ModelTraject::getTraject ( $idPath );
		$hasAlreadyReserved = ModelTraject::hasAlreadyReserved($idUser, $idPath);
		if ($traject ['nbReservation'] - 1 >= 0 && !$hasAlreadyReserved) {
		
			$req = self::$database->prepare ( "INSERT INTO amigo_Reserved VALUES (?,?)" );
			$count = $req->execute ( array (
					$idUser,
					$idPath 
			) );
			$req = self::$database->prepare ( "UPDATE amigo_Path SET nbReservation=nbReservation-1 WHERE idPath=? AND idUser=?" );
			$count = $req->execute ( array (
					$idPath,
					$idUser 
			) );
			if ($count === false || $count === 0)
				return false;
			else
				return true;
		} else
			return false;
	}
}

?>