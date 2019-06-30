<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Products extends REST_Controller {

	public function __construct() { 
		parent::__construct();
		$this->load->model('product');
		$this->load->model('usermodel');
	}


	public function category_list_get()
	{
		$userData = array();
		$bazarId = false;

		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_GET = (array) $obj;
		}
		$userData = $_GET;

		$data = $this->product->getCategories();
		$array = array();
		if (count($data) > 0) {
			foreach ($data as $key => $v) {
				$temp = array(
					'id' => @$v->categoryId,
					'category' => @$v->categoryName
				);
				array_push($array, $temp);
			}
		}
		$array = $this->removeNull($array);
		$this->response([
			'status' => 1,
			'categories' => $array
		], 200);
	}


	public function subcategory_list_get()
	{
		$userData = array();

		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_GET = (array) $obj;
		}
		$userData = $_GET;

		if (empty($userData['categoryId'])) {
			$this->response([
				'status' => 0,
				'status' => 'Category Id is required'
			], 400);
		}
		$categoryId = $userData['categoryId'];
		$data = $this->product->getSubCategories($categoryId);
		$array = array();
		if (count($data) > 0) {
			foreach ($data as $key => $v) {
				$temp = array(
					'id' => @$v->subcategoryId,
					'category' => @$v->subcategoryName
				);
				array_push($array, $temp);
			}
		}
		$array = $this->removeNull($array);
		$this->response([
			'status' => 1,
			'subCategories' => $array
		], 200);
	}


	public function product_list_category_post()
	{
		$userData = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
			$userData = $_POST;
		} else {
			$userData = $_POST;
		}
		$this->form_validation->set_rules('userId', 'userId', 'trim|required');
		$this->form_validation->set_rules('categoryId', 'categoryId', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], REST_Controller::HTTP_BAD_REQUEST);
			}
			if(form_error('categoryId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('categoryId'))
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {

			$category_id = $userData['categoryId'];
			$array = array();

			$list = $this->product->getAllProductsListByCategory($userData['categoryId'], $userData['userId']);

			if(count($list) > 0) {
				foreach ($list as $key => $p) {

					$temp = array(
						'id' => @$p->productId,
						'name' => @$p->productName,
						'discountedPrice' => @$p->price,
						'actualPrice' => @$p->maxPrice,
						'rating' => '4.5',
						'totalReviews' => '20',
						'baseImage' => @$p->productImage,
						'isFavorite' => 1,
						'inCart' => 0,
						'stock' => @$p->stock
					);
					$temp = $this->removeNull($temp);
					array_push($array, $temp);
				}

				$this->response([
					'status' => 1,
					'products' => $array
				], 200);

			} else {
				$this->response([
					'status' => 0,
					'message' => 'No Product found.'
				], 404);
			}
		}
	}


	public function wishlist_product_post()
	{
		$userData = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('productId', 'Product Id', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 500);
			}
			if(form_error('productId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('productId'))
				], 500);
			}
		} else {

			$array = array(
				'productId' => $userData['productId'],
				'userId' => $userData['userId']
			);
			if ($this->mymodel->count('wishlist_product', $array) > 0) {

				if (!$this->mymodel->delete('wishlist_product', $array)) {
					$this->response([
						'status' => 0,
						'error' => 'Could not remove from wishlist, please try again later.'
					], 500);
				}
				$this->response([
					'status' => 1,
					'message' => 'Successfully removed from wishlist.'
				], 200);
			}

			if (!$this->mymodel->save('wishlist_product', $array)) {
				$this->response([
					'status' => 0,
					'error' => 'Could not add to wishlist, please try again later.'
				], 500);
			}
			$this->response([
				'status' => 1,
				'message' => 'Successfully added to wishlist.'
			], 200);
		}
	}


	public function add_to_cart_post()
	{
		$data = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('productId', 'Product Id', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 500);
			}
			if(form_error('productId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('productId'))
				], 500);
			}
			if(form_error('quantity')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('quantity'))
				], 500);
			}
		} else {

			$msg = $this->product->addProductToCart($data['userId'], $data['productId'], $data['quantity']);

			if ($msg == 'updated') {

				$this->response([
					'status' => 1,
					'message' => 'Cart updated successfully.'
				], 200);

			} elseif ($msg == 'added') {

				$this->response([
					'status' => 1,
					'message' => 'Product added to cart.'
				], 200);

			} else {

				$this->response([
					'status' => 0,
					'message' => $msg
				], 500);
			}
		}
	}


	public function cart_list_post()
	{
		$data = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 500);
			}

		} else {

			$list = $this->product->CartList($data['userId']);
			$list = $this->removeNull($list);

			$this->response([
				'status' => 1,
				'products' => $list
			], 200);
		}
	}


	public function product_reviews_list_post()
	{
		$data = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('productId', 'Product Id', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 500);
			}
			if(form_error('productId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('productId'))
				], 500);
			}

		} else {

			$list = $this->product->productReviewsList($data['productId']);
			$list = $this->removeNull($list);
			$avgStarRating = $this->product->productAvgStarRating($data['productId']);
			$avgStarRating = (is_null($avgStarRating) || $avgStarRating == '')? 0 : $avgStarRating;

			$this->response([
				'status' => 1,
				'avgStarRating' => $avgStarRating,
				'reviews' => $list
			], 200);
		}
	}


	public function add_product_review_post()
	{
		$data = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);
		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('productId', 'Product Id', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('starRating', 'Star Rating', 'trim|required');
		$this->form_validation->set_rules('review', 'Review', 'trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 500);
			}
			if(form_error('productId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('productId'))
				], 500);
			}
			if(form_error('title')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('title'))
				], 500);
			}
			if(form_error('starRating')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('starRating'))
				], 500);
			}
			if(form_error('review')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('review'))
				], 500);
			}
		} else {

			if ($this->product->addReviewOnProduct($data) == false) {

				$this->response([
					'status' => 0
				], 500);
			} else {

				$this->response([
					'status' => 1
				], 200);
			}
		}
	}


}

/* End of file Products.php */
/* Location: ./application/controllers/restapi/Products.php */