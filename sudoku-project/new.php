<!-- begin #content -->

		<div id="content" class="content">
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project <small>Captcha</small></h1>
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
									    <input type="checkbox" name="check" id="check" value="0" onchange="javascript:showContent();loadup('sudoku.php','captcha');" /> I'm not a robot
									    
                                                                       </div>
                                                                </div>
                                                                
                                                                <div id="captcha" style="display:none;">
                                                                </div>
                                                                
								
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<input type="submit" class="btn btn-primary" name="sub" value="Register"/>
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
