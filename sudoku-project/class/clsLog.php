<?php
class clsLog{
	var $route;
	function __construct($route){
		$this->route=$route;
	}
	function fWriteLog($action){
		$e=fopen($this->route,"a");
		$date=date('l d/F/Y h:i:s A');
		$ip=$_SERVER['REMOTE_ADDR'];
		fwrite($e, $action." from the host ".$ip." ".$date."\n");
		fclose($e);
	}
}
?>
