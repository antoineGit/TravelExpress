<?php 

class ViewTraject{
	
	public static function trajectHome($infos){
		
		?> <pre> <?php print_r($infos); ?> </pre> <?
		echo '
		<fieldset>
							<legend>Trajects : </legend>
				
						
						<fieldset>
							<legend>Date</legend>
					
							<label>Pays d\'obtention</label>
							<div>
              					 -------- '.$infos[0]['date'].'
							</div>
				
							<label>Ville de départ</label>
							<div>
              					 -------- '.$infos[0]['departureCity'].'
							</div>
									
							<label>Ville d\'arrivée</label>
							<div>
              					 -------- '.$infos[0]['arrivalCity'].'
							</div>
				
						</fieldset>
									
		</fieldset>
									
									';
						
		
	}
	
	
}



?>