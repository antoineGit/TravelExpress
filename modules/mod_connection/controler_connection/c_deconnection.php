<?php
$module = "connection";
require_once ("./modules/mod_$module/view_$module/v_deconnection.php");
require_once ("./modules/mod_$module/model_$module/m_deconnection.php");

class ControlerDeconnection extends ControlerGeneric{
	public function deconnect() {
		if (isset ( $_SESSION ['id_user'] )) {
			if (empty ( $_SESSION ['id_user'] )){
				echo "You should be connect to deconnect your account";
				$this->constructView('ViewDeconnection','deconnectionFailed',array());
			}else {
				$deconnectionSuccess = ModelDeconnection::deconnection ();
				if ($deconnectionSuccess){
					require_once ("./modules/mod_connection/view_connection/v_connection.php");
					$this->constructView("ViewConnection", "printConnectionForm", array());
				}else
					$this->constructView('ViewDeconnection','deconnectionFailed',array());

			}
		} 

		else {
			echo "You should be connect to deconnect your account";
			$this->constructView('ViewDeconnection','deconnectionFailed',array());
		}
	}
	public static  function printModuleDeconnection() {
		if (isset ( $_SESSION ['id_user'] )) {
			if (!empty ( $_SESSION ['id_user'] ))
					$this->constructView ( 'ViewDeconnection', 'printDeconnection', array () );
		}
	}
}

?>
