<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paycorp extends MY_Controller  {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}
	
	public function iframe_payout()
	{
		$data['total'] = $this->input->post('total'); 
		$data['title']="Paycorp Payment Gateway";
		$this->load->view('header', $data);
		$this->load->view('iframecheckout', $data);
		$this->load->view('footer');
	}
	public function returnpage()
	{
		$data['title']="Paycorp Payment Gateway";
		
		$this->load->view('response', $data);
		
	}


}