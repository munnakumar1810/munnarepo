<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->eshopLoggedIn();
	}

	public function index()
	{
		$data = array(
			'title' => 'Change Password'
		);
		$data['eshopId'] = $eshopId = $this->session->userdata('eshopId');

		$this->load->view('eshop/header', $data);
		$this->load->view('eshop/sidebar');
		$this->load->view('eshop/change_password');
		$this->load->view('eshop/footer');
	}


	public function update()
	{
		$eshopId = $this->session->userdata('eshopId');

		if ($this->input->post('c_password')) {

			$this->form_validation->set_rules('c_password', 'Current Password', 'trim|required');
			$this->form_validation->set_rules('n_password_confirmation', 'New Password', 'trim|required');
			$this->form_validation->set_rules('n_password', 'Repeat Password', 'trim|required|matches[n_password_confirmation]');
			$msg = '';

			if ($this->form_validation->run() == false) {
				if (form_error('c_password')) {
					$msg .= strip_tags(form_error('c_password'));
				}
				if (form_error('n_password_confirmation')) {
					$msg .= strip_tags(form_error('n_password_confirmation'));
				}
				if (form_error('n_password')) {
					$msg .= strip_tags(form_error('n_password'));
				}
			} else {
				$c_password = $this->input->post('c_password');
				$n_password = $this->input->post('n_password');
				$user = $this->mymodel->get('eshop', true, 'eshopId', $eshopId);

				if (! password_verify($c_password, $user->password)) {
					$msg = '["You have entered wrong password.", "warning", "#F29F06"]';
				} else {

					$mydata['password'] = $this->enc_password($n_password);

					if (!$this->mymodel->update($mydata, 'eshop', ['eshopId'=>$eshopId])) {
						$msg = 'error';
					} else {
						$msg = '["Password changed successfully.", "success", "#A5DC86"]';
					}
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(seller_url('change_password'),'refresh');
	}

}

/* End of file Change_password.php */
/* Location: ./application/controllers/Change_password.php */