 <div class="clearfix"></div>
 <div class="innerpage-ban">
  <div class="container">
   <div class="title-breadcrumb">Checkout </div>
   <ul class="breadcrumb-cate">
    <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
    <li><a href="<?=base_url('user')?>">Account</a></li>

   </ul>
  </div>
 </div>
 <div class="clearfix"></div>
 <div class="container">
  <ul class="breadcrumb">
   <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
   <li><a href="<?=base_url('user/cartlist')?>">Shopping Cart</a></li>
   <li><a href="<?=base_url('user/checkout')?>">Checkout</a></li>
  </ul>
  <div class="row">
   <div id="content" class="col-sm-12">
    <form action="<?=base_url('user/placeOrder')?>" method="post" accept-charset="utf-8">
     <?php if($this->session->flashdata('checkoutsuccess')!=''){ ?>
       <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
        <strong>
         <?php echo @$this->session->flashdata('checkoutsuccess');?>
        </strong>
       </div>
      <?php } ?>
      <?php if($this->session->flashdata('checkouterror')!=''){ ?>
       <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&#10006;</button>
        <strong>
         <?php echo @$this->session->flashdata('checkouterror');?>
        </strong>
       </div>
      <?php } else if($this->session->flashdata('info')){  ?>
               <div class="alert alert-info">
                  <a href="javascript:void(0);" class="close" data-dismiss="alert">&times;</a>
                  <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
               </div>
            <?php } ?>
    <div class="so-onepagecheckout layout1  is_customer ">

     <div class="col-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <section class="section-left">
       <div class="checkout-content checkout-payment-form">
        <h2 class="secondary-title"><i class="fa fa-map-marker"></i>Shipping Address </h2>
        <div class="box-inner">
         <form class="form-horizontal form-payment"> 
          
           <div class="form-group required">
            <input type="text" name="payment_firstname" value="<?= @$userinfo->firstName ?>" placeholder="First Name*" id="input-payment-firstname" class="form-control">
            <span class="error"><?php echo form_error('payment_firstname'); ?></span>
           </div>
           <div class="form-group required">
            <input type="text" name="payment_lastname" value="<?= @$userinfo->lastName ?>" placeholder="Last Name *" id="input-payment-lastname" class="form-control">
            <span class="error"><?php echo form_error('payment_lastname'); ?></span>
           </div>

           <div class="form-group required">
            <input type="text" name="payment_address" value="<?= @$shipping->address ?>" placeholder="Address *" id="geolocation" class="form-control">
            <span class="error"><?php echo form_error('payment_address'); ?></span>
           </div>

           <div class="form-group required">
            <input type="text" name="payment_city" value="<?= @$shipping->city ?>" placeholder="City *" id="input-payment-city" class="form-control">
            <span class="error"><?php echo form_error('payment_city'); ?></span>
           </div>
           <div class="form-group">
            <input type="text" name="payment_postcode" value="<?= @$shipping->postcode ?>" placeholder="Post Code *" id="input-payment-postcode" class="form-control">
            <span class="error"><?php echo form_error('payment_postcode'); ?></span>
            <input type="hidden" name="lat" id="lat" class="form-control">
            <input type="hidden" name="lon" id="lon" class="form-control">
           </div>
         </form>
        </div>
       </div>

       <div class="checkbox check-terms">
        <label>
         <input type="checkbox" name="same" id="chkCopy">
         Billing address   same as Shipping Address
        </label>
       </div>
       
       <div class="checkout-content checkout-shipping-form">
        <h2 class="secondary-title"><i class="fa fa-map"></i> Billing Address </h2>
        <div class="box-inner">
         <form class="form-horizontal form-shipping">
          <div id="shipping-new">
           <div class="form-group required">
            <input type="text" name="shipping_firstname" value="<?=set_value('shipping_firstname') ?>" placeholder="First Name" id="input-shipping-firstname" class="form-control">
            <span class="error"><?php echo form_error('shipping_firstname'); ?></span>
           </div>
           <div class="form-group required">
            <input type="text" name="shipping_lastname" value="<?=set_value('shipping_lastname') ?>" placeholder="Last Name *" id="input-shipping-lastname" class="form-control">
            <span class="error"><?php echo form_error('shipping_lastname'); ?></span>
           </div>

           <div class="form-group required">
            <input type="text" name="shipping_address" value="<?= @$billing->address ?>" placeholder="Address *" id="input-shipping-address-1" class="form-control">
            <span class="error"><?php echo form_error('shipping_address'); ?></span>
           </div>

           <div class="form-group required">
            <input type="text" name="shipping_city" value="<?= @$billing->city ?>" placeholder="City *" id="input-shipping-city" class="form-control">
            <span class="error"><?php echo form_error('shipping_city'); ?></span>
           </div>
           <div class="form-group">
            <input type="text" name="shipping_postcode" value="<?= @$billing->postcode ?>" placeholder="Post Code *" id="input-shipping-postcode" class="form-control">
            <span class="error"><?php echo form_error('shipping_postcode'); ?></span>
           </div>

          </div>
         </form>
        </div>
       </div>
       <input type="hidden" name="default_zone_id" id="default_zone_id" value="3655">
       <div class="ship-payment">
        
        <div class="checkout-content checkout-payment-methods">
         <h2 class="secondary-title"><i class="fa fa-credit-card"></i>Payment Method</h2>
         <div class="box-inner">
          <div class="radio">
           <label>
            <input type="radio" name="payment_method" value="0" checked="checked">
            Cash On Delivery
           </label>
          </div>
          <div class="radio">
           <label>
            <input type="radio" name="payment_method" value="1">
            Credit / Debit/ ATM Card /Net Banking
           </label>
          </div>
         </div>
        </div>
       </div>
      </section>
      <section class="section-right">

       <div class="checkout-content checkout-cart">
        <h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Order Summary</h2>
        <div class="box-inner">
         <div class="form-group">
          <label class="col-sm-4">Select Nearest E-Shop *</label>
          <div class="col-sm-8">
           <select class="form-control" name="eshop" id="eshop">
            <option value="">Nearest E-shop</option>
            <?php if (count($eshoplist) > 0): ?>

                           <?php foreach ($eshoplist as $key => $v): ?>

                              <option value="<?= $v->eshopId ?>">

                                 <?= $v->eshopName ?>

                              </option>

                           <?php endforeach ?>

                        <?php endif ?>

           </select>
           <span class="error"><?php echo form_error('eshop'); ?></span>
          </div>

         </div>

         <div class="form-group">
          <label class="col-sm-4">Product Will Deliver *</label>
          <div class="col-sm-8">
            <label class="radio-inline">
              <input type="radio" name="receiveProductsAt" value="1" >Deliver Nearest E-shop</label>
            <label class="radio-inline">
              <input type="radio" name="receiveProductsAt" value="0" checked>My Shipping Address</label>
           <span class="error"><?php echo form_error('eshop'); ?></span>
          </div>

         </div>

        </div>

        <div class="box-inner">

         <div class="table-responsive checkout-product">


          <table class="table table-bordered table-hover">
           <thead>
            <tr>
             <th class="text-left name" colspan="2">Product Name</th>
             <th class="text-center quantity">Quantity</th>
             <th class="text-center checkout-price">Unit Price</th>
             <th class="text-right total">Total</th>
            </tr>
           </thead>
           <tbody>
            <?php 
            $subtotal=0;

            if(!empty($list)){

             foreach ($list as $key => $car): ?>
              <tr>
               <td class="text-left name" colspan="2">
                <?php if (file_exists('./uploads/products/small/'.$car->productImage)) { ?>

                 <a href="javascript:void(0)"> <img src="<?= base_url('uploads/products/small/').$car->productImage ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>

                <?php } else { ?>
                 <a href="javascript:void(0)"> <img src="<?= base_url('assets/images/thumbs.jpg') ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>
                <?php } ?>
                <a href="<?= base_url()?>product/details/<?=$car->productId?>/<?=$car->url?>"><?=$car->productName?></a>
                <br>
                &nbsp;
                <small> - Select: Red</small>
               </td>
               <td class="text-left quantity">
                <div class="input-group">
                 <input type="text" name="quantity[2]" value="<?=$car->quantity?>" size="1" class="form-control">
                 <span class="input-group-btn">
                  <span data-toggle="tooltip" onclick="deletecart('<?= $car->cartId ?>');"  data-product-key="2" class="btn-delete" data-original-title="Remove"><i class="fa fa-trash-o"></i></span>
                  <span data-toggle="tooltip" title="" data-product-key="2" class="btn-update" data-original-title="Update"><i class="fa fa-refresh"></i></span>
                 </span>
                </div>
               </td>
               <td class="text-right price">Rs. <?=$car->price?></td>
               <td class="text-right total"><?php echo @$totalprice= ((@$car->quantity)*(@$car->price))?></td>
              </tr>
              <?php @$subtotal=@$totalprice + $subtotal ?>
             <?php endforeach ?>
            <?php } else{?>
             <tr><td colspan="4">No Product found in your Cart list</td></tr>

            <?php } ?>

           </tbody>
           <tfoot>
            <tr>
             <td colspan="4" class="text-left">Sub-Total:</td>
             <td class="text-right">Rs. <?= $subtotal ?></td>
            </tr>
            <tr>
             <td colspan="4" class="text-left">Flat Shipping Rate:</td>
             <td class="text-right">Rs. 0.00</td>
            </tr>
            <tr>
             <td colspan="4" class="text-left">Total:</td>
             <td class="text-right">Rs. <?= $subtotal ?></td>
            </tr>
           </tfoot>
          </table>
         </div>

        </div>
       </div>

       <div class="checkout-content confirm-section">
        <div>
         <h2 class="secondary-title"><i class="fa fa-comment"></i>Add Comments About Your Order</h2>
         <label>
          <textarea name="comment" rows="8" class="form-control"></textarea>
         </label>
        </div>
        <div class="checkbox check-terms">
         <label>
          <input type="checkbox" name="agree" value="1">
          I have read and agree to the <a href="" class="agree"><b>Terms &amp; Conditions</b></a>
         </label>
        </div>
        <div class="confirm-order pull-right">
         <button id="so-checkout-confirm-button " data-loading-text="Loading..." class="btn btn-primary button confirm-button">Place Order</button>
        </div>
       </div>

      </section>
     </div>
    </div>
    </form>

   </div>
  </div>
 </div>
</div>
<script>
 function initialize(){
  var places = new google.maps.places.Autocomplete(document.getElementById('geolocation'));
  google.maps.event.addListener(places, 'place_changed', function () {
   var place = places.getPlace();
   var address = place.formatted_address;
   var latitude = place.geometry.location.lat();
   var longitude = place.geometry.location.lng();
 // var mesg = "Address: " + address;
 document.getElementById("lat").value= latitude;
 document.getElementById("lon").value= longitude;
 //   mesg += "\nLongitude: " + longitude;
 //alert(mesg);
});
 }
</script>