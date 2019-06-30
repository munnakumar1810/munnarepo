<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->eshopLoggedIn();
	}


	public function index()
	{
		$data = array(
			'title' => 'Profile'
		);
		$data['eshopId'] = $eshopId = $this->session->userdata('eshopId');
		$data['data'] = $this->mymodel->get('eshop', true, 'eshopId', $eshopId);

		$this->load->view('eshop/header', $data);
		$this->load->view('eshop/sidebar');
		$this->load->view('eshop/profile');
		$this->load->view('eshop/footer');
	}


	public function save()
	{
		$eshopId = $this->session->userdata('eshopId');

		if ($this->input->post('name')) {

			$mydata = array(
				'name' => $this->testInput($this->input->post('name')),
				'email' => $this->testInput($this->input->post('email')),
				'phone' => $this->testInput($this->input->post('phone')),
				'address' => $this->testInput($this->input->post('address')),
				'latitude' => $this->testInput($this->input->post('latitude')),
				'longitude' => $this->testInput($this->input->post('longitude')),
				'city' => $this->testInput($this->input->post('city')),
				'postcode' => $this->testInput($this->input->post('postcode')),
				'region' => $this->testInput($this->input->post('region')),
				'country' => $this->testInput($this->input->post('country')),
			);

			if (!$this->mymodel->update($mydata, 'eshop', ['eshopId'=>$eshopId])) {
				$msg = 'error';
			} else {
				$msg = '["Profile updated successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(seller_url('profile'),'refresh');
	}


	public function check_store_name()
	{
		if ($this->input->post('storeName')) {
			$storeName = $this->testInput($this->input->post('storeName'));
			if ($this->mymodel->count('users', ['store_name'=>$storeName]) > 0) {
				echo 'This Store Name is already taken!';
			} else {
				echo '';
			}
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */