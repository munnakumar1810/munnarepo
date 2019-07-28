<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> New Account </div>
      <ul class="breadcrumb-cate">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Account</a></li>
         
      </ul>
   </div>
</div>
<div class="container">
   <ul class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Account</a></li>
      <li><a href="javascript:void(0)">Edit Password</a></li>
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
         
         <form action="<?= base_url('user/upadtepass') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
            
            <fieldset>
               <legend>Change Password</legend>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">Current Password</label>
                  <div class="col-sm-9">
                     <input type="password" name="oldpassword"  placeholder="Current Password"  class="form-control">
                     <span class="error"><?php echo form_error('oldpassword'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">New Password</label>
                  <div class="col-sm-9">
                     <input type="password" name="newpassword"  placeholder="New Password"  class="form-control">
                     <span class="error"><?php echo form_error('newpassword'); ?></span>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">Confirm New Password</label>
                  <div class="col-sm-9">
                     <input type="password" name="confirmpassword"  placeholder="Confirm New Password"  class="form-control">
                     <span class="error"><?php echo form_error('confirmpassword'); ?></span>
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