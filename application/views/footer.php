<?php 
   $settingfooter = $this->mymodel->getSettings();
   ?>
</div>
</div>
</section>
<div class="clearfix"></div>
<section id="" class="section_1  section-color ">
   <div class="container page-builder-ltr">
      <div class="row row_m1ch  row-style  row-color ">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_itqc  col-style">
            <div class="clearfix bonus-menus">
               <ul class="row">
                  <li class="item free col-md-3">
                     <div class="icon">
                        <img src="<?= base_url()?>frontend/image/new-image/icon-1.png" alt="Static Image">
                     </div>
                     <div class="text">
                        <h5><a href="javascript:void(0);">Free shipping</a></h5>
                        <p>Free shipping oder $100</p>
                     </div>
                  </li>
                  <li class="item secure col-md-3">
                     <div class="icon">
                        <img src="<?= base_url()?>frontend/image/new-image/icon-2.png" alt="Static Image">
                     </div>
                     <div class="text">
                        <h5><a href="javascript:void(0);">Secure Payment</a></h5>
                        <p>We value your security</p>
                     </div>
                  </li>
                  <li class="item support col-md-3">
                     <div class="icon">
                        <img src="<?= base_url()?>frontend/image/new-image/icon-3.png" alt="Static Image">
                     </div>
                     <div class="text">
                        <h5><a href="javascript:void(0);">Online support</a></h5>
                        <p>We have support 24/7</p>
                     </div>
                  </li>
                  <li class="item payment col-md-3">
                     <div class="icon">
                        <img src="<?= base_url()?>frontend/image/new-image/icon-4.png" alt="Static Image">
                     </div>
                     <div class="text">
                        <h5><a href="javascript:void(0);">Payment on Delivery</a></h5>
                        <p>Cash on delivery option</p>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="clearfix"></div>
<section id="" class="section_2  section-color sub-section">
   <div class="container page-builder-ltr">
      <div class="row row_34bo  row-style ">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_9jik  col-style">
            <div class="module news-letter">
               <div class="so-custom-default newsletter" style="width:100% ; background-color: #f0f0f0 ; ">
                  <div class="btn-group title-block">
                     <div class="popup-title page-heading">
                        <i class="fa fa-paper-plane-o"></i> Subscribe to Newsletter
                     </div>
                     <div class="newsletter_promo"> get  special offers information.</div>
                  </div>
                  <div class="modcontent block_content">
                     <?php if($this->session->flashdata('succ_sub')){ ?>
                     <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> <?php echo $this->session->flashdata('succ_sub'); ?>
                     </div>
                     <?php }else if($this->session->flashdata('err_sub')){  ?>
                     <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('err_sub'); ?>
                     </div>
                     <?php }else if($this->session->flashdata('warn_sub')){  ?>
                     <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Warning!</strong> <?php echo $this->session->flashdata('warn_sub'); ?>
                     </div>
                     <?php } ?>
                     <form method="post" action="<?=base_url('home/subscribe')?>" class="form-group form-inline">
                        <div class="input-group form-group required">
                           <div class="input-box">
                              <input type="email" required="" placeholder="Your email address..."  class="form-control"  name="email" size="55">
                           </div>
                           <div class="input-group-btn subcribe">
                              <button class="btn btn-primary" type="submit" name="submit">
                              <i class="fa fa-envelope hidden"></i>
                              <span>Subscribe</span>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!--/.modcontent-->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Footer Container -->
<footer class="footer-container type_footer1">
   <!-- Footer Top Container -->
   <section class="footer-top">
      <div class="container content">
         <div class="row">
            <div class="col-sm-6 col-md-3 box-information">
               <div class="footer-links">
                  <h4 class="title-footer">Our Contact</h4>
                  <p>They key is to have every key, the key to open every door. We don’t see them we will</p>
                  <div class="content-footer">
                     <div class="address">
                        <label><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                        <span><?= $settingfooter->address ?></span>
                     </div>
                     <div class="phone">
                        <label><i class="fa fa-phone" aria-hidden="true"></i></label>
                        <span><?= $settingfooter->phone ?></span>
                     </div>
                     <div class="email">
                        <label><i class="fa fa-envelope"></i></label>
                        <a href="javascript:void(0);"><?= $settingfooter->email ?></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 box-service">
               <div class="footer-links">
                  <h4 class="title-footer">
                     Information
                  </h4>
                  <ul class="links list-unstyled">
                     <li>
                        <a title="About US" href="<?=base_url('about')?>">About US</a>
                     </li>
                     <li>
                        <a title="Contact us" href="<?=base_url('contact')?>">Contact us</a>
                     </li>
                     <li>
                        <a title="Warranty And Services" href="<?=base_url('page/warranty')?>">Warranty And Services</a>
                     </li>
                     <li>
                        <a title="Support 24/7 Page" href="<?=base_url('page/support')?>">Support 24/7 Page</a>
                     </li>
                     <li>
                        <a title="Terms And Conditions" href="<?=base_url('page/term')?>">Terms And Conditions</a>
                     </li>
                     <li>
                        <a title="Policy" href="<?=base_url('page/policy')?>"> Privacy Policy</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 box-account">
               <div class="footer-links">
                  <h4 class="title-footer">
                     My Account
                  </h4>
                  <ul class="links list-unstyled">
                     <li>
                        <a title="My Account" href="<?=base_url('user')?>">My Account</a>
                     </li>
                     <li>
                        <a title="Checkout" href="##">Checkout</a>
                     </li>
                     <li>
                        <a href="<?=base_url('user/wishlist')?>"> Wishlist</a>
                     </li>
                     <li>
                        <a title="Order History" href="<?=base_url('user/orderlist')?>">Order History</a>
                     </li>
                     <li>
                        <a title="Your Transactions" href="<?=base_url('user/orderhistory')?>">Your Transactions</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-6 col-md-3 collapsed-block ">
               <div class="module so-latest-blog footer_lastestblog footer-links  preset01-4 preset02-4 preset03-3 preset04-2 preset05-1">
                  <h4 class="title-footer"><span>App Download</span></h4>
                  <div class="modcontent">
                     <div class="app-store spcustom_html">
                        <div>
                           <a class="app-2" href="javascript:void(0);">apple store</a>
                           <a class="app-1" href="javascript:void(0);">window store</a>
                        </div>
                     </div>
                     <div class="footer-social" style="margin-top: 2%;">
                        <h3 class="block-title text-left">Follow us</h3>
                        <div class="socials">
                           <a href="<?= $settingfooter->facebook ?>" class="facebook" target="_blank">
                              <i class="fa fa-facebook"></i>
                              <p>on</p>
                              <span class="name-social">Facebook</span>
                           </a>
                           <a href="<?= $settingfooter->twitter ?>" class="twitter" target="_blank">
                              <i class="fa fa-twitter"></i>
                              <p>on</p>
                              <span class="name-social">Twitter</span>
                           </a>
                           <a href="<?= $settingfooter->google_plus ?>" class="google" target="_blank">
                              <i class="fa fa-google-plus"></i>
                              <p>on</p>
                              <span class="name-social">Google +</span>
                           </a>
                           <a href="<?= $settingfooter->linkedin ?>" class="linkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>     
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 collapsed-block footer-links">
               <div class="module clearfix">
                  <div class="modcontent">
                     <hr class="footer-lines">
                     <div class="footer-directory-title">
                        <h4 class="label-link">Top Stores : Brand Directory | Store Directory</h4>
                        <ul class="footer-directory">
                           <?php  $catlist= $this->mymodel->get_by("category",false,"status=1","categoryName"); 
                              foreach ($catlist as $key => $c) { ?>
                           <li>
                              <h4><?= $c->categoryName ?>:</h4>
                              <?php  $subCatlist= $this->mymodel->get_by("subcategory",false,"categoryId=$c->categoryId AND status=1","subcategoryName"); 
                                 foreach ($subCatlist as $key => $suv) { 
                                  $totalsub=count($subCatlist);
                                  $lastsub=$totalsub-1;
                                 
                                  ?>
                              <a href="<?=base_url()?>product/catproduct/<?=$suv->subcategoryId?>/<?= $suv->subcategoryName?>"><?= $suv->subcategoryName ?> </a> |
                              <?php  } ?>
                              |
                           </li>
                           <?php  } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /Footer Top Container -->
   <!-- Footer Bottom Container -->
   <div class="footer-bottom-block ">
      <div class=" container">
         <div class="row">
            <div class="col-sm-5 copyright-text"> &copy; <?= date('Y')?> Peokart. All Rights Reserved. </div>
            <div class="col-sm-7">
               <div class="block-payment text-right"><img src="<?= base_url()?>frontend/image/demo/content/payment.png" alt="payment" title="payment" ></div>
            </div>
            <!--Back To Top-->
            <div class="back-to-top"><i class="fa fa-angle-up"></i><span> Top </span></div>
         </div>
      </div>
   </div>
   <!-- /Footer Bottom Container -->
</footer>
<!-- //end Footer Container -->
</div>
<!-- Social widgets -->
<section class="social-widgets visible-lg">
   <ul class="items">
      <li class="item item-01 facebook">
         <a href="javascript:void(0)" class="tab-icon"><span class="fa fa-facebook"></span></a>
         <div class="tab-content">
            <div class="title">
               <h5>FACEBOOK</h5>
            </div>
         </div>
      </li>
      <li class="item item-02 twitter">
         <a href="javascript:void(0)" class="tab-icon"><span class="fa fa-twitter"></span></a>
         <div class="tab-content">
            <div class="title">
               <h5>TWITTER FEEDS</h5>
            </div>
         </div>
      </li>
      <li class="item item-03 youtube">
         <a href="javascript:void(0)" class="tab-icon"><span class="fa fa-youtube"></span></a>
         <div class="tab-content">
            <div class="title">
               <h5>YouTube</h5>
            </div>
         </div>
      </li>
   </ul>
</section>
<!-- End Social widgets -->
<!-- Include Libs & Plugins
   ============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?= base_url()?>frontend/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/themejs/libs.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/unveil/jquery.unveil.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/datetimepicker/moment.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/modernizr/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/themejs/application.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/themejs/homepage.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/themejs/so_megamenu.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/themejs/addtocart.js"></script>
<script type="text/javascript" src="<?= base_url()?>frontend/js/toppanel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBCrb9jMgk334tpDcleP0O-OXJ1iwkC0A&libraries=places&callback=initialize"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="<?= base_url()?>frontend/js/star-rating.js"></script> 

<script>
   window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
     });
   }, 4000);
</script>
<script>
   function checkRefferal() {
     
    var refId = $("#referralid").val();
   
     $.ajax({
               type: "POST",
               url: "<?php echo base_url();?>register/checkRefferal",
               data: "refid=" + refId,
               success: function (data) {
               
               $("#checkresult").text(data);
   
               }
           });
      
   }
</script>
<script>
   var currentUrl='<?php echo current_url(); ?>';
   
   function addcart(id,product) {
    
           $.ajax({
               type: "POST",
               url: "<?php echo base_url();?>user/addCart",
               data: "id=" + id,
               success: function (data) {
               
               $('#cart').load(document.URL +  ' #cart');
               addProductNotice('Product added to Cart', '', '<h3>' +product +' added to shopping cart!</h3>', 'success');
   
               }
           });
   
       
   }
    function addwishlist(id) {
   
           $.ajax({
               type: "POST",
               url: "<?php echo base_url();?>user/addWishlist",
               data: "id=" + id+ "&redirect=" + currentUrl,
               success: function (data) {
                   window.location.reload();
               }
           });
   
       
   }
   function deletecart(id) {
       cnf = confirm("Are you confirm to delete?");
       if (cnf) {
   
           $('.portlet .tools a.reload').click();
           $.ajax({
               type: "GET",
               url: "<?php echo base_url();?>user/deleteProduct",
               data: "id=" + id,
               success: function (data) {
   
                 $('#cart').load(document.URL +  ' #cart');
   
   
               }
           });
   
       }
   }
   function deletewishlist(id)
   {
     cnf=confirm("Are you confirm to remove from wishlist");
     if(cnf){
       $.ajax({
               type: "GET",
               url: "<?php echo base_url();?>user/deletewishlist",
               data: "id=" + id,
               success: function (data) {
   
                   window.location.reload();
   
   
               }
           });
   
     }
   }
   function updatecart(id, product_id) {
   
   
       $.ajax({
           type: "GET",
           url: "<?php echo base_url();?>user/updatecart",
           data: "id=" + id + "&product_id=" + product_id,
           success: function (data) {
               window.location.reload();
           }
       });
   
   }
</script>
<script type="text/javascript">
   $(document).ready(function() {
               $('input:checkbox[id*=chkCopy]').change(function() {
                   if ($(this).is(':checked')) {
                       $('input:text[id*=input-shipping-firstname]').val($('input:text[id*=input-payment-firstname]').val());
                       $('input:text[id*=input-shipping-lastname]').val($('input:text[id*=input-payment-lastname]').val());
                        $('input:text[id*=input-shipping-address-1]').val($('input:text[id*=geolocation]').val());
                         $('input:text[id*=input-shipping-city]').val($('input:text[id*=input-payment-city]').val());
                          $('input:text[id*=input-shipping-postcode]').val($('input:text[id*=input-payment-postcode]').val());
                   }
                   else {
                       $('input:text[id*=input-shipping-firstname]').val('');
                       $('input:text[id*=input-shipping-lastname]').val('');
                       $('input:text[id*=input-shipping-address-1]').val('');
                       $('input:text[id*=input-shipping-city]').val('');
                        $('input:text[id*=input-shipping-postcode]').val('');
                   }
               });
           });
</script>
<script>
   $('.trending-search').owlCarousel2({
     loop:true,
     margin:0,
     autoplay:true,
     nav:true,
     navText: ["<span class='fa fa-'></span>","<span class='icon icon-arrow-right7'></span>"],
     responsive:{
       0:{
         items:1
       },
       600:{
         items:3
       },
       1000:{
         items:6
       }
     }
   })
</script> 
<script>
   function fetchProduct(id) {
      alert(id);
     $.ajax({
       type: "POST",
       url: "",
       data:'country_id='+id,
       success: function(data){
         //alert(data);
         $('.subcatlist .subcol'+id).html(data);
       }
     });
   }
</script>
<script>
   var baseUrl = $('#baseUrl').val();
   
   var adminUrl = $('#adminUrl').val();
   
   
   
   
   function checkStoreName(store_name) {
   
   $.ajax({
   
     url: adminUrl+'profile/check_store_name',
   
     type: 'post',
   
     dataType: 'html',
   
     data: {storeName: store_name},
   
   })
   
   .done(function(data) {
   
     if (data=='') {
   
       $('input:submit').attr('disabled', 'disabled');
   
     } else {
   
       $('input:submit').removeAttr('disabled');
   
     }
   
     $('#store-name-field').text(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function CategoryListing(bId) {
   
   $.ajax({
   
     url: adminUrl+'products/get_category',
   
     type: 'post',
   
     dataType: 'html',
   
     data: {bazarId: bId},
   
   })
   
   .done(function(data) {
   
     $('#category').html(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function subCategoryListing(cId) {
   
   $.ajax({
   
     url: "<?php echo base_url('user/get_subcategory') ?>",
   
     type: 'post',
   
     dataType: 'html',
   
     data: {categoryId: cId},
   
   })
   
   .done(function(data) {
   
     $('#subCategory').html(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function autoGenerateUrl(data) {
   
   var outputString = data.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/?])+/g,'').replace(/([\s])+/g,'-').replace(/^(-)+|(-)+$/g,'');
   
   $('input#autoFillUrl').val(outputString.toLowerCase());
   
   }
   
   
   
   $('#autoGenerateUrl').on('focus, keyup, keydown focusout', function(event) {
   
   autoGenerateUrl($(this).val());
   
   });
   
   
   
   
   
   function changeProductStatus(pId, newStatus) {
   
   $.ajax({
   
     url: adminUrl+'products/change_status',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       productStatus: String(newStatus),
   
       productId: pId
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   }); 
   
   }
   
   
   
   
   
   function changeSellerStatus(uId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'seller/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       userId: String(uId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   }); 
   
   }
   
   
   
   
   
   function changeBazarStatus(bId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'bazar/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       bazarId: String(bId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   }); 
   
   }
   
   
   
   
   
   function changeBusinessStatus(bId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'business/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       businessTypeId: String(bId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   }); 
   
   }
   
   
   
   
   
   function changeDocumentStatus(dId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'document/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       documentTypeId: String(dId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function changeCategoryStatus(cId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'category/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       categoryId: String(cId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   }); 
   
   }
   
   
   
   
   
   function changeSubCategoryStatus(sId, thisSwitch) {
   
   var newStatus;
   
   if (thisSwitch.val() == 1) {
   
     thisSwitch.val('0');
   
     newStatus = '0';
   
   } else {
   
     thisSwitch.val('1');
   
     newStatus = '1';
   
   }
   
   $.ajax({
   
     url: adminUrl+'subcategory/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       subcategoryId: String(sId),
   
       status: String(newStatus)
   
     },
   
   })
   
   .done(function(data) {
   
     alert_func(data);
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function deleteProductImage(imageName, imageId, thisBtn) {
   
   swal({
   
     title: 'Are You sure want to delete this image?',
   
     type: 'warning',
   
     showCancelButton: true,
   
     confirmButtonColor: '#A5DC86',
   
     cancelButtonColor: '#DD6B55',
   
     confirmButtonText: 'Yes',
   
     cancelButtonText: 'No',
   
     closeOnConfirm: true,
   
     closeOnCancel: true
   
   }, function(isConfirm){
   
     if (isConfirm) {
   
       $.ajax({
   
         url: adminUrl+'products/delete_product_image',
   
         type: 'POST',
   
         dataType: 'json',
   
         data: {
   
           productImageId: imageId,
   
           productImageName: imageName
   
         },
   
       })
   
       .done(function(data) {
   
         thisBtn.parent('.thumbnail').parent('.fileinput.fileinput-new').remove();
   
         alert_func(data);
   
       })
   
       .fail(function(data) {
   
         console.log(data);
   
       });
   
     }
   
   });
   
   }
   
   
   
   
   
   function showEnquiryDetails(enqId) {
   
   $.ajax({
   
     url: adminUrl+'enquiry/view',
   
     type: 'POST',
   
     dataType: 'html',
   
     data: {
   
       enquiryId: enqId,
   
     },
   
   })
   
   .done(function(res) {
   
     var data = res.trim();
   
     if (res != '') {
   
       if (res == 'noEnquiry') {
   
         alert_func(["Bazar updated successfully!", "success", "#A5DC86"]);
   
       } else {
   
         $('#view-enquiries-modal .modal-body').html(res);
   
         $('#view-enquiries-modal').modal('show');
   
       }
   
     }
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
   
   
   
   
   
   function changeEnquiryStatus(enqId, thisElement) {
   
   var newStatus = String(thisElement.val());
   
     console.log(enqId);
   
     console.log(newStatus);
   
   $.ajax({
   
     url: adminUrl+'enquiry/changeStatus',
   
     type: 'POST',
   
     dataType: 'json',
   
     data: {
   
       enquiryId: String(enqId),
   
       status: String(newStatus),
   
     },
   
   })
   
   .done(function(data) {
   
     console.log(data);
   
     $('#view-enquiries-modal').modal('hide');
   
     if (data[1] == 'success') {
   
       if (String(newStatus) == '1') {
   
         $('#status-id-'+enqId).html('<h4 class="label label-success">Replied</h4>');
   
       } else {
   
         $('#status-id-'+enqId).html('<h4 class="label label-warning">Pending</h4>');
   
       }
   
     }
   
     swal({
   
       title: data[0],
   
       type: data[1],
   
       showCancelButton: false,
   
       confirmButtonColor: data[2],
   
       confirmButtonText: 'Ok',
   
       closeOnConfirm: true
   
     }, function(isConfirm){
   
       if (isConfirm) {
   
         $('#view-enquiries-modal').modal('show');
   
       }
   
     });
   
   })
   
   .fail(function(data) {
   
     console.log(data);
   
   });
   
   }
</script>
</body>
</html>