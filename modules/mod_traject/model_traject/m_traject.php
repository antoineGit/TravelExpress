<?php
class ModelTraject extends DBMapper {
	public static function get10Trajects() {
		$req = self::$database->prepare ( "SELECT * FROM amigo_Path LIMIT 2" );
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
	public static function getTraject($id) {
		$req = self::$database->prepare ( 'SELECT * FROM amigo_Path WHERE idPath = ?' );
		$req->execute ( array ($id) );
		$infosPath = $req->fetchAll ( PDO::FETCH_ASSOC );
		
		return $infosPath [0];
	}
	public static function reserve($idUser, $idPath) {
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
	}
}

?>