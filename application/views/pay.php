 <div class="clearfix"></div>
 <div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb"> Paycorp International Quick Web </div>
      <ul class="breadcrumb-cate">
       <li><a href="#"><i class="fa fa-home"></i></a></li>
       <li><a href="#"><?= $title ?></a></li>
    </ul>
 </div>
</div>
<!-- Search body section start -->
</br>
<center>
<form action="<?=base_url('Paycorp/iframe_payout')?>" method="post" accept-charset="utf-8">
  <input type="hidden" name="total" value="<?= $total ?>">
  
  <button type="submit" class="button btn-primary btn"><span>Pay Now </span></button>
</form>
  
</center>
</br></br>
<!--Middle Part End-->
</div>