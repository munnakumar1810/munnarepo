<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->eshopLoggedIn();
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'page' => 'dashboard',
			'subpage' => ''
		);

		$this->load->view('eshop/header', $data);
		$this->load->view('eshop/sidebar');
		$this->load->view('eshop/dashboard');
		$this->load->view('eshop/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */