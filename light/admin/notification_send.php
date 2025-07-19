
<?php
	include("auth.php");
	include('../../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<?php
		include("include/css.php");
	?>
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<?php
		include("include/header.php");
		?>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			 <?php
			include("include/leftmenu.php");
			?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Notification</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Page</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Send</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!--Form Start -->
											<form class="edit-profile m-b30" method="post" action="action/notifcation.php" enctype="multipart/form-data" autocomplete="off">
												<div class="row">
													<div class="col-12">
														<div class="ml-auto">
															<h3>1. Notification Details</h3>
														</div>
													</div>
														                                                                                
														<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Name</label>
															<input type="text"  name="name"   class="form-control" required>
														</div>
														<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Subject</label>
															<input type="text"  name="subjct"   class="form-control" required>
														</div>
														<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Date</label>
															<input type="date"  name="date"   class="form-control" required>
														</div>
														<div class="col-md-6 col-sm-12 col-xs-12">
														<label>Time</label>
															<input type="time"  name="tme"   class="form-control" required>
														</div>                                                                                    
														
													<div class="seperator"></div>
													
													
													<div class="col-12 m-t20">
														<div class="ml-auto">
															<h3 class="m-form__section">1. Details</h3>
														</div>
													</div>									
													<div class="form-group col-12">
														<label class="col-form-label">Describe</label>
														<textarea class="form-control" name="descp" required rows="8"></textarea>
													</div>									
													<div class="col-12">
														<button type="submit" class="btn pull-right btn-primary">Register</button>
														<button type="reset" class="btn pull-right btn-danger">Cancel</button>
													</div>
												</div>
											</form>		
											<!--Form End -->
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				<!-- end page content -->
                				
			</div>
			<!-- end page container -->
			<!-- start footer -->
			<?php
				include("include/footer.php")
			?>
			<!-- end footer -->
		</div>
	</div>
	<!-- start js include path -->
	<?php
		include("include/js.php")
	?>
	<!-- end js include path -->
</body>

</html>