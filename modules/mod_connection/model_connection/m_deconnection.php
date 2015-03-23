<?php
class ModelDeconnection extends DBMapper{
	public static function deconnection(){
		$sessionDestroy=session_destroy();
		return $sessionDestroy;
	}
}
?>
