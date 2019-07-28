
<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> New Account </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Account</a></li>
         <li><a href="#">Login</a></li>
      </ul>
   </div>
</div>
<div class="container">
   <ul class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Account</a></li>
      <li><a href="javascript:void(0)">Add New Address</a></li>
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
        
         <form action="<?= base_url('user/post')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
               <legend>Address Details</legend>
               <?php if($this->session->flashdata('success_msg')!=''){ ?>
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                        <strong>
                           <?php echo @$this->session->flashdata('success_msg');?>
                        </strong>
                     </div>
                  <?php } ?>
                  <?php if($this->session->flashdata('error')!=''){ ?>
                     <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                        <strong>
                           <?php echo @$this->session->flashdata('error');?>
                        </strong>
                     </div>
                  <?php } ?>
             
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-address1"> Address </label>
                  <div class="col-sm-10">
                     <input type="text" name="address" value="<?=set_value('address') ?>" placeholder="address" id="address" class="form-control">
                     <span class="error"><?php echo form_error('address'); ?></span>

                  </div>
               </div>
              
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-city">City</label>
                  <div class="col-sm-10">
                     <input type="text" name="city" value="<?=set_value('city') ?>" placeholder="City" id="city" class="form-control">
                     <span class="error"><?php echo form_error('city'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                  <div class="col-sm-10">
                     <input type="text" name="postcode" value="<?=set_value('postcode') ?>" placeholder="Postcode" id="postcode" class="form-control">
                     <span class="error"><?php echo form_error('postcode'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-country">Country</label>
                  <div class="col-sm-10">
                     <input type="text" name="country" value="<?=set_value('country') ?>" placeholder="Country" id="country" class="form-control">
                     <span class="error"><?php echo form_error('country'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-region-state">Region/State</label>
                  <div class="col-sm-10">
                     <input type="text" name="region" value="<?=set_value('region') ?>" placeholder="region-state" id="region-state" class="form-control">
                     <span class="error"><?php echo form_error('region'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-region-state">Address Type</label>
                  <div class="col-sm-10">
                     
                     <select name="addressType" class="form-control">
                        <option value="0">Billing</option>
                        <option value="1">Shipping</option>
                        <option value="2">Pickup</option>
                       
                     </select>
                     <span class="error"><?php echo form_error('region'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Default Address</label>
                  <div class="col-sm-10">              
                   <label class="radio-inline">
                     <input type="radio" name="default" value="1">
                  Yes</label>
                  <label class="radio-inline">
                     <input type="radio" name="default" value="0" checked="checked">
                  No</label>
               </div>
            </div>
         </fieldset>
         <div class="buttons clearfix">
            <div class="pull-left"><a href="<?= base_url('user/addresslist')?>" class="btn btn-default">Back</a></div>
            <div class="pull-right">
               <input type="submit" value="Add" class="btn btn-primary">
            </div>
         </div>
      </form>
   </div>
   
</div>
</div>