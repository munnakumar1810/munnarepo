   <div class="clearfix"></div>
   <div class="innerpage-ban">
      <div class="container">
         <div class="title-breadcrumb">My Account </div>
         <ul class="breadcrumb-cate">
            <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?=base_url('user')?>">Account</a></li>

         </ul>
      </div>
   </div>
   <div class="container">
      <ul class="breadcrumb">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?=base_url('user')?>">Account</a></li>

      </ul>
      <div class="row">
         <aside class="col-md-3 col-sm-3 col-xs-12 content-aside right_column sidebar-offcanvas">
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
                     <li><a href="<?=base_url('user/addresslist')?>">Address Book </a></li>
                     <li><a href="<?=base_url('user/changepass')?>">Change Password </a></li>
                     <li><a href="<?=base_url('login/logout')?>">Log Out</a></li>
                     

                  </ul>
               </div>
            </div>
         </aside>
         <div id="content" class="col-md-9 col-sm-9 col-xs-12 content-aside my-dashboard">
            <?php if($this->session->flashdata('success')){ ?>
                  <div class="alert alert-success">
                     <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                     <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                  </div>
               <?php }else if($this->session->flashdata('error')){  ?>
                  <div class="alert alert-danger">
                     <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                     <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                  </div>
               <?php }else if($this->session->flashdata('warning')){  ?>
                  <div class="alert alert-warning">
                     <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                     <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
                  </div>
               <?php }else if($this->session->flashdata('info')){  ?>
                  <div class="alert alert-info">
                     <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                     <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                  </div>
               <?php } ?>
            <div class="module">
               <h2 class="modtitle">My Dashboard</h2>
            
            <div class="welcome-msg" style="margin: 15px;">
               

               <p class="hello">
                  <strong>Hello, <?=$profile->firstName?>  <?=$profile->lastName?>!</strong>
               </p>
               <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
            </div>
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <td class="text-left"><p class="pull-left">Contact Information</p>
                           <a href="<?=base_url('user/editprofile')?>" class="pull-right">Edit</a>
                        </td>
                        <td class="text-left"><p class="pull-left">Newsletters</p>
                           <a href="javascript:void(0)" class="pull-right">Edit</a>
                        </td>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td style="width: 50%;" class="text-left"> <b>Name:</b> <?=$profile->firstName?>  <?=$profile->lastName?>
                        <br>
                        <b>Email-Id:</b> <?=$profile->email?>
                        <br>
                        <b>Mobile:</b> <?=$profile->mobile?>
                        
                     </td>
                     <td style="width: 50%;" class="text-left">
                        <b>Subscribed:</b> You are currently subscribed to 'General Subscription
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>
                     <td colspan="2" style="width: 50%; vertical-align: top;" class="text-left">
                        <p class="pull-left">Address Book</p>
                        <a href="<?=base_url('user/addresslist')?>" class="pull-right">Manage Address</a>
                     </td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="text-left">
                        <fieldset>
                           <legend>Default Billing Address</legend>
                           <?= @$billing->address ?>
                        <br><?= @$billing->city ?>
                        - <?= @$billing->postcode ?>
                        <br><?= @$billing->region ?>
                        <?= @$billing->country ?>
                        </fieldset>
                        
                     </td>
                     <td class="text-left">
                        <fieldset>
                           <legend>Default Shipping Address</legend>
                          <?= @$shipping->address ?>
                        <br><?= @$shipping->city ?>
                        - <?= @$shipping->postcode ?>
                        <br><?= @$shipping->region ?>
                        <?= @$shipping->country ?>
                        </fieldset>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
</div>


      </div>

   </div>
</div>
<!-- login body section end -->
