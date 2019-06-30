<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav slimscrollsidebar">
		<div class="sidebar-head">
			<h3>
				<span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span>
				<span class="hide-menu">Navigation</span>
			</h3>
		</div>

		<!-- ADMIN PROFILE -->
		<div class="user-profile">
			<div class="dropdown user-pro-body">
				<div>
					<img src="<?= base_url('dist/images/users/') ?>user.png" alt="user-img" class="img-circle">
				</div>

				<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					System Admin <span class="caret"></span>
				</a>
					
				<ul class="dropdown-menu animated flipInY">
					<li>
						<a href="<?= seller_url('profile') ?>"><i class="ti-user"></i> My Profile</a>
					</li>
					<li>
						<a href="<?= seller_url('change_password') ?>"><i class="ti-key"></i> Change Password</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="<?= seller_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>

		<ul class="nav" id="side-menu">
			<!-- ADMIN DASHBOARD -->
			<li>
				<a href="<?= seller_url('dashboard')?>" class="waves-effect <?= (!empty($page) && $page == 'dashboard')? 'active' : ''; ?>">
					<i class="fa fa-dashboard fa-fw"></i>
					<span class="hide-menu">Dashboard </span>
				</a>
			</li>
			

			<!-- ORDER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'order')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'order')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Order Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<!-- <li>
						<a href="<?= seller_url('order/add') ?>" class="<?= (!empty($subpage) && $subpage == 'orderadd')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Order</span>
						</a>
					</li> -->
					<li>
						<a href="<?= seller_url('order/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'orderlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Orders</span>
						</a>
					</li>
					<!-- <li>
						<a href="<?= seller_url('order/pending_request') ?>" class="<?= (!empty($subpage) && $subpage == 'orderrequest')? 'active' : ''; ?>">
							<span class="hide-menu">Order Account Requests</span>
						</a>
					</li> -->
				</ul>
			</li>
		</ul>
	</div>
</div>