<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller  {


public function __construct()
	{
		parent::__construct();
		$this->load->model('Authmodel');
		$this->load->model('Commonmodel');
		$this->load->helper('form');
	}


	public function index()
	{
		$data['title']="Register";

		if($_POST)
		{
			$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|is_unique[users.email]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|is_unique[users.mobile]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
			if ($this->form_validation->run() == TRUE) {

				$referralid = $this->input->post('referralid');
				if(!empty($referralid))
				{

					if (is_numeric($referralid)) {
						$result = $this->Commonmodel->fetch_row("users", "mobile=$referralid");
						if (!empty($result)) {
							$referBy=$result->userId;
						}
					} else {
						$eshop = $this->Commonmodel->fetch_row("eshop", "eshopId='$referralid'");
						if(!empty($eshop))
						{
							$referBy=$eshop->eshopId;
						}
					}
				}else{
					$referBy="";

				}
				
				$mydata = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'password' => $this->enc_password($this->input->post('password')),
				'referBy' => $referBy,
				'userType' => 1,
				'status' => 1
			);
				
				$msg=$this->mymodel->insert("users", $mydata);

				$this->session->set_flashdata('success', 'Registered successfully');
				if ($this->input->get('redirectto')) {
					redirect(urldecode($this->input->get('redirectto')),'refresh');
				} else {

					redirect('login','refresh');
				}

			} else {

				$this->session->set_flashdata("error", "Something went wrong");
				$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer');	
						}
		}else{
			$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer');

		}


	}
	public function checkRefferal()
	{
		$refid=$this->input->post('refid', TRUE);
		
		if (is_numeric($refid)) {

		$result = $this->Commonmodel->fetch_row("users", "mobile=$refid");
		
		if (!empty($result)) {
			
			echo "User refferal code is applied!";
		
		}else{

			echo "Not valid refferal code!";
		}
		 

		 } else {
		  $eshop = $this->Commonmodel->fetch_row("eshop", "eshopId='$refid'");
		  if(!empty($eshop))
		  {
		  	echo "Eshop refferal code is applied!";
		  }else{
		  	echo "Not valid refferal code!";
		  }

		}
		

	}
	public function forgetpass()
	{
		$data['title']="Forget Password";
		$this->load->view('header',$data);
		$this->load->view('forgetpass',$data);
		$this->load->view('footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('userId');


		redirect('auth/login','refresh');
	}
}
