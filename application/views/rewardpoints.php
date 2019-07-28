
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
      <li><a href="javascript:void(0)">Reward Payment</a></li>
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
 <h2>Reward  History</h2>

 <div class="buttons clearfix">

  <?php if(!empty($orderlist)) { ?>
   <?php foreach ($orderlist as $ord): ?>
    <div style="border: 2px solid #ccc; margin-bottom: 10px; padding: 20px;">
     <div class="row">
      <div class="col-sm-3"><p class="btn btn-danger"> Order No: <?=$ord->orderNo?></p></div>
      </div>
     <hr>
     <?php 
     $sql="SELECT ct.orderDetailId, p.productId, p.productName, p.sku, p.url, ct.quantity, ct.price,(SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage   
     From order_details as ct
     JOIN products AS p ON p.productId=ct.productId
     JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
     JOIN category AS c ON c.categoryId = sc.categoryId
     WHERE ct.orderId = '".$ord->orderId."'";

     $productlist = $this->Commonmodel->fetch_all_join($sql); ?>
     <?php $total=0; ?>
     <?php foreach ($productlist as $p): ?>
       <div class="row">

         <div class="col-sm-3">
          <h4 class="btn btn-primary">First Level: </h4>
       </div>
       <div class=col-sm-3>
         <h4 class="btn btn-info">Third Level: </h4>
       </div>
      <div class="col-sm-3">
         <h4 class="btn btn-warning">Second Level: </h4>
        
     </div>
     <div class="col-sm-3">
      <h4 class="btn btn-success">End User Level: </h4>
       
     </div>
   </div>
   <hr>
 <?php endforeach ?>


 <div class="row"> 
   <div class="col-sm-3">
     <p> Ordered On  <?=date('d M Y', strtotime($ord->created));?></p>
   </div>
   <div class="col-sm-3 pull-right">
      <?php  @$totalprice= ((@$p->quantity)*(@$p->price))?>
       <?php @$total=@$totalprice + $total ?> 
     <p class="">Ordered  Total $ <?= @$total?></p>
   </div>
 </div>
</div>


<?php endforeach ?>
<?php } else {?>
 <p class="error">You have not made any previous orders!</p>
<?php } ?>
</div>
</div>
      
   </div>
</div>