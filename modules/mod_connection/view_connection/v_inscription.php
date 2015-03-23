<?php

class ViewInscription {
	public static function printInscriptionForm() {
		echo ('
				<div>
					<form method=post action="index.php?module=connection&action=inscription">
						<fieldset>
							<legend>Inscription</legend>
				
							<label>Civilité</label>
							<div>
								<input type= "radio" name="civility" value="mlle" onclick="driverInscription()">Mlle
								<input type= "radio" name="civility" value="mr" onclick="driverInscription()">Mme
								<input type= "radio" name="civility" value="mr" onclick="driverInscription()">Mr
							<div>
				
							<label>Nom</label>
							<div>
             				   <input name="name" type="text" placeholder="Nom" required >
							</div>
				
							<label>Prenom</label>
							<div>
            				    <input name="surname" type="text" placeholder="Prenom" required >
							</div>
				
							<label>Date de naissance</label>
							<div>
								<input name="birth" type="date" placeholder="jj/mm/aaaa" required >
							</div>
				
							<label>Pays</label>
							<div>
            				    <input name="country" type="text" placeholder="France" required >
							</div>
							
							<label>Ville</label>
							<div>
            				    <input name="city" type="text" placeholder="Paris" required >
							</div>
							
							<label>Numéro de téléphone</label>
							<div>
            				    <input name="cellphone" type="number" placeholder="06 05 04 03 02" required >
							</div>
				
							<label>e-mail</label>
							<div class=>
              					<input name="email" type="email" placeholder="paul.tremblay@serveur.com" required >
							</div>
				
							<label>Pseudo</label>
							<div>
             				   <input name="pseudo" type="text" placeholder="Pseudo" required >
							</div>
				
							<label>Mot de passe</label>
							<div>
               					<input name="password" type="password" placeholder="Password" required >
							</div>
				
							<label>Etes-vous un conducteur ?</label>
							<div>
								<input type= "radio" name="driver" value="yes" required onclick="driverInscription()" id="isDriver">Oui
								<input type= "radio" name="driver" value="no" required onclick="driverInscription()"  >Non
							
							</div>
					<div id = "driver" style="display=none;">
						<fieldset>
							<legend>Permis de conduire</legend>
					
							<label>Pays d\'obtention</label>
							<div>
              					<input id="driverRequired" name="countryLicense" type="text" placeholder="France" required="false"  >
							</div>
				
							<label>Date d\'obtention</label>
							<div>
              					<input id="driverRequired" name="dateLicense" type="date" placeholder="jj/mm/aaaa"  required="false" >
							</div>
				
						</fieldset>
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
					</div>
				
							<div>
							
								<a  href="index.php?module=connection&action=connection">
									<input type="button" value="Se connecter">
								</a>
								<input type="submit" value="S\'inscrire !">
							</div>
						</fieldset>
					</form>
				</div>
				');
	}
	
	public static function printInscriptionSuccess () {
		$log = $_POST['pseudo'];
		echo("Inscription de $log reussie. <br>");
	}
	public static function printInscriptionFailed() {
		echo("Inscription echouee. <br>");
	}
	 public static function printNicknameExist () {
	 	echo("Sorry but this nickname already exist ... Try again <br>");
	 	ViewInscription::printInscriptionForm();
	 }
	
}
?>