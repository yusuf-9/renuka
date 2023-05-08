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
			
			<!-- Page Wrapper -->
			<div class="page-wrapper">
				<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Students</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Students</li>
								</ul>
							</div>
							<div class="col-auto">
					
							</div>
						</div>
					</div>
					<!-- /Page Header -->
			   

					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table"> 
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-center table-hover datatable">
											<thead class="thead-light">
												<tr>
													<th>S.No</th>
													<th>Student</th>
													<th>Referal Code</th>
													<th>Total Transaction</th>
												   <th>Action</th>
												</tr>
											</thead>
											<tbody>

                                         <?php
                                            $x = 1;
                                            $studentFeatch = "SELECT * FROM `user` WHERE `referal`='$tref' ORDER BY `user`.`id` DESC";
                                            $result = $conn->query($studentFeatch);
                                            while ($rows = $result->fetch_assoc()) {
                                               
                                                
                                                $userId = $rows['id'];
                                                $account_arr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `account` WHERE `uid`='$userId'"));
                                                $payment_arr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `payments` WHERE `uid`='$userId'"));
                                                $payment_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `payments` WHERE `uid`='$userId'"));
                                                if ($account_arr['pic'] == NULL) {
                                                    $userImage = "assets/img/profiles/avatar-08.jpg";
                                                } else {
                                                    $userImage = '../' . $account_arr['pic'];
                                                }
                                                 $percentage=$payment_arr['profit']*100/$payment_arr['amt'];
                                            ?>
												<tr>
													<td><?=$x++?></td>
													<td>
														<h2 class="table-avatar">
															<a href="#"><img class="avatar avatar-sm mr-2 avatar-img rounded-circle" src="<?=$userImage?>" alt="User Image"><?=$rows['name']?></a>
														</h2>
													</td>
													<td><span class="badge badge-pill bg-primary-light"><?=$rows['referal']?></span></td>
													<td><span class="badge bg-success-light"><?=$payment_count?></span></td>
													<td class="text-center">
														<a href="payments?studentID=<?=$userId?>" class="btn btn-sm btn-white text-secondary" data-toggle="tooltip" data-placement="bottom" title="View student Subject purchase History"><i class="far fa-eye mr-1"></i>View </a> 
														
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Datepicker Core JS -->
		<script src="assets/plugins/moment/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>

<!-- Mirrored from kanakku.dreamguystech.com/template-html/expenses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 10:02:38 GMT -->
</html>