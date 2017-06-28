<?php		
include("class/confRut.php");
include("class/clsLog.php");
include("class/clsSes.php");
$log=new clsLog($Rlog);
$log->fWriteLog("the system request");
$secret = $objSes->fSecret($objSes->fKeyRandom());
$line = rand(1,4);
?>
<style type="text/css">
body{margin-top:400px}
        .tetris{
             border-collapse: collapse;
        }
        .tetris tr td{
             width:20px;
             height:20px;
             padding: 0px;
        }
        .cell0{
             background-color: #000000;
        }
        .cell1{
             background-color: #0000FF;
        }
        .cell2{
             background-color: #FF0000;
        }
        .cell3{
             background-color: #00FF00;
        }
        .cell4{
             background-color: #FFFF00;
        }
        .cell5{
             background-color: #00FFFF;
        }
        .cell6{
             background-color: #FF00FF;
        }
        .cell7{
             background-color: #888888;
        }
</style>
<script>
        var speed=50000; //Game speed
        var fpi, cpi, rot; //Row, column and rotation of the chip
        var board;  //Matrix with board
        var piece=0; //piece
        var record=0;  //Stores the best score
        var lines=0;   //Stores the current score
        var pos=[  //Relative coordinate reference values
              [0,0],
              [0,1],
              [-1,0],
              [1,0],
              [-1,-1],
              [0,-1],
              [1,-1],
              [0,-2]
        ];
        var pieces=[  //Design of the pieces, the first value of each row corresponds to the number of possible rotations
              [4,0,1,2,3], 
              [4,0,1,5,6],  
              [4,0,1,5,4],
              [2,0,1,5,7],
              [2,0,2,5,6],
              [2,0,3,5,4],
              [1,0,5,6,3]
    ];
    //Generate a new game by initializing variables
function newGame(){ 
                document.getElementById('tetris_right').value="";
                speed=50000;
                board=new Array(20); 
                for (var n=0;n < 20;n++){
                     board[n]=new Array(9);
                     for (var m=0;m < 9;m++){
                          board[n][m]=0;
                     }
                }
        lines=0;
                newPiece();
}
    
    //Detects whether a row board column is free to be occupied
function boxNotvailable(f,c){
        if (f < 0) return false;
        return (c < 0 || c >= 9 || f >= 20 || board[f][c] > 0);
}

    //Detects whether the active part collides outside the board or with another piece
function collisionPiece(){
        for (var v=1;v < 5;v++){
            var des=pieces[piece][v];
            var pos2=rotateBox(pos[des]);
            if (boxNotvailable(pos2 [ 0 ] +fpi, pos2 [ 1 ]+cpi)){
                return true;
            }
        }
        return false;
}
        
    //It detects if there are complete lines and if there are, compute them and delete the line by moving the upper submatrix
function detectLines(){
        for (var f=0;f < 20;f++){
            var countTables=0;
            for (var c=0;c < 9;c++){
                if (board[f][c]>0){
                    countTables++;
                }
            }
            if (countTables==9){
                for (var f2=f;f2 > 0;f2--){
                    for (var c2=0;c2 < 9;c2++){
                        board[f2][c2]=board[f2-1][c2];
                    }
                }
                lines++;
            }
        }
}

    //Lower the piece, if you touch another piece or the ground, take out a new piece
function lowerPiece(){
        fpi=fpi+1;
        if (collisionPiece()){
            fpi=fpi-1;
            for (v=1;v < 5;v++){
                des=pieces[piece][v];
                var pos2=rotateBox(pos[des]);
                if (pos2 [ 0 ] +fpi >= 0 && pos2 [ 0 ] +fpi < 20 &&
                    pos2 [ 1 ] +cpi >=0 && pos2 [ 1 ] +cpi < 9){
                    board[pos2 [ 0 ] +fpi][pos2 [ 1 ] +cpi]=piece+1;
                }
            }
            detectLines();
            lines_record = "<?php echo $line; ?>";
            lines_record2 = "<?php echo $line2 = crypt($line); ?>";
        if(lines == lines_record || lines >= lines_record){
            document.getElementById('tetris_right').value=lines_record2;
            <?php $objSes->fTetris_right($line2); ?>
            document.getElementById('tetris').innerHTML="";
            document.getElementById('checkbox').innerHTML="";
            document.getElementById('right').style.display='block';
            etTimeout('tick()', 0);
            
        }
            //If there is any box in row 0 restart the game
            var restart=0;
            for (var c=0;c < 9;c++){
                if (board [ 0 ] [ c ] !=0){
                    restart=1;
                }
            }
            if (restart==1){
                if (lines > record){
                    record=lines;
                }
                newGame();
            }else{
                newPiece();
            }
        }
}

    //Move the piece sideways
function movePiece(des){
        cpi=cpi+des;
        if (collisionPiece()){
            cpi=cpi-des;
        }
}
    
    //Rotate the workpiece according to the number of rotations possible. (Position 0 of the part)
function rotatePiece(){
                rot=rot+1;
                if (rot==pieces[piece] [ 0 ] ){
            rot=0;
        }
        if (collisionPiece()){
            rot=rot-1;
                    if (rot==-1){
                rot=pieces[piece] [ 0 ] -1;
            }
        }
}
    //Gives coordinates f, c and rotates 90 degrees
function rotateBox(cell){
        var pos2=[cell [ 0 ] , cell [ 1 ] ];
        for (var n=0;n < rot ;n++){
            var f=pos2 [ 1 ]; 
            var c=-pos2 [ 0 ] ;
            pos2 [ 0 ] =f;
            pos2 [ 1 ] =c;
        }
        return pos2;
}
    //Genera una nueva piece aleatoriamente
function newPiece(){
        cpi=3;
        fpi=0;
        rot=0;
        piece=Math.floor(Math.random()*7);
}
    //Main game execution, perform the animation and repaint
function tick(){
        lowerPiece();
        paint();
        setTimeout('tick()', speed/100);
}
    //Paint the board (generate it with html) and paste it into a div.
function paint(){
        var lt=" <";
        var des;
        var html="<table class='tetris'>"
        for (var f=0;f < 20;f++){
            html+="<tr>";
            for (var c=0;c < 9;c++){
                var color=board[f][c];
                if (color==0){
                    for (v=1;v < 5;v++){
                        des=pieces[piece][v];
                        var pos2=rotateBox(pos[des]);
                        if (f==fpi+pos2 [ 0 ]   && c==cpi+pos2 [ 1 ] ){
                            color=piece+1;
                        }
                    }
                }
                html+="<td class='cell" + color + "'/>";
                    }
            html+=lt+"/tr>";
                }
        html+=lt+"/table>";
        document.getElementById('tetris').innerHTML=html;
        speed=Math.max(speed-1,500);
        
        
}
    //When starting the page, start the game
function eventUpload(){
                newGame();
                setTimeout('tick()', 1);
}
    //Pressing a key
function keyboardKey(e){
                var characterCode = (e && e.which)? e.which: e.keyCode;
                switch (characterCode){
        case 37:
                        movePiece(-1);
            break;
        case 38:
            rotatePiece();
            break;
        case 39:
                        movePiece(1);
            break;
        case 40:
            lowerPiece();
            break;
                }
        paint();
}
       
</script>
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
	<link rel="shortcut icon" href="<?php echo $root; ?>assets/img/tetris.ico">
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
<body  onkeydown="keyboardKey(event);">
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
					<a href="." class="navbar-brand"><img src="<?php echo $root; ?>assets/img/tetris.png" width ="200px" height="30px"/></a>
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
			<h1 class="page-header">Project <small>Tetris</small></h1>
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
									
									<div id="right" style="display:none;">
                                                                            <img src="assets/img/ico-check.png" width="24px" height="24"/> I'm not a robot
									</div>
									
									<div id="checkbox" >
									  <input type="checkbox" name="check" id="check" value="0" onchange="javascript:eventUpload();"/> I'm not a robot 
									</div>
                                                                        
									<div id="tetris">
                                                                        </div>
                                                                        
									    <input class="form-control parsley-validated" type="hidden" id="tetris_right" name="tetris_right" data-required="true"  value="" >
									    <input class="form-control parsley-validated" type="hidden" id="validate" name="validate" data-required="true"  value="<?php echo $secret; ?>" >
									    <input class="form-control parsley-validated" type="hidden" id="option" name="option" data-required="true"  value="" >
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
<!--    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-43074450-1', 'sean-theme.com');
      ga('send', 'pageview');
    
    </script>
-->
</body>
</html>
