

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
								<li><a class="parent-item" href="">Pages</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Search</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								
								
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>All Notification</header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
															<a class="t-collapse btn-color fa fa-chevron-down"
																href="javascript:;"></a>
															<a class="t-close btn-color fa fa-times"
																href="javascript:;"></a>
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																	<a href="notification_send.php" id="addRow"
																		class="btn btn-primary">
																		Add New Notification <i class="fa fa-plus"></i>
																	</a>

																</div>
															</div>
														</div>
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th>#</th>
																	<th> Name </th>
																	<th> Subject </th>
																	<th> Date </th>
																	<th> Time </th>
																	<th> Details </th>
																</tr>
															</thead>
															<tbody>
															<?php
																$result = $db->prepare("select * from notification");
																$result->execute();
																for($i=1; $rows = $result->fetch(); $i++)
																{
																	?>
																<tr class="odd gradeX">
																	<td class="left"><?php echo $i?></td>
																	<td class="left"><?php echo $rows['name'];?></td>
																	<td class="left"><?php echo $rows['subjct'];?></td>
																	<td class="left"><?php echo $rows['descp'];?></td>
																	<td class="left"><?php echo $rows['date'];?></td>
																	<td class="left"><?php echo $rows['tme'];?></td>
																	
																</tr>
																<?php }?>
																
															</tbody>
														</table>
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
			</div>
			<!-- end page content -->
			
		<!-- end page container -->
		<!-- start footer -->
		<?php
			include("include/footer.php")
		?>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<?php
		include("include/js.php")
	?>
</body>

</html>