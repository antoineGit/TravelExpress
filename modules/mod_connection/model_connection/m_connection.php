<?php
	class ModelConnection extends DBMapper{
		public static  function testConnection($pseudo, $mdp){
			
			$req=self::$database->prepare("select idUser from amigo_User where nickname=? and pass=?");
			$params[0]=$pseudo;
			$params[1]=($mdp); //TODO HASHER LE MDP !
			$req->execute($params);
			while ($enregistrement = $req->fetch(PDO::FETCH_OBJ)) {
					
				$idConnection = $enregistrement->idUser ;
					
			}
			
			if(isset($idConnection) ){
				$isDriver = ModelConnection::testIsDriver($idConnection);
				$_SESSION['is_a_driver']=$isDriver['isDriver'];
				$_SESSION['login_user']=$pseudo;
				$_SESSION['id_user']=$idConnection;
				return $idConnection;
			}else
				return false;
			
		}
		/*public static function estAdmin ($idUser) {
			$req=self::$database->prepare ("SELECT * FROM `speak_admin` WHERE idUser=?");
			$req->execute(array($idUser));
			$estAdmin=$req->rowcount();
			if ($estAdmin==1)
				return true;
			else 
				return false;
		}	*/
		private static function testIsDriver($idUser){
			$req = self::$database->prepare("SELECT isDriver FROM amigo_User WHERE idUser=? ");
			$req->execute(array($idUser));
			$isDriver = $req->fetch(PDO::FETCH_ASSOC);
			
			return $isDriver;
		}
	
	
	}
?>