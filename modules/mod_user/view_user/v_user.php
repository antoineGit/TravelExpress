<?php 

class ViewUser{
	
	public static function printUserInfos($infos){
		
		?> <pre> <?php print_r($infos); ?> </pre> <?
		echo '
		<fieldset>
							<legend>Your Profile :</legend>
				
							<label>Nom</label>
							<div>
             				   -------- '.$infos[0]['civility'].' '.$infos[0]['name'].'
							</div>
				
							<label>Prenom</label>
							<div>
            				    -------- '.$infos[0]['surname'].'
							</div>
				
							<label>Date de naissance</label>
							<div>
								-------- '.$infos[0]['birthDate'].'
							</div>
				
							<label>Pays</label>
							<div>
            				   -------- '.$infos[0]['country'].'
							</div>
							
							<label>Ville</label>
							<div>
            				   -------- '.$infos[0]['city'].'
							</div>
							
							<label>Numéro de téléphone</label>
							<div>
            				    -------- '.$infos[0]['cellNumber'].'
							</div>
				
							<label>e-mail</label>
							<div class=>
              					-------- '.$infos[0]['mail'].'
							</div>
				
							<label>Pseudo</label>
							<div>
             				  -------- '.$infos[0]['nickname'].'
							</div>
									
							<label>A ete passager : </label>
							<div>
             				  -------- '.$infos[0]['nbPathPassenger'].' fois.
							</div>
				
							
				';
								if($infos[0]['name']=0)
									echo 	'<label>Etes-vous un conducteur ?</label>
									<div>
								--------No ...
									</div>';
							
								else
									echo '
							<label>A ete conducteur : </label>
							<div>
             				  -------- '.$infos[0]['nbPathDriver'].' fois.
							</div>
						</fieldset>
						<fieldset>
							<legend>Permis de conduire</legend>
					
							<label>Pays d\'obtention</label>
							<div>
              					 -------- '.$infos[0]['licenseCountry'].'
							</div>
				
							<label>Date d\'obtention</label>
							<div>
              					 -------- '.$infos[0]['licenseDate'].'
							</div>
				
						</fieldset>
						<fieldset>
							<legend>Voiture</legend>
							
							<label>Marque</label>
							<div>
              					 -------- '.$infos[1]['brand'].'
							</div>
				
							<label>Modele</label>
							<div>
              					 -------- '.$infos[1]['model'].'
							</div>
					
							<label>Année</label>
							<div>
								 -------- '.$infos[1]['purchaseDate'].'
							</div>
									
							<label>Couleur</label>
							<div>
              					 -------- '.$infos[1]['color'].'
							</div>
									
							<label>Etat</label>
							<div>
              					 -------- '.$infos[1]['state'].'
							</div>
							' ;
								
		echo "</fieldset>";
		
	}
	
	
}



?>