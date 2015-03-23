<?php
$module = "connection";
require_once ("./modules/mod_$module/view_$module/v_connection.php");
require_once ("./modules/mod_$module/model_$module/m_connection.php");
class ControlerConnection extends ControlerGeneric {
	public function connect() {
		if (isset ( $_POST ['pseudo'] ) && isset ( $_POST ['password'] )) {
			$idConnection = ModelConnection::testConnection ( $_POST ['pseudo'], $_POST ['password'] );
			//require_once ("./modules/mod_home/view_home/view_home.php");
			//$this->constructView("ViewHome", "afficherHome", array());
			if($idConnection!=false){
				$this->constructView ( 'ViewConnection', 'printConnectionSuccess', array () );
			}else {
				$this->constructView ( 'ViewConnection', 'printConnectionError', array () );
			}
		}
		
	/*	if (isset ( $idConnection ) && $idConnection != false) {
			$estAdmin = ModelConnection::estAdmin($idConnection);
			if ($estAdmin)
				$_SESSION['estAdmin'] = true;
			else 
				$_SESSION['estAdmin'] = false;
		} */
		else 
			if (! isset ( $idConnection ))
				// Normalement on peut jamais aller dans ce if
				$this->constructView ( 'ViewConnection', 'printConnectionForm', array () );
			
	}
}

?>
