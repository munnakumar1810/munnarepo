
<!-- //Block Spotlight1  -->
<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> MY ACCOUNT </div>
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
      <li><a href="<?=base_url('user/editprofile')?>")">Edit Account</a></li>
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
                     <li><a href="<?=base_url('user/addresslist')?>">Address Book </a></li>
                     <li><a href="<?=base_url('user/changepass')?>">Change Password </a></li>
                     <li><a href="<?=base_url('login/logout')?>">Log Out</a></li>

                     
                  </ul>
            </div>
         </div>
      </aside>
      <div id="content" class="col-sm-9">
         
         <form action="<?=base_url('user/editprofile')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
               <legend>Edit Personal Details</legend>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-email">FIrst Name</label>
                  <div class="col-sm-10">
                     <input type="text" name="firstName" value="<?=$profile->firstName?>"  class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-email">Last Name</label>
                  <div class="col-sm-10">
                     <input type="text" name="lastName" value="<?=$profile->lastName?>"  class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-email">E-mail Address</label>
                  <div class="col-sm-10">
                     <input type="email" disabled="" readonly="" name="email" value="<?=$profile->email?>" id="email-address" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-email">Telephone</label>
                  <div class="col-sm-10">
                     <input type="text" name="mobile"  value="<?=$profile->mobile?>" placeholder="Telephone" id="telephone" class="form-control">
                  </div>
               </div>
            </fieldset>
            <div class="buttons clearfix">
               
               <div class="pull-right">
                  <input type="submit" value="Update" class="btn btn-primary">
               </div>
            </div>
         </form>
      </div>
     
   </div>
</div>
