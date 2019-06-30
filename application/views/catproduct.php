<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Category</div>
      <ul class="breadcrumb-cate">
         <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Product List</a></li>
      </ul>
   </div>
</div>
<!-- Main Container  -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Smartphone & Tablets</a></li>
   </ul>
   <div class="row">
      <!--Left Part Start -->
      <aside class="col-sm-4 col-md-3" id="column-left">
         <div class="module menu-category titleLine">
            <h3 class="modtitle">Categories</h3>
            <div class="modcontent">
               <div class="box-category">
                  <ul id="cat_accordion" class="list-group">
                     <?php foreach ($catList as  $cat) {

                        $subCatList=$this->mymodel->get_by("subcategory",false,"categoryId=$cat->categoryId AND status=1");
                     ?>

                     <li class="hadchild">
                        <a href="javascript:void(0);" class="cutom-parent"><?=$cat->categoryName ?></a> 
                        <?php if(!empty($subCatList)){ ?>
                                 <span class="button-view  fa fa-plus-square-o"></span>
                                    <?php } ?>
                          <?php if(!empty($subCatList)){ ?>
                        <ul style="display: block;">
                            <?php foreach ($subCatList as $sub) {?>
                           <li><a href="<?=base_url()?>product/catproduct/<?=$sub->subcategoryId?>/<?= $sub->subcategoryName?>" class="main-menu"><?= $sub->subcategoryName?></a></li>
                        <?php }?>
                           
                        </ul>
                     <?php }?>
                     </li>
                     <?php }?>
                     
                  </ul>
               </div>
            </div>
         </div>
         <div class="module latest-product titleLine">
            <h3 class="modtitle">Latest Product</h3>
            <div class="modcontent ">
               <?php foreach ($latestProduct as $lat) { 

                                 $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$lat->productId."'",1);
                                 ?>
               <div class="product-latest-item">
                  <div class="media">
                     <div class="media-left">
                         <?php 
                                             $c=-1;
                                             foreach ($imgslist as $key => $pic): ?>
                                                <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                                                   <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="img-responsive" alt="" style="width: 100px; height: 82px;">

                                                <?php } else { ?>
                                                   <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="" style="width: 100px; height: 82px;">

                                                <?php } ?>
                                                <?php $c++; endforeach ?>
                     </div>
                     <div class="media-body">
                        <div class="caption">
                           <h4><a href="<?= base_url()?>product/details/<?=$lat->productId?>/<?=$lat->url?>"><?=$lat->productName?></a></h4>
                           <div class="price">
                              <span class="price-new">Rs.  <?php  if(!empty($lat->discountText)) { echo $lat->discountText;}?></span>
                           </div>
                           <div class="ratings">
                              <div class="rating-box">
                                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                 <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="module">
            <div class="modcontent clearfix">
               <div class="banners">
                  <div>
                     <a href="#"><img src="<?= base_url()?>frontend/image/demo/cms/left-image-static.png" alt="left-image"></a>
                  </div>
               </div>
            </div>
         </div>
      </aside>
      <!--Left Part End -->
      <!--Middle Part Start-->
      <div id="content" class="col-md-9 col-sm-8">
         <div class="products-category">
            <div class="category-derc">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="banners">
                        <div>
                           <a  href="#"><img src="<?= base_url()?>frontend/image/demo/shop/category/electronic-cat.png" alt="Apple Cinema 30&quot;"><br></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Filters -->
            <div class="product-filter filters-panel">
               <div class="row">
                  <div class="col-md-2 visible-lg">
                     <div class="view-mode">
                        <div class="list-view">
                           <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                           <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="short-by-show form-inline text-right col-md-7 col-sm-8 col-xs-12">
                     <div class="form-group short-by">
                        <label class="control-label" for="input-sort">Sort By:</label>
                        <select id="input-sort" class="form-control"
                        onchange="location = this.value;">
                        <option value="" selected="selected">Default</option>
                        <option value="">Name (A - Z)</option>
                        <option value="">Name (Z - A)</option>
                        <option value="">Price (Low &gt; High)</option>
                        <option value="">Price (High &gt; Low)</option>
                        <option value="">Rating (Highest)</option>
                        <option value="">Rating (Lowest)</option>
                        <option value="">Model (A - Z)</option>
                        <option value="">Model (Z - A)</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="input-limit">Show:</label>
                     <select id="input-limit" class="form-control" onchange="location = this.value;">
                        <option value="" selected="selected">9</option>
                        <option value="">25</option>
                        <option value="">50</option>
                        <option value="">75</option>
                        <option value="">100</option>
                     </select>
                  </div>
               </div>
               <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                  <ul class="pagination">
                     <li class="active"><span>1</span></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">&gt;</a></li>
                     <li><a href="#">&gt;|</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- //end Filters -->
         <!--changed listings-->
         <div class="products-list row grid">
            <?php 
            if(!empty($listProduct))
            {
               foreach ($listProduct as $pro) {
                  
                  $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$pro->productId."'",2);

                  ?>
                  <div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
               <div class="product-item-container">
                  <div class="left-block">
            <div class="product-image-container lazy second_img  lazy-loaded">
              <?php 
                        $c=-1;
                        foreach ($imgslist as  $pic): ?>
                           <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                              <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?> img-responsive" alt="">

                           <?php } else { ?>
                              <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="">

                           <?php } ?>
                           <?php $c++; endforeach ?>
            </div>
            <!--Sale Label-->
            <span class="label label-sale">Sale</span>
            
          </div>
                  <div class="right-block">
                     <div class="caption">
                        <h4><a href="<?= base_url()?>product/details/<?=$pro->productId?>/<?=$pro->url?>"><?=$pro->productName?></a></h4>
                        <div class="ratings">
                           <div class="rating-box">
                              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                              <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                              <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                           </div>
                        </div>
                        <div class="price">
                           <span class="price-new">Rs. <?=$pro->price?></span> 
                <span class="price-old">Rs. <?=$pro->maxPrice?></span>           
                <span class="label label-percent"><?php  if(!empty($pro->discountText)) { echo $pro->discountText;}?></span> 
                        </div>
                        <div class="description item-desc hidden">
                           <p><?php echo strip_tags(html_entity_decode(substr("$pro->description",0,550))); ?> </p>
                        </div>
                     </div>
                     <div class="button-group">
                        <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="addcart('<?= $pro->productId ?>','<?=$pro->productName?>');" ><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
                        <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="addwishlist('<?= $pro->productId ?>');"><i class="fa fa-heart"></i></button>
                        <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                     </div>
                  </div>
                  <!-- right block -->
               </div>
            </div>
            <div class="clearfix visible-xs-block"></div>
                 
          <?php  } } else{ ?>
            <p>No Products Found!</p>

            <?php } ?>
            
           
           
         </div>
         <!--// End Changed listings-->
         <!-- Filters -->
         <div class="product-filter product-filter-bottom filters-panel" >
            <div class="row">
               <div class="col-md-2 hidden-sm hidden-xs">
               </div>
               <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                  <div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
               </div>
               <div class="box-pagination col-md-3 col-sm-4 text-right">
                  <ul class="pagination">
                     <li class="active"><span>1</span></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">&gt;</a></li>
                     <li><a href="#">&gt;|</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- //end Filters -->
      </div>
   </div>
</div>
<!--Middle Part End-->
</div>