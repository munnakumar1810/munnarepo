<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> New Account </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?= base_url('login')?>">Account</a></li>
         <li><a href="#">Forget Password</a></li>
      </ul>
   </div>
</div>
<div class="container">
   
   <div class="row">
       <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
        
      </aside>
      <div id="content" class="col-sm-6">
         <h1>Forgot Your Password?</h1>
         <p>Enter the e-mail address associated with your account. Click submit to have a password reset link e-mailed to you.</p>
         <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
               <legend>Your E-Mail Address</legend>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
                  <div class="col-sm-10">
                     <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                  </div>
               </div>
            </fieldset>
            <div class="buttons clearfix">
               <div class="pull-left"><a href="<?= base_url('login')?>" class="btn btn-default">Back</a></div>
               <div class="pull-right">
                  <input type="submit" value="Submit" class="btn btn-primary">
               </div>
            </div>
         </form>
      </div>

      
   </div>
</div>