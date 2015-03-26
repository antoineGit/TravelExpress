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

    }
  }



}





?>
