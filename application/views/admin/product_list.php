<div id="page-wrapper">
<div class="container-fluid">
   <div class="row bg-title">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title"><?= @$title ?></h4>
      </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
         <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><?= @$title ?></li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="white-box">
            <h3 class="box-title m-b-0"><?= $title ?></h3>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
               <table class="table table-striped table-responsive datatable1">
                  <thead>
                     <tr>
                        <td>Image</td>
                        <td>Product Name</td>
                        <td>Seller Name</td>
                        <td>SKU</td>
                        <td>Stock</td>
                        <td>Price</td>
                        <td>Category</td>
                        <td>Featured</td>
                        <td>Status</td>
                        <td class="text-center">Action</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach (@$list as $key => $v): ?>
                     <tr>
                        <td>
                           <?php if (file_exists('./uploads/products/thumbs/'.$v->productImage)) { ?>
                           <img src="<?= base_url('uploads/products/thumbs/').$v->productImage ?>" class="img-responsive product-list-thumb-image" alt="">
                           <?php } else { ?>
                           <img src="<?= base_url('assets/images/thumbs.jpg') ?>" class="img-responsive product-list-thumb-image" alt="">
                           <?php } ?>
                        </td>
                        <td><?= $v->productName ?></td>
                        <td><?= $v->firstName ?> <?= $v->lastName ?></td>
                        <td><?= $v->sku ?></td>
                        <td><?= $v->stock ?></td>
                        <td>
                           <?php if ($v->maxPrice != '' || $v->maxPrice != null): ?>
                           <span class="strike text-danger">$ <?= $v->maxPrice ?></span>&nbsp; 
                           <?php endif ?>
                           <span class="text-success">$ <?= $v->price ?></span>
                        </td>
                        <td>
                           <?= $v->categoryName ?>
                        </td>
                        <td>
                           <select name="isFeatured" class="form-control" onchange="changeFeatureStatus(<?= $v->productId ?>, $(this).val());">
                              <option value="1" <?= ($v->isFeatured == '1')? 'selected' : ''; ?>>
                                 Yes
                              </option>
                              <option value="0" <?= ($v->isFeatured == '0')? 'selected' : ''; ?>>
                                 No
                              </option>
                           </select>
                        </td>
                        <td>
                           <select name="status" class="form-control" onchange="changeProductStatus(<?= $v->productId ?>, $(this).val());">
                              <option value="1" <?= ($v->status == '1')? 'selected' : ''; ?>>
                                 Active
                              </option>
                              <option value="0" <?= ($v->status == '0')? 'selected' : ''; ?>>
                                 Deactive
                              </option>
                           </select>
                        </td>
                        <td>
                           <a href="<?= 'javascript:void(0);'//base_url('products/edit/'.$v->productId) ?>" class="btn btn-primary btn-sm" title="Edit">
                           <i class="icon-note"></i>
                           </a>
                        </td>
                     </tr>
                     <?php endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="view-enquiries-modal" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">View Enquiry Details</h4>
         </div>
         <div class="modal-body"></div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>