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
					<a href="." class="navbar-brand"><img src="<?php echo $root;?>assets/img/rubik.png" width ="200px" height="30px"/></a>
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
