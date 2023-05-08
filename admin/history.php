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
			
					<div class="row justify-content-center">
						<div class="col-xl-12">
							<div class="card">
							   <?php 
							   
							   if(!empty($_GET['payment_id'])&&!empty($_GET['student_id']))
							   {
							       $studentid=$_GET['student_id'];
							       $student_arr=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `user` WHERE `id`='$studentid'"));
							       $payid=$_GET['payment_id'];
							    
							   
							   ?>
								<div class="card-body">
									<div class="invoice-item">
										<div class="row">
											<div class="col-md-6">
												<div class="invoice-logo">
													<img src="../assets/img/tso.png" alt="logo">
												</div>
											</div>
											<div class="col-md-6">
												<p class="invoice-details">
													<strong>Student Id:</strong> <?='TS0-'.$_GET['student_id']?> <br>
													<strong>Referal:</strong> <?=$student_arr['referal']?>
												</p>
											</div>
										</div>
									</div>
									
									<!-- Invoice Item -->
									<div class="invoice-item">
										<div class="row">
											<div class="col-md-6">
												<div class="invoice-info">
													<strong class="customer-text">Student</strong>
													<p class="invoice-details invoice-details-two">
														<?=$student_arr['name']?> <br>
														<!--<?=$student_arr['mobile']?><br>-->
														<!--<?=$student_arr['email']?><br>-->
													</p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="invoice-info invoice-info2">
													<strong class="customer-text">Payment Id</strong>
													<p class="invoice-details">
														<?=$payid?> <br>
														
													</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /Invoice Item -->
									
								
									<!-- /Invoice Item -->
									
									<!-- Invoice Item -->
									<div class="invoice-item invoice-table-wrap">
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive">
													<table class="invoice-table table table-bordered">
														<thead>
															<tr>
																<th>S.n</th>
																<th>Payment Id</th>
																<th class="text-center">Category</th>
																<th class="text-center">Class</th>
																<th class="text-center">Subject</th>
																<th class="text-center">Price</th>
																<th class="text-center">Your (%) Applied</th>
																<th class="text-center">Your Earnings / Subject</th>
															</tr>
														</thead>
														<tbody>
											 <?php 
									       $x=1;
									       $OrderHistory="SELECT * FROM `order` WHERE `uid`='$studentid' AND `payment_id`='$payid' ORDER BY `id` DESC";
									       $result = $conn->query($OrderHistory); 
									       $totalamt=0;
					                        while($rows=$result->fetch_assoc())
					                        {   
					                            $userid=$rows['uid'];
					                            $payid=$rows['payment_id'];
					                            $catid=$rows['cat_id'];
					                            $subjectid=$rows['subid'];
					                            $classid=$rows['class_id'];
					                            $Subject_arr=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `subjects` WHERE `id`='$subjectid'"));
					                            $cat_arr=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `category` WHERE `id`='$catid'"));
					                            $class_arr=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `classes` WHERE `id`='$classid'"));
					                            $payment_percentage_arr=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `payments` WHERE  `trans_id`='$payid'"));
					                            $totalamt +=$Subject_arr['price'];
					                            $totalearn +=$Subject_arr['price']/10;
									       ?>
															<tr>
																<td><?=$x++?></td>
																<td><?=$rows['payment_id']?></td>
																<td class="text-center"><?=$cat_arr['name']?></td>
																<td class="text-center"><?=substr($class_arr['title'],0,2)?></td>
																<td class="text-center"><?=$Subject_arr['title']?></td>
																<td class="text-center">₹ <?=$Subject_arr['price']?></td>
																<td class="text-center"><?=$payment_percentage_arr['percent']?> %</td>
																<td class="text-center">₹ <?=$Subject_arr['price']/$payment_percentage_arr['percent']?></td>
															</tr>
                                            <?php }?>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-md-6 col-xl-4 ml-auto">
												<div class="table-responsive">
													<table class="invoice-table-two table">
														<tbody>
														<tr>
															<th>Total Price:</th>
															<td><span>₹  <?=$totalamt?></span></td>
														</tr>
														<tr>
															<th>Percentage:</th>
															<td><span>10%</span></td>
														</tr>
														<tr>
															<th>Total Earning:</th>
															<td><span>₹ <?=$totalearn ?></span></td>
														</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- /Invoice Item -->
									
								</div>
								<?php } else if(isset($_GET['student_id'])){?>
								<div class="card-body">
									<div class="invoice-item">
										<div class="row">
											<div class="col-md-6">
												<div class="invoice-logo">
													<img src="../assets/img/tso.png" alt="logo">
												</div>
											</div>
											<div class="col-md-6">
												<p class="invoice-details">
													<strong>Student Id:</strong> #00124 <br>
													
												</p>
											</div>
										</div>
									</div>
									
									<!-- Invoice Item -->
									<div class="invoice-item">
										<div class="row">
											<div class="col-md-6">
												<div class="invoice-info">
													<strong class="customer-text">Invoice From</strong>
													<p class="invoice-details invoice-details-two">
														Darren Elder <br>
														806  Twin Willow Lane, Old Forge,<br>
														Newyork, USA <br>
													</p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="invoice-info invoice-info2">
													<strong class="customer-text">Invoice To</strong>
													<p class="invoice-details">
														Walter Roberson <br>
														299 Star Trek Drive, Panama City, <br>
														Florida, 32405, USA <br>
													</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /Invoice Item -->
									
						
									
									<!-- Invoice Item -->
									<div class="invoice-item invoice-table-wrap">
										<div class="row">
											<div class="col-md-12 ">
											 <p class="text-center">Not purchased Any subject Yet..</p>
											</div>
										</div>
									</div>
									<!-- /Invoice Item -->
									
								</div>
								<?php }?>
								
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

	</body>

</html>