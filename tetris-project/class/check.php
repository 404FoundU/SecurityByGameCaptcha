<?php
include("clsSes.php");
include("confRut.php");
include("fncSeveral.php");
require_once("clsLog.php");
$log=new clsLog($Rlog);
if ($objSes->fProtected()==1){
	$log->fWriteLog("Will attempt to navigate if authorization");
	echo "<img src='".$icono."pirate.png'/>";
	redir("../");
	exit();
}
if ($objSes->fCheck_sesionCurrent()==1){
	echo "<img src='".$icono."pirata.png'/>";
	$log->fWriteLog("Is I try to navigate without authorization by the user ".$objSes->fUser());
	redir("../");
	exit();
}
@$password=$_GET["cl"];
if($password!=NULL){
	if ($objSes->fValidate_Password($password)==1){
			echo "<img src='".$icono."pirata.png'/>";
			$log->fWriteLog("I will attempt to navigate the application with the key $password ");
			redir("../");
			exit();
	}else{
		$log->fWriteLog("The User:".$objSes->fUser()." agreed to the application of key $password ");
		$objSes->fReturnPassword($password);
		$nomApp=$_GET["nom"];
		$nombApp=str_replace("_"," ",$nomApp);
	}
}else{
	$log->fWriteLog("I will attempt to navigate the application if key parameter passing");
}
?>
