 <style type="text/css">
  iframe{
    height:600px;
    width:100%;
  }
  div
  {
   width:100%;
 }
</style>

<!-- Search body section start -->


  <center><img src="<?= base_url()?>frontend/image/new-image/order-success.png" width="90" height="90"></center>
  
  <?php
//Get req_id
  $csrfToken = $_REQUEST['reqid'];

//Get Client_ref
  $clientRef = $_REQUEST['clientRef'];

// This is the your private auth token. It must
// never be used in the browser, only on your secure server
//
// NOTE: this is the QuickWeb DEMO AUTH-TOKEN
// You may use it for initial setup
// but replace with the token
// provided by Paycorp for final testing.
  $auth_Token = '7c0c1c98-0f1e-4da9-9e93-1d4939d9282f';

// Get cURL resource
  $ch = curl_init();

//Set the req_Id, authtoken and Client ref
  curl_setopt($ch, CURLOPT_URL, 'https://sampath.paycorp.lk/webinterface/qw/confirm?csrfToken='.$csrfToken.'&authToken='.$auth_Token.'&clientRef='.$clientRef);

//Set method post
  curl_setopt($ch, CURLOPT_POST, 1);

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//Execute the request.
  $response = curl_exec($ch);

//Get the Erorrs
  $errors = curl_error($ch);

//Close the cURL handle.
  curl_close($ch);

//Explode String data using "&" and "=". 
  $params = explode('&', $response);

  $results = [];


  foreach ($params as $element) {

  //Make Key Value Pair Using List
    list($key, $value) = explode('=', $element);
    $results[$key] = $value;
  }


  echo "<center>&#9886;<b>------Payment Complete Response------</b>&#9887;</br></br>";

  echo "&#9755;&ensp;"."Transaction ref number : ".$results['txnReference']."</br></br>";
  echo "&#9755;&ensp;"."Payment Amount : ".$results['paymentAmount']."</br></br>";
  echo "&#9755;&ensp;"."Response Code : ".$results['responseCode']."</br></br>";
  echo "&#9755;&ensp;"."Response Text : ".$results['responseText']."</br></br>";
  echo "&#9755;&ensp;"."Card Holder Name : ".$results['cardHolderName']."</br></br>";
  echo "&#9755;&ensp;"."Card Number : ".$results['cardNumber']."</br></br>";
  echo "&#9755;&ensp;"."Card Expiry : ".$results['cardExpiry']."</br></br>";
  echo "&#9755;&ensp;"."Card Type : ".$results['cardType']."</br></br>";
  echo "&#9755;&ensp;"."Client Ref : ".$results['clientRef']."</br></br>";
  echo "&#9755;&ensp;"."Comment : ".$results['comment']."</br></br></center>";

  ?>

</div>