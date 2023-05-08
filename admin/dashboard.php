<?php include("authverification.php") ?>

    

<!DOCTYPE html>
<html lang="en">
	
<head>
		<?php include('inc/meta.php')?>
	</head>
	<body>
	
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php include('inc/header.php')?>
		
			<!-- /Header -->
			
			<!-- Sidebar -->
			<?php include('inc/sidebar.php')?>
			
			<!-- /Sidebar -->
			<?php 
			// Count of total users
$totalUsersQuery = "SELECT COUNT(*) AS totalUsers FROM users";
$totalUsersResult = mysqli_query($conn, $totalUsersQuery);
$totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
$totalUsersCount = $totalUsersRow['totalUsers'];

// Count of users with status = 1
$status1UsersQuery = "SELECT COUNT(*) AS status1Users FROM users WHERE status = 1";
$status1UsersResult = mysqli_query($conn, $status1UsersQuery);
$status1UsersRow = mysqli_fetch_assoc($status1UsersResult);
$status1UsersCount = $status1UsersRow['status1Users'];

// Count of users with status = 0
$status0UsersQuery = "SELECT COUNT(*) AS status0Users FROM users WHERE status = 0";
$status0UsersResult = mysqli_query($conn, $status0UsersQuery);
$status0UsersRow = mysqli_fetch_assoc($status0UsersResult);
$status0UsersCount = $status0UsersRow['status0Users'];

// Sum of amount for users with status = 1
$status1AmountQuery = "SELECT SUM(amount) AS totalAmount FROM users WHERE status = 1";
$status1AmountResult = mysqli_query($conn, $status1AmountQuery);
$status1AmountRow = mysqli_fetch_assoc($status1AmountResult);
$status1AmountSum = $status1AmountRow['totalAmount'];
			?>
			<!-- Page Wrapper -->
			<div class="page-wrapper">
				<div class="content container-fluid">

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-1">
										<i class="fas fa-utensils"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">All Order</div>
											<div class="dash-counts">
												<p><?= $totalUsersCount?></p>
											</div>
										</div>
									</div>
									<!--<div class="progress progress-sm mt-3">-->
									<!--	<div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
									<!--</div>-->
									<!--<p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="fas fa-arrow-down mr-1"></i>1.15%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-2">
										<i class="fas fa-grin-tongue"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Pending orders</div>
											<div class="dash-counts">
												<p>
													<?=$status0UsersCount?>
												</p>
											</div>
										</div>
									</div>
									<!--<div class="progress progress-sm mt-3">-->
									<!--	<div class="progress-bar bg-6" role="progressbar" style="width: <?=$progress?>%" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"></div>-->
									<!--</div>-->
									<!--<p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="fas fa-arrow-up mr-1"></i>2.37%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-3">
										<i class="fas fa-check"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Settled Orders</div>
											<div class="dash-counts">
												<p><?=$status1UsersCount?></p>
											</div>
										</div>
									</div>
									<!--<div class="progress progress-sm mt-3">-->
									<!--	<div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
									<!--</div>-->
									<!--<p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="fas fa-arrow-up mr-1"></i>3.77%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-4">
											<i class="fas fa-rupee-sign"></i>
										</span> 
										<div class="dash-count">
											<div class="dash-title">Earnings</div>
											<div class="dash-counts">
												<p><?=($status1AmountSum=='')?'0':$status1AmountSum?></p>
											</div>
										</div>
									</div>
									<!--<div class="progress progress-sm mt-3">-->
									<!--	<div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
									<!--</div>-->
									<!--<p class="text-muted mt-3 mb-0"><span class="text-danger mr-1"><i class="fas fa-arrow-down mr-1"></i>8.68%</span> since last week</p>-->
								</div>
							</div>
						</div>
					</div>
					
		

				</div>
			</div>
			<!-- /Page Wrapper -->
			
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
		<script src="assets/plugins/apexchart/chart-data.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>

<!-- Mirrored from kanakku.dreamguystech.com/template-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 09:59:21 GMT -->
</html>