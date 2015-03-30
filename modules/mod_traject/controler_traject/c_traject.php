<?php
$module = "traject";
require_once ("./modules/mod_$module/view_$module/v_$module.php");
require_once ("./modules/mod_$module/model_$module/m_$module.php");
class ControlerTraject extends ControlerGeneric {
	function del(){
		if($_GET['idT']){
			$idPath = $_GET['idT'];
			$idUser = $_SESSION['id_user'];
			
			ModelTraject::delTraject($idUser,$idPath);
			ModelTraject::delReserved($idPath);
			
			$this->printTrajectHome();
		}
	}
	function getTrajectsReserved(){
		if (isset($_SESSION['id_user'])&&!empty($_SESSION['id_user'])){
			$idUser = $_SESSION['id_user'];
				
			$idPath = ModelTraject::getTrajectReserved($idUser);
			for($i=0;$i<count($idPath);$i++){
				$infosTraject[$i] = ModelTraject::getTraject($idPath[$i]['idPath']);
			}
				$this->constructView("ViewTraject", "reductTraject", array($infosTraject));
		}
	}
	
	function reservation(){
		if(isset ( $_SESSION ['id_user'] ) && !empty ( $_SESSION ['id_user'] )){
			$idPath = $_GET['id'];
			$idUser = $_SESSION['id_user'];
			
			$reserved = ModelTraject::reserve($idUser,$idPath);
			if($reserved)
				$this->constructView("ViewTraject", "reservationSuccess", array());
			else
				$this->constructView("ViewTraject", "reservationFailed", array());
			
		}
		
	}
	function printTrajectHome() {
		if (! isset ( $_GET ['id'] )) {
			$trajects = ModelTraject::get10Trajects ();
			$this->constructView ( "ViewTraject", "reductTraject", array ($trajects) );
		}else {
			$traject = ModelTraject::getTraject($_GET['id']);
			$this->constructView("ViewTraject", "viewTrajectNormal", array($traject));
		}
	}
	function createTraject() {
		$idUser = $_SESSION ['id_user'];
	}
	public function printCreationForm() {
		// if we're not already connect
		
		if($_SESSION['is_a_driver'] &&  isset ( $_SESSION ['id_user'] ) && !empty ( $_SESSION ['id_user'] )){
			if (isset ( $_POST ['car'] ) && isset ( $_POST ['date'] ) && isset ( $_POST ['departureHour'] ) && isset ( $_POST ['departureCity'] ) && isset ( $_POST ['departureAddress'] ) && isset ( $_POST ['arrivalCity'] ) && isset ( $_POST ['arrivalAddress'] ) && isset ( $_POST ['nbPassenger'] ) && isset ( $_POST ['nbReservation'] ) && isset ( $_POST ['smoke'] ) && isset ( $_POST ['animals'] ) && isset ( $_POST ['talk'] ) && isset ( $_POST ['music'] ) && isset ( $_POST ['suitcase'] ) && isset ( $_POST ['price'] )) {
				$idUser = $_SESSION ['id_user'];
				$idCar = $_POST ['car'];
				$date = $_POST ['date'];
				$departureCity = $_POST ['departureCity'];
				$departureAddress = $_POST ['departureAddress'];
				$departureHour = $_POST ['departureHour'];
				$arrivalCity = $_POST ['arrivalCity'];
				$arrivalAddress = $_POST ['arrivalAddress'];
				$smoking = $_POST ['smoke'];
				$animals = $_POST ['animals'];
				$talker = $_POST ['talk'];
				$music = $_POST ['music'];
				$luggage = $_POST ['suitcase'];
				$price = $_POST ['price'];
				$nbPassenger = $_POST ['nbPassenger'];
				$nbReservation = $_POST ['nbReservation'];
				
				$isAlreadyCreate = ModelTraject::isAlreadyCreate($idUser,$date,$departureHour);
				
				if(!$isAlreadyCreate){
					ModelTraject::createTraject ( $idUser, $idCar, $date, $departureCity, $departureAddress, $departureHour, $arrivalCity, $arrivalAddress, $nbPassenger, $nbReservation, $smoking, $animals, $talker, $music, $luggage, $price );
					$this->constructView ( "ViewTraject", "createTrajectSuccess", array () );
				}else 
					$this->constructView("ViewTraject", "isAlreadyCreate", array());
			} else
				$this->constructView ( "ViewTraject", "createTraject", array () );
		}
		else 
			$this->constructView ( 'ViewTraject', 'printError', array () );
	}
}

?>
