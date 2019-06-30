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
						<a href="<?= base_url('profile') ?>"><i class="ti-user"></i> My Profile</a>
					</li>
					<li>
						<a href="<?= base_url('profile/change_password') ?>"><i class="ti-key"></i> Change Password</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="<?= base_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>

		<ul class="nav" id="side-menu">
			<!-- ADMIN DASHBOARD -->
			<li>
				<a href="<?= base_url('dashboard')?>" class="waves-effect <?= (!empty($page) && $page == 'dashboard')? 'active' : ''; ?>">
					<i class="fa fa-dashboard fa-fw"></i>
					<span class="hide-menu">Dashboard </span>
				</a>
			</li>


			<!-- USER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'user_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'user_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						User Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= base_url('users/add_new')?>" class="<?= (!empty($subpage) && $subpage == 'add_user')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New User</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('users/lists')?>" class="<?= (!empty($subpage) && $subpage == 'userlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Users</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- BAZAR MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'bazar_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'bazar_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Bazar Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= base_url('groups/create') ?>" class="<?= (!empty($subpage) && $subpage == 'createbazar')? 'active' : ''; ?>">
							<span class="hide-menu"> Create New Bazar</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('groups/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'bazarlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Bazars</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- PRODUCT MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'product_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'product_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Product Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'addproduct')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Product</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'productlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Products</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'productlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Product Categories</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'productlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Product Sub Categories</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- SELLER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'service_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'service_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Sellet Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'addservice')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Seller</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'servicelist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Sellers</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'servicelist')? 'active' : ''; ?>">
							<span class="hide-menu">Seller Pending Requests</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'servicelist')? 'active' : ''; ?>">
							<span class="hide-menu">Business Type List</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'servicelist')? 'active' : ''; ?>">
							<span class="hide-menu">Document Type List</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- QUESTION MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'question')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'question')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Question Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= base_url('question/add_new') ?>" class="<?= (!empty($subpage) && $subpage == 'add_question')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Question</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('question/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'question_list')? 'active' : ''; ?>">
							<span class="hide-menu">List of Questions</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- MENU MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'menu_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'menu_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Menu Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= base_url('menus/add_new') ?>" class="<?= (!empty($subpage) && $subpage == 'menu_mgmt_add')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Menu</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('menus/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'menu_mgmt_list')? 'active' : ''; ?>">
							<span class="hide-menu">List of Menus</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- MANAGE LOOKUPS -->
			<li class="<?= (!empty($page) && $page == 'lookups')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'lookups')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Manage Lookups<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= base_url('event_type/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'eventtypes')? 'active' : ''; ?>">
							<span class="hide-menu">Event Types</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('event_size/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'eventsize')? 'active' : ''; ?>">
							<span class="hide-menu">Event Size</span>
						</a>
					</li>
				</ul>
			</li>


			<!-- SETTING -->
			<li class="<?= (!empty($page) && $page == 'setting')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'setting')? 'active' : ''; ?>">
					<i data-icon="P" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Settings <span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'social')? 'active' : ''; ?>">
							<span class="hide-menu">Site Settings</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>