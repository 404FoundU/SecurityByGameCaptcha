<?php   
include_once($_SERVER['DOCUMENT_ROOT']."/sudoku-project/class/clsBd.php");
class ClsBd2 extends clsBd{
	function fNew($name,$last_name,$user,$password){
		$password=md5($password);
		if($this->fInsert("users","'$name','$last_name','$user','$password'","name,last_name,user,password")==0){
			return 0;
		}else{
			return 1;
		}
		
	}
}
