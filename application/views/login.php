<!-- //Block Spotlight1  -->
<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Login </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Account</a></li>
         <li><a href="<?=base_url('login')?>">Login</a></li>
      </ul>
   </div>
</div>

<!-- login body section start -->
<div class="container">

<div class="row">
   <div id="content" class="col-sm-10 col-sm-offset-1 account-login">
      <div class="row">
         <div class="col-sm-6">
            <div class="well ">
               <h2>New Customer</h2>
               <p><strong>Register</strong></p>
               <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
               <a href="<?=base_url('register')?>" class="btn btn-primary">Register</a></div>
            </div>
            <div class="col-sm-6">

               <div class="well col-sm-12"> 
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


                  <h2>Returning Customer</h2>
                  <p><strong>I am a returning customer</strong></p>
                  <form action="<?=base_url('login')?>" method="post" enctype="multipart/form-data">
                     <?php if (!empty($msg)): ?>
                        <?= $msg ?>
                     <?php endif ?>
                     <div class="form-group required">
                        <label class="control-label" for="input-email">E-Mail Address</label>
                        <input type="email" name="email" value="<?php echo set_value('email') ?>" placeholder="E-Mail Address"  class="form-control">
                     </div>
                     <div class="form-group required">
                        <label class="control-label" for="input-password">Password</label>
                        <input type="password" name="password" value="" placeholder="Password" class="form-control">
                        <a href="<?=base_url('login/forgetpass')?>">Forgotten Password</a></div>
                        <input type="submit" value="Login" class="btn btn-primary pull-left"> 

                     </form>



                     <column id="column-login" class="col-sm-8 pull-right"> 
                        <div class="row"> 
                           <div class="social_login pull-right" id="so_sociallogin"> 

                              <!-- <a href="javascript:void(0)" class="btn btn-social-icon btn-sm btn-facebook"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a> 


                              <a href="javascript:void(0)" class="btn btn-social-icon btn-sm btn-twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a> 

                              <a href="javascript:void(0)" class="btn btn-social-icon btn-sm btn-google-plus"><i class="fa fa-google fa-fw" aria-hidden="true"></i></a> 

                              <a href="javascript:void(0)" class="btn btn-social-icon btn-sm btn-linkdin"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>  -->



                           </div> 
                        </div> 
                     </column> 



                  </div>
               </div>
            </div>
         </div>
       
      </div>
   </div>
   <!-- login body section end -->
