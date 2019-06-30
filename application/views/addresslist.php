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
       <h2 class="btn btn-info pull-right"><a href="<?=base_url('user/addaddress')?>">Add New</a> </h2>
      <div id="content" class="col-sm-9">
         <h2 class="title">My Address List</h2>
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
             

         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <td class="text-center">Sno</td>
                     <td class="text-left">Address</td>
                     <td class="text-left">City</td>
                     <td class="text-center">Region/State</td>
                     <td class="text-center">Country</td>
                     <td class="text-center">Postcode</td>
                     <td class="text-center">Address Type</td>
                     <td class="text-center">Action</td>
                     
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  
                  $c=1;
                  if(!empty($list)){

                     foreach ($list as $key => $car): ?>
                        <tr>
                           <td class="text-center">

                              <?= $c;?>
                           </td>
                           <td class="text-left">
                              <?=$car->address?>
                           </td>
                           <td class="text-left">
                              <?=$car->city?>
                           </td>
                           <td class="text-left">
                              <?=$car->region?>
                           </td>
                           <td class="text-left">
                              <?=$car->country?>
                           </td>

                           <td class="text-left"><?= $car->postcode ?></td>
                            <td class="text-left"><?php if($car->addressType=="0") {  echo "Billing"; } elseif ($car->addressType=="1") { echo "Shipping"; } elseif ($car->addressType=="2"){ echo "Pickup"; } ?></td>
                              
                               <td class="text-center">
                                 <a href="##" class="btn btn-primary" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                 </a>
                                 <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="deletewishlist('<?= $car->contactId ?>');" ><i class="fa fa-times-circle"></i></button></td>
                           </tr>
                           
                        <?php $c++; endforeach ?>
                     <?php } else{ ?>
                        <tr><td colspan="7">No address found in your address book</td></tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>
   </div>
   
</div>
</div>