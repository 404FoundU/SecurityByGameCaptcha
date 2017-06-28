<?php
require("../class/clsSes.php");
include("../class/fncSeveral.php");
require_once("../class/clsLog.php");
require_once("../class/confRut.php");
$log=new clsLog("../logs/log.mst");
include("../includes/headboard.php");
include("../includes/foot.php");
 echo "<div id='center'> ";

@$sudo_mod = $_POST['sudo_mod'];
@$sudo_origin = $_POST['sudo_origin'];
@$validate = $_POST['validate'];
@$option = $_POST['option'];
@$user=CleanVariable($_POST['user']);
@$password=CleanVariable($_POST['password']);
@$session_secret = $objSes->fSecret(null);
@$session_s_origin = $objSes->fSudoku_Origin(null);
if($_POST['sub'] == "Login"){

    if(!empty($user) && !empty($password))
    {
        switch(CheckSudokuOriginKey($sudo_mod,$sudo_origin,$validate,$option,$user,$password,$session_secret,$session_s_origin))
        {
            case 1:
                    if(!empty($user)  or !empty($password))
                    {
                        switch ($objSes->fValidate($user,md5($password)))
                        {
                            case 1:
                                
                                $log->fWriteLog("I was logging system ".$objSes->fUser());
                                redir("../app/");
                                break;
                            case 2:
                                echo "<div class='alert alert-info fade in m-b-15'>
                                        <strong>Info!</strong>
                                        You have already logged.<br/><br/>
                                        <a href='getout.php'><b>
                                        Click Here To Close Your session Previous</b></a>
                                        <span class='close' data-dismiss='alert'>&times;</span>
                                    </div>";
                                $log->fWriteLog("I was logging into the system and found an open session".$objSes->fUser());
                                break;
                            default:
                                echo "<div class='alert alert-danger fade in m-b-15'>
                                        <strong>Error!</strong>
                                        Username or Password are incorrect.
                                        <span class='close' data-dismiss='alert'>&times;</span>
                                    </div>";
                                $log->fWriteLog("logging failed attempt to $user y $password");
                                redir("../");
                                break;
                        }
                        
                    }else{
                        echo "<div class='alert alert-warning fade in m-b-15'>
                                <strong>Warning!</strong>
                                No information to process.
                                <span class='close' data-dismiss='alert'>&times;</span>
                            </div>";
                        redir("../");
                    }
                    break;
            case 2:
                echo "<div class='alert alert-warning fade in m-b-15'>
                        <strong>Warning!</strong>
                        Altering values Captcha Sudoku/Rubik Or Did not solve it correctly.
                        <span class='close' data-dismiss='alert'>&times;</span>
                    </div>";
                $log->fWriteLog("Altering values Captcha Sudoku/Rubik");
                //redir("../");
                break;            
            case 0:
                echo "<div class='alert alert-warning fade in m-b-15'>
                        <strong>Warning!</strong>
                        Will attempt to navigate if authorization.
                        <span class='close' data-dismiss='alert'>&times;</span>
                    </div>";
                $log->fWriteLog("Will attempt to navigate if authorization");
                redir("../");
                break;    
        }
    }else{
        echo "<div class='alert alert-danger fade in m-b-15'>
                <strong>Error!</strong>
                Username/Password they are empty Or  not selected the captcha.
                <span class='close' data-dismiss='alert'>&times;</span>
            </div>";
        redir("../");
        }
}
?>


