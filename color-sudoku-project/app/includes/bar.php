<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><i class="fa fa-user fa-4x"></i></a>
						</div>
						<div class="info">
							<?php echo htmlspecialchars($objSes->fUser()); ?>
							<small>Welcome</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					
                                  <li>
                                    <a href="#"><i class='fa fa-edit fa-2x'></i><span>New</span></a>
                                    
                                  </li>
                                  <li>
                                    <a href="../processes/getout.php"><i class='fa fa-power-off fa-2x'></i><span>Logout</span></a>
                                    
                                  </li>
                    
                    
                
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<!-- end #sidebar -->
