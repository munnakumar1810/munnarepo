<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Search </div>
      <ul class="breadcrumb-cate">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Search</a></li>
      </ul>
   </div>
</div>
<!-- Search body section start -->
<div class="container">
   <div class="row">
      <div id="content" class="col-sm-12">
         
         <div class="product-filter filters-panel">
            <div class="row">
               <div class="col-sm-2 view-mode hidden-sm hidden-xs">
                  <div class="list-view">
                     <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" data-original-title="Grid"><i class="fa fa-th"></i></button>
                     <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                  </div>
               </div>
               <div class="short-by-show form-inline text-right col-md-10 col-sm-12">
                  <div class="form-group short-by">
                     <label class="control-label" for="input-sort">Sort By:</label>
                     <select id="input-sort" class="form-control sel-sercat">
                        <option value="javascript:void(0)">Default</option>
                        <option value="javascript:void(0)" selected="selected">Name (A - Z)</option>
                        <option value="javascript:void(0)">Name (Z - A)</option>
                        <option value="javascript:void(0)">Price (Low &gt; High)</option>
                        <option value="javascript:void(0)">Price (High &gt; Low)</option>                       
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="input-limit">Show:</label>
                     <select id="input-limit" class="form-control">
                        <option value="javascript:void(0)" selected="selected">12</option>
                        <option value="javascript:void(0)">25</option>
                        <option value="javascript:void(0)">50</option>
                        <option value="javascript:void(0)">75</option>
                        <option value="javascript:void(0)">100</option>
                     </select>
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="products-list row grid">
      <?php if(!empty($searchProduct)){

        foreach ($searchProduct as $deal) {
           $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$deal->productId."'",2);

         ?>
         

      
      <div class="product-layout col-md-3 col-sm-4 col-xs-12">
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
              <h4><a href="<?= base_url()?>product/details/<?=$deal->productId?>/<?=$deal->url?>"><?=$deal->productName?></a></h4>
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
                <span class="price-new">Rs. <?=$deal->price?></span> 
                <span class="price-old">Rs. <?=$deal->maxPrice?></span>           
                <span class="label label-percent"><?php  if(!empty($deal->discountText)) { echo $deal->discountText;}?></span>    
              </div>
              <div class="description item-desc hidden">
                <p> <?= strip_tags(html_entity_decode(substr($deal->description,0,550))) ?>  </p>
              </div>
            </div>
            <div class="button-group">
              <button class="addToCart" type="button" data-toggle="tooltip" title=""  onclick="addcart('<?= $deal->productId ?>','<?=$deal->productName?>');" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
              <button class="wishlist" type="button" data-toggle="tooltip" title="" onclick="addwishlist('<?= $deal->productId ?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
              <button class="compare" type="button" data-toggle="tooltip" title=""  data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
            </div>
          </div>
          <!-- right block -->
        </div>
      </div>
    <?php } } else{ ?>
    <?php }?>


    </div>
         <div class="product-filter product-filter-bottom filters-panel">
            <div class="row">
               <div class="col-md-2 hidden-sm hidden-xs">
               </div>
               <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
                  <div class="form-group" style="margin: 7px 10px">Showing 1 to 9 of 10 (2 Pages)</div>
               </div>
               <div class="box-pagination col-md-3 col-sm-4 text-right">
                  <ul class="pagination">
                     <li class="active"><span>1</span></li>
                     <li><a href="javascript:void(0)">2</a></li>
                     <li><a href="javascript:void(0)">&gt;</a></li>
                     <li><a href="javascript:void(0)">&gt;|</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>