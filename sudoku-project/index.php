<?php		
		include("class/confRut.php");
		include("class/clsLog.php");
		$log=new clsLog($Rlog);
		$log->fWriteLog("the system request");
		include($headboard);
		include($center);
		include($foot);		
?>
