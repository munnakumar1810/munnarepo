<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Seller extends MY_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->loggedIn();

	}





	public function add()

	{

		$data = array(

			'title' => 'Add New Seller',

			'page' => 'seller',

			'subpage' => 'selleradd'

		);



		$this->load->view('admin/header', $data);

		$this->load->view('admin/sidebar');

		$this->load->view('admin/seller_add');

		$this->load->view('admin/footer');

	}





	public function create()

	{

		if ($this->input->post('email') && $this->input->post('store_name') && $this->input->post('password')) {

			$this->form_validation->set_rules('store_name', 'Store Name', 'trim|required|is_unique[users.store_name]');

			if ($this->form_validation->run() == false) {



				$msg = '["This store name is already taken!", "warning", "#F29F06"]';



			} else {



				$mydata = array(

					'firstName' => $this->testInput($this->input->post('fname')),

					'lastName' => $this->testInput($this->input->post('lname')),

					'email' => $this->lc($this->input->post('email')),

					'mobile' => $this->input->post('mobile'),

					'password' => $this->enc_password($this->input->post('password')),

					'store_name' => $this->testInput($this->input->post('store_name')),

					'userType' => 2,

					'created' => date('Y-m-d H:i:s'),

					'status' => 1,

					'verificationStatus' => 1,

					'approval' => 1,

				);
				$this->mymodel->save('users', $mydata);

				$userId = $this->db->insert_id();


				$addressData = array(

					'userId' => $userId,

					'address' => $this->testInput($this->input->post('address')),

					'city' => $this->testInput($this->input->post('city')),

					'postcode' => $this->testInput($this->input->post('postcode')),

					'region' => $this->testInput($this->input->post('region')),

					'country' => $this->testInput($this->input->post('country')),

					'addressType' => 2

				);

				if (!$this->mymodel->save('users', $mydata) || !$this->mymodel->save('contact_details', $addressData)) {

					$msg = '["Some error occured, Please try again later!", "error", "#DD6B55"]';

				} else {

					
					if (!$this->mymodel->save('contact_details', $addressData)) {

						$msg = 'error';

					} else {

						$msg = '["New Seller added successfully!", "success", "#A5DC86"]';

					}

				}

			}

			$this->session->set_flashdata('msg', $msg);

			redirect(admin_url('seller/lists'),'refresh');

		} else {

			show_404();

		}

	}





	public function lists()

	{

		$data = array(

			'title' => 'List of Sellers',

			'page' => 'seller',

			'subpage' => 'sellerlist'

		);

		$where = array(

			'userType' => 2,

			'approval' => 1

		);

		$data['list'] = $this->mymodel->get_by('users', false, $where);



		$this->load->view('admin/header', $data);

		$this->load->view('admin/sidebar');

		$this->load->view('admin/seller_list');

		$this->load->view('admin/footer');

	}





	public function pending_request()

	{

		$data = array(

			'title' => 'List of Sellers',

			'page' => 'seller',

			'subpage' => 'sellerrequest'

		);

		$where = array(

			'userType' => 2,

			'approval' => 0

		);

		$data['list'] = $this->mymodel->get_by('users', false, $where);



		$this->load->view('admin/header', $data);

		$this->load->view('admin/sidebar');

		$this->load->view('admin/seller_request_list');

		$this->load->view('admin/footer');

	}





	public function edit($userId = false)

	{

		if ($userId == false) {

			show_404();

		} elseif ($this->mymodel->count('users', ['userId'=>$userId]) != 1) {

			show_404();

		} else {



			$data = array(

				'title' => 'Edit Seller Profile',

				'page' => 'seller',

				'subpage' => 'sellerlist'

			);

			$data['userId'] = $userId;

			$sql = "SELECT u.*, cd.*

			FROM users AS u

			LEFT JOIN contact_details AS cd

			ON cd.userId = u.userId

			WHERE u.userType = 2

			AND u.userId = '$userId'";

			$data['user'] = $this->mymodel->fetch($sql, true);



			$this->load->view('admin/header', $data);

			$this->load->view('admin/sidebar');

			$this->load->view('admin/seller_edit');

			$this->load->view('admin/footer');

		}

	}





	public function view($userId = false)

	{

		if ($userId == false) {

			show_404();

		} elseif ($this->mymodel->count('users', ['userId'=>$userId]) != 1) {

			show_404();

		} else {



			$data = array(

				'title' => 'View Seller Account Request',

				'page' => 'seller',

				'subpage' => 'sellerrequest'

			);

			$data['userId'] = $userId;

			$sql = "SELECT u.*, sd.*, cd.*

			FROM users AS u

			LEFT JOIN contact_details AS cd

			ON cd.userId = u.userId

			WHERE u.userType = 2

			AND u.userId = '$userId'";

			$data['user'] = $this->mymodel->fetch($sql, true);



			$this->load->view('admin/header', $data);

			$this->load->view('admin/sidebar');

			$this->load->view('admin/seller_view');

			$this->load->view('admin/footer');

		}

	}





	public function update()

	{

		if ($this->input->post('userId')) {



			$userId = $sellerId = $this->input->post('userId');

			$where = array('userId' => $userId);



			$mydata = array(

				'firstName' => $this->testInput($this->input->post('fname')),

				'lastName' => $this->testInput($this->input->post('lname')),

				'email' => $this->lc($this->input->post('email')),

				'mobile' => $this->input->post('mobile'),

				'password' => $this->enc_password($this->input->post('password')),

				'status' => $this->input->post('status')

			);

			$addressData = array(

				'userId' => $userId,

				'address' => $this->testInput($this->input->post('address')),

				'city' => $this->testInput($this->input->post('city')),

				'postcode' => $this->testInput($this->input->post('postcode')),

				'region' => $this->testInput($this->input->post('region')),

				'country' => $this->testInput($this->input->post('country')),

				'addressType' => 2

			);

			if (!$this->mymodel->update($mydata, 'users', $where) || !$this->mymodel->update($addressData, 'contact_details', $where)) {

				$msg = 'error';

			} else {

				$msg = '["Seller profile updated successfully.", "success", "#A5DC86"]';

			}



			$this->session->set_flashdata('msg', $msg);

			redirect(admin_url('seller/edit/'.$userId),'refresh');

		} else {

			show_404();

		}

	}





	public function changepassword()

	{

		if ($this->input->post('userId') && $this->input->post('password')) {



			$userId = $this->input->post('userId');

			$password = $this->enc_password($this->input->post('password'));

			$where = array('userId'=>$userId);



			if (!$this->mymodel->update(['password'=>$password], 'users', $where)) {

				$msg = '["Some error occured, Please try again!", "error", "#DD6B55"]';

			} else {

				$msg = '["Password successfully changed.", "success", "#A5DC86"]';

			}

			$this->session->set_flashdata('msg', $msg);

			redirect(admin_url('seller/edit/'.$userId),'refresh');

		} else {

			show_404();

		}

	}





	public function changeStatus()

	{

		if ($this->input->post('userId')) {

			$userId = $this->input->post('userId');

			$status = $this->input->post('status');

			if ($status == 1) {

				$msg = 'Account activated!';

			} else {

				$msg = 'Account deactivated!';

			}

			if ($this->mymodel->update(['status'=>$status], 'users', ['userId'=>$userId])) {

				echo '["'.$msg.'", "success", "#A5DC86"]';

			} else {

				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';

			}

		}

	}





}



/* End of file Seller.php */

/* Location: ./application/controllers/Seller.php */