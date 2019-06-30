
<!-- //Block Spotlight1  -->
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
      <li><a href="javascript:void(0)">Wishlist</a></li>
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
         <h2 class="title">My Wish List</h2>
         <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <td class="text-center">Image</td>
                     <td class="text-left">Product Name</td>
                     <td class="text-left">Model</td>
                     <td class="text-center">Unit Price</td>
                     <td class="text-center">Action</td>
                     
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $subtotal=0;

                  if(!empty($list)){

                     foreach ($list as $key => $car): ?>
                        <tr>
                           <td class="text-center">

                              <?php if (file_exists('./uploads/products/small/'.$car->productImage)) { ?>

                                 <a href="javascript:void(0)"> <img src="<?= base_url('uploads/products/small/').$car->productImage ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>

                              <?php } else { ?>
                                 <a href="javascript:void(0)"> <img src="<?= base_url('assets/images/thumbs.jpg') ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>
                              <?php } ?>
                           </td>
                           <td class="text-left">
                              <a href="<?= base_url()?>product/details/<?=$car->productId?>/<?=$car->url?>"><?=$car->productName?></a>
                           </td>
                           <td class="text-left"><?= $car->sku ?></td>
                           
                              <td class="text-center">Rs. <?=$car->price?></td>
                               <td class="text-center"><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="deletewishlist('<?= $car->wishlistId ?>');" ><i class="fa fa-times-circle"></i></button></td>
                           </tr>
                           <?php @$subtotal=@$totalprice + $subtotal ?>
                        <?php endforeach ?>
                     <?php } else{?>
                        <tr><td colspan="5">No Product found in your Wish list</td></tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>

         </div>

      </div>
   </div>
