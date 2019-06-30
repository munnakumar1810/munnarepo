
<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> New Account </div>
      <ul class="breadcrumb-cate">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Account</a></li>
         <li><a href="#">Login</a></li>
      </ul>
   </div>
</div>
<div class="container">
   <ul class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Account</a></li>
      <li><a href="javascript:void(0)">Reward Payment</a></li>
   </ul>
   <div class="row">
      <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
         <div class="module">
            <h3 class="modtitle"><span>MY ACCOUNT INFORMATION</span></h3>
            <div class="module-content custom-border">
               <ul class="list-box list-unstyled">
                     <li><a href="<?=base_url('user')?>">My Account </a></li>
                     <?php if($this->session->userdata('type')=="2"){?>
                        <li><a href="<?=base_url('user/add')?>">Add Product </a></li>
                        <li><a href="<?=base_url('user/list')?>">Product List </a></li>
                     <?php }?>
                     <li><a href="<?=base_url('user/wishlist')?>">My Wishlist </a></li>
                     <li><a href="<?=base_url('user/orderhistory')?>">My Order History </a></li>
                     <li><a href="<?=base_url('user/pointlist')?>">Reward Points </a></li>
                     <li><a href="<?=base_url('user/transhistory')?>">Transactions </a></li>
                      <li><a href="<?=base_url('user/addresslist')?>">Address Book </a></li>
                     <li><a href="<?=base_url('user/changepass')?>">Change Password </a></li>
                     <li><a href="<?=base_url('login/logout')?>">Log Out</a></li>

                     
                  </ul>
            </div>
         </div>
      </aside>
      <div id="content" class="col-sm-9">
         <h2>Your Reward Points</h2>
         <p>Total <b>0</b>.</p>
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>
                     <td class="text-left">Date Added</td>
                     <td class="text-left">Description</td>
                     <td class="text-right">Points</td>
                  </tr>
               </thead>
               <tbody>

                  <tr>
                     <td class="text-center" colspan="3">You do not have any reward points!</td>
                  </tr>
               </tbody>

            </table>
         </div>
         <div class="row">
            <div class="col-sm-6 text-left"></div>
            <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
         </div>
         <div class="buttons clearfix">
            <div class="pull-right"><a href="javascript:void(0)" class="btn btn-primary">Continue</a></div>
         </div>
      </div>
      
   </div>
</div>