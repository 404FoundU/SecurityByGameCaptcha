<?php
require("../class/clsSes.php");
require_once($_SERVER['DOCUMENT_ROOT']."/tetris-project/class/clsUser.php");
include("../class/fncSeveral.php");
require_once("../class/clsLog.php");
require_once("../class/confRut.php");
$log=new clsLog("../logs/log.mst");
include("../includes/headboard.php");
include("../includes/foot.php");
@$session_secret = $objSes->fSecret(null);
@$session_tr = $objSes->fTetris_right(null);

	if(@$_POST['sub']=="Register"){
		$objUsu=new clsBd2();

		@$name = CleanVariable($_POST['name']);
		@$last_name = CleanVariable($_POST['last_name']);
		@$user = CleanVariable($_POST['user']);
		@$password = CleanVariable($_POST['password']);
		@$a = $b = 1;
		@$tetris_right = CleanVariable($_POST['tetris_right']);
		@$validate = $_POST['validate'];
		@$option = CleanVariable($_POST['option']);
		
                if(!empty($tetris_right))
                {
                    switch(CheckTetrisOriginKey($tetris_right,$validate,$option,$a,$b,$session_secret,$session_tr))
                    {
                        case 1:
                                if(!empty($name) && !empty($last_name) && !empty($user) && !empty($password))
                                {
                        
                                    if($objUsu->fNew($name,$last_name,$user,$password)==1){
                                        echo "<div class='alert alert-success fade in m-b-15'>
                                            <strong>Success!</strong>
                                            Registration Successful User. Please note the User and Password Generation
                                            <span class='close' data-dismiss='alert'>&times;</span>
                                            </div>";
                                        redir("../");
                                    }else{
                                            echo "<div class='alert alert-danger'>User Registration operation has failed</div>";
                                    }
                                    exit();
                                }else{
                                    echo "<div class='alert alert-warning fade in m-b-15'>
                                        <strong>Warning!</strong>
                                        The form has empty fields.
                                        <span class='close' data-dismiss='alert'>&times;</span>
                                    </div>";
                                    redir("../register.php");
                                }
                                break;
                        case 2:
                            echo "<div class='alert alert-warning fade in m-b-15'>
                                    <strong>Warning!</strong>
                                    Altering values Captcha Tetris.
                                    <span class='close' data-dismiss='alert'>&times;</span>
                                </div>";
                            $log->fWriteLog("Altering values Captcha Tetris");
                            redir("../register.php");
                            break;            
                        case 0:
                            echo "<div class='alert alert-warning fade in m-b-15'>
                                    <strong>Warning!</strong>
                                    Will attempt to navigate if authorization.
                                    <span class='close' data-dismiss='alert'>&times;</span>
                                </div>";
                            $log->fWriteLog("Will attempt to navigate if authorization");
                            redir("../register.php");
                            break;    
                    }
                }else{
                    echo "<div class='alert alert-danger fade in m-b-15'>
                            <strong>Error!</strong>
                            The form has empty fields Or  not selected the captcha.
                            <span class='close' data-dismiss='alert'>&times;</span>
                        </div>";
                    redir("../register.php");
                    }
                
	}
	
	
	
?>
