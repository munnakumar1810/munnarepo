<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Place Order </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?=base_url('user')?>">Account</a></li>

      </ul>
   </div>
</div>


<div class="container">

   <div class="row">
      <div id="content" class="col-sm-9 col-sm-offset-2 account-login">
         <div class="row">
            <?php if($this->session->flashdata('checkoutsuccess')){ ?>
               <div class="alert alert-success">
                  <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('checkoutsuccess'); ?>
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
            <div class="col-sm-12">
               <div class="well ">
                  <h2>Your order is not palaced.</h2>
                  
               </div>
            </div>

         </div>
      </div>

   </div>
</div>
