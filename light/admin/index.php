<?php
	include("auth.php");
	include('../../connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
?>
<!DOCTYPE html>
<html lang="en">
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
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- Start -->
					<div class="row">
						
						<div class="col-xl-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Real-time Power Monitoring</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    								<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
									 <script type="text/javascript">
									// Load Google Charts
									google.charts.load('current', {'packages': ['corechart']});
									google.charts.setOnLoadCallback(drawChart);

									// Function to draw the chart
									function drawChart() {
										const data = google.visualization.arrayToDataTable([
										['', '', { role: 'style' }],
										['PALAKKAD', getRandomMark(), 'color:rgb(93, 145, 250)'],
										['THRISSUR', getRandomMark(), 'color:rgb(142, 178, 249)'],
										['ERNAKULAM', getRandomMark(), 'color:rgb(178, 206, 237)'],
										['KOTTAYAM', getRandomMark(), 'color:rgb(214, 231, 246)'],
										['IDUKKI', getRandomMark(), 'color:rgb(246, 203, 248)'],
										['KOLLAM', getRandomMark(), 'color:rgb(237, 162, 232)'],
										['ALAPPUZHA', getRandomMark(), 'color:rgb(214, 115, 214)'],
										['TRIVANDRUM', getRandomMark(), 'color:rgb(224, 68, 219)'],
										]);

										const options = {
										is3D: true, // This only affects Pie Charts, but we use color/shadow for 3D effect
										legend: { position: 'none' },
										chartArea: { width: '70%' },
										hAxis: {
											title: '',
											minValue: 1000,
											maxValue: 3000
										},
										vAxis: {
											title: ''
										},
										animation: {
											duration: 1000,
											easing: 'out',
											startup: true
										},
										bar: { groupWidth: "60%" }
										};

										const chart = new google.visualization.BarChart(document.getElementById('barchart_3d'));
										chart.draw(data, options);
									}

									function getRandomMark() {
										return Math.floor(Math.random() * 2001) + 1000;
									}

									</script>
    								<div id="barchart_3d" style="width: 800px; height: 500px;"></div>
								</div>
							</div>
						</div>
					</div>
					<!--End -->
					<!-- start widget -->
					
					<!-- Start Live Distribution using PSO (Optimizing Energy Supply)-->
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header><h3>Live Distribution using PSO (Optimizing Energy Supply)</h3></header>
									<header><strong> SIMULATED GRID CAPACITY : 45,000kWh </strong></header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<?php
												$inpkd=rand(1800,2000);
												$inthsr=rand(1600,1800);
												$inernklm=rand(3260,3500);
												$inalpy=rand(1330,1500);
												$inktym=rand(1430,1600);
												$inklm=rand(1575,1700);
												$inidki=rand(1155,1300);
												$intvm=rand(2625,2800);

											
											?>
									<?php
									// Kerala district demand inputs (in watts or any unit)
									$districts = [
										"Palakkad" => rand(1800, 2000),
										"Thrissur" => rand(1600, 1800),
										"Ernakulam" => rand(3260, 3500),
										"Alappuzha" => rand(1330, 1500),
										"Kottayam" => rand(1430, 1600),
										"Kollam" => rand(1575, 1700),
										"Idukki" => rand(1155, 1300),
										"Trivandrum" => rand(2625, 2800)
									];

									// PSO Parameters
									$swarm_size = 30;
									$dimensions = count($districts);
									$iterations = 25;

									$w = 0.5;     // Inertia weight
									$c1 = 1.5;    // Cognitive (particle)
									$c2 = 1.5;    // Social (swarm)

									// Initialize particles
									$particles = [];
									$velocities = [];
									$pbest = [];
									$pbest_score = array_fill(0, $swarm_size, INF);
									$gbest_score = INF;
									$gbest = [];

									for ($i = 0; $i < $swarm_size; $i++) {
										$particles[$i] = [];
										$velocities[$i] = [];

										foreach ($districts as $demand) {
											$particles[$i][] = rand(1000, 3000); // random supply values
											$velocities[$i][] = rand(-50, 50);   // random initial velocities
										}

										$pbest[$i] = $particles[$i];
										$score = fitness_function($particles[$i], $districts);

										if ($score < $gbest_score) {
											$gbest_score = $score;
											$gbest = $particles[$i];
										}
									}

									?>
									<div class="table-responsive">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column"
											id="example4">
											<thead>
												<tr>													
													<th class="right"></th>
													<th class="right">Iteration</th>
													<th class="right">Global Best Score</th>
												</tr>
											</thead>
											<tbody>
											<?php
												
												
										// PSO Main Loop
										for ($t = 0; $t < $iterations; $t++) {
											for ($i = 0; $i < $swarm_size; $i++) {
												for ($d = 0; $d < $dimensions; $d++) {
													$r1 = mt_rand() / mt_getrandmax();
													$r2 = mt_rand() / mt_getrandmax();

													// Velocity update
													$velocities[$i][$d] = $w * $velocities[$i][$d]
																		+ $c1 * $r1 * ($pbest[$i][$d] - $particles[$i][$d])
																		+ $c2 * $r2 * ($gbest[$d] - $particles[$i][$d]);

													// Position update
													$particles[$i][$d] += $velocities[$i][$d];
												}

												// Fitness calculation
												$score = fitness_function($particles[$i], $districts);

												// Update personal best
												if ($score < $pbest_score[$i]) {
													$pbest[$i] = $particles[$i];
													$pbest_score[$i] = $score;
												}

												// Update global best
												if ($score < $gbest_score) {
													$gbest = $particles[$i];
													$gbest_score = $score;
												}
											}
												?>
												<tr class="odd gradeX">
													<td class="right"> <?php echo " ";?> </td>
													<td class="right"> <?php echo ($t + 1);?> </td>
													<td class="right"> <?php echo round($gbest_score, 4) ;?> </td>
												</tr>
												<?php
												
												}
												
												?>										
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<!-- End -->

					<!-- Start Final Optimized Distribution -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header><h3>💰 Cost Details</h3></header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									
									<div class="table-responsive">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column"
											id="example4">
											<thead>
												<tr>													
													<th class="right">#</th>
													<th class="right">District</th>
													<th class="right">Demand (kWh)</th>
													<th class="right">Demand Cost (₹)</th>
													<th class="right">Supplied (kWh)</th>
													<th class="right">Supplied Cost (₹)</th>
												</tr>
											</thead>
											<tbody>
											<?php
												
												$cost_per_unit = 5; // cost per unit (kWh)
												$i = 0;
												foreach ($districts as $district => $demand) {
													$supplied = round($gbest[$i], 2);
													$demand_cost = round($demand * $cost_per_unit, 2);
													$supplied_cost = round($supplied * $cost_per_unit, 2);
												?>
												<tr class="odd gradeX">
													<td class="right"> <?php echo $i+1;?> </td>
													<td class="right"> <?php echo $district;?> </td>
													<td class="right"> <?php echo $demand;?> </td>
													<td class="right"> <?php echo $demand_cost;?> </td>
													<td class="right"> <?php echo $supplied;?> </td>
													<td class="right"> <?php echo $supplied_cost;?> </td>	
												<?php
													$i++;
												?>
												</tr>
												<?php
												
												}
												
												?>										
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<!-- End -->


					<!-- Start Final Optimized Distribution -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header><h3>🔋 Final Optimized Distribution</h3></header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									
									<div class="table-responsive">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column"
											id="example4">
											<thead>
												<tr>													
													<th class="right">#</th>
													<th class="right">District</th>
													<th class="right">Demand (kWh)</th>
													<th class="right">Supplied (kWh)</th>
													<th class="right">Energy Difference (kWh)</th>
													<th class="right">Cost Difference (₹)</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$i = 0;
												foreach ($districts as $district => $demand) 
												{
													$supplied = round($gbest[$i], 2);
													$diff = round($supplied - $demand, 2);
													// Calculate cost difference
													$demand_cost = round($demand * $cost_per_unit, 2);
													$supplied_cost = round($supplied * $cost_per_unit, 2);
													$cost_diff = round($supplied_cost - $demand_cost, 2);
												?>
												<tr class="odd gradeX">
													<td class="right"> <?php echo $i+1;?> </td>
													<td class="right"> <?php echo $district;?> </td>
													<td class="right"> <?php echo $demand;?> </td>
													<td class="right"> <?php echo $supplied;?> </td>
													<td class="right"> <?php echo $diff;?> </td>
													<td class="right"> <?php echo $cost_diff;?> </td>	
												<?php
													$i++;
												?>
												</tr>
												<?php
												
												}
												// ------------------------ Fitness Function ------------------------
													function fitness_function($position, $districts) {
														$fitness = 0;
														foreach ($position as $i => $supply) {
															$demand = array_values($districts)[$i];
															$fitness += abs($supply - $demand); // absolute error
														}
														return $fitness;
													}
												?>										
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<!-- End -->

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Complaints List</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									
									<div class="table-responsive">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column"
											id="example4">
											<thead>
												<tr>													
													<th class="right">Name</th>
													<th class="right">Gender</th>
													<th class="right">Contact</th>
													<th class="right">Date</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$result = $db->prepare("select * from  complaints limit 3");
												$result->execute();
												for($i=0; $rows = $result->fetch(); $i++)
												{
											
													?>			

												<tr class="odd gradeX">
													
													<td class="right"> <?php echo $rows['name'];?> </td>
													<td class="right">
													<?php echo $rows['sex'];?>
													</td>
													<td class="right"> <?php echo $rows['cntno'];?> </td>
													<td class="right"> <?php echo $rows['date'];?> </td>
													
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
			<!-- end page content -->
            
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php
			include("include/footer.php")
		?>
		<!-- end footer -->
	</div>
	<?php
		include("include/js.php")
	?>
	<script>
    $(document).ready(function () {
        setInterval(function () {
            location.reload();
        }, 10000); // 10000 milliseconds = 10 seconds
    });
</script>
</body>

</html>