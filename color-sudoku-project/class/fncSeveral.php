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

function sudo_solve($sudo_origin, $sudo_mod)	{
		$n = 45 - array_sum(str_split($sudo_origin));
		$resolved = str_replace("0", $n, $sudo_origin);
		if ($sudo_mod == $resolved)	return 1;
		else return 2;
}

function CheckSudokuOriginKey($sudo_mod,$sudo_origin,$validate,$option,$user,$password,$session_secret,$session_s_origin)
{     
      //  if(!empty($list) || $list == 0 && strlen($list) <= 2){
                if (!empty($sudo_origin) && !empty($sudo_mod) && !empty($validate) && empty($option))
                {
                    if ($user == 1)
                    {
                        if (sudo_solve($sudo_origin,$sudo_mod) == 1 && $sudo_origin == $session_s_origin && $validate == $session_secret)
                        {
                            return 1;
                        }else{
                            return 2;
                            }
                    }else{
                        if (sudo_solve($sudo_origin,$sudo_mod) == 1 && $sudo_origin == $session_s_origin && $validate == $session_secret && !empty($user) && !empty($password))
                        {
                            return 1;
                        }else{
                            return 2;
                            }
                    
                    }
                }elseif (!empty($sudo_origin) && !empty($sudo_mod) && !empty($validate) && !empty($option))
                    {
                        return 0;
                    }else{
                        return 2;
                        }
      //  }
}
?>
