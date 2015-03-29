<?php
/*
 * AAAAARCHI UTILE POUR AFFICHER UN TABLEAU EN DEUX DEUX ?> <pre> <?php print_r($tab); ?> </pre> <?php
 */

session_start ();

include_once "./dbmapper.php";
include_once './debug.php';
include_once './params_connection.php';
require_once ("./include_generic.php");

$connection = new PDO ( $dns, $user, $password );
DBMapper::init ( $connection );

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="ASCII">
<meta name="product" content="PRODUCT">
<meta name="description" content="Simple responsive css framework">
<meta name="author" content="Antoine AUER, Paris, France">

<link href="css/my-css.css" rel="stylesheet">
<link href="css/metro-bootstrap.css" rel="stylesheet">
<link href="css/metro-bootstrap-responsive.css" rel="stylesheet">

<title>PROJECT</title>
</head>
<script type="text/javascript">
function driverInscription(){
	if((document.getElementById("isDriver").checked)){
		document.getElementById("driver").style.display = "inline";
		document.getElementById("driverRequired").setAttribute("required", "true");
	}else {
		document.getElementById("driver").style.display = "none";
		document.getElementById("driverRequired").removeAttribute('required');	
	}
}
</script>
<body>

	<div>
		<div> 
			<div>
				<h1 >TRAVEL EXPRESS</h1>
			</div>

			<div>
				<div>
					<nav>
							<div style="display:inline-block;margin-right:20px;">
								<a href="index.php">home</a>
							</div>
							
							<?php
							if (isset ( $_SESSION ['id_user'] )) {
								echo '
 								<div style="display:inline-block;margin-right:20px;">
									<a href="index.php?module=user"> Profile</a>
								</div>
 								<div style="display:inline-block;margin-right:20px;">
									<a href="index.php?module=traject"> Trajets</a>
								</div>';
								
								if(isset($_SESSION['is_a_driver']) && ($_SESSION['is_a_driver'])==1){
									echo '<div style="display:inline-block;margin-right:20px;">
								<a href="index.php?module=traject&action=create"> Creer un trajet
 		</a>
								</div>';
								}
								
								/*if ($_SESSION ['estAdmin']) {
									echo ('
											<span class="element-divider"></span>
											<div class="element bg-orange">
											<a class="element-menu fg-white" href=" ' . htmlspecialchars ( "index.php?module=admin" ) . '">
											ADMIN
											</a>
											</div>
										');
								}*/
								// Affichage du bouton de d�connexion uniquement si l'utilisateur est d�j� connect�
								echo ('
										<div style="display:inline-block;margin-right:20px;">
										<a href=" ' . htmlspecialchars ( "index.php?module=connection&action=deconnection" ) . '">
										 Log Out
										</a>
										</div>
									');
							}
							
							?>
							
					</nav>
				</div>
			</div>
			<div class="row">
<?php
if (! isset ( $_SESSION ['id_user'] ) || empty ( $_SESSION ['id_user'] )) {
	require_once ("./modules/mod_connection/mod_connection.php");
	$moduleConnection = new Moduleconnection ();
	$moduleConnection->display ();
} else {
	if (isset ( $_GET ['module'] ))
		$module = $_GET ['module'];
	else if(!isset ( $_GET ['module'] ) && !isset($_SESSION['id_user']))
		$module = 'connection';
	else 
		$module = 'user';
	
		// Permet d'inclure un module au choix
	if (isset ( $module )) {
		require_once ("./modules/mod_$module/mod_$module.php");
		$classModule = "Module$module";
		$moduleObject = new $classModule ();
		$moduleObject->display ();
	}
}
/* Permet de detruire la session
if (isset ( $_GET ['compte'] ) && $_GET ['compte'] == "destroy") {
	if (session_destroy ())
		echo ("<br>Session detruite<br>");
}*/


?>

			</div>
		</div>
	</div>
</body>
</html>