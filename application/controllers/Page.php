<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}

	public function term()
	{
		$data['title']="Terms And Conditions";
		$data['cms'] = $this->Commonmodel->fetch_row("cms","pageId=4");
		$this->load->view('header',$data);
		$this->load->view('term',$data);
		$this->load->view('footer');
	}

	public function policy()
	{
		$data['title']="Policy";
		$data['cms'] = $this->Commonmodel->fetch_row("cms","pageId=3");
		$this->load->view('header',$data);
		$this->load->view('policy',$data);
		$this->load->view('footer');
	}

	public function warranty()
	{
		$data['title']="Warranty and Services";
		$data['cms'] = $this->Commonmodel->fetch_row("cms","pageId=5");
		$this->load->view('header',$data);
		$this->load->view('waranty',$data);
		$this->load->view('footer');
	}
	public function about()
	{
		$data['title']="About Us";
		$this->load->view('header',$data);
		$this->load->view('about',$data);
		$this->load->view('footer');
	}
	public function support()
	{
		$data['title']="Support 24/7 Page";
		$data['cms'] = $this->Commonmodel->fetch_row("cms","pageId=6");
		$this->load->view('header',$data);
		$this->load->view('support',$data);
		$this->load->view('footer');
	}

	

}
