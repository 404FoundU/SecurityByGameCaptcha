<?php		
include("class/confRut.php");
include("class/clsLog.php");
include("class/clsSes.php");
$log=new clsLog($Rlog);
$log->fWriteLog("the system request");
$secret = $objSes->fSecret($objSes->fKeyRandom());

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo $title;?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />   
	<link rel="shortcut icon" href="<?php echo $root; ?>assets/img/rubik.ico">
<?php
	 foreach ($css as $value)
		echo "<link rel='stylesheet' type='text/css' href='".$value."'/>";
	

	if(isset($functions)==1){
		echo $jscript;
	}
	if(isset($estilos)==1){
		echo $files;
	}

        
?>
<script type="text/javascript">
function showContent() {
        element = document.getElementById("captcha");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
}

	var sudo_palette = ['white', 'red', 'blue', 'green', 'yellow', 'aqua', 'lime', 'pink', 'darkorange', 'magenta'];
	function sudo_tag(id)	{return document.getElementById(id);}
	function sudo_place_event(element, event, f)	{
		if (document.addEventListener)
			element.addEventListener(event, f, true);
		else
			if (document.attachEvent)
				element.attachEvent("on" + event, f);
			else
				element["on" + event] = f;
	}

	function sudo_resetme()	{
		sudoku = sudo_tag("intro_sudoku_repe").value;
		sudo_tag("intro_sudoku").value = sudoku;
		for (i = 0; i < 9; i++)	{
			x = parseInt(i / 3);
			y = i % 3;
			sudo_tag("sudo_casilla_" + x + "_" + y).style.fill = sudo_palette[sudoku.charAt(i)];
		}
	}

	function sudo_modifyme()	{
		this.style.fill = sudo_palette[sudo_active];
		xy = this.id.substr(13).split("_");
		sudo_x = parseInt(xy[0]) * 3 + parseInt(xy[1]);
		sudo_temp_array = sudo_tag("intro_sudoku").value.split("");
		sudo_temp_array2 = sudo_tag("intro_sudoku2").value.split("");
		sudo_temp_array[sudo_x] = sudo_active;
		sudo_temp_array2[sudo_x] = sudo_active;
		sudo_tag("intro_sudoku").value = sudo_temp_array.join("");
		sudo_tag("intro_sudoku2").value = sudo_temp_array2.join("");
	};

	function sudo_activatemyself()	{
		sudo_color = this.id.substr(11);
		sudo_active = sudo_color;
		sudo_tag("sudo_color_active").style.fill = sudo_palette[sudo_active];
	};

	sudo_active = 0;
	function start_sudo_captcha()	{
		sudo_place_event(sudo_tag("sudo_casilla_0_0"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_0_1"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_0_2"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_1_0"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_1_1"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_1_2"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_2_0"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_2_1"), "click", sudo_modifyme);
		sudo_place_event(sudo_tag("sudo_casilla_2_2"), "click", sudo_modifyme);

		sudo_place_event(sudo_tag("sudo_color_0"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_1"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_2"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_3"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_4"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_5"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_6"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_7"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_8"), "click", sudo_activatemyself);
		sudo_place_event(sudo_tag("sudo_color_9"), "click", sudo_activatemyself);

		sudo_place_event(sudo_tag("sudo_reload"), "click", sudo_resetme);
	}

	sudo_place_event(window, "load", start_sudo_captcha);


</script>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="." class="navbar-brand"><img src="assets/img/rubik.png" width ="200px" height="30px"/></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
<!-- begin #content -->

		<div id="content" class="content">
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project <small>Sudoku/Rubik</small></h1>
			<!-- end page-header -->

            <div id="center">

<!-- end #sidebar -->
		<!-- begin #content -->
		
				
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">User Registration</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" method="post" action="processes/save.php">
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="email">Name * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="text" id="name" name="name" data-trigger="change" data-required="true" data-type="email" placeholder="Peter">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="website">Last Name * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="text" id="last_name" name="last_name" data-trigger="change" data-type="url" placeholder="Smith">
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Usename * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="text" id="user" name="user" data-trigger="change" data-type="digits" placeholder="psmith03">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="message">Password * :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="password" id="password" name="password" data-trigger="change" data-type="digits" placeholder="">
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
									
									<div id="checkbox" >
									  <input type="checkbox" name="check" id="check" value="0" onchange="javascript:showContent();"/> I'm not a robot 
									</div>
                                                                        
									<div id="captcha" style="display:none;">
                                                                            <?php include("sudo.php");?>
                                                                        </div>
                                                                </div> 
                                                                
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary" name="sub" value="Register">Register</button>
									</div>
								</div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                </div>

</div>
</div>
</div>
	<!-- end page container -->
	
<?php foreach ($js as $value) 
	echo "<script src='".$value."' type='text/javascript'></script>";
?>

	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
	</script>

</body>
</html>
