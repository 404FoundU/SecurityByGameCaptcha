<?php 
function redir($url){
	print "<META HTTP-EQUIV=Refresh CONTENT=2;URL=$url>";
	}
function CleanVariable($var){
    $var = strip_tags($var);
    $var = mysql_real_escape_string($var);
    $var = addslashes($var);
    return $var;
}

function CheckTetrisOriginKey($tetris_right,$validate,$option,$user,$password,$session_secret,$session_tr)
{     
      //  if(!empty($list) || $list == 0 && strlen($list) <= 2){
                if (!empty($tetris_right) && !empty($validate) && empty($option))
                {
                    if ($user == 1)
                    {
                        if ($tetris_right == $session_tr && $validate == $session_secret)
                        {
                            return 1;
                        }else{
                            return 2;
                            }
                    }else{
                        if ($tetris_right == $session_tr && $validate == $session_secret && !empty($user) && !empty($password))
                        {
                            return 1;
                        }else{
                            return 2;
                            }
                    
                    }
                }elseif (!empty($tetris_right) && !empty($validate) && !empty($option))
                    {
                        return 0;
                    }else{
                        return 2;
                        }
      //  }
}
?>
