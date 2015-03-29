<?php 

class ViewUser{
	
	public static function printUserInfos($infosUser, $infosCar){
		
	
		echo '
		<fieldset>
							<legend>Your Profile :</legend>
				
							<label>Nom</label>
							<div>
             				   -------- '.$infosUser[0]['civility'].' '.$infosUser[0]['name'].'
							</div>
				
							<label>Prenom</label>
							<div>
            				    -------- '.$infosUser[0]['surname'].'
							</div>
				
							<label>Date de naissance</label>
							<div>
								-------- '.$infosUser[0]['birthDate'].'
							</div>
				
							<label>Pays</label>
							<div>
            				   -------- '.$infosUser[0]['country'].'
							</div>
							
							<label>Ville</label>
							<div>
            				   -------- '.$infosUser[0]['city'].'
							</div>
							
							<label>Numéro de téléphone</label>
							<div>
            				    -------- '.$infosUser[0]['cellNumber'].'
							</div>
				
							<label>e-mail</label>
							<div class=>
              					-------- '.$infosUser[0]['mail'].'
							</div>
				
							<label>Pseudo</label>
							<div>
             				  -------- '.$infosUser[0]['nickname'].'
							</div>
									
							<label>A ete passager : </label>
							<div>
             				  -------- '.$infosUser[0]['nbPathPassenger'].' fois.
							</div>
				
							
				';
								if($infosUser[0]['isDriver']==0  )
									echo 	'<label>Etes-vous un conducteur ?</label>
									<div>
								--------No ...
									</div>';
							
								else{
									echo '
							<label>A ete conducteur : </label>
							<div>
             				  -------- '.$infosUser[0]['nbPathDriver'].' fois.
							</div>
						</fieldset>
						<fieldset>
							<legend>Permis de conduire</legend>
					
							<label>Pays d\'obtention</label>
							<div>
              					 -------- '.$infosUser[0]['licenseCountry'].'
							</div>
				
							<label>Date d\'obtention</label>
							<div>
              					 -------- '.$infosUser[0]['licenseDate'].'
							</div>
				
						</fieldset>';
        for($i=0;$i<count($infosCar);$i++)	{	 		
        		echo'
						<fieldset>
							<legend>Voiture</legend>
							
							<label>Marque</label>
							<div>
              					 -------- '.$infosCar[$i]['brand'].'
							</div>
				
							<label>Modele</label>
							<div>
              					 -------- '.$infosCar[$i]['model'].'
							</div>
					
							<label>Année</label>
							<div>
								 -------- '.$infosCar[$i]['purchaseDate'].'
							</div>
									
							<label>Couleur</label>
							<div>
              					 -------- '.$infosCar[$i]['color'].'
							</div>
									
							<label>Etat</label>
							<div>
              					 -------- '.$infosCar[$i]['state'].'
							</div>
              					 		
              			
							' ;
        		if($_SESSION['is_a_driver'])
        			echo '
											<div>
              					 <a href="index.php?module=user&action=delCar&id='.$infosCar[$i]['idCar'].'"> <button>Supprimer cette voiture</button> </a>
									</div>
							</fieldset>				';
         }		
								if($_SESSION['is_a_driver'])
									echo '
											<div>
              					 <a href="index.php?module=user&action=addCar"> <button>Ajouter une voiture</button> </a>
									</div>
											';
       		
        }
	}
	
	public static function printFormCreateCar(){
		echo ('
				<form method=post action="index.php?module=user&action=addCar">
				<fieldset>
							<legend>Voiture</legend>
							
							<label>Marque</label>
							<div>
              					<input id="driverRequired" name="brand" type="text" placeholder="ford" required="false"  >
							</div>
				
							<label>Modele</label>
							<div>
              					<input id="driverRequired" name="model" type="text" placeholder="fiesta" required="false"  >
							</div>
					
							<label>Année</label>
							<div>
								<select id="driverRequired" name="carAge" size="1" required="false" >
        ');
		
		for($i=date("Y");$i>(date("Y")-60);$i-- ){
			echo "<option>$i";
		}
		
		echo ('
								</select>
							</div>
				
							<label>Couleur</label>
							<div>
              					<input id="driverRequired" name="color" type="text" placeholder="rouge" required="false"  >
							</div>
							
							<label>Etat</label>
							<div>
              					<input id="driverRequired" name="state" type="radio" value="new"  required="false" >Neuve
								<input id="driverRequired" name="state" type="radio" value="correct"  required="false" >Correcte
								<input id="driverRequired" name="state" type="radio" value="damaged" required="false"  >Endommagée
							</div>
						</fieldset>
				<div>
							
								<a  href="index.php?module=user">
									<input type="button" value="Annuler">
								</a>
								<input type="submit" value="Ajouter">
							</div>
					</form>
				');
	}
	
	public static function printSuccessCreateCar(){
		echo "nouvelle voiture ajoutée";
	}

	public static function printFailCreateCar(){
		echo "L'ajout de la voiture à rencontré un problème ...";
	}
	
	public static function printErrorDelete(){
		echo "Suppression de la voiture échouée ...";
	}
}



?>