<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}

	
	
	public function catproduct()
	{
		$id=$this->uri->segment(3);
		$data['title']="Category wise Product";
		$data['listProduct']=$this->Commonmodel->fetch_all_join("SELECT * from products WHERE subcategoryId=$id AND status=1 ORDER BY price+0");
		$data['catList']=$this->Commonmodel->fetch_all_rows("category","status=1");
		$data['latestProduct']=$this->Commonmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC LIMIT 4");
		$this->load->view('header',$data);
		$this->load->view('catproduct',$data);
		$this->load->view('footer');
	}
	public function details()
	{
		$pid=$this->uri->segment(3);

		/*$sql = "SELECT *, (SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage, FROM products AS p
		LEFT JOIN subcategory AS s ON s.subcategoryId = p.subcategoryId
		LEFT JOIN category AS c ON s.categoryId = c.categoryId
		WHERE p.productId = '".$pid."'";*/
		$sql="SELECT p.productId, p.productName, p.sku, p.price, p.maxPrice, p.rewardPoints, p.brand, p.stock, p.status,p.description, sc.subcategoryName, sc.subcategoryId, c.categoryName, (SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage, u.firstName, u.lastName

		FROM products AS p

		JOIN users AS u ON u.userId = p.sellerId

		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId

		JOIN category AS c ON c.categoryId = sc.categoryId

		where p.productId = '".$pid."'";
		$data['details']=$details=$this->Commonmodel->fetch_single_join($sql);

		$sqllist = "SELECT * FROM products AS p
		LEFT JOIN subcategory AS s ON s.subcategoryId = p.subcategoryId
		LEFT JOIN category AS c ON s.categoryId = c.categoryId
		WHERE p.subcategoryId = '".$details->subcategoryId."' AND p.productId != '".$pid."'";
		$data['relatedList']=$this->Commonmodel->fetch_all_join($sqllist);

		$ratingDet="SELECT * FROM product_rating AS pr  JOIN users AS us ON us.userId=pr.userId WHERE pr.productId=".$pid."";

		$data['rating']=$this->Commonmodel->fetch_all_join($ratingDet);

		$data['title']="Product Details";
		$this->load->view('header',$data);
		$this->load->view('details',$data);
		$this->load->view('footer');
	}
	public function compare()
	{
		$data['title']="Product Compare";
		$this->load->view('header',$data);
		$this->load->view('compare',$data);
		$this->load->view('footer');
	}
	
}
