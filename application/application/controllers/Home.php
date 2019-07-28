<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}

	
	public function index()
	{
		$data['title']="Home";
		$data['featuresProduct']=$this->Commonmodel->fetch_all_rows("products","status=1 AND isFeatured=1");
		$data['latestProduct']=$this->Commonmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC");
		$data['bannerlist']=$this->Commonmodel->fetch_all("banner");
		$data['gallerylist']=$this->Commonmodel->fetch_all_join("SELECT * FROM gallery_list ORDER BY id DESC LIMIT 3");
		$data['deallist']=$this->Commonmodel->fetch_all_join("SELECT * FROM gallery_weekly_list ORDER BY id DESC LIMIT 1");
		$data['featuredlist']=$this->Commonmodel->fetch_all_join("SELECT * FROM gallery_featured_list ORDER BY id DESC LIMIT 1");
		$data['newlist']=$this->Commonmodel->fetch_all_join("SELECT * FROM gallery_new_list ORDER BY id DESC LIMIT 3");

		$data['collectionlist']=$this->Commonmodel->fetch_all_join("SELECT * FROM collection ORDER BY bannerId DESC LIMIT 6");

		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function search()
	{
		$data['title']="Search Results";

		$keyword=$this->input->get('keyword');
		$category=$this->input->get('categoryId');
		$where="";

		$q="SELECT bu.productId,bu.productName, bu.subcategoryId, bu.description, bu.brand, bu.keywords,bu.sku, bu.price, bu.maxPrice, bu.discountText, bu.stock, bu.stockAvailability, bu.status, bu.url, cc.categoryName, cc.categoryId, bc.subcategoryName FROM products AS bu LEFT JOIN subcategory AS bc on bc.subcategoryId=bu.subcategoryId JOIN category AS cc on cc.categoryId=bc.categoryId WHERE bu.status=1";

		if($keyword!="")
		{
			$q .= " AND (CONCAT_WS(bu.productName, bu.description, bu.keywords, bu.brand) LIKE '%$keyword%')";
		}

		if($category!="")
		{
			$q .= " AND cc.categoryId ='".$category."'";
		}

		$finalsql=$q. " GROUP BY bu.productId";
		$data['searchProduct']=$this->Commonmodel->fetch_all_join($finalsql);
		$this->load->view('header',$data);
		$this->load->view('search',$data);
		$this->load->view('footer');
	}
	public function subscribe()
	{
			
		/*$character = json_decode($dataString);
		print_r($character);*/
			$email = $this->input->post('email');


			$fetch_row = $this->Commonmodel->fetch_row('newsletter', "email='$email'");
			if (!empty($fetch_row)) {
				$this->session->set_flashdata('warn_sub', 'Already Subscribed');
				redirect($this->input->post('redirect'));

			} else {

				
				$subdata = array(
					'email' => $email,
					'status' => 1
				);
				
				$result = $this->mymodel->insert("newsletter", $subdata);

				if ($result) {
					$this->session->set_flashdata('succ_sub', 'Succeessful Subscribed Email');
					redirect($this->input->post('redirect'));
				} else {
					$this->session->set_flashdata('err_sub', 'Something Wrong');
					redirect($this->input->post('redirect'));
				}

			}

	}
}
