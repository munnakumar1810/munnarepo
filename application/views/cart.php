
<!-- //Block Spotlight1  -->
<div class="clearfix"></div>
<div class="innerpage-ban">
   <div class="container">
      <div class="title-breadcrumb">My Cart List </div>
      <ul class="breadcrumb-cate">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Account</a></li>
         <li><a href="#">Login</a></li>
      </ul>
   </div>
</div>
<div class="main-container container">
      <ul class="breadcrumb">
         <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li><a href="#">Shopping Cart</a></li>
      </ul>
      
      <div class="row">
         <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
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
          <h2 class="title">Shopping Cart</h2>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Model</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                        $subtotal=0;

                        if(!empty($list)){

                        foreach ($list as $key => $car): ?>
                  <tr>
                    <td class="text-center">

                       <?php if (file_exists('./uploads/products/small/'.$car->productImage)) { ?>

                              <a href="javascript:void(0)"> <img src="<?= base_url('uploads/products/small/').$car->productImage ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>

                           <?php } else { ?>
                             <a href="javascript:void(0)"> <img src="<?= base_url('assets/images/thumbs.jpg') ?>" style="width:70px"  class="img-thumbnail"  alt=""></a>
                            <?php } ?>
                      </td>
                    <td class="text-left">
                      <a href="<?= base_url()?>product/details/<?=$car->productId?>/<?=$car->url?>"><?=$car->productName?></a>
                     </td>
                    <td class="text-left"><?= $car->sku ?></td>
                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="<?=$car->quantity?>" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="deletecart('<?= $car->cartId ?>');" ><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    <td class="text-right">Rs. <?=$car->price?></td>
                    <td class="text-right"><?php echo @$totalprice= ((@$car->quantity)*(@$car->price))?></td>
                  </tr>
                   <?php @$subtotal=@$totalprice + $subtotal ?>
                  <?php endforeach ?>
                <?php } else{?>
                  <tr><td colspan="6">No Product found in your Cart list</td></tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          <!-- <h3 class="subtitle no-margin">What would you like to do next?</h3>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
      <div class="panel-group" id="accordion">
       
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a href="#collapse-shipping" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">Estimate Shipping &amp; Taxes 
                     
                     <i class="fa fa-caret-down"></i>
                  </a>
               </h4>
            </div>
            <div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
               <div class="panel-body">
                  <p>Enter your destination to get a shipping estimate.</p>
                  <div class="form-horizontal">
                     <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">Country</label>
                        <div class="col-sm-10">
                           <select name="country_id" id="input-country" class="form-control">
                              <option value=""> --- Please Select --- </option>
                              <option value="244">Aaland Islands</option>
                              <option value="1">Afghanistan</option>
                              <option value="2">Albania</option>
                              <option value="3">Algeria</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-zone">Region / State</label>
                        <div class="col-sm-10">
                           <select name="zone_id" id="input-zone" class="form-control">
                              <option value=""> --- Please Select --- </option>
                              <option value="3513">Aberdeen</option>
                              <option value="3514">Aberdeenshire</option>
                              <option value="3515">Anglesey</option>
                              <option value="3516">Angus</option>
                              <option value="3517">Argyll and Bute</option>
                              <option value="3518">Bedfordshire</option>
                              <option value="3519">Berkshire</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
                        <div class="col-sm-10"><input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control"></div>
                     </div>
                        <button type="button" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Get Quotes</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  <a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Use Gift Certificate 
                     
                     <i class="fa fa-caret-down"></i>
                  </a>
               </h4>
            </div>
            <div id="collapse-voucher" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
               <div class="panel-body">
                  <label class="col-sm-2 control-label" for="input-voucher">Enter your gift certificate code here</label>
                  <div class="input-group">
                     <input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
                     <span class="input-group-btn"><input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary"></span>
                  </div>
               </div>
            </div>
         </div>
      </div> -->
      
      <div class="row">
         <div class="col-sm-4 col-sm-offset-8">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <td class="text-right">
                        <strong>Sub-Total:</strong>
                     </td>
                     <td class="text-right">$<?= $subtotal ?></td>
                  </tr>
                  <tr>
                     <td class="text-right">
                        <strong>Flat Shipping Rate:</strong>
                     </td>
                     <td class="text-right">$ 0</td>
                  </tr>
                  <tr>
                     <td class="text-right">
                        <strong>Eco Tax (-2.00):</strong>
                     </td>
                     <td class="text-right">$0</td>
                  </tr>
                  <tr>
                     <td class="text-right">
                        <strong>VAT (20%):</strong>
                     </td>
                     <td class="text-right">$0</td>
                  </tr>
                  <tr>
                     <td class="text-right">
                        <strong>Total:</strong>
                     </td>
                     <td class="text-right">$<?= $subtotal ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>

       <div class="buttons">
            <div class="pull-left"><a href="##" class="btn btn-primary">Continue Shopping</a></div>
            <div class="pull-right"><a href="<?=base_url('user/checkout')?>" class="btn btn-primary">Checkout</a></div>
          </div>
        </div>
        <!--Middle Part End -->
         
      </div>
   </div>
