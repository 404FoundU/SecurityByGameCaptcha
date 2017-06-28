<?php
require_once("clsLog.php");
class clsBd{
	private $sServer;
	private $sUser;
	private $sPassword;
	private $sDatabases;	
	private $iConnection;	
	private $vQuery;
	private $vField;
	private $route;
	private $log;
	 function __construct(){
		require("confBd.php");
		$this->sServer 	= $server;
		$this->sUser 	= $user;
		$this->sPassword = $password;
		$this->sDatabases = $database;
		$this->route=$_SERVER['DOCUMENT_ROOT']."/color-sudoku-project/logs/sql.mst";
		$this->log=new clsLog($this->route);
	}
	function fConnect(){
		$this->iConnection = mysql_connect($this->sServer,$this->sUser,$this->sPassword);
		if (mysql_error()){
			echo "The following error occurred:\n";
			echo  mysql_error();
			return;
		}
		mysql_select_db($this->sDatabases, $this->iConnection);
		}
	function fFinalize(){
		mysql_close($this->iConnection);
	}
	function fObjectQuery(){
		$this->vField = mysql_fetch_object($this->vQuery);
		return $this->vField;
	}
	function fArrayQuery(){
		$this->vField = mysql_fetch_array($this->vQuery);
		return $this->vField;
 	}
 	
 	function fAssociatedQuery(){
		$this->vCampo = mysql_fetch_assoc($this->vQuery);
		return $this->vCampo;
	} 
	function fSetFree(){
		mysql_free_result($this->vQuery);
	}
	function fQuantityRecords(){
		return mysql_num_rows($this->vQuery);
	}
	function fQuantityFields(){
		return mysql_num_fields($this->vQuery);
	}
	
	function fSelect($sTable, $sFields="*", $sWhere=NULL, $sOrder=NULL, $sInner=NULL){
		$this->fConnect();
		if (is_null($sFields)) $sFields = "*";					
		$sSelect = "SELECT $sFields FROM $sTable";
		if (!is_null($sWhere)) $sSelect .= " WHERE $sWhere";					
		if (!is_null($sInner)) $sSelect .= " $sInner";		
		if (!is_null($sOrder)) $sSelect .= " ORDER BY $sOrder";
		$this->vQuery = mysql_query($sSelect, $this->iConnection);
		if (mysql_error()){
			echo "The following error occurred:\n";
			echo  mysql_error();
			return;
		}
		$this->fFinalize();
		$this->log->fWriteLog("Requested the following query $sSelect");
		return $this->vQuery;
	}
	function fInsert($sTable, $vValues, $sFields=NULL){
		$this->fConnect();
		if ($sFields==NULL):
			$sInsert = "INSERT INTO {$sTable} VALUES({$vValues});";			
		else:
			$sInsert = "INSERT INTO {$sTable} ({$sFields}) VALUES ({$vValues});";
		endif;
		$this->vQuery = mysql_query($sInsert);
		if (mysql_error()){
			echo "The following error occurred:\n";
			echo  mysql_error();
			return;
		}
		$this->fFinalize();
		$this->log->fWriteLog("The following data is inserted $vValues in $sTable ");
		return $this->vQuery;
	}
	function fUpdate($sTable, $sFields, $sWhere=1){
		$this->fConnect();
		$sUpdate = "UPDATE $sTable SET $sFields WHERE $sWhere;";
		$id_result = mysql_query($sUpdate);
		if (mysql_error()){
			echo "The following error occurred:\n";
			echo  mysql_error();
			return;
		}
		$this->fFinalize();
		$this->log->fWriteLog("The following data is updated $sFields in $sTable under the following condition $sWhere");
		return $id_result;
	}
	function fDelete($sTable, $Fields, $sRegisters){
		$this->fConnect();
		$aChain  = explode('.', trim($sRegisters));
		$iCantidad = count($aChain)-1;
 		switch ($iCantidad):
			case 1:
				$sPiece = "= ".$aChain[0];
				break;
			default:
				$sPiece = implode(',',$aChain);
				$iTam   = strlen($sPiece)-1;
				$sPiece = "IN (".substr($sPiece,0,($iTam)).")";
				break;	
		endswitch;
		$sDelete = "DELETE FROM $sTable WHERE $Fields $sPiece;";
		$id_result = mysql_query($sDelete);
		$this->fFinalize();
		return $id_result;
	} 
	function fDelete2($sTable, $sRestri){
		$this->fConnect();
		$sDelete = "DELETE FROM $sTable WHERE $sRestri;";
	   $id_result = mysql_query($sDelete);
	   $this->fFinalize();
	   $this->log->fWriteLog("Registration was removed $sTable under the following condition $sRestri");
	   return $id_result;
	   
	}
	function fCreate($sTable,$sFields){
		$this->fConnect();
		$sCrear="CREATE TABLE $sTable($sFields)";
		$id_result = mysql_query($sCrear);
		$this->fFinalize();
		return $id_result;
	}
	
	function fModify($sTable,$Fields){
	$this->fConnect();
	$modif="ALTER TABLE $sTable ADD $Fields VARCHAR(3) NOT NULL";
	$id_result = mysql_query($modif);
	$this->fFinalize();
	return $id_result; 
	}
	
	function fExec($sql){
		$this->fConnect();
		$this->vQuery = mysql_query($sql);
		if (mysql_error()){
			echo "The following error occurred:\n";
			echo  mysql_error();
			return;
		}
		$this->fFinalize();
		$this->log->fWriteLog("a Special Judgment was executed $sql ");
		return $this->vQuery;
	}
	
}
?>
