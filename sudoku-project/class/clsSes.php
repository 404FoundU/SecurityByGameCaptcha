<?php
session_start();
class sesion{
	var $conex;
	function __construct(){
		require_once("clsBd.php");
		$this->conex=new clsBd();
	}
	function fValidate($user,$password){
		$this->conex->fSelect("users","*","user='$user' AND password='$password' AND active=1");
		if ($this->conex->fQuantityRecords()==1){
			$datos=$this->conex->fArrayQuery();
			$_SESSION["id_user"]=$datos[0];
			if ($this->fCheckLogin()==0){
				$sesi=session_id();
				$this->conex->fUpdate("users","login=1, sesion='$sesi'","id_user=$datos[0]");
				$_SESSION["protected"]=1;
				return 1;
			}else{
				return 2;
			}
		}else{
			$_SESSION["protected"]=0;
			return 0;
		}
		
	}
	function fNew(){
		$this->conex->fSelect("users","new","id_user=".$this->fLoggedin());
		$value=$this->conex->fArrayQuery();		
		if($value[0]==0){
			return 0;
		}else{
			return 1;		
		}
		
	}
	
	function fLoggedin(){
		return $_SESSION["id_user"];
	}
	function fSesion(){
		return session_id();
	}
	function fProtected(){
		if (@$_SESSION["protected"]==0){
			echo "First you must Login";
			
			return 1;
		}else{
			return 0;
		}
	}
	function fUser(){
		$this->conex->fSelect("users","name, last_name","id_user=".$this->fLoggedin());
		$datos=$this->conex->fArrayQuery();
		$user=$datos[0]." ".$datos[1];
		return $user;
	}
   
		
	function fCheckLogin(){
		$this->conex->fSelect("users","login, sesion","id_user=".$this->fLoggedin());
		$datos=$this->conex->fArrayQuery();
		$logi=$datos[0];
		if ($logi==0){
			return 0;
		}else{
			return 1;
		}
	}
	
	function fCheck_sesionCurrent(){
		$this->conex->fSelect("users","sesion","id_user=".$this->fLoggedin());
		$datos=$this->conex->fArrayQuery();
		$logi=$datos[0];
		if ($logi==$this->fSesion()){
			return 0;
		}else{
			return 1;
		}
	}
	
	function fPasswordChange($password){
		$password=md5($password);
		$this->conex->fUpdate("users","password='$password',new=1","id_user=".$this->fLoggedin());
	}
	
	function fReturnPassword(){
		return $_SESSION["password"];
	}
	function fGetOut(){
		$this->conex->fUpdate("users","login=0, sesion=0","id_user=".$this->fLoggedin());
		$_SESSION["protected"]=0;
		$_SESSION["id_user"]=0;
		session_destroy();
	}
	
}
$objSes=new sesion();
?>
