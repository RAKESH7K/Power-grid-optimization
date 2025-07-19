<?php
	include("auth.php");
	include('../../connect/db.php');
	$Log_Id=$_SESSION['SESS_PEOPLE_ID'];
	$result = $db->prepare("select * from people where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++)
	{
		$aadharno=$row["aadharno"];	
		$name=$row["name"];
		$sex=$row["sex"];
		$age=$row["age"];
		$dob=$row["dob"];
		$cntno=$row["cntno"];
		$email=$row["email"];
		$addr=$row["addr"];
		
		$state=$row["state"];
		$dstrct=$row["dstrct"];
		$pncth=$row["pncth"];
		$wrd=$row["wrd"];
		$pcode=$row["pcode"];
		$username=$row["username"];
		$password=$row["password"];
		$date=$row["date"];	
		$photo=$row["photo"];	

		$about=$row["about"];	
	}
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
								<div class="page-title">Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Profile</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Update</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="profile-userpic">
												<img src="../photo/<?php echo $photo;?>" class="img-responsive" alt="">
											</div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?php echo $name;?> </div>
											<div class="profile-usertitle-job"> <?php echo $sex;?> </div>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>State</b> <a class="pull-right"><?php echo $state;?></a>
											</li>
											<li class="list-group-item">
												<b>District</b> <a class="pull-right"><?php echo $dstrct;?></a>
											</li>
											<li class="list-group-item">
												<b>Panchayath</b> <a class="pull-right"><?php echo $pncth;?></a>
											</li>
											<li class="list-group-item">
												<b>Ward</b> <a class="pull-right"><?php echo $wrd;?></a>
											</li>
										</ul>
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										
										<!-- END SIDEBAR BUTTONS -->
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header>About Me</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="profile-desc">
										<?php echo $about;?>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Age </b>
												<div class="profile-desc-item pull-right"><?php echo $age;?></div>
											</li>
											<li class="list-group-item">
												<b>Date Of Birth </b>
												<div class="profile-desc-item pull-right"><?php echo $dob;?></div>
											</li>
											<li class="list-group-item">
												<b>Contact </b>
												<div class="profile-desc-item pull-right"><?php echo $cntno;?></div>
											</li>
											<li class="list-group-item">
												<b>Email</b>
												<div class="profile-desc-item pull-right"><?php echo $email;?></div>
											</li>
										</ul>										
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header>Address</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
											<?php echo $addr;?>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											
											<!-- Tab panes -->
											<div class="tab-content">
												
												<div class="tab-pane active" id="tab2">
													<div class="container-fluid">
														<div class="row">
															<div class="full-width p-rl-20">
																<div class="panel">
																<form class="edit-profile m-b30" method="post" action="action/profile_update.php" enctype="multipart/form-data" autocomplete="off">
																	<div class="row">
																		<div class="col-12">
																			<div class="ml-auto">
																				<h3>1. Personal Details</h3>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Aadhar No</label>
																			<div>                                        
																				<input class="form-control" type="text" name="aadharno"  value="<?php echo $aadharno;?>"> 
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Full Name</label>
																			<div>
																				<input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
																				<input class="form-control" type="text" name="name" value="<?php echo $name;?>">
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Gender</label>
																			<div>                                        
																				<input class="form-control" type="text" name="sex"  value="<?php echo $sex;?>"> 
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Age</label>
																			<div>
																				<input class="form-control" type="text" name="age"  value="<?php echo $age;?>">
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Date Of Birth</label>
																			<div>
																				<input class="form-control" type="date" name="dob"  value="<?php echo $dob;?>">
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Phone No.</label>
																			<div>
																				<input class="form-control" type="text" name="cntno"  value="<?php echo $cntno;?>" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
																			</div>
																		</div>																		
																		<div class="form-group col-6">
																			<label class="col-form-label">Email</label>
																			<div>
																				<input class="form-control" type="text" name="email"  value="<?php echo $email;?>">										
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Photo.</label>
																			<div>
																				<input class="form-control" type="file" name="photo">
																			</div>
																		</div>
																		
																		<div class="seperator"></div>
																		
																		<div class="col-12 m-t20">
																			<div class="ml-auto m-b5">
																				<h3>2. Address</h3>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Address</label>
																			<div>
																				<input class="form-control" type="text" name="addr"  value="<?php echo $addr;?>" required>
																			</div>
																		</div>	
																		<div class="form-group col-6">
																			<label class="col-form-label">State</label>
																			<div>
																				<input class="form-control" type="text" name="state"  value="<?php echo $state;?>" required>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">District</label>
																			<div>
																				<input class="form-control" type="text" name="dstrct"  value="<?php echo $dstrct;?>" required>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Panchayath</label>
																			<div>
																				<input class="form-control" type="text" name="pncth"  value="<?php echo $pncth;?>" required>
																			</div>
																		</div>								
																		<div class="form-group col-6">
																			<label class="col-form-label">Ward</label>
																			<div>
																				<input class="form-control" type="text" name="wrd"  value="<?php echo $wrd;?>" required>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Postcode</label>
																			<div>
																				<input class="form-control" type="text" name="pcode"  value="<?php echo $pcode;?>" required pattern="[0-9]{6,6}" maxlength="6" minlength="6">
																			</div>
																		</div>

																		<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
																		
																		<div class="col-12 m-t20">
																			<div class="ml-auto">
																		<h3 class="m-form__section">4. Authentication Information</h3>
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Username</label>
																			<div>
																				<input class="form-control" type="text" name="username"  value="<?php echo $username;?>">
																			</div>
																		</div>
																		<div class="form-group col-6">
																			<label class="col-form-label">Password</label>
																			<div>
																	<input class="form-control" type="password" name="password"  value="<?php echo $password;?>">
																			</div>
																		</div>                                   	                                    									
																		<div class="col-12">
																			<button type="submit" class="btn btn-primary pull-right">Update</button>
																			<button type="reset" class="btn btn-danger pull-right">Cancel</button>
																		</div>
																	</div>
																</form>		
																</div>
															</div>
															
														</div>
													</div>
												</div>
											</div>
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