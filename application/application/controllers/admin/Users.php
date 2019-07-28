<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New User',
			'page' => 'users',
			'subpage' => 'useradd'
		);
		$sql = "(SELECT eshopId AS id, eshopName AS name, eshopId AS mobile FROM eshop WHERE status = 1) UNION ALL (SELECT userId AS id, CONCAT(firstName, ' ', lastName) AS name, mobile FROM users WHERE status = 1)";
		$data['referenceList'] = $this->db->query($sql)->result();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/user_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('email') && $this->input->post('mobile')) {

			$mydata = array(
				'firstName' => $this->testInput($this->input->post('fname')),
				'lastName' => $this->testInput($this->input->post('lname')),
				'email' => $this->testInput($this->input->post('email')),
				'mobile' => $this->testInput($this->input->post('mobile')),
				'password' => $this->enc_password($this->input->post('password')),
				'referBy' => $this->testInput($this->input->post('reference')),
				'userType' => 1,
				'status' => 1,
				'verificationStatus' => 1,
				'approval' => 1
			);
			$msg = $this->usermodel->addNewUser($mydata);
			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('users/lists'),'refresh');
		} else {
			show_404();
		}
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Users',
			'page' => 'users',
			'subpage' => 'userlist'
		);
		$data['list'] = $this->mymodel->get('users', false, 'userType', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/user_list');
		$this->load->view('admin/footer');
	}


	public function edit($userId = false)
	{
		if ($userId == false) {
			show_404();
		} elseif ($this->mymodel->count('users', ['userId'=>$userId, 'userType'=>1]) != 1) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit User Profile',
				'page' => 'users',
				'subpage' => 'userlist'
			);
			$sql = "(SELECT eshopId AS id, eshopName AS name, eshopId AS mobile FROM eshop WHERE status = 1) UNION ALL (SELECT userId AS id, CONCAT(firstName, ' ', lastName) AS name, mobile FROM users WHERE status = 1)";
			$data['referenceList'] = $this->db->query($sql)->result();
			$where = array(
				'userId' => $userId,
				'userType' => 1
			);
			$data['data'] = $this->mymodel->get_by('users', true, $where);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/user_edit');
			$this->load->view('admin/footer');
		}
	}


	public function update()
	{
		if ($this->input->post('email') && $this->input->post('userId')) {
			$userId = $this->input->post('userId');
			$where = array('userId'=>$userId);
			$mydata = array(
				'firstName' => $this->testInput($this->input->post('fname')),
				'lastName' => $this->testInput($this->input->post('lname')),
				'email' => $this->testInput($this->input->post('email')),
				'mobile' => $this->testInput($this->input->post('mobile')),
				'referBy' => $this->testInput($this->input->post('reference')),
				'status' => $this->input->post('status')
			);
			if ($this->input->post('password') && $this->input->post('password') != '') {
				$mydata['password'] = $this->enc_password($this->input->post('password'));
			}
			if (!$this->mymodel->update($mydata, 'users', $where)) {
				$msg = 'error';
			} else {
				$msg = '["User profile updated successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('users/edit/'.$userId),'refresh');
		}
		redirect(admin_url('users/lists'),'refresh');
	}


	public function changeStatus()
	{
		if ($this->input->post('userId')) {
			$userId = $this->input->post('userId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'User account activated successfully!';
			} else {
				$msg = 'User account deactivated successfully!';
			}
			if ($this->mymodel->update(['status'=>$status], 'users', ['userId'=>$userId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */