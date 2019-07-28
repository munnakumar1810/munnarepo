<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
		$this->load->model('Authmodel');

		if($this->session->userdata('id')=='' && $this->session->userdata('type')!="seller"){
			$this->session->set_flashdata('warning', 'Please login to access this features!');
			redirect('login/seller','refresh');
		}

	}


	public function index()
	{
		$data['title']="Seller Account ";
		$userId=$this->session->userdata('id');

		$data['profile']=$this->Authmodel->getProfile($userId);

		$this->load->view('header',$data);
		$this->load->view('seller/myaccount',$data);
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
		$this->load->view('seller/productlist',$data);
		$this->load->view('footer');
	}
	public function add()
	{
		$data['title']="Add New Product";
		$sellerId=$this->session->userdata('id');
		$data['categoryList'] =  $this->mymodel->get_by("category",false,"status=1");
		$this->load->view('header',$data);
		$this->load->view('seller/addproduct',$data);
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

		redirect(base_url('seller/list'),'refresh');

	}
	public function get_subcategory($categoryId = null)

	{

		if ($this->input->post('categoryId')) {



			$categoryId = $this->input->post('categoryId');



			$subCategoryList = $this->mymodel->get_by("subcategory",false,"categoryId=$categoryId AND status=1");



			if (!empty($subCategoryList) && count($subCategoryList) < 1) {

				echo '<option value="">No sub category found</option>';

			} else {

				echo '<option value="">Select Sub category</option>';

				foreach ($subCategoryList as $key => $v) {

					echo '<option value="'.$v->subcategoryId.'">'.$v->subcategoryName.'</option>';

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
				redirect('seller','refresh');

			}else{

				$this->session->set_flashdata('error', 'Something went wrong');
				redirect('seller/editprofile','refresh');


			}


		}else{


			$this->load->view('header',$data);
			$this->load->view('seller/editprofile',$data);
			$this->load->view('footer');
		}
	}

	public function changepass()
	{
		$data['title']="Change Password";
		$this->load->view('header',$data);
		$this->load->view('seller/editpassword',$data);
		$this->load->view('footer');
	}
	public function editaddress()
	{
		$data['title']="Address list";
		$this->load->view('header',$data);
		$this->load->view('seller/editaddress',$data);
		$this->load->view('footer');
	}
	public function wishlist()
	{
		$data['title']="My Wishlist";
		$this->load->view('header',$data);
		$this->load->view('seller/wishlist',$data);
		$this->load->view('footer');
	}
	public function cartlist()
	{
		$data['title']="My Cartlist";
		$this->load->view('header',$data);
		$this->load->view('seller/cart',$data);
		$this->load->view('footer');
	}
	public function checkout()
	{
		$data['title']="Checkout";
		$this->load->view('header',$data);
		$this->load->view('seller/checkout',$data);
		$this->load->view('footer');
	}
	public function orderlist()
	{
		$data['title']="My Order List";
		$this->load->view('header',$data);
		$this->load->view('seller/wishlist',$data);
		$this->load->view('footer');
	}


	public function orderhistory(){
		$data['title']="My Order History";
		$this->load->view('header',$data);
		$this->load->view('seller/orderhistory',$data);
		$this->load->view('footer');

	}
	public function transhistory(){
		$data['title']="My Transactions History";
		$this->load->view('header',$data);
		$this->load->view('seller/transhistory',$data);
		$this->load->view('footer');

	}
	public function pointlist()
	{
		$data['title']="Reward Points";
		$this->load->view('header',$data);
		$this->load->view('seller/rewardpoints',$data);
		$this->load->view('footer');
	}




}
