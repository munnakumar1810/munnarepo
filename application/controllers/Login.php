<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
		$this->load->model('Authmodel');
		$this->load->helper('form');
		
	}


	public function index()
	{
		$data['title']="Login";

		if($_POST)
		{

			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$msg=$this->Authmodel->login($email, $password);

				if ($this->session->userdata('id')!="") {
					$this->session->set_flashdata('success', ''.$msg);
					if ($this->input->get('redirectto')) {
						redirect(urldecode($this->input->get('redirectto')),'refresh');
					} else {

						redirect('user','refresh');
					}
				}else{
					$this->session->set_flashdata('error', ''.$msg);
					redirect('login', 'refresh');

				}

			} else {

				$msg = '';
				if (form_error('email')) {
					$msg .= strip_tags(form_error('email'))."<br/>";
				}
				if (form_error('password')) {
					$msg .= strip_tags(form_error('password'))."<br/>";
				}
				$this->session->set_flashdata('error', ''.$msg);

				redirect('login', 'refresh');
			}
		}else{
			$this->load->view('header',$data);
			$this->load->view('login',$data);
			$this->load->view('footer');


		}
	}
	public function seller()
	{
		$data['title']="Seller Login";

		if($_POST)
		{

			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$msg=$this->Authmodel->sellerlogin($email, $password);
				

				if ($this->session->userdata('id')!="" && $this->session->userdata('type')=="seller") {
					$this->session->set_flashdata('success', ''.$msg);
					if ($this->input->get('redirectto')) {
						redirect(urldecode($this->input->get('redirectto')),'refresh');
					} else {

						redirect('seller','refresh');
					}
				}else{
					$this->session->set_flashdata('error', ''.$msg);
					$this->load->view('header',$data);
					$this->load->view('seller/login',$data);
					$this->load->view('footer');

				}

			} else {

				$msg = '';
				if (form_error('email')) {
					$msg .= strip_tags(form_error('email'))."<br/>";
				}
				if (form_error('password')) {
					$msg .= strip_tags(form_error('password'))."<br/>";
				}
				$this->session->set_flashdata('error', ''.$msg);
				$this->load->view('header',$data);
				$this->load->view('seller/login',$data);
				$this->load->view('footer');

				
			}
		}else{
			$this->load->view('header',$data);
			$this->load->view('seller/login',$data);
			$this->load->view('footer');


		}
	}
	public function register()
	{
		$data['title']="Register";
		
		if($_POST)
		{
			$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			if ($this->form_validation->run() == TRUE) {

				
				$mydata = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'password' => $this->enc_password($this->input->post('password')),
				'userType' => 1,
				'status' => 1
			);

				$msg=$this->mymodel->insert("users", $mydata);

				$this->session->set_flashdata('success', 'Successful register with us');
				if ($this->input->get('redirectto')) {
					redirect(urldecode($this->input->get('redirectto')),'refresh');
				} else {

					redirect('auth/login','refresh');
				}

			} else {

				$msg = '';
				if (form_error('firstName')) {
					$msg .= strip_tags(form_error('firstName'))."<br/>";
				}
				if (form_error('lastName')) {
					$msg .= strip_tags(form_error('lastName'))."<br/>";
				}
				if (form_error('mobile')) {
					$msg .= strip_tags(form_error('mobile'))."<br/>";
				}
				if (form_error('email')) {
					$msg .= strip_tags(form_error('email'))."<br/>";
				}
				if (form_error('password')) {
					$msg .= strip_tags(form_error('password'))."<br/>";
				}
				$this->session->set_flashdata('error', ''.$msg);

				redirect('auth/register', 'refresh');
			}
		}else{
			$this->load->view('header',$data);
			$this->load->view('register',$data);
			$this->load->view('footer');

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
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('type');


		redirect('login','refresh');
	}
}
