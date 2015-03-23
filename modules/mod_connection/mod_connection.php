
<?php
class Moduleconnection extends ModuleGeneric {
	public function __construct() {
		$module = "connection";
		if (isset ( $_GET ['action'] ))
			$action = $_GET ['action'];
		else
			$action = null;
			
		switch ($action) {
			case 'connection' :
				require_once ("modules/mod_$module/controler_$module/c_connection.php");
				$this->controler = new ControlerConnection ();
				$this->controler->connect ();
				break;
			case 'inscription' :
				require_once ("modules/mod_$module/controler_$module/c_inscription.php");
				$this->controler = new ControlerInscription ();
				$this->controler->printInscriptionForm();
				break;
			case 'deconnection' :
				require_once ("modules/mod_$module/controler_$module/c_deconnection.php");
				$this->controler = new ControlerDeconnection();
				$this->controler->deconnect ();
				break;
			case 'printlogOut' :
				require_once ("modules/mod_$module/controler_$module/c_deconnection.php");
				$this->controler = new ControlerLogOut ();
				$this->controler->printModuleLogOut();
				break;
			default :
				require_once ("modules/mod_$module/controler_$module/c_connection.php");
				$this->controler = new ControlerConnection ();
				$this->controler->connect ();
				break;
		}
	}
// 	public function printlogOut() {
// 		if ($this->estConnecte ()) {
// 			$this->controler->printModulelogOut ();
// 		}
// 	}
// 	public function printModuleconnectionInscription() {
// 		if (! $this->estConnecte ())
// 			$this->controler->printModuleconnectionInscription ();
// 	}
// 	public function estConnecte() {
// 		if (isset ( $_SESSION ['id_user'] ) && ! empty ( $_SESSION ['id_user'] ))
// 			return true;
// 		else
// 			return false;
// // 		return $this->controler->estConnecte ();
// 	}
}

?>
