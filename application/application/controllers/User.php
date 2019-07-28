<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller  {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
		$this->load->model('Authmodel');
		$this->load->model('Commission');
		if($this->session->userdata('id')==''){
			$this->session->set_flashdata('warning', 'Please login to access this features!');
			redirect('login','refresh');
		}
	}
	public function index()
	{
		$data['title']="My Dashboard";
		$userId=$this->session->userdata('id');
		$data['profile']=$this->Authmodel->getProfile($userId);
		$data['billing'] = $this->Commonmodel->fetch_single_join("SELECT * FROM contact_details WHERE userId = '".$userId."' AND addressType=0");
		$data['shipping'] = $this->Commonmodel->fetch_single_join("SELECT * FROM contact_details WHERE userId = '".$userId."' AND addressType=1");
		$this->load->view('header',$data);
		$this->load->view('myaccount',$data);
		$this->load->view('footer');
	}
	public function list()
	{
		$data['title']="Product List";
		$sellerId=$this->session->userdata('id');
		$sql = "SELECT p.productId, p.productName, p.sku, p.price, p.maxPrice, p.stock, p.status, sc.subcategoryName, c.categoryName, (SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage, u.firstName, u.lastName
		FROM products AS p
		JOIN users AS u ON u.userId = p.sellerId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		where p.sellerId = $sellerId
		ORDER BY p.productId DESC";
		$data['list'] = $this->Commonmodel->fetch_all_join($sql);
		$this->load->view('header',$data);
		$this->load->view('productlist',$data);
		$this->load->view('footer');
	}
	public function add()
	{
		$data['title']="Add New Product";
		$sellerId=$this->session->userdata('id');
		$data['categoryList'] =  $this->mymodel->get_by("category",false,"status=1");
		$this->load->view('header',$data);
		$this->load->view('addproduct',$data);
		$this->load->view('footer');
	}
	public function save()
	{
		$sellerId=$this->session->userdata('id');
		$this->form_validation->set_rules('productname', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('subcategory', 'Sub Categroy', 'trim|required');
		$this->form_validation->set_rules('desc', 'Product Description', 'trim|required');
		$this->form_validation->set_rules('sku', 'SKU', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('maxprice', 'Max price', 'trim|required');
		$this->form_validation->set_rules('discount', 'Discount', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required');
		$this->form_validation->set_rules('stockavailability', 'Stock availability', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if (count($_FILES['images']['name']) > 0) {
				$images = $imageData = array();
				$f = 1;
				for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
					$_FILES['image']['name'] = time().$_FILES['images']['name'][$i];
					$_FILES['image']['type'] = $_FILES['images']['type'][$i];
					$_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
					$_FILES['image']['error'] = $_FILES['images']['error'][$i];
					$_FILES['image']['size'] = $_FILES['images']['size'][$i];
					$config['upload_path'] = './uploads/products/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size']  = '10240';
					$this->load->library('upload', $config);
					$this->load->library('image_lib');
					if ( ! $this->upload->do_upload('image')){
						$error = strip_tags($this->upload->display_errors());
						$f = 0;
					} else {
						$upload_data = $this->upload->data();
						$config2['image_library'] = 'gd2';
						$config2['source_image'] = $config['upload_path'].$upload_data['file_name'];
						$config2['new_image'] = $config['upload_path'].'/medium/';
						$config2['create_thumb'] = TRUE;
						$config2['maintain_ratio'] = TRUE;
						$config2['thumb_marker'] = '';
						$config2['width'] = 700;
						$config2['height'] = 700;
						$this->image_lib->clear();
						$this->image_lib->initialize($config2);
						if (!$this->image_lib->resize()) {
							$error = $this->image_lib->display_errors();
							$f = 0;
						}
						$this->image_lib->clear();
						$config2['image_library'] = 'gd2';
						$config2['source_image'] = $config['upload_path'].$upload_data['file_name'];
						$config2['new_image'] = $config['upload_path'].'/small/';
						$config2['create_thumb'] = TRUE;
						$config2['maintain_ratio'] = TRUE;
						$config2['thumb_marker'] = '';
						$config2['width'] = 300;
						$config2['height'] = 300;
						$this->image_lib->clear();
						$this->image_lib->initialize($config2);
						if (!$this->image_lib->resize()) {
							$error = $this->image_lib->display_errors();
							$f = 0;
						}
						$this->image_lib->clear();
						$config2['image_library'] = 'gd2';
						$config2['source_image'] = $config['upload_path'].$upload_data['file_name'];
						$config2['new_image'] = $config['upload_path'].'/thumbs/';
						$config2['create_thumb'] = TRUE;
						$config2['maintain_ratio'] = TRUE;
						$config2['thumb_marker'] = '';
						$config2['width'] = 100;
						$config2['height'] = 100;
						$this->image_lib->clear();
						$this->image_lib->initialize($config2);
						if (!$this->image_lib->resize()) {
							$error = $this->image_lib->display_errors();
							$f = 0;
						}
						array_push($images, $upload_data['file_name']);
					}
				}
				if ($f == 0) {
					$msg = '["'.$error.'", "warning", "#F29F06"]';
				} else {
					$mydata = array(
						'sellerId' =>$sellerId,
						'productName' =>$this->input->post('productname'),
						'subcategoryId' =>$this->input->post('subcategory'),
						'description' =>$this->input->post('desc'),
						'sku' =>$this->input->post('sku'),
						'price' =>$this->input->post('price'),
						'maxPrice' =>$this->input->post('maxprice'),
						'discountText' =>$this->input->post('discount'),
						'stock' =>$this->input->post('stock'),
						'stockAvailability' =>$this->input->post('stockavailability'),
						'status' =>$this->input->post('status'),
						'url' =>$this->input->post('url'),
					);
					if (!$this->mymodel->save('products', $mydata)) {
						$msg = 'error';
					} else {
						$productId = $this->db->insert_id();
						foreach ($images as $v) {
							$temp = array(
								'productImage' => $v,
								'productId' => $productId
							);
							array_push($imageData, $temp);
						}
						$this->db->insert_batch('product_images', $imageData);
						$msg = '["Product added successfully.", "success", "#A5DC86"]';
					}
				}
			}else {
				$msg = '["Please upload images of product.", "warning", "#F29F06"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(base_url('user/list'),'refresh');
	}
	public function get_subcategory($categoryId = null)
	{
		if ($this->input->post('categoryId')) {
			$categoryId = $this->input->post('categoryId');
			$subCategoryList = $this->mymodel->get_by("subcategory",false,"categoryId=$categoryId AND status=1");
			if (!empty($subCategoryList) && count($subCategoryList) < 1) {
				echo '
				<option value="">No sub category found</option>
				';
			} else {
				echo '
				<option value="">Select Sub category</option>
				';
				foreach ($subCategoryList as $key => $v) {
					echo '
					<option value="'.$v->subcategoryId.'">'.$v->subcategoryName.'</option>
					';
				}
			}
		} else {
			$subCategoryList = $this->mymodel->get_by("subcategory",false,"categoryId=$categoryId AND status=1");
			if (!empty($subCategoryList) && count($subCategoryList) < 1) {
				return ['' => 'No sub category found!'];
			} else {
				return $subCategoryList;
			}
		}
	}
	public function editprofile()
	{
		$data['title']="Edit Profile";
		$userId=$this->session->userdata('id');
		$data['profile']=$this->Authmodel->getProfile($userId);
		if($_POST)
		{	
			$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]');
			if ($this->form_validation->run() == TRUE) {
				$mydata = array(
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'mobile' => $this->input->post('mobile')
				);
				$update=$this->mymodel->update($mydata,'users',"userId=$userId");
				$this->session->set_flashdata('success', 'Successful updated!');
				redirect('user','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect('user/editprofile','refresh');
			}
		}else{
			$this->load->view('header',$data);
			$this->load->view('editprofile',$data);
			$this->load->view('footer');
		}
	}
	public function changepass()
	{
		$data['title']="Change Password";
		$this->load->view('header',$data);
		$this->load->view('editpassword',$data);
		$this->load->view('footer');
	}
	public function upadtepass()
	{
		$this->form_validation->set_rules('oldpassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|matches[newpassword]');
		$userId=$this->session->userdata('id');
		if ($this->form_validation->run() == TRUE ) {
			$oldpass=$this->input->post('oldpassword');
			$user = $this->Authmodel->getProfile($userId);
			if (password_verify($oldpass, $user->password) == 0) {
				$this->session->set_flashdata("error", "Old Password was wrong");
				redirect('user/changepass','refresh');
			}else {
				$mydata = array(
					'password' => $this->enc_password($this->input->post('newpassword'))
				);
				$update=$this->mymodel->update($mydata,'users',"userId=$userId");
				$this->session->set_flashdata('success', 'Password Successful updated!');
				redirect('user','refresh');
			}
		} else{
			$this->session->set_flashdata("error", "Something went wrong");
			$data['title']="Change Password";
			$this->load->view('header',$data);
			$this->load->view('editpassword',$data);
			$this->load->view('footer');
		}
	}
	public function addresslist()
	{
		$data['title']="Address list";
		$userId=$this->session->userdata('id');
		$data['list'] = $this->Commonmodel->fetch_all_join("SELECT * FROM contact_details WHERE userId = '".$userId."'");
		$this->load->view('header',$data);
		$this->load->view('addresslist',$data);
		$this->load->view('footer');
	}
	public function addaddress()
	{
		$data['title']="Add New Address";
		$this->load->view('header',$data);
		$this->load->view('addaddress',$data);
		$this->load->view('footer');
	}
	public function post()
	{
		$data['title']="Address list";
		$userId=$this->session->userdata('id');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
		$this->form_validation->set_rules('region', 'Region-State', 'required|trim');
		$this->form_validation->set_rules('country', 'Country', 'required|trim');
		$default=$this->input->post('default');
		$type=$this->input->post('addressType');
		$def="0";
		if ($this->form_validation->run() == TRUE ) {
			if($default=="1"){
				$checbilling=$this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType='$type'");
			}
			if(@$checbilling->defaultAddress=="1")
			{
				$updatedata=array(
					'defaultAddress'=>"0"
				);

				$this->Commonmodel->eidt_single_row("contact_details", $updatedata, "contactId=$checbilling->contactId");
				
				$def="1";
			}else{

				$def="0";
			}
			$data = array(
				'userId'=>$userId,
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'postcode' => $this->input->post('postcode'),
				'region' => $this->input->post('region'),
				'country'=>$this->input->post('country'),
				'addressType'=>$this->input->post('addressType'),
				'defaultAddress'=>$def
			);
			$result = $this->mymodel->save('contact_details', $data);
			if ($result==TRUE) {
				$this->session->set_flashdata("success_msg", "New address saved!");
				redirect('user/addresslist','refresh');
			} 		
		}
		else {
			$this->session->set_flashdata("error", "Something went wrong");
			$data['title']="Add New Address";
			$this->load->view('header',$data);
			$this->load->view('addaddress',$data);
			$this->load->view('footer');
		}
	}
	public function deleteaddresslist()
	{
		$id = $this->input->get('id', TRUE);
		$result = $this->Commonmodel->delete_single_con('contact_details', "contactId='$id'");
		if ($result == TRUE) {
			$this->session->set_flashdata('success_msg', 'Address Deleted Successfully');
		} else {
			$this->session->set_flashdata('success_msg', 'Invalid Operation');
		}
	}
	public function editaddress($contactId = false)
	{
		$id = $contactId;
		$userId=$this->session->userdata('id');
		$data['title']="Edit Address";
		$data['edit']=$this->Commonmodel->fetch_row('contact_details', "contactId=$id");
		if($_POST)
		{	
			$this->form_validation->set_rules('address', 'Address', 'required|trim');
			$this->form_validation->set_rules('city', 'City', 'required|trim');
			$this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
			$this->form_validation->set_rules('region', 'Region-State', 'required|trim');
			$this->form_validation->set_rules('country', 'Country', 'required|trim');
			$default=$this->input->post('default');
			$type=$this->input->post('addressType');
			$def="0";

			if ($this->form_validation->run() == TRUE) {
				if($default=="1"){
				$checbilling=$this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType='$type'");
			}
			if(@$checbilling->defaultAddress=="1")
			{
				$updatedata=array(
					'defaultAddress'=>"0"
				);
				$this->Commonmodel->eidt_single_row("contact_details",$updatedata,"contactId=$checbilling->contactId");
				$def="1";
			}else{
				$def="0";
			}
			$mydata = array(
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'postcode' => $this->input->post('postcode'),
				'region' => $this->input->post('region'),
				'country'=>$this->input->post('country'),
				'addressType'=>$this->input->post('addressType'),
				'defaultAddress'=>$def
			);
				$cid =  $this->input->post('contactId'); 
				$update=$this->mymodel->update($mydata,'contact_details', "contactId=$cid");

				$this->session->set_flashdata('success', 'Successful updated!');
				redirect('user/addresslist','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect('user/editaddress','refresh');
			}
		}else{
			$this->load->view('header',$data);
			$this->load->view('editaddress',$data);
			$this->load->view('footer');
		}
	}
	public function wishlist()
	{
		$data['title']="My Wishlist";
		$userId=$this->session->userdata('id');
		$sql="SELECT ct.wishlistId,p.productId, p.productName, p.sku, p.url, p.price, (SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage   
		From wishlist_product as ct
		JOIN products AS p ON p.productId=ct.productId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		WHERE ct.userId = '".$userId."'";
		$data['list'] = $this->Commonmodel->fetch_all_join($sql);
		$this->load->view('header',$data);
		$this->load->view('wishlist',$data);
		$this->load->view('footer');
	}
	public function addWishlist()
	{
		$userId=$this->session->userdata('id');
		$pid=$this->input->post('id', TRUE);
		$where="productId=$pid AND userId =$userId";
		$result = $this->Commonmodel->fetch_row('wishlist_product', $where);
		if (count($result) > 0) {
			$this->session->set_flashdata('warn_sub', 'Already product is in your wishlist');
			redirect($this->input->post('redirect'));
		}else{
			$userdata = array(
				'productId' => $pid,
				'userId' => $userId
			);
			$update=$this->mymodel->insert("wishlist_product", $userdata);
		}
		if ($update == TRUE) {
			$this->session->set_flashdata('succ_sub', 'Successfully added to wishlist List');
			redirect($this->input->post('redirect'));
		} else {
			$this->session->set_flashdata('err_sub', 'Invalid Operation');
			redirect($this->input->post('redirect'));
		}
	}

	public function deletewishlist()
	{
		$id = $this->input->get('id', TRUE);
		$result = $this->Commonmodel->delete_single_con('wishlist_product', "wishlistId='$id'");
		if ($result == TRUE) {
			$this->session->set_flashdata('success_msg', 'Product Deleted Successfully');
		} else {
			$this->session->set_flashdata('success_msg', 'Invalid Operation');
		}
	}
	public function addCart()
	{
		$userId=$this->session->userdata('id');
		$pid=$this->input->post('id', TRUE);
		$where="productId=$pid AND userId =$userId";
		$result = $this->Commonmodel->fetch_row('cart', $where);
		if (count($result) > 0) {
			$old_quantity=$result->quantity;
			$new_quantity=$old_quantity+1;
			$dataupdate = array(
				'quantity'=> $new_quantity,
			);
			$update = $this->Commonmodel->eidt_single_row('cart', $dataupdate, "cartId='".$result->cartId."'");
		}else{
			$quantity=1;
			$userdata = array(
				'productId' => $pid,
				'quantity' => $quantity,
				'userId' => $userId
			);
			$update=$this->mymodel->insert("cart", $userdata);
		}
		if ($update == TRUE) {
			$this->session->set_flashdata('success_msg', 'Successfully added to cart List');
			echo 'Friend Deleted Successfully';
		} else {
			$this->session->set_flashdata('success_msg', 'Invalid Operation');
		}
	}
	public function cartlist()
	{
		$data['title']="My Cartlist";
		$userId=$this->session->userdata('id');
		$sql="SELECT ct.cartId,p.productId, p.productName, p.sku, p.url, ct.quantity, p.price,(SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage From cart as ct
		JOIN products AS p ON p.productId=ct.productId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		WHERE ct.userId = '".$userId."'";
		$data['list'] = $this->Commonmodel->fetch_all_join($sql);
		$this->load->view('header',$data);
		$this->load->view('cart',$data);
		$this->load->view('footer');
	}
	public function deleteProduct()
	{
		$id = $this->input->get('id', TRUE);
		$result = $this->Commonmodel->delete_single_con('cart', "cartId='$id'");
		if ($result == TRUE) {
			$this->session->set_flashdata('success_msg', 'Product Deleted Successfully');
		} else {
			$this->session->set_flashdata('success_msg', 'Invalid Operation');
		}
	}
	public function checkout()
	{
		$data['title']="Checkout";
		$userId=$this->session->userdata('id');
		$sql="SELECT ct.cartId, p.productId, p.productName, p.sku, p.url, ct.quantity, p.price,(SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage From cart as ct
		JOIN products AS p ON p.productId=ct.productId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		WHERE ct.userId = '".$userId."'";
		$data['list'] = $this->Commonmodel->fetch_all_join($sql);
		$data['eshoplist'] = $this->Commonmodel->fetch_all_join("SELECT * from eshop where status=1");
		$data['shipping'] = $this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType=1 AND defaultAddress=1");
		$data['billing'] = $this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType=0 AND defaultAddress=1");
		$data['userinfo']=$this->Commonmodel->fetch_row("users","userId=$userId");
		$this->load->view('header',$data);
		$this->load->view('checkout',$data);
		$this->load->view('footer');
	}
	public function placeOrder()
	{
		$data['title']="Place Order";
		$userId=$this->session->userdata('id');
		$same=$this->input->post('same');
		$this->form_validation->set_rules('payment_firstname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('payment_lastname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('payment_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('payment_city', 'City', 'required|trim');
		$this->form_validation->set_rules('payment_postcode', 'Postcode', 'required|trim');

		if($same!="on")
		{
			$this->form_validation->set_rules('shipping_firstname', 'First Name', 'required');
			$this->form_validation->set_rules('shipping_lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('shipping_address', 'Address', 'required');
			$this->form_validation->set_rules('shipping_city', 'City', 'required');
			$this->form_validation->set_rules('shipping_postcode', 'Postcode', 'required');
		}

		$this->form_validation->set_rules('payment_method','Payment Method','required|trim');
		$this->form_validation->set_rules('eshop','E-shop','required|trim');

		$cartlist=$this->Commonmodel->fetch_all_join("SELECT c.cartId, c.productId, c.quantity, p.price, p.maxPrice, p.discountText,p.rewardPoints FROM cart as c JOIN products AS p ON p.productId=c.productId WHERE userId=$userId");

		if ($this->form_validation->run() == TRUE )
		{
			$pay_method = $this->input->post('payment_method');

			if(!empty($cartlist))
			{
				$order = date('ymdis');
				$mydata = array(
					'userId' => $userId,
					'orderNo' =>$order,
					'eshopId' => $this->input->post('eshop'),
					'receiveProductsAt'=>$this->input->post('receiveProductsAt'),
					's_address' => $this->input->post('payment_address'),
					's_latitude' => $this->input->post('lat'),
					's_longitude' => $this->input->post('lon'),
					's_postcode' => $this->input->post('payment_postcode'),
					'b_address' => $this->input->post('shipping_address'),
					'b_postcode' => $this->input->post('shipping_postcode'),
					'paymentMethod' => $pay_method,
					'orderComment' => $this->input->post('comment'),
					'created'=>date('Y-m-d H:i:s')
				);



				$result = $this->Commonmodel->add_details('orders', $mydata);

				if($result)
				{
					$subRewardPoints=0;

					foreach ($cartlist as $key => $c)
					{
						$productDetails= array(
							'orderId' =>$result,
							'productId'=>$c->productId,
							'price'=>$c->price,
							'maxPrice'=>$c->maxPrice,
							'discountText'=>$c->discountText,
							'quantity'=>$c->quantity
						);

						$subRewardPoints=(($c->rewardPoints) * ($c->quantity) ) + $subRewardPoints;
						$ordeDet=$this->Commonmodel->add_details('order_details', $productDetails);
					}

					$orderTotal=$this->Commonmodel->fetch_single_join("SELECT SUM(price*quantity) as ortotal FROM `order_details` WHERE orderId=$result");

					$delteCart=$this->Commonmodel->delete_single_con("cart","userId=$userId");

					
					if($pay_method == '1' )
					{
						$data['total'] = $orderTotal->ortotal;
						$data['title']="Paycorp Payment Gateway";
						$this->load->view('header', $data);
						$this->load->view('pay', $data);
						$this->load->view('footer');

					} else {

						$myEarn=$this->Commonmodel->fetch_single_join("SELECT credits FROM users where 	userId=$userId");

						$firstCom=$this->Commission->firstSlabComm();
						$firstLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $firstCom,2);
						$myEarnRewardPoints = array(
							'credits'=> $subRewardPoints+($myEarn->credits)+$firstLevelComm
						);
						$updateReward=$this->Commonmodel->eidt_single_row('users',$myEarnRewardPoints,"userId=$userId");
						

						
						$eshopId=$this->input->post('eshop');
						
						if(!empty($eshopId))
						{
							$totalCredits=$this->Commission->getEshopCredits($eshopId);							
							$eshopCom=$this->Commission->eshopSlabComm();
							$shopCommison=$this->Commission->percentageOf($orderTotal->ortotal, $eshopCom, 2);
							$finalComm=$totalCredits+$shopCommison;
							$comdata = array(
								'credits' =>$finalComm
							);
							$this->Commonmodel->eidt_single_row('eshop',$comdata,"eshopId='$eshopId'");
							$fourthLevel=$this->Commonmodel->fetch_single_join("SELECT credits, referBy FROM users where userId=$userId");
							if(!empty($fourthLevel->referBy))
							{
								if (is_numeric($fourthLevel->referBy)) 
								{
									$fourthCredits=$this->Commission->getUserCredits($fourthLevel->referBy);
									$fourthCom=$this->Commission->fourthSlabComm();
									$fourthLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $fourthCom, 2);
									$fourthLevelfinalComm=$fourthCredits+$fourthLevelComm;
									$fourthLevelcomdata = array(
										'credits' =>$fourthLevelfinalComm					
									);
									$this->Commonmodel->eidt_single_row('users',$fourthLevelcomdata,"userId=$fourthLevel->referBy");

									$thirdLevel=$this->Commonmodel->fetch_single_join("SELECT credits, referBy FROM users where userId=$fourthLevel->referBy");
									if(!empty($thirdLevel->referBy))
									{
										if (is_numeric($thirdLevel->referBy)) 
										{
											$thirdCredits=$this->Commission->getUserCredits($thirdLevel->referBy);
											$thirdCom=$this->Commission->thirdSlabComm();
											$thirdLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $thirdCom,2);
											$thirdLevelfinalComm=$thirdCredits+$thirdLevelComm;
											$thirdLevelcomdata = array(
												'credits' =>$thirdLevelfinalComm					
											);
											$this->Commonmodel->eidt_single_row('users',$thirdLevelcomdata,"userId=$thirdLevel->referBy");
											$secondLevel=$this->Commonmodel->fetch_single_join("SELECT credits, referBy FROM users where userId=$thirdLevel->referBy");
											if(!empty($secondLevel->referBy))
											{
												if(is_numeric($secondLevel->referBy))
												{
													$secondCredits=$this->Commission->getUserCredits($secondLevel->referBy);
													$secondCom=$this->Commission->secondSlabComm();
													$secondLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $secondCom,2);
													$secondLevelfinalComm=$secondCredits+$secondLevelComm;
													$secondLevelcomdata = array(
														'credits' =>$secondLevelfinalComm					
													);
													$this->Commonmodel->eidt_single_row('users',$thirdLevelcomdata,"userId=$secondLevel->referBy");
												}else{
													$secondCredits=$this->Commission->getEshopCredits($secondLevel->referBy);
													$secondCom=$this->Commission->secondSlabComm();
													$secondLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $secondCom,2);
													$secondLevelfinalComm=$secondCredits+$secondLevelComm;
													$secondLevelcomdata = array(
														'credits' =>$secondLevelfinalComm					
													);
													$this->Commonmodel->eidt_single_row('eshop',$secondLevelcomdata,"userId='$thirdLevel->referBy'");
												}
											}
										}
										else{
											$thirdCredits=$this->Commission->getEshopCredits($thirdLevel->referBy);
											$thirdCom=$this->Commission->thirdSlabComm();
											$thirdLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $thirdCom,2);
											$thirdLevelfinalComm=$thirdCredits+$thirdLevelComm;
											$thirdLevelcomdata = array(
												'credits' =>$thirdLevelfinalComm					
											);
											$this->Commonmodel->eidt_single_row('eshop',$thirdLevelcomdata,"userId='$thirdLevel->referBy'");
										}
									}

								}else{
									$fourthCredits=$this->Commission->getEshopCredits($fourthLevel->referBy);
									$fourthCom=$this->Commission->fourthSlabComm();
									$fourthLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $fourthCom,2);
									$fourthLevelfinalComm=$fourthCredits+$fourthLevelComm;
									$fourthLevelcomdata = array(
										'credits' =>$fourthLevelfinalComm					
									);
									$this->Commonmodel->eidt_single_row('eshop',$fourthLevelcomdata,"eshopId='$fourthLevel->referBy'");
									$thirdLevel=$this->Commonmodel->fetch_single_join("SELECT credits, referBy FROM users where userId=$fourthLevel->referBy");
									if(!empty($thirdLevel->referBy))
									{
										if (is_numeric($thirdLevel->referBy)) 
										{
											$thirdCredits=$this->Commission->getUserCredits($thirdLevel->referBy);
											$thirdCom=$this->Commission->thirdSlabComm();
											$thirdLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $thirdCom,2);
											$thirdLevelfinalComm=$thirdCredits+$thirdLevelComm;
											$thirdLevelcomdata = array(
												'credits' =>$thirdLevelfinalComm					
											);
											$this->Commonmodel->eidt_single_row('users',$thirdLevelcomdata,"userId=$thirdLevel->referBy");
											$secondLevel=$this->Commonmodel->fetch_single_join("SELECT credits, referBy FROM users where userId=$thirdLevel->referBy");
											if(!empty($secondLevel->referBy))
											{
												if(is_numeric($secondLevel->referBy))
												{
													$secondCredits=$this->Commission->getUserCredits($secondLevel->referBy);
													$secondCom=$this->Commission->secondSlabComm();
													$secondLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $secondCom,2);
													$secondLevelfinalComm=$secondCredits+$secondLevelComm;
													$secondLevelcomdata = array(
														'credits' =>$secondLevelfinalComm					
													);
													$this->Commonmodel->eidt_single_row('users',$thirdLevelcomdata,"userId=$secondLevel->referBy");
												}else{
													$secondCredits=$this->Commission->getEshopCredits($secondLevel->referBy);
													$secondCom=$this->Commission->secondSlabComm();
													$secondLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $secondCom,2);
													$secondLevelfinalComm=$secondCredits+$secondLevelComm;
													$secondLevelcomdata = array(
														'credits' =>$secondLevelfinalComm					
													);
													$this->Commonmodel->eidt_single_row('eshop',$secondLevelcomdata,"userId='$thirdLevel->referBy'");
												}
											}
										}
										else{
											$thirdCredits=$this->Commission->getEshopCredits($thirdLevel->referBy);
											$thirdCom=$this->Commission->thirdSlabComm();
											$thirdLevelComm=$this->Commission->percentageOf($orderTotal->ortotal, $thirdCom,2);
											$thirdLevelfinalComm=$thirdCredits+$thirdLevelComm;
											$thirdLevelcomdata = array(
												'credits' =>$thirdLevelfinalComm					
											);
											$this->Commonmodel->eidt_single_row('eshop',$thirdLevelcomdata,"userId='$thirdLevel->referBy'");
										}
									}
								}
							}
						}
						$this->session->set_flashdata("checkoutsuccess", "Thankyou for shoping with us!");
						$this->load->view('header',$data);
						$this->load->view('success',$data);
						$this->load->view('footer');

					}
				}else{
					$this->session->set_flashdata("info", "Your order isn't placed successfully!");
					$this->load->view('header',$data);
					$this->load->view('error',$data);
					$this->load->view('footer');
				}


			}else{
				$this->session->set_flashdata("info", "Please add prodct in your cart list");
				redirect('user/cartlist','refresh');
			}
		}else{
			$this->session->set_flashdata("checkouterror", "Something went wrong");
			$data['title']="Checkout";
			$userId=$this->session->userdata('id');
			$sql="SELECT ct.cartId, p.productId, p.productName, p.sku, p.url, ct.quantity, p.price,(SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage   
			From cart as ct
			JOIN products AS p ON p.productId=ct.productId
			JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
			JOIN category AS c ON c.categoryId = sc.categoryId
			WHERE ct.userId = '".$userId."'";
			$data['list'] = $this->Commonmodel->fetch_all_join($sql);
			$data['eshoplist'] = $this->Commonmodel->fetch_all_join("SELECT * from eshop where status=1");
			$data['shipping'] = $this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType=1 AND defaultAddress=1");
			$data['billing'] = $this->Commonmodel->fetch_row("contact_details","userId=$userId AND addressType=0 AND defaultAddress=1");
			$data['userinfo']=$this->Commonmodel->fetch_row("users","userId=$userId");

			$this->load->view('header',$data);
			$this->load->view('checkout',$data);
			$this->load->view('footer');
		}
	}
	public function orderlist()
	{
		$data['title']="My Order List";
		$this->load->view('header',$data);
		$this->load->view('wishlist',$data);
		$this->load->view('footer');
	}
	public function orderhistory(){
		$data['title']="My Order History";
		$userId=$this->session->userdata('id');
		$data['orderlist']=$this->Commonmodel->fetch_all_join("SELECT * FROM orders  WHERE userId=$userId ORDER BY orderId DESC");
		$this->load->view('header',$data);
		$this->load->view('orderhistory',$data);
		$this->load->view('footer');
	}
	public function transhistory(){
		$data['title']="My Transactions History";
		$this->load->view('header',$data);
		$this->load->view('transhistory',$data);
		$this->load->view('footer');
	}
	public function pointlist()
	{
		$data['title']="Reward Points";
		$userId=$this->session->userdata('id');
		$data['orderlist']=$this->Commonmodel->fetch_all_join("SELECT * FROM orders  WHERE userId=$userId ORDER BY orderId DESC");
		$this->load->view('header',$data);
		$this->load->view('rewardpoints',$data);
		$this->load->view('footer');
	}
	public function addReview()
	{
		$data['title']="Add a Review";
		$userId=$this->session->userdata('id');
		$pid=$this->input->post('pid');
		$this->form_validation->set_rules('star', 'Rating Star', 'required|trim');
		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('review', 'Review', 'required|trim');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'userId'=>$userId,
				'productId' => $pid,
				'title' => $this->input->post('title'),
				'review' => $this->input->post('review'),
				'starRating' => $this->input->post('star'),
				'created'=>date("Y-m-d H:i:s")
			);
			$result = $this->mymodel->save('product_rating', $data);
			$this->session->set_flashdata('success', 'Your Review has sent successfully!');
			redirect('product/details/'.$pid,'refresh');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong');
			redirect('product/details/'.$pid,'refresh');
		}
	}
	public function percentageOf($total, $per, $decimals = 2 )
	{
		return round( $total*$per /  100, $decimals );
	}
}