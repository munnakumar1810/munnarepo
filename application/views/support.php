     <div class="clearfix"></div>
         <div class="innerpage-ban">
            <div class="container">
               <div class="title-breadcrumb"> Support-24/7 </div>
                <ul class="breadcrumb-cate">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#"><?= $cms->pageTitle ?></a></li>
         </ul>
      </div>
   </div>
   <!-- Search body section start -->
   <div class="main-container container">
      <ul class="breadcrumb">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#"><?= $cms->pageTitle ?></a></li>
      </ul>
      <div class="row">
         <div id="content" class="col-sm-12">
            <h1><?= $cms->pageTitle ?></h1>
            <p>
              <?= strip_tags(html_entity_decode($cms->content)); ?>

            </p>
         </div>
      </div>
      <!--Middle Part End-->
   </div>