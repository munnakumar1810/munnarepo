<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Products </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="javascript:void(0)">Product Details</a></li>
      </ul>
   </div>
</div>
<!-- Search body section start -->
  <!-- Product Details body section start -->
         <div class="main-container container">
            <ul class="breadcrumb">
               <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
               <li><a href="javascript:void(0)"><?=$details->categoryName?></a></li>
               <li><a href="javascript:void(0)"><?=$details->subcategoryName?></a></li>
            </ul>
            <div class="row">
               <!--Middle Part Start-->
               <div id="content" class="col-md-12 col-sm-12">
                  <div class="product-view row">
                     <div class="left-content-product col-lg-10 col-xs-12 ">
                        <div class="row">
                           <div class="content-product-left class-honizol col-sm-6 col-xs-12 ">
                              <div class="large-image">
                                 <?php if (file_exists('./uploads/products/small/'.$details->productImage)) { ?>
                                 <img itemprop="image" class="product-image-zoom" src="<?= base_url('uploads/products/small/').$details->productImage ?>" data-zoom-image="<?= base_url('uploads/products/medium/').$details->productImage ?>" title="Bint Beef" alt="Bint Beef">
                                 <?php } else { ?>

                              <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive product-list-thumb-image" alt="">

                           <?php } ?>
                              </div>
                              <?php 

                              $imgslist= $this->Commonmodel->fetch_all_rows("product_images","productId='".$details->productId."'"); ?>
                              
                              <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
                                 <?php   $c=1;
                                 foreach ($imgslist as  $pic): ?>
                                 <a data-index="<?=$c;?>" class="img thumbnail " data-image="<?= base_url('uploads/products/thumbs/').$pic->productImage ?>" title="Bint Beef">
                                 <img src="<?= base_url('uploads/products/thumbs/').$pic->productImage ?>" title="Bint Beef" alt="<?=$pic->productImage?>">
                                 </a>
                                 <?php $c++; endforeach ?>
                                 
                              </div>
                           </div>
                           <div class="content-product-right col-sm-6 col-xs-12">
                              <div class="title-product">
                                 <h1><?= $details->productName?></h1>
                              </div>
                              <!-- Review ---->
                              <div class="box-review form-group">
                                 <div class="ratings">
                                    <div class="rating-box">
                                       <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                       <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                 </div>
                                 <a class="reviews_button" href="javascript:void(0)" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?= count($rating)?> reviews</a>    | 
                                 <a class="write_review_button" href="javascript:void(0)" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
                              </div>
                              <div class="product-label form-group">
                                 <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new" itemprop="price">Rs. <?=$details->price?></span>
                                    <span class="price-old">Rs. <?=$details->maxPrice?></span>
                                 </div>
                                 <div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
                              </div>
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                    <div class="brand"><span>Brand:</span> <?=$details->brand ?> </div>
                                    <div class="model"><span>Product Code:</span><?=$details->sku?> </div>
                                    <div class="reward"><span>Reward Points:</span> <?=$details->rewardPoints?></div>
                                 </div>
                              </div>
                              <div id="product">
                                 <h4>Available Options</h4>
                                 <div class="image_option_type form-group required">
                                    <label class="control-label">Colors</label>
                                    <ul class="product-options clearfix"id="input-option231">
                                       <li class="radio">
                                          <label>
                                          <input class="image_radio" type="radio" name="option[231]" value="33"> 
                                          <img src="<?= base_url()?>frontend/image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">                     <i class="fa fa-check"></i>
                                          <label> </label>
                                          </label>
                                       </li>
                                       <li class="radio">
                                          <label>
                                          <input class="image_radio" type="radio" name="option[231]" value="34"> 
                                          <img src="<?= base_url()?>frontend/image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">                   <i class="fa fa-check"></i>
                                          <label> </label>
                                          </label>
                                       </li>
                                       <li class="radio">
                                          <label>
                                          <input class="image_radio" type="radio" name="option[231]" value="35"> <img src="<?= base_url()?>frontend/image/demo/colors/green.jpg"
                                             data-original-title="green +$12.00" class="img-thumbnail icon icon-color">                   <i class="fa fa-check"></i>
                                          <label> </label>
                                          </label>
                                       </li>
                                       <li class="selected-option">
                                       </li>
                                    </ul>
                                 </div>
                                 
                                 <div class="form-group box-info-product">
                                    <div class="option quantity">
                                       <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                          <label>Qty</label>
                                          <input class="form-control" type="text" name="quantity"
                                             value="1">
                                          <input type="hidden" name="product_id" value="50">
                                          <span class="input-group-addon product_quantity_down">−</span>
                                          <span class="input-group-addon product_quantity_up">+</span>
                                       </div>
                                    </div>
                                    <div class="cart">
                                       <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="addcart('<?= $details->productId ?>','<?=$details->productName?>');" data-original-title="Add to Cart">
                                    </div>
                                    <div class="add-to-links wish_comp">
                                       <ul class="blank list-inline">
                                          <li class="wishlist">
                                             <a class="icon" data-toggle="tooltip" title=""
                                                 onclick="addwishlist('<?= $details->productId ?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                             </a>
                                          </li>
                                          <li class="compare">
                                             <a class="icon" data-toggle="tooltip" title=""
                                                 data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- end box info product -->
                           </div>
                        </div>
                     </div>
                    
                  </div>
                  <!-- Product Tabs -->
                  <div class="producttab">
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
                     <div class="tabsslider  vertical-tabs col-xs-12">
                        <ul class="nav nav-tabs col-lg-2 col-sm-3">
                           <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                           <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (<?php echo count($rating); ?>)</a></li>
                           
                        </ul>
                        <div class="tab-content col-lg-10 col-sm-9 col-xs-12">
                           <div id="tab-1" class="tab-pane fade active in">

                              <?= strip_tags(html_entity_decode($details->description)); ?>
                              
                           </div>
                           <div id="tab-review" class="tab-pane fade">
                              
                                 <div id="review">
                                    <table class="table table-striped table-bordered">
                                       <t-body>
                                          <?php if(!empty($rating)) {

                                             foreach ($rating as $rev) { ?>
                                                <tr>
                                             <td style="width: 50%;"><strong><?php echo $rev->firstName ?> &nbsp; <?php echo $rev->lastName ?></strong></td>
                                             <td class="text-right"><?=date('M d, Y', strtotime($rev->created));?></td>
                                          </tr>
                                          <tr>
                                             <td colspan="2">
                                                <p><?php echo $rev->review ?></p>
                                                <div class="ratings">
                                                   <div class="rating-box">
                                                    <input  readonly="" name="star" required="" value="<?= $rev->starRating?>" type="text" class="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs"  title="">
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                                
                                             <?php  }
                                          } else{?>
                                             <p class="error">No Review List Found!</p>
                                          <?php } ?>
                                          
                                       </tbody>
                                    </table>
                                    <div class="text-right"></div>
                                 </div>
                                 <h2 id="review-title">Write a review</h2>
                                 <?php if($this->session->userdata('id')!=''){ ?>
                                    <form action="<?= base_url('user/addReview') ?>" method="post">
                                    <input type="hidden" name="pid" value="<?php echo $details->productId; ?>">
                                    <div class="">
                                       <div class="form-group">
                                          <div class="col-sm-12">
                                             <label class="control-label" for="star">Rating Star
                                                <input  name="star"  id="star" value="0" type="text" class="rating form-control" data-min=0 data-max=5 data-step=0.5 data-size="xs"  title="">
                                             </label>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-12">
                                             <label class="control-label">Title</label>
                                             <input type="text" name="title"  required="" class="form-control">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-12">
                                             <label class="control-label">Your Review</label>
                                             <textarea name="review" rows="5" required="" class="form-control"></textarea>
                                          </div>
                                       </div>
                                       <br>  
                                       <div class="buttons pull-right">
                                          <input type="submit" value="Add Review" class="btn btn-primary">
                                       </div>
                                     
                                    </div>
                                 </form>
                           <?php } else{?>
                              <h4>Please <a href="<?php base_url('login') ?>">Sign In | Register</a> to Add your review.</h4>
                           <?php  } ?>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <!-- //Product Tabs -->
                  <!-- Related Products -->
                  <div class="related titleLine products-list grid module ">
                     <h3 class="modtitle">Related Products  </h3>
                    
                     <div class="releate-products ">
                        <?php 
            if(!empty($relatedList))
            {
               foreach ($relatedList as $pro) { 

                  $imgslist= $this->Commonmodel->fetch_all_rows_limit("product_images","productId='".$pro->productId."'",2);

                  ?>
                        <div class="product-layout ">
                           <div class="product-item-container">
                              <div class="left-block">
                                 <div class="product-image-container second_img ">
                                    <?php 
                                    $c=-1;
                                    foreach ($imgslist as $key => $pic): ?>
                                       <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                                          <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?> img-responsive" alt="">

                                       <?php } else { ?>
                                          <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="">

                                       <?php } ?>
                                       <?php $c++; endforeach ?>
                                 </div>
                                 <!--Sale Label-->
                                 <span class="label label-sale">Sale</span>
                                 <!--full quick view block-->
                                 
                                 <!--end full quick view block-->
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
                <span class="label label-percent"><?php  if(!empty($pro->discountText)) { echo $pro->discountText;}?>    
                                    </div>
                                    <div class="description item-desc hidden">
                                       <p><?php echo strip_tags(substr("$pro->description",0,550)); ?> </p>
                                    </div>
                                 </div>
                                 <div class="button-group">
                                    <button class="addToCart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('42', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></button>
                                    <button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');"><i class="fa fa-heart"></i></button>
                                    <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button>
                                 </div>
                              </div>
                              <!-- right block -->
                           </div>
                        </div>
                        <?php  } } else{ ?>
            <p>No Products Found!</p>

            <?php } ?>
            
           
                       
                     </div>
                  </div>
                  <!-- end Related  Products-->
               </div>
            </div>
            <!--Middle Part End-->
         </div>
         <!-- Product Details body section end -->