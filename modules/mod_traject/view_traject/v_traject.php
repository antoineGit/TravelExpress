<?php 

class ViewTraject{
	
	public static function createTraject(){
		
		echo '
		<form method=post action="index.php?module=traject&action=create">
						<fieldset>
							<legend>Inscription</legend>
				
							
							
				
							<label>Car</label>
							<div>
             				   <input name="idCar" type="text" placeholder="Nom" required >
							</div>
				
							<label>Date de départ</label>
							<div>
            				    <input name="date" type="text" placeholder="Paris" required >
							</div>
				
							<label>Heure de départ</label>
							<div>
								<input name="departureHour" type="time" placeholder="11:30" required >
							</div>
				
							<label>Ville de départ</label>
							<div>
            				    <input name="departureCity" type="number" placeholder="06 05 04 03 02" required >
							</div>
				
							<label>Adresse de départ</label>
							<div class=>
              					<input name="departureAddress" type="email" placeholder="paul.tremblay@serveur.com" required >
							</div>
		
							<label>Ville d\'arrivée</label>
							<div>
            				    <input name="arrivalCity" type="text" placeholder="France" required >
							</div>
							
							<label>Adresse d\'arrivée</label>
							<div>
            				    <input name="arrivalAddress" type="text" placeholder="Paris" required >
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
								<input type= "radio" name="smoke" value="yes" required>Oui
								<input type= "radio" name="smoke" value="no" required >Non
							
							</div>
							<label>ok pour animaux ?</label>
							<div>
								<input type= "radio" name="animals" value="yes" required>Oui
								<input type= "radio" name="animals" value="no" required >Non
								<input type= "radio" name="animals" value="yes but in cage" required >In cage
							
							</div>
		
							<label>Discuter ?</label>
							<div>
								<input type= "radio" name="talk" value="yes" required>Oui
								<input type= "radio" name="talk" value="no" required >Non
							
							</div>
		
							<label>Musique ?</label>
							<div>
								<input type= "radio" name="music" value="yes" required>Oui
								<input type= "radio" name="music" value="no" required >Non
							
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
	
	
}



?>