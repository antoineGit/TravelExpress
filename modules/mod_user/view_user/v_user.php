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
							
								else
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
				
						</fieldset>
						<fieldset>
							<legend>Voiture</legend>
							
							<label>Marque</label>
							<div>
              					 -------- '.$infosCar['brand'].'
							</div>
				
							<label>Modele</label>
							<div>
              					 -------- '.$infosCar['model'].'
							</div>
					
							<label>Année</label>
							<div>
								 -------- '.$infosCar['purchaseDate'].'
							</div>
									
							<label>Couleur</label>
							<div>
              					 -------- '.$infosCar['color'].'
							</div>
									
							<label>Etat</label>
							<div>
              					 -------- '.$infosCar['state'].'
							</div>
							' ;
								
		echo "</fieldset>";
		
	}
	
	
}



?>