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
						<a href="<?= admin_url('profile') ?>"><i class="ti-user"></i> My Profile</a>
					</li>
					<li>
						<a href="<?= admin_url('profile/change_password') ?>"><i class="ti-key"></i> Change Password</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="<?= admin_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>

			<?= $this->menu->dynamicMenu() ?>
	</div>
</div>