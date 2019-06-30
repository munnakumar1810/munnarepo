
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
      <li><a href="javascript:void(0)">Edit Account</a></li>
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

         <form action="<?= base_url('user/save') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

            <fieldset>
               <legend>Add New Product</legend>
               

               <div class="form-group required">
                  <label class="col-sm-3 control-label">Product Name:</label>
                  <div class="col-sm-9">
                     <input type="text" name="productname" value="" placeholder="Product Name" id="autoGenerateUrl" class="form-control" autocomplete="off" required="">

                     <input type="hidden" name="url" id="autoFillUrl" value="">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">Product Category</label>
                  <div class="col-sm-9">
                     <select class="form-control select2" name="category" id="category" onchange="subCategoryListing($(this).val());" required="">

                        <option value="">Select Category</option>

                        <?php if (count($categoryList) > 0): ?>

                           <?php foreach ($categoryList as $key => $v): ?>

                              <option value="<?= $v->categoryId ?>">

                                 <?= $v->categoryName ?>

                              </option>

                           <?php endforeach ?>

                        <?php endif ?>

                     </select>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">Product Sub Category</label>
                  <div class="col-sm-9">
                     <select class="form-control select2" id="subCategory" name="subcategory" required="">

                        <option value="">Select Sub Category</option>

                     </select>
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label" for="input-email">Description</label>
                  <div class="col-sm-9">
                     <textarea class="summernote" name="desc" style="width:100%; !important;"></textarea>

                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label">SKU</label>
                  <div class="col-sm-9">
                     <input type="text" name="sku" placeholder="SKU" class="form-control" autocomplete="off">


                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label">Price ($)</label>
                  <div class="col-sm-9">
                     <input type="text" name="price" placeholder="46.00" class="form-control" autocomplete="off">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-3 control-label">Max. Price ($)</label>
                  <div class="col-sm-9">
                   <input type="text" name="maxprice" placeholder="50.00" class="form-control" autocomplete="off">

                </div>
             </div>
             <div class="form-group required">
               <label class="col-sm-3 control-label">Discount Text</label>
               <div class="col-sm-9">
                <input type="text" name="discount" placeholder="For e.g. - 20% off" class="form-control" autocomplete="off">
             </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-3 control-label">Stock</label>
            <div class="col-sm-9">
             <input type="text" name="stock" placeholder="10" class="form-control" autocomplete="off">
          </div>
       </div>
       <div class="form-group required">
         <label class="col-sm-3 control-label">Stock Availability</label>
         <div class="col-sm-9">
          <select class="form-control select2" name="stockavailability" required="">

            <option value="">Choose</option>

            <option value="1">Available</option>

            <option value="0">Not Available</option>

         </select>

      </div>
   </div>
   <div class="form-group required">
      <label class="col-sm-3 control-label">Status</label>
      <div class="col-sm-9">
       <select class="form-control select2" name="status" required="">

         <option value="*">Choose</option>

         <option value="1">Enabled</option>

         <option value="0">Disabled</option>

      </select>
   </div>
</div>

<div class="form-group required">
   <label class="col-sm-3 control-label">Product Image</label>
   <div class="col-sm-9">


      <div id="image-group">

         <div class="fileinput fileinput-new" data-provides="fileinput">

           <!--  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

               <img src="<?= base_url('dist/images/noimage.jpg') ?>" alt="" id="output">

            </div>
 -->
            <!-- <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div> -->
              <span class="btn btn-default btn-file">

                                       

                                       <input type="file" name="images[]" accept="images/*" required="">

                                    </span>

                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>

            <div>
               <div class="clearfix margin-top-10 m-b-20" style="display: block;">

                  <span class="label label-danger">Format</span> 

                  jpg, jpeg, png, gif
               </div>
               <div class="input-imgs">
                  
                

               </div>
            </div>

         </div>

      </div>
   </div>
</div>

</fieldset>
<div class="buttons clearfix">

   <div class="pull-right">
      <input type="submit" value="Add" class="btn btn-primary">
   </div>
</div>
</form>
</div>

</div>
</div>
