<!-- begin #content -->

		<div id="content" class="content">
			<h1 class="page-header">Project <small>Tetris</small></h1>
			<!-- end page-header -->

            <div id="center">
<div class="row">
                <!-- $begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h6 class="panel-title"><b>Login</b></h6>
                        </div>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered" method="post" action="processes/validate.php">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="fullname"  >Username :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="text" id="user" name="user" data-required="true" placeholder="username">				
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4" for="email">Password :</label>
									<div class="col-md-6 col-sm-6">
										<input class="form-control parsley-validated" type="password" id="password" name="password" data-trigger="change" data-required="true" data-type="email" placeholder="*****">
									</div>
								</div>
																
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
									  <!--  <input type="checkbox" name="check" id="check" value="0" onchange="javascript:showContent();" /> I'm not a robot-->
									  <div id="tetris">
                                                                          </div>
									    
                                                                       </div>
                                                                </div>                                                            

                                                                
                                                                 
                                                                <div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary" name="sub">Login</button> 
										
										<br><br><p style="font-size:10px">New to Tetris Project? <a href="register.php">Sign up</a> for an account</p>
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
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
