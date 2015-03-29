<?php 

class ViewTraject{
	
	public static function createTraject(){
		
		echo '
		<form method=post action="index.php?module=traject&action=create">
						<fieldset>
							<legend>Creer un trajet</legend>
				
							
							
				
							<label>Car</label>
							<div>
             				   <input name="car" type="text" placeholder="Nom" required >
							</div>
				
							<label>Date de départ</label>
							<div>
            				    <input name="date" type="date" placeholder="Paris" required >
							</div>
				
							<label>Heure de départ</label>
							<div>
								<input name="departureHour" type="time" placeholder="11:30" required >
							</div>
				
							<label>Ville de départ</label>
							<div>
            				    <input name="departureCity" type="text" placeholder="Paris" required >
							</div>
				
							<label>Adresse de départ</label>
							<div class=>
              					<input name="departureAddress" type="text" placeholder="4 rue des Champs-Elysées" required >
							</div>
		
							<label>Ville d\'arrivée</label>
							<div>
            				    <input name="arrivalCity" type="text" placeholder="Dijon" required >
							</div>
							
							<label>Adresse d\'arrivée</label>
							<div>
            				    <input name="arrivalAddress" type="text" placeholder="4 rue de Dijon" required >
							</div>
				
							<label>Nombre de passager</label>
							<div>
             				   <input name="nbPassenger" type="number"  required >
							</div>
				
							<label>Nombre de réservation</label>
							<div>
               					<input name="nbReservation" type="number"  required >
							</div>
				
							<label>ok pour fumer ?</label>
							<div>
								<input type= "radio" name="smoke" value="1" required>Oui
								<input type= "radio" name="smoke" value="0" required >Non
							
							</div>
							<label>ok pour animaux ?</label>
							<div>
								<input type= "radio" name="animals" value="yes" required>Oui
								<input type= "radio" name="animals" value="no" required >Non
								<input type= "radio" name="animals" value="yes but in cage" required >In cage
							
							</div>
		
							<label>Discuter ?</label>
							<div>
								<input type= "radio" name="talk" value="1" required>Oui
								<input type= "radio" name="talk" value="0" required >Non
							
							</div>
		
							<label>Musique ?</label>
							<div>
								<input type= "radio" name="music" value="1" required>Oui
								<input type= "radio" name="music" value="0" required >Non
							
							</div>	
							
							<label>Valise </label>
							<div>
								<input type= "radio" name="suitcase" value="big suitcase" required>Valises (voir avec chauffeur)
								<input type= "radio" name="suitcase" value="suitcase" required >Petite valise
								<input type= "radio" name="suitcase" value="bag" required >Sac à main
							</div>
							<label>Prix </label>
							<div>
								<input type= "number" name="price" required >
								
							
							</div>	
							<div>
								<input type="submit" value="Creer">
							</div>
						</fieldset>
					</form>
									
									';
						
		
	}
	
	public static function createTrajectSuccess(){
		echo "Votre trajet à été créé avec Succès. ";
	}
	
	public static function viewTrajectNormal($traject){
		echo ' 
				<fieldset>
							<legend>Trajet</legend>
				
							
							
				
							<label>Date de départ</label>
							<div>
            				   -----'.$traject['date'].'
							</div>
				
							<label>Heure de départ</label>
							<div>
								-----'.$traject['departureHour'].'
							</div>
				
							<label>Ville de départ</label>
							<div>
            				    -----'.$traject['departureCity'].'
							</div>
				
							<label>Adresse de départ</label>
							<div class=>
              					-----'.$traject['departureAddress'].'
							</div>
		
							<label>Ville d\'arrivée</label>
							<div>
            				    -----'.$traject['arrivalCity'].'
							</div>
							
							<label>Adresse d\'arrivée</label>
							<div>
            				    -----'.$traject['arrivalAddress'].'
							</div>
				
							<label>Nombre de passager</label>
							<div>
             				   -----'.$traject['nbPassenger'].'
							</div>
				
							<label>Nombre de réservation disponible</label>
							<div>
               					-----'.$traject['nbReservation'].'
							</div>
				
							<label>ok pour fumer ?</label>
							<div>
								-----'.$traject['smoking'].'
							</div>
							<label>ok pour animaux ?</label>
							<div>
								-----'.$traject['animals'].'
							</div>
		
							<label>Discuter ?</label>
							<div>
								-----'.$traject['talker'].'
							</div>
		
							<label>Musique ?</label>
							<div>
								-----'.$traject['music'].'
							</div>	
							
							<label>Valise </label>
							<div>
								-----'.$traject['luggage'].'
							</div>
							<label>Prix </label>
							<div>
								-----'.$traject['price'].'
								
							
							</div>	
							
						</fieldset>
				';
	}
	public static function reductTraject($traject){
		
		//TO-DO loop fo print traject
		for($i=0;$i<count($traject);$i++){
		echo '
				<a href="index.php?module=traject&action=voir&id='.$traject[$i]['idPath'].'">
			<fieldset>
							<legend>Trajet</legend>
				
							
							
				
							
							<label>Date de départ</label>
							<div>
            				    -----'.$traject[$i]['date'].'
							</div>
				
							<label>Heure de départ</label>
							<div>
								-----'.$traject[$i]['departureHour'].'
							</div>
				
							<label>Ville de départ</label>
							<div>
            				    -----'.$traject[$i]['departureCity'].'
							</div>
				
							
							<label>Ville d\'arrivée</label>
							<div>
            				   -----'.$traject[$i]['arrivalCity'].'
							</div>
							
							
							
							<label>Nombre de réservation</label>
							<div>
               					-----'.$traject[$i]['nbReservation'].'
							</div>
				
							<label>Valise </label>
							<div>
								-----'.$traject[$i]['luggage'].'
							</div>
							<label>Prix </label>
							<div>
								-----'.$traject[$i]['price'].'
							</div>	
						</fieldset>
										</a>
		';
		}
	}
	
	public static function printError(){
		echo "ERROR 404";
	}
	
}



?>