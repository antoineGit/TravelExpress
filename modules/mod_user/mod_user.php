<?php
class Moduleuser extends ModuleGeneric{
  public function __construct(){
    $module = "user";
    $action = "voir";
    if(isset($_GET['action']))
      $action = $_GET['action'];

    switch($action){
        case 'voir':
            require_once ("modules/mod_$module/controler_$module/c_user.php");
            $this->controler = new ControlerUser();
            $this->controler->printUserInfo();
        break;
        case 'addCar':
        	require_once ("modules/mod_$module/controler_$module/c_user.php");
        	$this->controler = new ControlerUser();
        	$this->controler->addCar();
        	break;
        case 'delCar':
        	require_once ("modules/mod_$module/controler_$module/c_user.php");
        	$this->controler = new ControlerUser();
        	$this->controler->delCar();
        	break;
    }
  }



}





?>
