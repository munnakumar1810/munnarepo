
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
      <li><a href="javascript:void(0)">Edit Address</a></li>
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
        
         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
               <legend>Your Personal Details</legend>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                  <div class="col-sm-10">
                     <input type="text" name="name" value="" placeholder="First Name" id="first-name" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                  <div class="col-sm-10">
                     <input type="text" name="name" value="" placeholder="Last Name" id="last-name" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-company">Company</label>
                  <div class="col-sm-10">
                     <input type="text" name="company" value="" placeholder="Company Name" id="company-name" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-address1"> Address 1</label>
                  <div class="col-sm-10">
                     <input type="text" name="address1" value="" placeholder="address1" id="address1" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-address2">Last Address2</label>
                  <div class="col-sm-10">
                     <input type="text" name="address1" value="" placeholder="address2" id="address1" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-city">City</label>
                  <div class="col-sm-10">
                     <input type="text" name="city" value="" placeholder="city" id="city" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                  <div class="col-sm-10">
                     <input type="text" name="postcode" value="" placeholder="postcode" id="postcode" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-country">Country</label>
                  <div class="col-sm-10">
                     <input type="text" name="country" value="" placeholder="postcode" id="country" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-region-state">Region/State</label>
                  <div class="col-sm-10">
                     <input type="text" name="region-state" value="" placeholder="region-state" id="region-state" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Default Address</label>
                  <div class="col-sm-10">               <label class="radio-inline">
                     <input type="radio" name="default" value="1">
                  Yes</label>
                  <label class="radio-inline">
                     <input type="radio" name="default" value="0" checked="checked">
                  No</label>
               </div>
            </div>
         </fieldset>
         <div class="buttons clearfix">
            <div class="pull-left"><a href="javascript:void(0)" class="btn btn-default">Back</a></div>
            <div class="pull-right">
               <input type="submit" value="Continue" class="btn btn-primary">
            </div>
         </div>
      </form>
   </div>
   
</div>
</div>