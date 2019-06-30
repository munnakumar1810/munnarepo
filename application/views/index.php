<!-- Block Spotlight1  -->
<section class="so-spotlight1 ">
   <div class="container-fluid p-0">
      <div class="row">
         <div id="yt_header_right" class="col-lg-12 col-md-12">
            <div class="slider-container ">

               <div id="so-slideshow" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                  <div class="module no-margin">
                     <div class="yt-content-slider yt-content-slider--arrow1"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                        <?php foreach ($bannerlist as $key => $ban) {?>
                           <div class="yt-content-slide">
                              <a href="javascript:void(0);"><img src="<?= base_url('uploads/slider/').$ban->bannerImage ?>" alt="<?=$ban->bannerTitle?>" class="img-responsive"></a>
                           </div>

                        <?php } ?>


                     </div>
                     <div class="loadeding"></div>
                     <div class="htmlcontent-block new-ban">
                        <ul class="htmlcontent-home list-inline">                           
                           <?php foreach ($gallerylist as $key => $gal) {?>
                           <li>
                              <div class="banners">
                                 <div>
                                    <?php if (file_exists('./uploads/home/'.$gal->images)) { ?>
                                    <a href="javascript:void(0);"><img src="<?= base_url('uploads/home/').$gal->images ?>" alt="<?= $gal->title ?>"></a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0);"><img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="banner1"></a>
                                    <?php } ?>

                                 </div>
                              </div>
                           </li>
                            <?php } ?>
                        </ul>
                     </div>
                  </div>

               </div>

              

            </div>
         </div>
      </div>
   </div>
</section>
<!-- //Block Spotlight1  -->
<section class="weekly-deal">
   <div class="container page-builder-ltr">
      <div class="row row_a90w  row-style ">
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col_22at  block block_2">

            <div class="module so-deals-ltr home2_deals_style2">
               <h3 class="modtitle font-ct">Weekly Deal</h3>

               <div class="modcontent clearfix">
                  <div class="module tab-slider titleLine">
                     <!-- <h3 class="modtitle">Featured Product</h3> -->
                     <div id="" class="so-listing-tabs first-load module">
                        <div class="ltabs-wrap">
                           <div class="ltabs-items-container">
                              <!--Begin Items-->
                              <div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="4">
                                 <div class="ltabs-items-inner ltabs-slider ">
                                    <?php foreach ($featuresProduct as $key => $feat) {
                                       $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$feat->productId."'", 2);
                                       
                                       
                                       ?>
                                       <div class="col-md-4">
                                          <div class="ltabs-item product-layout">
                                             <div class="product-item-container">
                                                <div class="left-block">
                                                   <div class="product-image-container second_img">
                                                      <?php 
                                                      $c=-1;
                                                      foreach ($imgslist as $key => $pic): ?>
                                                         <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>
                                                            <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?>img-responsive" alt="">
                                                         <?php } else { ?>
                                                            <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="">
                                                         <?php } ?> 
                                                         <?php $c++; endforeach ?>
                                                      </div>
                                                      <!--Sale Label-->
                                                      <span class="label label-sale"><?php  if(!empty($feat->discountText)) { echo $feat->discountText;}?></span>
                                                      <!--full quick view block-->
                                                      <!--end full quick view block-->
                                                   </div>
                                                   <div class="right-block">
                                                      <div class="caption">
                                                         <h4><a href="<?= base_url()?>product/details/<?=$feat->productId?>/<?=$feat->url?>"><?=$feat->productName?></a></h4>
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
                                                            <span class="price-new">Rs. <?=$feat->price?></span> 
                                                            <span class="price-old">Rs. <?=$feat->maxPrice?></span>      
                                                         </div>
                                                      </div>
                                                      <div class="button-group">
                                                         <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart"  onclick="addcart('<?= $feat->productId ?>','<?=$feat->productName?>');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
                                                         <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="addwishlist('<?= $feat->productId ?>');"><i class="fa fa-heart"></i></button>
                                                         <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                                                      </div>
                                                   </div>
                                                   <!-- right block -->
                                                </div>
                                             </div>
                                          </div>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                              <!--End Items-->
                           </div>
                        </div>
                     </div>
                  </div>

               </div>


            </div>         
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col_n1ih  block block_3 hidden-sm ">
               <div class="module banners-effect-7">
                  <div class="hover_effect_type ">
                     <div class="banners">
                        <div>
                            <?php foreach ($deallist as $key => $deal) {?>
                              <?php if (file_exists('./uploads/home/'.$deal->images)) { ?>

                                  <a href="javascript:void(0);"><img src="<?= base_url('uploads/home/').$deal->images ?>" alt="<?= $deal->title ?>"></a>

                                  <?php } else { ?>
                                 <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/new-image/banner04.jpg" alt=""></a>
                            <?php } } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_6p0e  block block_1">
               <div class="hashtags clearfix">
                  <h3 class="title_block">Top Collections</h3>
                  <ul class="clearfix list-unstyled">


                     <?php foreach ($collectionlist as $key => $top) {?>
                           <li class="item col-md-2 col-sm-4 col-xs-4">
                              <div class="item-image">
                                
                                    <?php if (file_exists('./uploads/home/'.$top->bannerImage)) { ?>
                                    <a href="javascript:void(0);"><img src="<?= base_url('uploads/home/').$top->bannerImage ?>" alt="<?= $top->bannerTitle ?>"></a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0);"><img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="banner1"></a>
                                    <?php } ?>
                              </div>
                              <div class="item-content">
                           <h4><a href="javascript:void(0);"><?= $top->bannerTitle ?></a></h4>
                        </div>
                           </li>
                            <?php } ?>
                     
                  </ul>

               </div>

            </div>
         </div>
      </div>

      <div class="container">
         <div class="row">
           
            </div>

            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_0413  block block_5">
                  <div class="banner-layout-2 bt-3 clearfix">
                     <div class="banner-1 banners">
                        <?php foreach ($featuredlist as $key => $feat) {?>
                           <?php if (file_exists('./uploads/home/'.$feat->images)) { ?>

                              <a href="javascript:void(0);" title="Banner 1"><img src="<?= base_url('uploads/home/').$feat->images ?>" alt="<?= $feat->title ?>"></a>

                           <?php } else { ?>
                              <a href="javascript:void(0);" title="Banner 1">       
                                 <img src="<?= base_url()?>frontend/image/new-image/banner05.jpg" alt="Static Image">
                              </a>
                           <?php } } ?>
                         
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </section>


      <!-- Main Container  -->
      <div class="main-container container">
         <div class="row">
            <div id="content" class="col-sm-12">
               <div class="module tab-slider titleLine">
                  <h3 class="modtitle">Featured Product</h3>
                  <div id="so_listing_tabs_1" class="so-listing-tabs first-load module">
                     <div class="ltabs-wrap">
                        <div class="ltabs-tabs-container" data-rtl="yes" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="1" data-margin="30">
                           <!--Begin Tabs-->
                           <div class="ltabs-tabs-wrap"> 
                              <span class="ltabs-tab-selected">   </span> <span class="ltabs-tab-arrow"></span>
                              <div class="item-sub-cat">
                                 <ul class="ltabs-tabs cf">
                                    <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20">  </li>


                                 </ul>
                              </div>
                           </div>
                           <!-- End Tabs-->
                        </div>

                        <div class="ltabs-items-container">
                           <!--Begin Items-->
                           <div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="10">
                              <div class="ltabs-items-inner ltabs-slider ">
                                 <?php foreach ($featuresProduct as $key => $feat) {

                                    $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$feat->productId."'",2);


                                    ?>


                                    <div class="ltabs-item product-layout">
                                       <div class="product-item-container">
                                          <div class="left-block">
                                             <div class="product-image-container second_img">
                                                <?php 
                                                $c=-1;
                                                foreach ($imgslist as $key => $pic): ?>
                                                   <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                                                      <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?>img-responsive" alt="">

                                                   <?php } else { ?>

                                                      <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="">

                                                   <?php } ?> 
                                                   <?php $c++; endforeach ?>

                                                </div>
                                                <!--Sale Label-->
                                                <span class="label label-sale"><?php  if(!empty($feat->discountText)) { echo $feat->discountText;}?></span>
                                                <!--full quick view block-->

                                                <!--end full quick view block-->
                                             </div>
                                             <div class="right-block">
                                                <div class="caption">
                                                   <h4><a href="<?= base_url()?>product/details/<?=$feat->productId?>/<?=$feat->url?>"><?=$feat->productName?></a></h4>
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
                                                      <span class="price-new">Rs. <?=$feat->price?></span> 
                                                      <span class="price-old">Rs. <?=$feat->maxPrice?></span>		 
                                                   </div>
                                                </div>
                                                <div class="button-group">
                                                   <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart"  onclick="addcart('<?= $feat->productId ?>','<?=$feat->productName?>');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
                                                   <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="addwishlist('<?= $feat->productId ?>');"><i class="fa fa-heart"></i></button>
                                                   <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                                                </div>
                                             </div>
                                             <!-- right block -->
                                          </div>
                                       </div>
                                    <?php } ?>

                                 </div>
                              </div>

                           </div>
                           <!--End Items-->
                        </div>
                     </div>
                  </div>
                  <div class="module">
                     <div class="modcontent clearfix">
                        <div class="banner-wraps ">
                           <div class="m-banner row">
                              <?php foreach ($newlist as $key => $newimg) {?>
                           
                           <?php if (file_exists('./uploads/home/'.$newimg->images)) { ?>

                              <div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                 <div class="banners">
                                    <div>
                                       <a href="javascript:void(0);"><img src="<?= base_url('uploads/home/').$newimg->images ?>" alt="<?= $newimg->title ?>"></a>
                                    </div>
                                 </div>
                              </div>
                              <?php } else { ?>
                                  <div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                 <div class="banners">
                                    <div>
                                       <a href="javascript:void(0);"><img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="banner1"></a>
                                       
                                    </div>
                                 </div>
                              </div>
                              <?php } } ?>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="clearfix"></div>
                  <div class="module tab-slider titleLine">
                     <h3 class="modtitle">New Products</h3>
                     <div id="so_listing_tabs_2" class="so-listing-tabs first-load module">
                        <div class="loadeding"></div>
                        <div class="ltabs-wrap">
                           <div class="ltabs-tabs-container" data-rtl="yes" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="3" data-sm="2" data-xs="1" data-margin="30">
                              <!--Begin Tabs-->
                              <div class="ltabs-tabs-wrap">
                                 <span class="ltabs-tab-selected"></span>
                                 <span class="ltabs-tab-arrow"></span>
                                 <div class="item-sub-cat">
                                    <ul class="ltabs-tabs cf">
                                       <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> </li>
                                    </ul>
                                 </div>
                              </div>
                              <!-- End Tabs-->
                           </div>
                           <div class="ltabs-items-container">
                              <!--Begin Items-->
                              <div class="ltabs-items ltabs-items-selected items-category-20 grid" data-total="10">
                                 <div class="ltabs-items-inner ltabs-slider ">
                                    <?php foreach ($latestProduct as $lat) { 

                                       $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$lat->productId."'",2);
                                       ?>
                                       <div class="ltabs-item product-layout">
                                          <div class="product-item-container">
                                             <div class="left-block">
                                                <div class="product-image-container second_img ">
                                                   <?php 
                                                   $c=-1;
                                                   foreach ($imgslist as $key => $pic): ?>
                                                      <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                                                         <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?>img-responsive" alt="">

                                                      <?php } else { ?>
                                                         <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="">

                                                      <?php } ?>
                                                      <?php $c++; endforeach ?>
                                                   </div>
                                                   <!--Sale Label-->
                                                   <span class="label label-sale"><?php  if(!empty($lat->discountText)) { echo $lat->discountText;}?></span>
                                                   <!--full quick view block-->

                                                   <!--end full quick view block-->
                                                </div>
                                                <div class="right-block">
                                                   <div class="caption">
                                                      <h4><a href="<?= base_url()?>product/details/<?=$lat->productId?>/<?=$lat->url?>"><?=$lat->productName?></a></h4>
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
                                                         <span class="price-new">Rs. <?=$lat->price?></span> 
                                                         <span class="price-old">Rs. <?=$lat->maxPrice?></span>      
                                                      </div>
                                                   </div>
                                                   <div class="button-group">
                                                      <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="addcart('<?= $lat->productId ?>','<?=$lat->productName?>');"><i class="fa fa-shopping-cart"></i> <span class="">Add to Cart</span></button>
                                                      <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="addwishlist('<?= $lat->productId ?>');"><i class="fa fa-heart"></i></button>
                                                      <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                                                   </div>
                                                </div>
                                                <!-- right block -->
                                             </div>
                                          </div>
                                       <?php } ?>

                                    </div>
                                 </div>

                              </div>
                              <!--End Items-->
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <!-- //Main Container -->
