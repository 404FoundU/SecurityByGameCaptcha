<?php
		/*====> BEGIN DIR GENERICAS <====*/

		$root="http://localhost/color-sudoku-project/";
		$subroot=$_SERVER['DOCUMENT_ROOT']."/color-sudoku-project/";
		$headboard=$subroot."includes/headboard.php";
                $foot=$subroot."includes/foot.php";
		$Rlog=$subroot."logs/log.mst";
		$icono=$root."assets/img/";
		$imagen=$root."img/";

        /*====> END BEGIN DIR GENERICAS <====*/

        $title="Sudoku/Rubik Project";	
		
		/*====> APP <====*/
		$bar="includes/bar.php";
		$center="includes/center.php";
		$menu="includes/menu.php";


        /*====> BEGIN BASE CSS STYLE <====*/

		//$css[0]="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700";
	    $css[0]=$root."assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css";
	    $css[1]=$root."assets/plugins/bootstrap-3.1.1/css/bootstrap.min.css";
	    $css[2]="assets/assets/plugins/font-awesome-4.1.0/css/font-awesome.min.css";
	    $css[3]=$root."assets/css/animate.min.css";
	    $css[4]=$root."assets/css/style.min.css";
	    $css[5]=$root."assets/css/style-responsive.min.css";
        $css[6]=$root."assets/css/login.css";
   
        /*====> BEGIN BASE JS <====*/

        $js[0]=$root."assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js";
        $js[1]=$root."assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js";
        $js[2]=$root."assets/plugins/bootstrap-3.1.1/js/bootstrap.min.js";
        $js[3]=$root."assets/crossbrowserjs/html5shiv.js";
        $js[4]=$root."assets/crossbrowserjs/respond.min.js";
        $js[5]=$root."assets/crossbrowserjs/excanvas.min.js";
        $js[6]=$root."assets/plugins/slimscroll/jquery.slimscroll.min.js";
        $js[7]=$root."assets/js/apps.min.js";
        $js[8]=$root."assets/js/ajax.js";
?>
