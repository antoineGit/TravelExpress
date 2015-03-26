
<?php
class ViewConnection {
	public static function printConnectionForm() {
		echo ('	<div>
					<form method=post action="index.php?action=connection">
						<fieldset>
							<legend>Connexion</legend>
							<label>Identifiant</label>
							<div>
                				<input name="pseudo" type="text" placeholder="Identifiant" required>
               				</div>
							<label>Password</label>
							<div>
               					 <input name="password" type="password" placeholder="Password" required >
               				</div>		
							<div class="row">
								<a href="index.php?module=connection&action=inscription">
									<input type="button" value="S\'inscrire">
								</a>
							<input type="submit" value="Connexion ! ">
							</div>
						</fieldset>
					</form>
				</div>
				');
	}
	public static function printConnectionError() {
		ViewConnection::printConnectionForm();
		echo ('
					<div class="span3 notice marker-on-left bg-crimson fg-white">
						Connexion echouee, mauvais login et/ou mot de passe			
						</div>
				
				');
	}
	
	public static function printConnectionSuccess(){
		echo 'Welcome to you my friend <a href="index.php?module=user">View your Profile</a>';
	}
}

?>
