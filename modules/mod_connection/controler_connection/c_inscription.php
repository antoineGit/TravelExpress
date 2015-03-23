<?php
$module = "connection";
require_once ("./modules/mod_$module/view_$module/v_inscription.php");
require_once ("./modules/mod_$module/model_$module/m_inscription.php");
class ControlerInscription extends ControlerGeneric {
	public function signUp() {
		// if not already connect
		if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
			// if form correctly filled
			if (isset ( $_POST ['civility'] ) && isset ( $_POST ['name'] ) 
					&& isset( $_POST['surname']) && isset ( $_POST ['birth'] )
					&& isset ( $_POST ['country'] ) && isset ( $_POST ['city'] )
					&& isset ( $_POST ['cellphone'] ) && isset ( $_POST ['email'] )
					&& isset ( $_POST ['pseudo'] ) && isset ( $_POST ['password'] )
					&& isset( $_POST['driver'])
					) {
				$civility = $_POST['civility'];
				$name = $_POST ['name'];
				$surname = $_POST ['surname'];
				$birth = $_POST ['birth'];
				$country = $_POST ['country'];
				$city = $_POST ['city'];
				$cellphone = $_POST['cellphone'];
				$email = $_POST ['email'];
				$pseudo = $_POST ['pseudo'];
				$mdp = $_POST ['password'];
				
				$pseudoExist = ModelInscription::userExistInDataBase ( $pseudo );
				
				$isDriver = $_POST['driver'];
				
				// Si le pseudo demand� n'exist pas d�j�
				if (!$pseudoExist) {
					if($isDriver=='yes' && isset ( $_POST ['countryLicense'] ) && isset ( $_POST ['dateLicense'] )
							&& isset ( $_POST ['brand'] ) && isset ( $_POST ['model'] )
							&& isset ( $_POST ['carAge'] ) && isset ( $_POST ['color'] )
							&& isset ( $_POST ['state'] )
							){
					$licenseCountry = $_POST ['countryLicense'];
					$licenseDate = $_POST ['dateLicense'];
					$brand = $_POST ['brand'];
					$model = $_POST ['model'];
					$carAge = $_POST ['carAge'];
					$color = $_POST ['color'];
					$state = $_POST ['state'];
					
					$inscriptionSuccess = ModelInscription::addUserDriver($civility, $name,
							$surname, $birth, 
							$country, $city, 
							$cellphone, $email, 
							$pseudo, $mdp, 
							$licenseCountry, $licenseDate,
							$brand,$model,
							$carAge, $color, 
							$state);
					}else{
						$inscriptionSuccess = ModelInscription::addUser ( $civility, $name, 
								$surname,$birth,
								$country, $city, 
								$cellphone, $email,  
								$pseudo, $mdp, $isDriver
								);
					}if ($inscriptionSuccess) 
						$this->constructView ( 'ViewInscription', 'printInscriptionSuccess', array () );
					else
						$this->constructView ( 'ViewInscription', 'printInscriptionFailed', array () );
				} else 
					$this->constructView ( 'ViewInscription', 'printNicknameExist', array () );
			}
		} 
		else 
			echo ("We are sorry, you can't sign in, you're already connect. <br>");
	}
	public function printInscriptionForm() {
		// if we're not already connect
		if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
			$this->constructView ( 'ViewInscription', 'printInscriptionForm', array () );
			$this->signUp ();
		}
	}
}
?>
