<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Blog Details</div>
      <ul class="breadcrumb-cate">
         <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?= base_url('blog')?>">Blog Details</a></li>
      </ul>
   </div>
</div>
<!-- Blog Details body section start -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
      <li><a href="<?= base_url('blog')?>">Blog</a></li>
      <li><a href=""><?= $details->title ?></a></li>
   </ul>

   <div class="row">
      <!--Left Part Start -->
      <aside class="col-sm-4 col-md-3" id="column-left">
         <div class="module blog-category titleLine">
            <h3 class="modtitle">Blog Category</h3>
            <div class="modcontent">
               <ul class="list-group ">
                  <?php if(!empty($catblogs)){
                  foreach($catblogs as $catb) {?>
 
                  <li class="list-group-item"> <a href="<?=base_url()?>blog/blogcatgory/<?php echo $catb->blogCatId; ?>"class="group-item active"><?= $catb->name ?></a></li>
               <?php } }?>
                  
               </ul>

            </div>
         </div>

         <div class="module latest-product titleLine">
               <h3 class="modtitle">Latest Product</h3>
               <div class="modcontent ">
                  <?php foreach ($latestProduct as $lat) { 

                     $imgslist= $this->Blogmodel->fetch_all_rows_limit("product_images","productId='".$lat->productId."'",1);
                     ?>
                     <div class="product-latest-item">
                        <div class="media">
                           <div class="media-left">
                              <?php 
                              $c=-1;
                              foreach ($imgslist as $key => $pic): ?>
                                 <?php if (file_exists('./uploads/products/small/'.$pic->productImage)) { ?>

                                    <img src="<?= base_url('uploads/products/small/').$pic->productImage ?>" class="<?php if($c=="0"){ echo "img_0 ";}?>img-responsive" alt="" style="width: 100px; height: 82px;">

                                 <?php } else { ?>
                                    <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive" alt="" style="width: 100px; height: 82px;">

                                 <?php } ?>
                                 <?php $c++; endforeach ?>

                              </div>
                              <div class="media-body">
                                 <div class="caption">
                                    <h4><a href="<?= base_url()?>product/details/<?=$lat->productId?>/<?=$lat->url?>"><?=$lat->productName?></a></h4>
                                    <div class="price">
                                       <span class="price-new">$<?=$lat->price?></span>
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
            </aside>
         <!--Left Part End -->

         <!--Middle Part Start-->
         <div id="content" class="col-md-9 col-sm-8">
            <div class="article-info">
               <div class="blog-header">
                  <h3><?= $details->title ?></h3>
               </div>
               <div class="article-sub-title">
                  <span class="article-author">Post by: <a href="#"> Admin</a></span>
                  <span class="article-date">Created Date: Tue, Feb 16, 2016</span>
                  <span class="article-comment">0  Comments</span>
               </div>
               <div class="form-group">
                 
                  <?php if(!empty($details->image)): ?>
                        <a class="image-popup" href="<?= base_url()?>uploads/blogs/<?= $details->image ?>">
                           <img src="<?= base_url()?>uploads/blogs/<?= $details->image ?>" alt="<?= $details->title ?>"></a>
                           <?php else: ?>
                              <a class="image-popup" href="<?= base_url()?>uploads/noimg.png">
                           <img src="<?= base_url()?>uploads/noimg.png" alt="<?= $details->title ?>"></a>
                              <?php endif; ?>
               </div>

               <div class="article-description">
                  <?= $details->description; ?>
               </div>

               <div class="panel panel-default related-comment">
                  <div class="panel-body">
                     <div class="form-group">
                        <div id="comments" class="blog-comment-info">
                           <form action="<?= base_url('blog/add')?>" method="post" accept-charset="utf-8">
                              
                           <h3 id="review-title">Leave your comment  </h3>
                           <?php if($this->session->flashdata('blogsuccess')){ ?>
                              <div class="alert alert-success">
                                 <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                                 <strong>Success!</strong> <?php echo $this->session->flashdata('blogsuccess'); ?>
                              </div>
                           <?php }else if($this->session->flashdata('blogerror')){  ?>
                              <div class="alert alert-danger">
                                 <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                                 <strong>Error!</strong> <?php echo $this->session->flashdata('blogerror'); ?>
                              </div>

                           <?php } ?>
                           <input type="hidden" name="blogid" value="<?= $details->blogId ?>">
                           <div class="comment-left contacts-form row">
                              <div class="col-md-6">
                                 <b>Your Name:</b>
                                 <br>
                                 <input type="text" name="name" value="<?=set_value('name') ?>" class="form-control">
                                 <span class="error"><?php echo form_error('name'); ?></span>
                                 <br>
                              </div>
                              <div class="col-md-6">
                                 <b>Your Phone:</b>
                                 <br>
                                 <input type="text" name="phone" value="<?=set_value('phone')?>" class="form-control">
                                 <span class="error"><?php echo form_error('phone'); ?></span>
                                 <br>
                              </div>
                              <div class="col-md-12">
                                 <b>Your Comment:</b>
                                 <br>
                                 <textarea rows="6" name="comments" cols="50" name="text" class="form-control">
                                    <?=set_value('comments')?>
                                 </textarea>
                                 <span class="error"><?php echo form_error('comments'); ?></span>
                                 <span style="font-size: 11px;">Note: Share your  comments to us!</span>
                                 <br>
                                 <br>
                              </div>
                           
                           </div>
                           <br>
                           <div class="text-left">
                              <button type="submit"  class="btn buttonGray">Submit</button>
                             
                           </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>


      </div>
      <!--Middle Part End-->
   </div>
