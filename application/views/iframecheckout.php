 <style type="text/css">
      iframe{
        height:750px;
        width:100%;
      }
      div
      {
       width:100%;
      }
    </style>
 <script type="text/javascript" src="https://sampath.paycorp.lk/webinterface/qw/paycorp_payments.js"></script>
 <div class="clearfix"></div>
 <div class="innerpage-ban">
   <div class="container">
    <div class="title-breadcrumb"> Paycorp International Payment </div>
    <ul class="breadcrumb-cate">
     <li><a href="#"><i class="fa fa-home"></i></a></li>
     <li><a href="#"><?= $title ?></a></li>
   </ul>
 </div>
</div>
<!-- Search body section start -->
<div class="main-container container">

   <main><script>
  document.addEventListener("DOMContentLoaded", (event) => { 
    loadPaycorpPayment(buildPayment(), 'paycorp-payment');
  });

  function buildPayment() {
    return {
          // NOTE: this is the QuickWeb DEMO client ID.
          // You may use it for initial setup
          // but replace with the Client ID
          // provided by Paycorp for final testing.
          clientId: 14002582,
          paymentAmount: <?= $total * 100 ?>,
          currency: 'LKR',
          returnUrl: '<?=base_url('Paycorp/returnpage')?>',
          clientRef: 'CREF-12345',
          comment: 'This is a demo payment'
    };
  }
</script>

<div id="paycorp-payment" class="paycorp-payment" >
</div>
</main>
</div>