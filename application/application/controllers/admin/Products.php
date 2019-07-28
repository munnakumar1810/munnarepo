<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product');
	}
	public function lists()
	{
		$this->loggedIn();
		$data = array(
			'title' => 'Product List',
			'page' => 'products',
			'subpage' => 'productlist'
		);
		$data['userId'] = $userId = $this->session->userdata('userId');
		$data['list'] = $this->product->getAllProductsListBySeller();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/product_list');
		$this->load->view('admin/footer');
	}
	public function add()
	{
		$this->loggedIn();
		$data = array(
			'title' => 'Add New Product',
			'page' => 'products',
			'subpage' => 'add_product'
		);
		$data['userId'] = $userId = $this->session->userdata('userId');
		$data['categoryList'] = $this->product->getCategories();
		$where = array(
			'status' => 1,
			'verificationStatus' => 1,
			'approval' => 1,
			'userType' => 2
		);
		$data['sellerList'] = $this->mymodel->select('userId, firstName, lastName, store_name', 'users', false, $where);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/product_add');
		$this->load->view('admin/footer');
	}
	public function save()
	{
		$this->loggedIn();
		$userId = $this->session->userdata('userId');
		if ($this->input->post('productname') && $this->input->post('sellerId')) {
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
						'sellerId' => $this->testInput($this->input->post('sellerId')),
						'rewardPoints' => $this->testInput($this->input->post('rewardPoints')),
						'productName' => $this->testInput($this->input->post('productname')),
						'subcategoryId' => $this->testInput($this->input->post('subcategory')),
						'description' => $this->testInput($this->input->post('desc')),
						'sku' => $this->testInput($this->input->post('sku')),
						'price' => $this->testInput($this->input->post('price')),
						'maxPrice' => $this->testInput($this->input->post('maxprice')),
						'discountText' => $this->testInput($this->input->post('discount')),
						'stock' => $this->testInput($this->input->post('stock')),
						'brand' => $this->testInput($this->input->post('brand')),
						'keywords' => $this->testInput($this->input->post('keywords')),
						'stockAvailability' => $this->testInput($this->input->post('stockavailability')),
						'status' => $this->testInput($this->input->post('status')),
						'url' => $this->testInput($this->input->post('url')),
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
			} else {
				$msg = '["Please upload images of product.", "warning", "#F29F06"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('products/add'),'refresh');
	}
	public function edit($productId = false)
	{
		$this->loggedIn();
		if ($productId == false) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit Product',
				'page' => 'products',
				'subpage' => 'product_list'
			);
			$data['productId'] = $productId;
			$data['userId'] = $userId = $this->session->userdata('userId');
			$data['data'] = $this->product->getProductDetails($productId, $userId);
			$data['categoryList'] = $this->product->getCategories();
			$data['subCategoryList'] = $this->get_subcategory($data['data']->categoryId);
			$data['productImagesList'] = $this->mymodel->get('product_images', false, 'productId', $productId);
			$where = array(
				'verificationStatus' => 1,
				'approval' => 1,
				'userType' => 2
			);
			$data['sellerList'] = $this->mymodel->select('userId, firstName, lastName, store_name', 'users', false, $where);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/product_edit');
			$this->load->view('admin/footer');
		}
	}
	public function update()
	{
		$this->loggedIn();
		$userId = $this->session->userdata('userId');
		if ($this->input->post('productname') && $this->input->post('productId') && $this->input->post('sellerId')) {
			$productId = $this->input->post('productId');
			$mydata = array(
				'sellerId' => $this->testInput($this->input->post('sellerId')),
				'rewardPoints' => $this->testInput($this->input->post('rewardPoints')),
				'productName' => $this->testInput($this->input->post('productname')),
				'subcategoryId' => $this->testInput($this->input->post('subcategory')),
				'description' => $this->testInput($this->input->post('desc')),
				'sku' => $this->testInput($this->input->post('sku')),
				'price' => $this->testInput($this->input->post('price')),
				'maxPrice' => $this->testInput($this->input->post('maxprice')),
				'discountText' => $this->testInput($this->input->post('discount')),
				'stock' => $this->testInput($this->input->post('stock')),
				'brand' => $this->testInput($this->input->post('brand')),
				'keywords' => $this->testInput($this->input->post('keywords')),
				'stockAvailability' => $this->testInput($this->input->post('stockavailability')),
				'status' => $this->testInput($this->input->post('status')),
				'url' => $this->testInput($this->input->post('url'))
			);
			$where = array('productId' => $productId);
			if (!$this->mymodel->update($mydata, 'products', $where)) {
				$msg = 'error';
			} else {
				if (count($_FILES['images']['name']) > 0 && $_FILES['images']['name'][0] != '') {
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
							$temp = array(
								'productImage' => $upload_data['file_name'],
								'productId' => $productId
							);
							array_push($images, $temp);
						}
					}
					if ($f == 0) {
						$msg = '["'.$error.'", "warning", "#F29F06"]';
					} else {
						$this->db->insert_batch('product_images', $images);
						$msg = '["Product updated successfully.", "success", "#A5DC86"]';
					}
				} else {
					$msg = '["Product updated successfully.", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('products/edit/'.$productId),'refresh');
		} else {
			show_404();
		}
	}
	public function change_status()
	{
		if ($this->input->post('productId')) {
			$where['productId'] = $this->input->post('productId');
			$data['status'] = $this->input->post('productStatus');
			if ($data['status'] == 1) {
				$msg = 'Product activated successfully.';
			} else {
				$msg = 'Product deactivated successfully.';
			}
			if ($this->mymodel->change_status('products', $where, $data)) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try later.", "error", "#DD6B55"]';
			}
		}
	}
	public function featureStatus()
	{
		if ($this->input->post('productId')) {
			$where['productId'] = $this->input->post('productId');
			$data['isFeatured'] = $this->input->post('productStatus');
			if ($data['isFeatured'] == 1) {
				$msg = 'Product is updated as featured product.';
			} else {
				$msg = 'Featured product deactivated successfully.';
			}
			if ($this->mymodel->change_status('products', $where, $data)) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try later.", "error", "#DD6B55"]';
			}
		}
	}
	public function delete_product_image()
	{
		$this->loggedIn();
		if ($this->input->post('productImageId') && $this->input->post('productImageName')) {
			$productImageId = $this->input->post('productImageId');
			$productImageName = $this->input->post('productImageName');
			if (@file_exists('./uploads/products/'.$productImageName)) {
				@unlink('./uploads/products/'.$productImageName);
			}
			if (@file_exists('./uploads/products/medium/'.$productImageName)) {
				@unlink('./uploads/products/medium/'.$productImageName);
			}
			if (@file_exists('./uploads/products/small/'.$productImageName)) {
				@unlink('./uploads/products/small/'.$productImageName);
			}
			if (@file_exists('./uploads/products/thumbs/'.$productImageName)) {
				@unlink('./uploads/products/thumbs/'.$productImageName);
			}
			if ($this->mymodel->delete('product_images', ['productImageId'=>$productImageId])) {
				echo '["Image deleted!", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}
	public function get_subcategory($categoryId = null)
	{
		if ($this->input->post('categoryId')) {
			$categoryId = $this->input->post('categoryId');
			$subCategoryList = $this->product->getSubCategories($categoryId);
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
			$subCategoryList = $this->product->getSubCategories($categoryId);
			if (!empty($subCategoryList) && count($subCategoryList) < 1) {
				return ['' => 'No sub category found!'];
			} else {
				return $subCategoryList;
			}
		}
	}
}