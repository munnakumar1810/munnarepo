<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deal extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}

	
	public function index()
	{
		$data['title']="Deals of Day";
		$data['dealsProduct']=$this->Commonmodel->fetch_all_rows("products","status=1");
		$this->load->view('header',$data);
		$this->load->view('deal');
		$this->load->view('footer');
	}
	public function catproduct()
	{
		$data['title']="Category wise Product";
		$this->load->view('header',$data);
		$this->load->view('catproduct',$data);
		$this->load->view('footer');
	}
	public function details()
	{
		$data['title']="Product Details";
		$this->load->view('header',$data);
		$this->load->view('details',$data);
		$this->load->view('footer');
	}
}
