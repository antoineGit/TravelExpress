<?php
$module = "traject";
require_once ("./modules/mod_$module/view_$module/v_$module.php");
require_once ("./modules/mod_$module/model_$module/m_$module.php");
class ControlerTraject extends ControlerGeneric {
    function printTrajectHome(){
       $trajects = ModelTraject::get10Trajects();
       $this->constructView("ViewTraject", "trajectHome",$trajects);

    }
    function createTraject(){
    	$idUser = $_SESSION['id_user'];
		
    }
	
    public function printCreationForm() {
    	// if we're not already connect
    	if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) 
    		$this->constructView ( 'ViewTraject', 'printCreationForm', array () );
    	else{	
    		if (isset ( $_POST ['date'] ) && isset ( $_POST ['departureHour'] ) 
					&& isset( $_POST['departureCity']) && isset ( $_POST ['departureAddress'] )
					&& isset ( $_POST ['arrivalCity'] ) && isset ( $_POST ['arrivalAddress'] )
					&& isset ( $_POST ['nbPassenger'] ) && isset ( $_POST ['nbReservation'] )
					&& isset ( $_POST ['smoke'] ) && isset ( $_POST ['animals'] )
    				&& isset ( $_POST ['talk'] ) && isset ( $_POST ['music'] )
					&& isset( $_POST['suitcase'] )&& isset( $_POST['price'])
					) {
						$this->constructView("ViewTraject", "createTraject", array());
    		}
    		else 
    			$this->constructView("ViewTraject", "createTraject", array());
    	}
    }

}



?>
