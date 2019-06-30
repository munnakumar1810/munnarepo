<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Blog </div>
      <ul class="breadcrumb-cate">
         <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
         <li><a href="<?= base_url('blog')?>">Blog</a></li>
      </ul>
   </div>
</div>
<!-- Blog body section start -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="<?= base_url()?>"><i class="fa fa-home"></i></a></li>
      <li><a href="<?= base_url('blog')?>">Blog</a></li>
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

               <div class="blog-header">
                  <h3>Our Blog</h3>
                  <p>Latest news posts</p>
               </div>
               <div class="blog-listitem">
                  <?php if(!empty($bloglist)){

                     foreach($bloglist as $b) {?>

                        <div class="blog-item ">
                           <div class="itemBlogImg col-md-4 col-sm-12">
                              <div class="article-image banners">
                                 <div>
                                    <?php if(!empty($b->image)): ?>
                                       <a class="popup-gallery" href="<?= base_url()?>uploads/blogs/<?= $b->image ?>">
                                          <img src="<?= base_url()?>uploads/blogs/<?= $b->image ?>" alt="<?= $b->title ?>"></a>
                                          <?php else: ?>
                                             <a class="popup-gallery" href="<?= base_url()?>uploads/noimg.png">
                                                <img src="<?= base_url()?>uploads/noimg.png" alt="<?= $b->title ?>"></a>
                                             <?php endif; ?>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="itemBlogContent col-md-8 col-sm-12">
                                       <div class="article-title">
                                          <h4>
                                             <a href="<?=base_url()?>blog/details/<?php echo $b->blogId; ?>"><?= $b->title ?></a>
                                          </h4>
                                       </div>
                                       <div class="article-sub-title">
                                          <span class="article-date">
                                             <i class="fa fa-calendar"></i><?=date('d M Y', strtotime($b->created));?>                      
                                          </span>
                                       </div>
                                       <div class="article-description">
                                          <?php  echo substr($b->description,0,200); ?>..  
                                          <a href="<?=base_url()?>blog/details/<?php echo $b->blogId; ?>" class="lis-primary"> Read More <i class="fa fa-angle-right pl-2"></i></a>                        
                                       </div>
                                       <div class="blog-meta">
                                          <span class="comment_count">
                                             <a href="#">0 Comments</a>
                                          </span>
                                          <span class="author">
                                             <span>Post by </span>Admin
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              <?php } } else{?>
                                 <div class="blog-item">
                                    <p class="error"> No List Found! </p>
                                 </div>
                              <?php }?>

                  <?php if ($total_pages > 0): ?>
                    <div class="col-sm-12">
                      <ul class="pagination">
                        <?php if (!$this->input->get('page') || $this->input->get('page') == 1){ ?>
                          <li class="disabled"><a href="#">«</a></li>
                        <?php } else { ?>
                          <li>
                            <a href="<?= current_url().'?page=1' ?>">«</a>
                          </li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                          <li class="<?= ($this->input->get('page') == $i)? 'active' : ''; ?>">
                            <a href="<?= current_url().'?page='.$i ?>">
                              <?= $i ?> 
                              <?= ($this->input->get('page') == $i)? '<span class="sr-only">(current)</span>' : ''; ?>
                            </a>
                          </li>
                        <?php endfor; ?>

                        <?php if ($this->input->get('page') && $this->input->get('page') == $total_pages){ ?>
                          <li class="disabled"><a href="#">»</a></li>
                        <?php } else { ?>
                          <li>
                            <a href="<?= current_url().'?page='.$total_pages ?>">»</a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  <?php endif ?>
                           </div>
                        </div>
                     </div>
                     <!--Middle Part End-->
                  </div>
<!-- Blog body section end -->