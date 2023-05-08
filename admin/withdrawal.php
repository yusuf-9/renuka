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

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-2">
											<i class="fas fa-rupee-sign"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Your Earning</div>
											<div class="dash-counts">
												<p><?=$earnings?></p>
												
											</div>
										</div>
									</div>
									<div class="progress progress-sm mt-3">
										<div class="progress-bar bg-6" role="progressbar" style="width: <?=$progress?>%" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex">
									<p class="text-muted mt-3 mb-0"> Paid monthly if the total is at least <span class="text-success mr-1"><i class="fas fa-rupee-sign mr-1"></i><?=$limit?></span> (your payout threshold)</p>
									<button class="btn btn-light text-primary btn-sm ml-auto mt-2 " id="request">Request</button>
									</div>
								</div>
							</div>
						</div>

			
			
					</div>
					
					<div class="row">
						<div class="col-sm-12">
						    <p>Last Withdrawal Status</p>
							<div class="card card-table"> 
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-center table-hover datatable">
											<thead class="thead-light">
												<tr>
													<th>S.No</th>
													<th>Request Id</th>
													<th>Amount</th>
													<th>Date</th>
													<th>Payment Mode</th>
									                <th>Remarks</th>
													<th class="text-center">Status</th>
												</tr>
											</thead>
											<tbody>

                                         <?php
                                            $x = 1;
                                            $withdrawFeatch = "SELECT * FROM `withdraw` WHERE `tid`='$adminid'";
                                            $result = $conn->query($withdrawFeatch);
                                            while ($rows = $result->fetch_assoc()) {
                                                if($rows['status']==0){
                                                    $reqstatus='<span class="badge bg-warning-light">Requested</span>';
                                                }
                                                else if($rows['status']==1){
                                                    $reqstatus='<span class="badge bg-success-light">Completed</span>';
                                                }
                                                 else if($rows['status']==2){
                                                    $reqstatus='<span class="badge bg-success-light">Rejected</span>';
                                                }
                                                else {
                                                    $reqstatus='<span class="badge bg-secondary-light">On hold</span>';
                                                }
                                                if($rows['pmod']==0){
                                                    $pmode='<span class="badge bg-secondary-light">Pending</span>';
                                                }
                                                  else if($rows['pmod']==1){
                                                    $pmode='<span class="badge bg-primary-light">Bank</span>';
                                                }
                                                else if($rows['pmod']==2){
                                                    $pmode='<span class="badge bg-primary-light">UPI</span>';
                                                }
                                               
                                                
                                            
                                            ?>
												<tr>
													<td><?=$x++?></td>
													<td><?=$rows['reqid']?></td>
											          <td><?=$rows['amt']?></td>
											          <td><?=$rows['date']?></td>
											          <td><?=$pmode?></td>
											          <td><?=$rows['remarks']?></td>
											          <td><?=$reqstatus ?></td>
												
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
				<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
				<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script>
		    (function($) {
            "use strict";
            
            $(document).on('click', '#request', function() {
                console.log("click")
               $.ajax({
                method: "POST",
                url: "request.php",
                data: {request:'rqst'},
                success: function(res) {
                    console.log(res);
                    if (res === 'lessthanlimit') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cannot Request',
                            text: 'Your payout threshold is not completed',
                        });
                        

                    }
                    if (res === 'requested') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Request to admin',
                            text: 'Your payout threshold ₹ <?=$earnings?> is completed',
                        });

                    }
                    
                     if (res === 'alreadyrequest') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Already Request to admin',
                            text: 'Your payout threshold ₹ <?=$earnings?> is completed',
                        });
                
                        

                    }
                },

            })
                
            });
		    })(jQuery);
		</script>

	</body>

<!-- Mirrored from kanakku.dreamguystech.com/template-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 09:59:21 GMT -->
</html>