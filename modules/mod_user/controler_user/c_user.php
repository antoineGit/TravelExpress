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
        	$infos[1] = $carInfos;
        	?> <pre> <?php print_r($carInfos); ?> </pre> <?php
        	$this->constructView("ViewUser", "printUserInfos",$infos);
        }

    }


}



?>
