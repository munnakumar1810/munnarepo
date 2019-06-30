<?php 
$setting = $this->mymodel->getSettings();

$catlist = $this->mymodel->get_by("category",false,"status=1");
if($this->session->userdata('id')!=''){
  $userId=$this->session->userdata('id');

  $cartlist=$this->mymodel->cartlist($userId);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php if(!empty($title)) { echo $title;}?> || <?= SITENAME ?></title>
  <meta charset="utf-8">
  <meta name="keywords" content="Peokart" />
  <meta name="author" content="Peokart">
  <meta name="robots" content="indeuserId=x, follow" />
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
  <link href="<?= base_url();?>frontend/css/star-rating.css" rel="stylesheet">
  <link href="<?= base_url()?>frontend/css/theme.css" rel="stylesheet">
  <link href="<?= base_url()?>frontend/css/responsive.css" rel="stylesheet">
  
</head>
<body class="common-home res layout-home1">
  <div id="wrapper" class="wrapper-full banners-effect-7">
    <!-- Header Container  -->
    <header id="header" class=" variantleft type_1">
      
        <div class="header-center left">
          <div class="container">

            <div class="row" id="cart">

              <!-- Logo -->
              <div class="navbar-logo col-md-2 col-sm-12 col-xs-12">
                <a href="<?= base_url()?>"><img src="<?= base_url('uploads/logos/'.$setting->title) ?>" title="Your Store" alt="Your Store" /></a>
              </div>
              <!-- //end Logo -->
              <!-- Search -->
              <div id="sosearchpro" class="col-sm-6 search-pro">
                <form method="get" action="<?= base_url('home/search')?>">
                  <div id="search0" class="search input-group">
                    <div class="select_category filter_type icon-select">
                      <select class="no-border" name="categoryId">
                        <option value="">All Categories</option>
                        <?php foreach ($catlist as  $cat) {?>
                          <option value="<?=$cat->categoryId ?>" <?php if(@$_GET['categoryId']==$cat->categoryId)  echo 'selected'; ?>><?=$cat->categoryName ?></option>
                        <?php } ?>

                      </select>
                    </div>
                    <input class="autosearch-input form-control" type="text"  size="50" autocomplete="off" placeholder="Search" value="<?php if(!empty($_GET['keyword'])) {  echo @$_GET['keyword']; } ?>" name="keyword">
                    <span class="input-group-btn">
                      <button type="submit" class="button-search btn btn-primary"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                  
                </form>
              </div>
              <!-- //end Search -->
              <!-- Secondary menu -->
              <div  class="col-md-4 col-sm-6 col-xs-12 shopping_cart pull-right">
                <div class="bt-head header-phone">
                  <div class="call-us">
                    
                    <div class="text collapsed-block text-left">
                      <div class="" id="TabBlock-1">
                        <ul class="top-link list-inline">
                          <li class="account" id="my_account">

                            <?php if($this->session->userdata('id')!=''){ ?>
                              <a href="javascript:void(0);" title="My Account" class="btn btn-xs title dropdown-toggle" data-toggle="dropdown">
                              <div class="icon"></div> 
                                <span>User</span> <span class="fa fa-angle-down"></span> </a>
                                <ul class="dropdown-menu">
                                  <li> <a href="<?=base_url('user')?>">Dashboard</a></li>
                                  <li> <a href="javascript:void(0);">Settings</a></li>
                                  <li> <a href="<?=base_url('login/logout')?>">Logout</a></li>
                                </ul>


                              <?php  } else { ?>
                                <a href="<?=base_url('login')?>" title="My Account" class="btn btn-xs title" ><div class="icon"></div> <span>Register/Login</span> </a>


                              <?php }?>
                            </li>
                            <li class="wallet-sec">
                               
                              <a href="javascript:void(0)" title="My Wallet" class="title" >
                                <img src="<?= base_url()?>frontend/image/new-image/wallet.png"></a>
                            </li>
                        </ul>

                      </div>
                    </div>
                  </div>
                </div>
                <div class=" btn-group btn-shopping-cart">
                  <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                    <div class="shopcart pull-left">
                      <span class="handle pull-left"></span>
                      <span class="title">My cart</span>
                      <?php if($this->session->userdata('id')!=''){?>
                        <p class="text-shopping-cart cart-total-full"><?=count($cartlist)?> item(s)</p>
                      <?php } else{?>
                        <p class="text-shopping-cart cart-total-full">0 item(s)</p>
                      <?php }?>
                    </div>
                  </a>
                  <div class="notification-sec pull-right">
                        <a href="javascript:void(0)" title="Notification" class="title" ><img src="<?= base_url()?>frontend/image/new-image/notification.png"></a>
                  </div>
                  <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
                    <?php if($this->session->userdata('id')!=''){?>
                      <li>
                        <table class="table table-striped">
                          <tbody>
                            <?php 
                            $total=0;
                            if(!empty($cartlist)){

                              foreach ($cartlist as $key => $car): ?>


                                <tr>
                                  <td class="text-center" style="width:70px">
                                    <?php if (file_exists('./uploads/products/small/'.$car->productImage)) { ?>

                                      <a href="javascript:void(0)"> <img src="<?= base_url('uploads/products/small/').$car->productImage ?>" style="width:70px"  class="preview" alt=""></a>

                                    <?php } else { ?>
                                      <a href="javascript:void(0)"> <img src="<?= base_url('assets/images/thumbs.jpg') ?>" style="width:70px"  class="preview" alt=""></a>
                                    <?php } ?>
                                  </td>
                                  <td class="text-left"> 
                                    <a class="cart_product_name" href="javascript:void(0)"><?=$car->productName?></a>
                                  </td>
                                  <td class="text-center"> x <?=$car->quantity?></td>
                                  <td class="text-center"> Rs. <?=$car->price?> </td>
                                  <?php @$totalprice= ((@$car->quantity)*(@$car->price))?>
                                  <?php @$total=@$totalprice + $total ?>

                                  <td class="text-right">
                                    <a onclick="deletecart('<?= $car->cartId ?>');" title="cancel" class="fa fa-times fa-delete"></a>
                                  </td>
                                </tr>
                              <?php endforeach ?>

                              <tr>
                                <td class="text-left" colspan="4"><strong>Sub-Total</strong>
                                </td>
                                <td class="text-right">Rs. <?= $total ?></td>
                              </tr>
                            <?php } else { ?>
                              <tr><td class="text-center">No Product found in your Cart list</td></tr>
                            <?php } ?> 

                          </tbody>
                        </table>
                        <p class="text-right"> 
                          <a class="btn view-cart" href="<?=base_url('user/cartlist')?>"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp; 
                          <a class="btn btn-mega checkout-cart" href="<?=base_url('user/checkout')?>"><i class="fa fa-share"></i>Checkout</a>
                        </p>
                      </li>

                    <?php } else {?>
                      <li>
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="text-center">
                                No Product found in your Cart list
                              </td>

                            </tr>

                          </tbody>
                        </table>
                      </li>
                    <?php }?>
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
              <div class="sidebar-menu col-md-3 col-sm-6 col-xs-8">
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
                                <?php foreach ($catlist as  $cat) {

                                  $subCatList=$this->mymodel->get_by("subcategory",false,"categoryId=$cat->categoryId AND status=1");
                                  ?>

                                  <li class="item-vertical with-sub-menu hover">
                                    <p class="close-menu"></p>
                                    <a href="javascript:void(0);" class="clearfix">
                                      <i class="<?=$cat->categoryIcon?>" aria-hidden="true"></i>
                                      <span><?=$cat->categoryName ?></span>
                                      <?php if(!empty($subCatList)){ ?>
                                        <b class="caret"></b>
                                      <?php } ?>
                                    </a>
                                    <?php if(!empty($subCatList)){ ?>
                                      <div class="sub-menu" data-subwidth="100" >
                                        <div class="content" >
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="row">
                                                <?php foreach ($subCatList as $sub) { ?>
                                                  <div class="col-md-4 static-menu">
                                                    <div class="menu">
                                                      <ul>
                                                        <li>
                                                          <a href="<?=base_url()?>product/catproduct/<?=$sub->subcategoryId?>/<?= $sub->subcategoryName?>" class="main-menu"><?= $sub->subcategoryName?></a>
                                                          
                                                        </li>

                                                      </ul>
                                                    </div>
                                                  </div>
                                                <?php } ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <?php } ?>
                                  </li>

                                <?php } ?>



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
              <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-4">
                <div class="responsive so-megamenu ">
                  <nav class="navbar-default">
                    <div class=" container-megamenu  horizontal">
                      <div class="navbar-header">
                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        		
                      </div>
                      <div class="megamenu-wrapper">
                        <span id="remove-megamenu" class="fa fa-times"></span>
                        <div class="megamenu-pattern">
                          <div class="container">
                            <ul class="megamenu " data-transition="slide" data-animationtime="250">
                              <li class="home">
                                <a href="<?= base_url()?>">Home </a>
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
                                             <li><a href="javascript:void(0)">Category Page 1 </a></li>
                                             <li><a href="javascript:void(0)">Category Page 2</a></li>
                                             <li><a href="javascript:void(0)">Category Page 3</a></li>
                                           </ul>
                                         </div>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                      <div class="column">
                                        <a href="javascript:void(0);" class="title-submenu">Shopping pages</a>
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
                                        <a href="javascript:void(0);" class="title-submenu">My Account pages</a>
                                        <div>
                                          <ul class="row-list">
                                            <li><a href="javascript:void(0)">Category Page 1 </a></li>
                                            <li><a href="javascript:void(0)">Category Page 2</a></li>
                                            <li><a href="javascript:void(0)">Category Page 3</a></li>
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
                          
                            <li class="">
                              <p class="close-menu"></p>
                              <a href="<?= base_url('deal')?>" class="clearfix">
                                <strong>Today Deals</strong>
                                <span class="label"></span>
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
