<div class="sidebar" id="sidebar">
				<div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"><span>Main</span></li>
							<li class="<?=($_SERVER['PHP_SELF']=="/admin/dashboard.php")?"active":"";?>">
								<a href="dashboard"><i data-feather="home"></i> <span>Dashboard</span></a>
								
							</li>
							<li class="<?=($_SERVER['PHP_SELF']=="/admin/orders.php" )?"active":"";?>">
								<a href="orders"><i data-feather="users"></i> <span>All Orders</span></a>
							</li>
				
							

							<li class="<?=($_SERVER['PHP_SELF']=="/admin/settings.php")?"active":"";?>">
								<a href="settings"><i data-feather="settings"></i> <span>Settings</span></a>
							</li>
						
						
						
						</ul>
					</div>
				</div>
			</div>