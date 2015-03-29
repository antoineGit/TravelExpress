<?php
$module = "user";
require_once ("./modules/mod_$module/view_$module/v_$module.php");
require_once ("./modules/mod_$module/model_$module/m_$module.php");
class ControlerUser extends ControlerGeneric {
    function printUserInfo(){
        if (isset($_SESSION['id_user'])&&!empty($_SESSION['id_user'])){
        	$idUser = $_SESSION['id_user'];
        	
        	$userInfos = ModelUser::getUserInfo($idUser);
        	$carInfos = ModelUser::getCarInfo($idUser);
        	
        	$infos[0] = $userInfos;
        	if(isset($carInfos) && !empty($carInfos))
        		$infos[1] = $carInfos;
        	else 
        		$infos[1] = null;
        	
        	$this->constructView("ViewUser", "printUserInfos",$infos);
        }

    }
    function delCar(){
    	if($_GET['id']){
    		$success = ModelUser::delCar($_GET['id'], $_SESSION['id_user']);
    		if($success)
    			$this->printUserInfo();
    		else 
    			$this->constructView("ViewUser", "printErrorDelete", array());
    	}
    }
    
    function addCar(){
    	if($_SESSION['is_a_driver']==1 && ( isset ( $_SESSION ['id_user'] ) && !empty ( $_SESSION ['id_user']) )){
    		if( isset ( $_POST ['brand'] ) && isset ( $_POST ['model'] )
    				&& isset ( $_POST ['carAge'] ) && isset ( $_POST ['color'] )
    				&& isset ( $_POST ['state'] )
    		){
    			$idUser = $_SESSION['id_user'];
    			$brand = $_POST ['brand'];
    			$model = $_POST ['model'];
    			$carAge = $_POST ['carAge'];
    			$color = $_POST ['color'];
    			$state = $_POST ['state'];
    			echo "frff";
    			$createSuccess = ModelUser::createCar($idUser, $brand, $model, $carAge, $color, $state);
    			
    			if($createSuccess)
    				$this->constructView("ViewUser","printSuccessCreateCar",array());
    			else $this->constructView("ViewUser","printFailCreateCar",array());
    		}else 
    			$this->constructView("ViewUser","printFormCreateCar",array());
    	}else 
   			$this->constructView("ViewUser","printFailCreateCar",array());	
     }

}



?>
