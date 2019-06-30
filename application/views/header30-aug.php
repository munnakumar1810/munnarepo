<?php $setting = $this->mymodel->getSettings(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title><?= SITENAME ?>  |  <?php if(!empty($title)) { echo $title;}?></title>
   <meta charset="utf-8">
   <meta name="keywords" content="Webunika" />
   <meta name="author" content="Webunika">
   <meta name="robots" content="index, follow" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link rel="shortcut icon" href="<?= base_url('uploads/logos/'.$setting->favicon) ?>">
   <!-- Google web fonts====================== -->
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
   <!-- Libs CSS============================ -->
   <link rel="stylesheet" href="<?= base_url()?>frontend/css/bootstrap/css/bootstrap.min.css">
   <link href="<?= base_url()?>frontend/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/js/owl-carousel/owl.carousel.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/themecss/lib.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
   <!-- Theme CSS  ==================== -->
   <link href="<?= base_url()?>frontend/css/themecss/so_megamenu.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/themecss/so-categories.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/themecss/so-listing-tabs.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/themecss/so-newletter-popup.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/themecss/just_purchased_notification.css" rel=stylesheet>
   <link href="<?= base_url()?>frontend/css/footer1.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/header1.css" rel="stylesheet">
   <link id="color_scheme" href="<?= base_url()?>frontend/css/theme.css" rel="stylesheet">
   <link href="<?= base_url()?>frontend/css/responsive.css" rel="stylesheet">
</head>
<body class="common-home res layout-home1">
   <div id="wrapper" class="wrapper-full banners-effect-7">
      <!-- Header Container  -->
      <header id="header" class=" variantleft type_1">
         <!-- Header Top -->
         <div class="header-top ">
            <div class="container">
               <div class="row">
                  <div class="header-top-left form-inline col-sm-6 col-xs-12 ">
                     <ul class="list-inline">
                        <li class="email"><i class="fa fa-envelope"></i> Marketing@topdeal.com</li>
                        <li class="address"><i class="fa fa-map-marker"></i> Manhattan St, Amarillo, US</li>
                     </ul>
                  </div>
                  <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 ">
                     <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                     <div class="tabBlock" id="TabBlock-1">
                        <ul class="top-link list-inline">
                           <li class="account" id="my_account">
                              <?php if($this->session->userdata('userId')!=''){ ?>
                               <a href="javascript:void(0);" title="My Account" class="btn btn-xs dropdown-toggle" > <span>User</span> <span class="fa fa-angle-down"></span> </a>
                                 <ul class="dropdown-menu btn-xs">
                                    <li> <a href="<?=base_url('user')?>">Dashboard</a></li>
                                    <li> <a href="javascript:void(0);">Settings</a></li>
                                    <li> <a href="<?=base_url('auth/logout')?>">Logout</a></li>
                                 </ul>
                              <?php } else{ ?>
                                 <a href="<?=base_url('auth/login')?>" title="My Account" class="btn btn-xs dropdown-toggle" > <span>Register/Login</span> </a>
                              <?php }?>
                           </li>
                        </ul>
                        <div class="form-group currencies-block">
                           <form action="" method="post" enctype="multipart/form-data" id="currency">
                              <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                 <span class="icon icon-credit "></span>$ US Dollar <span class="fa fa-angle-down"></span>
                              </a>
                              <ul class="dropdown-menu btn-xs">
                                 <li> <a href="javascript:void(0);">(€)&nbsp;Euro</a></li>
                                 <li> <a href="javascript:void(0);">(£)&nbsp;Pounds	</a></li>
                                 <li> <a href="javascript:void(0);">($)&nbsp;US Dollar	</a></li>
                              </ul>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- //Header Top -->
         <!-- Header center -->
         <div class="header-center left">
            <div class="container">
               <div class="row">
                  <!-- Logo -->
                  <div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
                     <a href="<?= base_url()?>"><img src="<?= base_url('uploads/logos/'.$setting->title) ?>" title="Your Store" alt="Your Store" /></a>
                  </div>
                  <!-- //end Logo -->
                  <!-- Search -->
                  <div id="sosearchpro" class="col-sm-6 search-pro">
                     <form method="GET" action="">
                        <div id="search0" class="search input-group">
                           <div class="select_category filter_type icon-select">
                              <select class="no-border" name="category_id">
                                 <option value="0">All Categories</option>
                                 <option value="78">Apparel</option>
                                 <option value="77">Cables &amp; Connectors</option>
                                 <option value="82">Cameras &amp; Photo</option>
                                 <option value="80">Flashlights &amp; Lamps</option>
                                 <option value="81">Mobile Accessories</option>
                                 <option value="79">Video Games</option>
                                 <option value="20">Jewelry &amp; Watches</option>
                                 <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                 <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                 <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                              </select>
                           </div>
                           <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
                           <span class="input-group-btn">
                              <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                           </span>
                        </div>
                        <input type="hidden" name="route" value="product/search" />
                     </form>
                  </div>
                  <!-- //end Search -->
                  <!-- Secondary menu -->
                  <div class="col-md-3 col-sm-6 col-xs-12 shopping_cart pull-right">
                     <div class="bt-head header-phone">
                        <div class="call-us hidden-sm-down">
                           <div class="icon"></div>
                           <div class="text">
                              <p class="title">Free Call Us</p>
                              <p class="phone">(+123) 456 7890</p>
                           </div>
                        </div>
                     </div>
                     <div id="cart" class=" btn-group btn-shopping-cart">
                        <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                           <div class="shopcart">
                              <span class="handle pull-left"></span>
                              <span class="title">My cart</span>
                              <p class="text-shopping-cart cart-total-full">0 item(s)</p>
                           </div>
                        </a>
                        <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
                           <li>
                              <table class="table table-striped">
                                 <tbody>
                                    <tr>
                                       <td class="text-center" style="width:70px">
                                          <a href="javascript:void(0)"> <img src="<?= base_url()?>frontend/image/demo/shop/product/resize/2.jpg" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
                                       </td>
                                       <td class="text-left"> <a class="cart_product_name" href="javascript:void(0)">Filet Mign</a> </td>
                                       <td class="text-center"> x1 </td>
                                       <td class="text-center"> $1,202.00 </td>
                                       <td class="text-right">
                                          <a href="javascript:void(0)" class="fa fa-edit"></a>
                                       </td>
                                       <td class="text-right">
                                          <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="text-center" style="width:70px">
                                          <a href="javascript:void(0)"> <img src="<?= base_url()?>frontend/image/demo/shop/product/resize/3.jpg" style="width:70px" alt="Canon EOS 5D" title="Canon EOS 5D" class="preview"> </a>
                                       </td>
                                       <td class="text-left"> <a class="cart_product_name" href="javascript:void(0)">Canon EOS 5D</a> </td>
                                       <td class="text-center"> x1 </td>
                                       <td class="text-center"> $60.00 </td>
                                       <td class="text-right">
                                          <a href="javascript:void(0)" class="fa fa-edit"></a>
                                       </td>
                                       <td class="text-right">
                                          <a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </li>
                           <li>
                              <div>
                                 <table class="table table-bordered">
                                    <tbody>
                                       <tr>
                                          <td class="text-left"><strong>Sub-Total</strong>
                                          </td>
                                          <td class="text-right">$1,060.00</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                          </td>
                                          <td class="text-right">$2.00</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left"><strong>VAT (20%)</strong>
                                          </td>
                                          <td class="text-right">$200.00</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left"><strong>Total</strong>
                                          </td>
                                          <td class="text-right">$1,262.00</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <p class="text-right"> <a class="btn view-cart" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="javascript:void(0)"><i class="fa fa-share"></i>Checkout</a> </p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- //Header center -->
         <!-- Header Bottom -->
         <div class="header-bottom">
            <div class="container">
               <div class="row">
                  <div class="sidebar-menu col-md-3 col-sm-6 col-xs-12 ">
                     <div class="responsive so-megamenu ">
                        <div class="so-vertical-menu no-gutter ">
                           <nav class="navbar-default">
                              <div class="container-megamenu vertical ">
                                 <div id="menuHeading">
                                    <div class="megamenuToogle-wrapper">
                                       <div class="megamenuToogle-pattern">
                                          <div class="container">
                                             <div>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                             </div>
                                             All Categories							
                                             <i class="fa pull-right arrow-circle fa-chevron-circle-down"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="navbar-header">
                                    <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
                                    </button>
                                    All Categories		
                                 </div>
                                 <div class="vertical-wrapper" >
                                    <span id="remove-verticalmenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                       <div class="container">
                                          <ul class="megamenu">
                                             <li class="item-vertical style1 with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/9.png" alt="icon">
                                                   <span>Automotive &amp; Motocrycle</span>
                                                   <b class="caret"></b>
                                                </a>
                                                <div class="sub-menu" data-subwidth="100" >
                                                   <div class="content" >
                                                      <div class="row">
                                                         <div class="col-sm-12">
                                                            <div class="row">
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Apparel</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" >Accessories for Tablet PC</a></li>
                                                                              <li><a href="javascript:void(0);" >Accessories for i Pad</a></li>
                                                                              <li><a  href="javascript:void(0);" >Accessories for iPhone</a></li>
                                                                              <li><a href="javascript:void(0);" >Bags, Holiday Supplies</a></li>
                                                                              <li><a href="javascript:void(0);" >Car Alarms and Security</a></li>
                                                                              <li><a href="javascript:void(0);" >Car Audio &amp; Speakers</a></li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Cables &amp; Connectors</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" >Cameras &amp; Photo</a></li>
                                                                              <li><a href="javascript:void(0);" >Electronics</a></li>
                                                                              <li><a href="javascript:void(0);" >Outdoor &amp; Traveling</a></li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Camping &amp; Hiking</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" >Earings</a></li>
                                                                              <li><a href="javascript:void(0);" >Shaving &amp; Hair Removal</a></li>
                                                                              <li><a href="javascript:void(0);" >Salon &amp; Spa Equipment</a></li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Smartphone &amp; Tablets</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" >Sports &amp; Outdoors</a></li>
                                                                              <li><a href="javascript:void(0);" >Bath &amp; Body</a></li>
                                                                              <li><a href="javascript:void(0);" >Gadgets &amp; Auto Parts</a></li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Bags, Holiday Supplies</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Battereries &amp; Chargers</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Bath &amp; Body</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Headphones, Headsets</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Home Audio</a></li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="item-vertical">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/10.png" alt="icon">
                                                   <span>Electronic</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <span class="label"></span>
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/3.png" alt="icon">
                                                   <span>Sports &amp; Outdoors</span>
                                                   <b class="caret"></b>
                                                </a>
                                                <div class="sub-menu" data-subwidth="60" >
                                                   <div class="content">
                                                      <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="row">
                                                               <div class="col-md-12 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';" class="main-menu">Mobile Accessories</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Gadgets &amp; Auto Parts</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Bath &amp; Body</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Bags, Holiday Supplies</a></li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';" class="main-menu">Battereries &amp; Chargers</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Outdoor &amp; Traveling</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Flashlights &amp; Lamps</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Fragrances</a></li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';" class="main-menu">Fishing</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">FPV System &amp; Parts</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Electronics</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">Earings</a></li>
                                                                              <li><a href="javascript:void(0);" onclick="window.location = 'javascript:void(0)';">More Car Accessories</a></li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="row banner">
                                                               <a href="javascript:void(0);">
                                                                  <img src="<?= base_url()?>frontend/image/demo/cms/menu_bg2.jpg" alt="banner1">
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="item-vertical with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/2.png" alt="icon">
                                                   <span>Health &amp; Beauty</span>
                                                   <b class="caret"></b>
                                                </a>
                                                <div class="sub-menu" data-subwidth="100" >
                                                   <div class="content" >
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="row">
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Car Alarms and Security</a>
                                                                           <ul>
                                                                              <li><a href="javascript:void(0);" >Car Audio &amp; Speakers</a></li>
                                                                              <li><a href="javascript:void(0);" >Gadgets &amp; Auto Parts</a></li>
                                                                              <li><a href="javascript:void(0);" >Gadgets &amp; Auto Parts</a></li>
                                                                              <li><a href="javascript:void(0);" >Headphones, Headsets</a></li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0)" onclick="window.location = 'javascript:void(0)';" class="main-menu">Health &amp; Beauty</a>
                                                                           <ul>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Home Audio</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Helicopters &amp; Parts</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Outdoor &amp; Traveling</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);">Toys &amp; Hobbies</a>
                                                                              </li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Electronics</a>
                                                                           <ul>
                                                                              <li>
                                                                                 <a href="javascript:void(0);">Earings</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Salon &amp; Spa Equipment</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Shaving &amp; Hair Removal</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);">Smartphone &amp; Tablets</a>
                                                                              </li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);"  class="main-menu">Sports &amp; Outdoors</a>
                                                                           <ul>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Flashlights &amp; Lamps</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Fragrances</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Fishing</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >FPV System &amp; Parts</a>
                                                                              </li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 static-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">More Car Accessories</a>
                                                                           <ul>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Lighter &amp; Cigar Supplies</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Mp3 Players &amp; Accessories</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Men Watches</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Mobile Accessories</a>
                                                                              </li>
                                                                           </ul>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Gadgets &amp; Auto Parts</a>
                                                                           <ul>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Gift &amp; Lifestyle Gadgets</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Gift for Man</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Gift for Woman</a>
                                                                              </li>
                                                                              <li>
                                                                                 <a href="javascript:void(0);" >Gift for Woman</a>
                                                                              </li>
                                                                           </ul>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="item-vertical css-menu with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/2.png" alt="icon">
                                                   <span>Smartphone &amp; Tablets</span>
                                                   <b class="caret"></b>
                                                </a>
                                                <div class="sub-menu" data-subwidth="30" style="width: 270px; display: none; right: 0px;">
                                                   <div class="content" style="display: none;">
                                                      <div class="row">
                                                         <div class="col-sm-12">
                                                            <div class="row">
                                                               <div class="col-sm-12 hover-menu">
                                                                  <div class="menu">
                                                                     <ul>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Headphones, Headsets</a>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Home Audio</a>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Health &amp; Beauty</a>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Helicopters &amp; Parts</a>
                                                                        </li>
                                                                        <li>
                                                                           <a href="javascript:void(0);" class="main-menu">Helicopters &amp; Parts</a>
                                                                        </li>
                                                                     </ul>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="item-vertical">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/11.png" alt="icon">
                                                   <span>Flashlights &amp; Lamps</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/4.png" alt="icon">
                                                   <span>Camera &amp; Photo</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/5.png" alt="icon">
                                                   <span>Smartphone &amp; Tablets</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" >
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/7.png" alt="icon">
                                                   <span>Outdoor &amp; Traveling Supplies</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" style="display: none;">
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/6.png" alt="icon">
                                                   <span>Health &amp; Beauty</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" >
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/8.png" alt="icon">
                                                   <span>Toys &amp; Hobbies </span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" >
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/12.png" alt="icon">
                                                   <span>Jewelry &amp; Watches</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" >
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/13.png" alt="icon">
                                                   <span>Bags, Holiday Supplies</span>
                                                </a>
                                             </li>
                                             <li class="item-vertical" >
                                                <p class="close-menu"></p>
                                                <a href="javascript:void(0);" class="clearfix">
                                                   <img src="<?= base_url()?>frontend/image/theme/icons/13.png" alt="icon">
                                                   <span>More Car Accessories</span>
                                                </a>
                                             </li>
                                             <li class="loadmore">
                                                <i class="fa fa-plus-square-o"></i>
                                                <span class="more-view">More Categories</span>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </nav>
                        </div>
                     </div>
                  </div>
                  <!-- Main menu -->
                  <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12 ">
                     <div class="responsive so-megamenu ">
                        <nav class="navbar-default">
                           <div class=" container-megamenu  horizontal">
                              <div class="navbar-header">
                                 <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                 </button>
                                 Navigation		
                              </div>
                              <div class="megamenu-wrapper">
                                 <span id="remove-megamenu" class="fa fa-times"></span>
                                 <div class="megamenu-pattern">
                                    <div class="container">
                                       <ul class="megamenu " data-transition="slide" data-animationtime="250">
                                          <li class="home">
                                             <a href="index.html">Home </a>
                                          </li>
                                          <li class="with-sub-menu hover">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0);" class="clearfix">
                                                <strong>Features</strong>
                                                <img class="label-hot" src="<?= base_url()?>frontend/image/new-image/hot-icon.png" alt="icon items">
                                                <b class="caret"></b>
                                             </a>
                                             <div class="sub-menu" style="width: 100%; right: auto;">
                                                <div class="content" >
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <div class="column">
                                                            <a href="javascript:void(0);" class="title-submenu">Listing pages</a>
                                                            <div>
                                                               <ul class="row-list">
                                                                  <li><a href="javascript:void(0)">Category Page 1 </a></li>
                                                                  <li><a href="javascript:void(0)">Category Page 2</a></li>
                                                                  <li><a href="javascript:void(0)">Category Page 3</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <div class="column">
                                                            <a href="javascript:void(0);" class="title-submenu">Product pages</a>
                                                            <div>
                                                               <ul class="row-list">
                                                                  <li><a href="javascript:void(0)">Image size - big</a></li>
                                                                  <li><a href="javascript:void(0)">Image size - medium</a></li>
                                                                  <li><a href="javascript:void(0)">Image size - small</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <div class="column">
                                                            <a href="javascript:void(0);" class="title-submenu">Shopping pages</a>
                                                            <div>
                                                               <ul class="row-list">
                                                                  <li><a href="javascript:void(0)">Shopping Cart Page</a></li>
                                                                  <li><a href="javascript:void(0)">Checkout Page</a></li>
                                                                  <li><a href="javascript:void(0)">Compare Page</a></li>
                                                                  <li><a href="javascript:void(0)">Wishlist Page</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <div class="column">
                                                            <a href="javascript:void(0);" class="title-submenu">My Account pages</a>
                                                            <div>
                                                               <ul class="row-list">
                                                                  <li><a href="javascript:void(0)">Login Page</a></li>
                                                                  <li><a href="javascript:void(0)">Register Page</a></li>
                                                                  <li><a href="javascript:void(0)">My Account</a></li>
                                                                  <li><a href="javascript:void(0)">Order History</a></li>
                                                                  <li><a href="javascript:void(0)">Order Information</a></li>
                                                                  <li><a href="javascript:void(0)">Product Returns</a></li>
                                                                  <li><a href="javascript:void(0)">Gift Voucher</a></li>
                                                               </ul>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="with-sub-menu hover">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0);" class="clearfix">
                                                <strong>Collections</strong>
                                                <b class="caret"></b>
                                             </a>
                                             <div class="sub-menu" style="width: 100%; display: none;">
                                                <div class="content">
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <div class="row">
                                                            <div class="col-md-3 img img1">
                                                               <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/cms/img1.jpg" alt="banner1"></a>
                                                            </div>
                                                            <div class="col-md-3 img img2">
                                                               <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/cms/img2.jpg" alt="banner2"></a>
                                                            </div>
                                                            <div class="col-md-3 img img3">
                                                               <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/cms/img3.jpg" alt="banner3"></a>
                                                            </div>
                                                            <div class="col-md-3 img img4">
                                                               <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/cms/img4.jpg" alt="banner4"></a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-3">
                                                         <a href="javascript:void(0);" class="title-submenu">Automotive</a>
                                                         <div class="row">
                                                            <div class="col-md-12 hover-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Car Alarms and Security</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Car Audio &amp; Speakers</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Gadgets &amp; Auto Parts</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">More Car Accessories</a></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <a href="javascript:void(0);" class="title-submenu">Electronics</a>
                                                         <div class="row">
                                                            <div class="col-md-12 hover-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Battereries &amp; Chargers</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Headphones, Headsets</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Home Audio</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Mp3 Players &amp; Accessories</a></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <a href="javascript:void(0);" class="title-submenu">Jewelry &amp; Watches</a>
                                                         <div class="row">
                                                            <div class="col-md-12 hover-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Earings</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Wedding Rings</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Men Watches</a></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                         <a href="javascript:void(0);" class="title-submenu">Bags, Holiday Supplies</a>
                                                         <div class="row">
                                                            <div class="col-md-12 hover-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Gift &amp; Lifestyle Gadgets</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Gift for Man</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Gift for Woman</a></li>
                                                                     <li><a href="javascript:void(0);"  class="main-menu">Lighter &amp; Cigar Supplies</a></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="with-sub-menu hover">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0);" class="clearfix">
                                                <strong>Accessories</strong>
                                                <b class="caret"></b>
                                             </a>
                                             <div class="sub-menu" style="width: 100%; display: none;">
                                                <div class="content" style="display: none;">
                                                   <div class="row">
                                                      <div class="col-md-8">
                                                         <div class="row">
                                                            <div class="col-md-6 static-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li>
                                                                        <a href="javascript:void(0);"  class="main-menu">Automotive</a>
                                                                        <ul>
                                                                           <li><a href="javascript:void(0);">Car Alarms and Security</a></li>
                                                                           <li><a href="javascript:void(0);" >Car Audio &amp; Speakers</a></li>
                                                                           <li><a href="javascript:void(0)" >Gadgets &amp; Auto Parts</a></li>
                                                                        </ul>
                                                                     </li>
                                                                     <li>
                                                                        <a href="javascript:void(0);"  class="main-menu">Smartphone &amp; Tablets</a>
                                                                        <ul>
                                                                           <li><a href="javascript:void(0);" >Accessories for i Pad</a></li>
                                                                           <li><a href="javascript:void(0);" >Apparel</a></li>
                                                                           <li><a href="javascript:void(0);" >Accessories for iPhone</a></li>
                                                                        </ul>
                                                                     </li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6 static-menu">
                                                               <div class="menu">
                                                                  <ul>
                                                                     <li>
                                                                        <a href="javascript:void(0);" class="main-menu">Sports &amp; Outdoors</a>
                                                                        <ul>
                                                                           <li><a href="javascript:void(0);" >Camping &amp; Hiking</a></li>
                                                                           <li><a href="javascript:void(0);" >Cameras &amp; Photo</a></li>
                                                                           <li><a href="javascript:void(0);" >Cables &amp; Connectors</a></li>
                                                                        </ul>
                                                                     </li>
                                                                     <li>
                                                                        <a href="javascript:void(0);"  class="main-menu">Electronics</a>
                                                                        <ul>
                                                                           <li><a href="javascript:void(0);" >Battereries &amp; Chargers</a></li>
                                                                           <li><a href="javascript:void(0);" >Bath &amp; Body</a></li>
                                                                           <li><a href="javascript:void(0);" >Outdoor &amp; Traveling</a></li>
                                                                        </ul>
                                                                     </li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                         <span class="title-submenu">Bestseller</span>
                                                         <div class="col-sm-12 list-product">
                                                            <div class="product-thumb">
                                                               <div class="image pull-left">
                                                                  <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/shop/product/35.jpg" width="80" alt="Filet Mign" title="Filet Mign" class="img-responsive"></a>
                                                               </div>
                                                               <div class="caption">
                                                                  <h4><a href="javascript:void(0);">Filet Mign</a></h4>
                                                                  <div class="rating-box">
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                  </div>
                                                                  <p class="price">$1,202.00</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-sm-12 list-product">
                                                            <div class="product-thumb">
                                                               <div class="image pull-left">
                                                                  <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/shop/product/W1.jpg" width="80" alt="Dail Lulpa" title="Dail Lulpa" class="img-responsive"></a>
                                                               </div>
                                                               <div class="caption">
                                                                  <h4><a href="javascript:void(0);">Dail Lulpa</a></h4>
                                                                  <div class="rating-box">
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                  </div>
                                                                  <p class="price">$78.00</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="col-sm-12 list-product">
                                                            <div class="product-thumb">
                                                               <div class="image pull-left">
                                                                  <a href="javascript:void(0);"><img src="<?= base_url()?>frontend/image/demo/shop/product/141.jpg" width="80" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive"></a>
                                                               </div>
                                                               <div class="caption">
                                                                  <h4><a href="javascript:void(0);">Canon EOS 5D</a></h4>
                                                                  <div class="rating-box">
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                     <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                                                  </div>
                                                                  <p class="price">
                                                                     <span class="price-new">$60.00</span>
                                                                     <span class="price-old">$145.00</span>
                                                                  </p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                          <li class="with-sub-menu hover">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0);" class="clearfix">
                                                <strong>Pages</strong>
                                                <img class="label-hot" src="<?= base_url()?>frontend/image/new-image/hot-icon.png" alt="icon items">
                                                <b class="caret"></b>
                                             </a>
                                             <div class="sub-menu" style="width: 30%; ">
                                                <div class="content" >
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <ul class="row-list">
                                                            <li><a class="subcategory_item" href="javascript:void(0)">FAQ</a></li>
                                                            <li><a class="subcategory_item" href="javascript:void(0)">Site Map</a></li>
                                                            <li><a class="subcategory_item" href="javascript:void(0)">Contact us</a></li>
                                                            <li><a class="subcategory_item" href="javascript:void(0)">Banner Effect</a></li>
                                                         </ul>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>


                                          <li class="">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0)" class="clearfix">
                                                <strong>Blog</strong>
                                                <span class="label"></span>
                                             </a>
                                          </li>
                                          <li class="">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0)" class="clearfix">
                                                <strong>Today Deals</strong>
                                                <span class="label"></span>
                                             </a>
                                          </li>
                                          <li class="hidden-md">
                                             <p class="close-menu"></p>
                                             <a href="javascript:void(0);" class="clearfix">
                                                <strong>Buy This Theme!</strong>
                                                <img class="label-hot" src="<?= base_url()?>frontend/image/new-image/hot-icon.png" alt="icon items">
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </nav>
                     </div>
                  </div>
                  <!-- //end Main menu -->
               </div>
            </div>
         </div>

      </header>
