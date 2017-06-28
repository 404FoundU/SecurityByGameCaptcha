f<?php
require("../class/clsSes.php");
include("../class/fncSeveral.php");
require_once("../class/clsLog.php");
require_once("../class/confRut.php");
$log=new clsLog("../logs/log.mst");
$log->fWriteLog("It closed its session correctly ".$objSes->fUser());
$objSes->fGetOut();
include("../includes/headboard.php");
?>

<div class='alert alert-success fade in m-b-15'>
	<strong>Success!</strong>
	Closed Session.
	<span class='close' data-dismiss='alert'>&times;</span>
</div>

<?php
include("../includes/foot.php");
redir("../");
?>
