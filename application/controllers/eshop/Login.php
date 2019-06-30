<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		if ($this->session->has_userdata('eshopId') && $this->session->has_userdata('peokartEshop')):
			redirect(seller_url('dashboard'),'refresh');
		endif;

		$data = array('page' => 'login');

		if ($this->input->post('username')) {

			$this->form_validation->set_rules('username', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == false) {

				$msg = '';
				if (form_error('username')) {
					$msg .= strip_tags(form_error('username'));
				}
				if (form_error('password')) {
					$msg .= strip_tags(form_error('password'));
				}

				$data['msg'] = '<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>
						<i class="fa fa-check-circle-o"></i>
					</strong>
					'.$msg.'
				</div>';

			} else {

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data['msg'] = '<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>
						<i class="fa fa-check-circle-o"></i>
					</strong>
					'.$this->usermodel->eshopLogin($username, $password).'
				</div>';
				if ($this->session->has_userdata('eshopId') && $this->session->has_userdata('peokartEshop')) {
					if ($this->input->get('redirectto')) {
						redirect(urldecode($this->input->get('redirectto')),'refresh');
					} else {
						redirect(seller_url('dashboard'),'refresh');
					}
				}				
			}
		}
		if ($this->session->flashdata('msg')) {
			$data['msg'] = $this->session->flashdata('msg');
		}
		$data['settings'] = $this->mymodel->get('settings', true, 'settingId', '1');
		$this->load->view('eshop/login', $data);
	}


	public function logout()
	{
		$this->session->unset_userdata('eshopId');
		$this->session->unset_userdata('peokartEshop');
		$msg = '<div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>
						<i class="fa fa-check-circle-o"></i>
					</strong>
					You have successfully logout!
				</div>';
		$this->session->set_flashdata('msg', $msg);
		redirect(seller_url('login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */