<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> New Account </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?=base_url('register')?>">Register</a></li>
      </ul>
   </div>
</div>

<!-- login body section start -->
<div class="container">
   <ul class="breadcrumb">
      <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Account</a></li>
      <li><a href="<?=base_url('register')?>">Register</a></li>
   </ul>
   <div class="row">
      <div class="col-sm-2">
         
      </div>
      <div id="content" class="col-sm-8 well">
         <h1>Register Account</h1>
         <p>If you already have an account with us, please login at the <a href="<?=base_url('login')?>">login page</a></p>

         <form action="<?=base_url('register')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
            <fieldset id="account">
               <legend>Your Personal Details</legend>
               <div class="form-group">
                  <label class="col-sm-3 control-label">Have a Referral Code?</label>
                  <div class="col-sm-8">
                       <div class="input-group">
                        <input name="referralid" value="<?php echo set_value('referralid'); ?>" id="referralid" placeholder="Enter code here" class="form-control" type="text">
                        <span class="input-group-btn">
                         <button class="btn btn-success" type="button" onclick="checkRefferal()">Apply</button>
                       </span>
                     </div>
                     <span id="checkresult" class="error"></span>
               </div>
            </div>
            <div class="form-group required">
               <label class="col-sm-3 control-label" for="input-firstname">First Name</label>
               <div class="col-sm-8">
                  <input type="text" name="firstName"
                  value="<?php echo set_value('firstName'); ?>" placeholder="First Name" id="input-firstname" class="form-control">
                  <span class="error"><?php echo form_error('firstName'); ?></span>
               </div>
            </div>
            <div class="form-group required">
               <label class="col-sm-3 control-label" for="input-lastname">Last Name</label>
               <div class="col-sm-8">
                  <input type="text" name="lastName" value="<?php echo set_value('lastName'); ?>" placeholder="Last Name" id="input-lastname" class="form-control">
                  <span class="error"><?php echo form_error('lastName'); ?></span>
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-3 control-label" for="input-email">E-Mail Address</label>
               <div class="col-sm-8">
                  <input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="E-Mail Address" id="input-email" class="form-control">
                  <span class="error"><?php echo form_error('email'); ?></span>
               </div>
            </div>
            <div class="form-group required">
               <label class="col-sm-3 control-label" for="input-telephone">Telephone</label>
               <div class="col-sm-8">
                  <input type="tel" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Telephone" id="input-telephone" class="form-control">
                  <span class="error"><?php echo form_error('mobile'); ?></span>
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>Your Password</legend>
            <div class="form-group required">
               <label class="col-sm-3 control-label" for="input-password">Password</label>
               <div class="col-sm-8">
                  <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                  <span class="error"><?php echo form_error('password'); ?></span>
               </div>
            </div>
            <div class="form-group required">
               <label class="col-sm-3 control-label" for="input-confirm">Password Confirm</label>
               <div class="col-sm-8">
                  <input type="password" name="confirmpassword" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                  <span class="error"><?php echo form_error('confirmpassword'); ?></span>
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>Newsletter</legend>
            <div class="form-group">
               <label class="col-sm-3 control-label">Subscribe</label>
               <div class="col-sm-8">               
                  <label class="radio-inline"><input type="radio" name="newsletter" value="1"> Yes </label>
               <label class="radio-inline"><input type="radio" name="newsletter" value="0" checked="checked">No</label>
            </div>
         </div>
      </fieldset>
      <hr>
      <div class="buttons">
         <div class="pull-left"><input type="checkbox" name="agree" value="1">
            &nbsp; I have read and agree to the <a href="<?=base_url('page/policy')?>" target="_blank" class="agree"><b>Privacy Policy</b></a>
         </div>
         <div class="pull-right">
             <input type="submit" value="Register" class="btn btn-primary">
         </div>
      </div>
   </form>
</div>
<aside class="col-md-2 col-sm-3 col-xs-12 content-aside right_column sidebar-offcanvas">
   
</aside>
</div>
</div>
<!-- login body section end -->
