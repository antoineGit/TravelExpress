<?php
class Moduletraject extends ModuleGeneric{
  public function __construct(){
    $module = "traject";
    $action = "voir";
    if(isset($_GET['action']))
      $action = $_GET['action'];

    switch($action){
        case 'voir':
            require_once ("modules/mod_$module/controler_$module/c_$module.php");
            $this->controler = new ControlerTraject();
            $this->controler->printTrajectHome();
        break;
        case 'create':
        	require_once ("modules/mod_$module/controler_$module/c_$module.php");
        	$this->controler = new ControlerTraject();
        	$this->controler->printCreationForm();
        	break;
		case 'reserve':
        	require_once ("modules/mod_$module/controler_$module/c_$module.php");
       		$this->controler = new ControlerTraject();
       		if($_GET['id'])
       			$this->controler->reservation();
       		break;
		case 'reserver' : 
			require_once ("modules/mod_$module/controler_$module/c_$module.php");
			$this->controler = new ControlerTraject();
			$this->controler->getTrajectsReserved();
			break;
		case 'del':
			require_once ("modules/mod_$module/controler_$module/c_$module.php");
			$this->controler = new ControlerTraject();
			if($_GET['idT'])
				$this->controler->del();
			break;

    }
  }



}





?>
