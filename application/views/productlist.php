
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
      <li><a href="javascript:void(0)">Productlist</a></li>
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
         <h2 class="title">My Product List</h2>
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead>
                  <tr>

                     <td>Image</td>

                     <td>Product Name</td>

                     
                     <td>SKU</td>

                     <td>Stock</td>

                     <td>Price</td>

                     <td>Category</td>

                     <td>Status</td>

                     <td class="text-center">Action</td>

                  </tr>
               </thead>
               <tbody>
                  <?php foreach (@$list as $key => $v): ?>

                     <tr>

                        <td>

                           <?php if (file_exists('./uploads/products/thumbs/'.$v->productImage)) { ?>

                              <img src="<?= base_url('uploads/products/thumbs/').$v->productImage ?>" class="img-responsive product-list-thumb-image" alt="">

                           <?php } else { ?>

                              <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive product-list-thumb-image" alt="">

                           <?php } ?>

                        </td>

                        <td><?= $v->productName ?></td>

                        
                        <td><?= $v->sku ?></td>

                        <td><?= $v->stock ?></td>

                        <td>

                           <?php if ($v->maxPrice != '' || $v->maxPrice != null): ?>

                              <span class="strike text-danger">$ <?= $v->maxPrice ?></span>&nbsp; 

                           <?php endif ?>

                           <span class="text-success">$ <?= $v->price ?></span>

                        </td>

                        <td>

                           <?= $v->categoryName ?>

                        </td>

                        <td>

                           <select name="status" class="form-control" onchange="changeProductStatus(<?= $v->productId ?>, $(this).val());">

                              <option value="1" <?= ($v->status == '1')? 'selected' : ''; ?>>

                                 Active

                              </option>

                              <option value="0" <?= ($v->status == '0')? 'selected' : ''; ?>>

                                 Deactive

                              </option>

                           </select>

                        </td>

                        <td>
                           

                           <a  class="btn btn-primary" href="<?= 'javascript:void(0);'//base_url('products/edit/'.$v->productId) ?>" data-toggle="tooltip" href="" data-original-title="Edit">

                              <i class="fa fa-pencil"></i>

                           </a>
                           <a class="btn btn-danger"  data-toggle="tooltip" href="" data-original-title="Remove"><i class="fa fa-times"></i></a>

                        </td>

                     </tr>

                  <?php endforeach ?>
               </tr>

            </tbody>
         </table>
      </div>

   </div>

</div>
</div>