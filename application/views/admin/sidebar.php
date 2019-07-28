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
						<a href="<?= admin_url('change_password') ?>"><i class="ti-key"></i> Change Password</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="<?= admin_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<ul class="nav" id="side-menu">
			<!-- ADMIN DASHBOARD -->
			<li>
				<a href="<?= admin_url('dashboard')?>" class="waves-effect <?= (!empty($page) && $page == 'dashboard')? 'active' : ''; ?>">
					<i class="fa fa-dashboard fa-fw"></i>
					<span class="hide-menu">Dashboard </span>
				</a>
			</li>

			<!-- BANNER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'banner')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'banner')? 'active' : ''; ?>">
					<i class="fa fa-picture-o fa-fw"></i>
					<span class="hide-menu">
						Banner Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('banner/add') ?>" class="<?= (!empty($subpage) && $subpage == 'banneradd')? 'active' : ''; ?>">
							<span class="hide-menu">Add New Banner</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('banner/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'bannerlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Banners</span>
						</a>
					</li>
					
				</ul>
			</li>
			<!-- COLLECTION MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'collection')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'collection')? 'active' : ''; ?>">
					<i class="fa fa-picture-o fa-fw"></i>
					<span class="hide-menu">
						Collection Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('collection/add') ?>" class="<?= (!empty($subpage) && $subpage == 'collectionadd')? 'active' : ''; ?>">
							<span class="hide-menu">Add New Collection Banner</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('collection/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'collectionlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Collection Banners</span>
						</a>
					</li>
					
				</ul>
			</li>
			<!-- GALLERY MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'gallery')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'gallery')? 'active' : ''; ?>">
					<i class="fa fa-picture-o fa-fw"></i>
					<span class="hide-menu">
						Images Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('gallery/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'gallerylist')? 'active' : ''; ?>">
							<span class="hide-menu">Below of Banners</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('gallery/weeklylists') ?>" class="<?= (!empty($subpage) && $subpage == 'weeklylists')? 'active' : ''; ?>">
							<span class="hide-menu">Beside of Weekly Deal</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('gallery/featuredlists') ?>" class="<?= (!empty($subpage) && $subpage == 'featuredlists')? 'active' : ''; ?>">
							<span class="hide-menu">Above Featured Products</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('gallery/newlists') ?>" class="<?= (!empty($subpage) && $subpage == 'newlists')? 'active' : ''; ?>">
							<span class="hide-menu">Above New Products</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- CMS MANAGEMENT -->
			<li>
				<a href="<?= admin_url('cms/lists')?>" class="waves-effect <?= (!empty($page) && $page == 'cms')? 'active' : ''; ?>">
					<i class="fa fa-pencil-square-o fa-fw"></i>
					<span class="hide-menu">CMS Management </span>
				</a>
			</li>

			<!-- ENQUIRY MANAGEMENT -->
			<li>
				<a href="<?= admin_url('enquiry/lists')?>" class="waves-effect <?= (!empty($page) && $page == 'enquiry')? 'active' : ''; ?>">
					<i data-icon="V" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">Enquiry Management </span>
				</a>
			</li>

			<!-- ENQUIRY MANAGEMENT -->
			<li>
				<a href="<?= admin_url('newsletter/lists')?>" class="waves-effect <?= (!empty($page) && $page == 'newsletter')? 'active' : ''; ?>">
					<i class="fa fa-envelope-o fa-fw"></i>
					<span class="hide-menu">Newsletter Management </span>
				</a>
			</li>

			<!-- USER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'users')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'users')? 'active' : ''; ?>">
					<i class="fa fa-users"></i>
					<span class="hide-menu">
						User Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('users/add') ?>" class="<?= (!empty($subpage) && $subpage == 'useradd')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New User</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('users/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'userlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Users</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- SELLER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'seller')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'seller')? 'active' : ''; ?>">
					<i class="fa fa-sliders"></i>
					<span class="hide-menu">
						Seller Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('seller/add') ?>" class="<?= (!empty($subpage) && $subpage == 'selleradd')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Seller</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('seller/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'sellerlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Sellers</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('seller/pending_request') ?>" class="<?= (!empty($subpage) && $subpage == 'sellerrequest')? 'active' : ''; ?>">
							<span class="hide-menu">Seller Account Requests</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ORDER MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'order')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'order')? 'active' : ''; ?>">
					<i class="fa fa-binoculars"></i>
					<span class="hide-menu">
						Order Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<!-- <li>
						<a href="<?= admin_url('order/add') ?>" class="<?= (!empty($subpage) && $subpage == 'orderadd')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Order</span>
						</a>
					</li> -->
					<li>
						<a href="<?= admin_url('order/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'orderlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Orders</span>
						</a>
					</li>
					<!-- <li>
						<a href="<?= admin_url('order/pending_request') ?>" class="<?= (!empty($subpage) && $subpage == 'orderrequest')? 'active' : ''; ?>">
							<span class="hide-menu">Order Account Requests</span>
						</a>
					</li> -->
				</ul>
			</li>

			<!-- ESHOP MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'eshop')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'eshop')? 'active' : ''; ?>">
					<i class="fa fa-shopping-bag"></i>
					<span class="hide-menu">
						E-Shop Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('eshop/add') ?>" class="<?= (!empty($subpage) && $subpage == 'eshopadd')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New E-Shop</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('eshop/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'eshoplist')? 'active' : ''; ?>">
							<span class="hide-menu">List of E-Shops</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- PRODUCT MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'products')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'products')? 'active' : ''; ?>">
					<i class="fa fa-product-hunt"></i>
					<span class="hide-menu">
						Product Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('products/add') ?>" class="<?= (!empty($subpage) && $subpage == 'addproduct')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Product</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('products/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'productlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Products</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('category/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'categorylist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Product Categories</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('subcategory/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'subcategorylist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Product Sub Categories</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- MENU MANAGEMENT -->
			<!-- <li class="<?= (!empty($page) && $page == 'menu_mgmt')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'menu_mgmt')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Menu Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('menus/add_new') ?>" class="<?= (!empty($subpage) && $subpage == 'menu_mgmt_add')? 'active' : ''; ?>">
							<span class="hide-menu"> Add New Menu</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('menus/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'menu_mgmt_list')? 'active' : ''; ?>">
							<span class="hide-menu">List of Menus</span>
						</a>
					</li>
				</ul>
			</li> -->

			<!-- ADMIN MANAGEMENT -->
			<li class="<?= (!empty($page) && $page == 'admin')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'admin')? 'active' : ''; ?>">
					<i class="fa fa-archive"></i>
					<span class="hide-menu">
						Admin Management<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'add_admin')? 'active' : ''; ?>">
							<span class="hide-menu"> Create a Admin</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="<?= (!empty($subpage) && $subpage == 'adminlist')? 'active' : ''; ?>">
							<span class="hide-menu">List of Admin</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- MANAGE LOOKUPS -->
			<!-- <li class="<?= (!empty($page) && $page == 'lookups')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'lookups')? 'active' : ''; ?>">
					<i data-icon="/" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Manage Lookups<span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('event_type/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'eventtypes')? 'active' : ''; ?>">
							<span class="hide-menu">Event Types</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('event_size/lists') ?>" class="<?= (!empty($subpage) && $subpage == 'eventsize')? 'active' : ''; ?>">
							<span class="hide-menu">Event Size</span>
						</a>
					</li>
				</ul>
			</li> -->

			<!-- SETTING -->
			<li class="<?= (!empty($page) && $page == 'settings')? 'active' : ''; ?>">
				<a href="javascript:void(0);" class="waves-effect <?= (!empty($page) && $page == 'settings')? 'active' : ''; ?>">
					<i data-icon="P" class="linea-icon linea-basic fa-fw"></i>
					<span class="hide-menu">
						Settings <span class="fa arrow"></span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?= admin_url('settings/site_settings') ?>" class="<?= (!empty($subpage) && $subpage == 'site_settings')? 'active' : ''; ?>">
							<span class="hide-menu">Site Settings</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('settings/commission') ?>" class="<?= (!empty($subpage) && $subpage == 'commission_settings')? 'active' : ''; ?>">
							<span class="hide-menu">Commission Settings</span>
						</a>
					</li>
					<li>
						<a href="<?= admin_url('settings/logo') ?>" class="<?= (!empty($subpage) && $subpage == 'logo_settings')? 'active' : ''; ?>">
							<span class="hide-menu">Logo Settings</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>