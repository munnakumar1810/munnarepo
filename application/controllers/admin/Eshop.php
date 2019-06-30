<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eshop extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New E-Shop',
			'page' => 'eshop',
			'subpage' => 'eshopadd'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eshop_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('email') && $this->input->post('phone')) {

			$mydata = array(
				'eshopName' => $this->testInput($this->input->post('eshopName')),
				'email' => $this->testInput($this->input->post('email')),
				'phone' => $this->testInput($this->input->post('phone')),
				'password' => $this->enc_password($this->input->post('password')),
				'address' => $this->testInput($this->input->post('address')),
				'latitude' => $this->testInput($this->input->post('latitude')),
				'longitude' => $this->testInput($this->input->post('longitude')),
				'city' => $this->testInput($this->input->post('city')),
				'postcode' => $this->testInput($this->input->post('postcode')),
				'region' => $this->testInput($this->input->post('region')),
				'country' => $this->testInput($this->input->post('country')),
				'status' => 1
			);

			if (!$this->mymodel->save('eshop', $mydata)) {
				
				$msg = 'error';

			} else {

				$lastId = $this->db->insert_id();
				$eshopId = 'PKES'.str_pad($lastId, 5, 0, STR_PAD_LEFT);
				$mydata = array('eshopId' => $eshopId);
				$where = array('eId' => $lastId);

				if (! $this->mymodel->update($mydata, 'eshop', $where)) {

					$msg = 'error';
					
				} else {

					$msg = '["New E-Shop added successfully!", "success", "#A5DC86"]';
				}			
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('eshop/lists'),'refresh');
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of E-Shops',
			'page' => 'eshop',
			'subpage' => 'eshoplist'
		);
		$data['list'] = $this->mymodel->get('eshop');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/eshop_list');
		$this->load->view('admin/footer');
	}


	public function edit($eId = false)
	{
		if ($eId == false) {
			show_404();
		} elseif ($this->mymodel->count('eshop', ['eId'=>$eId]) != 1) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit E-Shops Profile',
				'page' => 'eshop',
				'subpage' => 'eshoplist'
			);
			$where = array('eId' => $eId);
			$data['data'] = $this->mymodel->get_by('eshop', true, $where);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/eshop_edit');
			$this->load->view('admin/footer');
		}
	}


	public function update()
	{
		if ($this->input->post('email') && $this->input->post('eId')) {
			$eId = $this->input->post('eId');
			$where = array('eId'=>$eId);
			$mydata = array(
				'eshopName' => $this->testInput($this->input->post('eshopName')),
				'email' => $this->testInput($this->input->post('email')),
				'phone' => $this->testInput($this->input->post('phone')),
				'password' => $this->enc_password($this->input->post('password')),
				'address' => $this->testInput($this->input->post('address')),
				'latitude' => $this->testInput($this->input->post('latitude')),
				'longitude' => $this->testInput($this->input->post('longitude')),
				'city' => $this->testInput($this->input->post('city')),
				'postcode' => $this->testInput($this->input->post('postcode')),
				'region' => $this->testInput($this->input->post('region')),
				'country' => $this->testInput($this->input->post('country')),
				'status' => $this->input->post('status')
			);
			if ($this->input->post('password') && $this->input->post('password') != '') {
				$mydata['password'] = $this->enc_password($this->input->post('password'));
			}
			if (!$this->mymodel->update($mydata, 'eshop', $where)) {
				$msg = 'error';
			} else {
				$msg = '["E-Shop profile updated successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('eshop/edit/'.$eId),'refresh');
		}
		redirect(admin_url('eshop/lists'),'refresh');
	}


	public function changeStatus()
	{
		if ($this->input->post('eId')) {
			$eId = $this->input->post('eId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'E-Shop account activated successfully!';
			} else {
				$msg = 'E-Shop account deactivated successfully!';
			}
			if ($this->mymodel->update(['status'=>$status], 'eshop', ['eId'=>$eId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}

}

/* End of file Eshop.php */
/* Location: ./application/controllers/admin/Eshop.php */