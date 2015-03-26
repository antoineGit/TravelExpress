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
    	
    }


}



?>
