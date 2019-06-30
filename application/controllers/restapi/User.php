<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('usermodel');
	}


	public function login_post()
	{
		$userData = array();

		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

		if ($this->form_validation->run() === false) {

			if(form_error('email')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('email'))
				], 400);
			}
			if(form_error('password')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('password'))
				], 400);
			}

		} else {

			$msg = $this->usermodel->userLogin($userData['email'], $userData['password']);

			if (is_object($msg)) {

				if (@$msg->verificationStatus == 0) {

					$this->response([
						'status' => 0,
						'error' => 'Please verify your account by entering OTP sent to your email'
					], 400);

				} else {

					$array = array(
						'status' => 1,
						'profile' => array(
							'userId' => @$msg->userId,
							'firstName' => @$msg->firstName,
							'lastName' => @$msg->lastName,
							'mobile' => @$msg->mobile,
							'email' => @$msg->email,
							'credits' => @$msg->credits,
							'userType' => @$msg->userType,
							'referBy' => @$msg->referBy
						)
					);
				}
				$array = $this->removeNull($array);
				$this->response($array, 200);

			} else {

				$this->response([
					'status' => 0,
					'error' => $msg
				], 500);
			}
		}
	}


	public function registration_post()
	{
		$userData = array();

		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;

		$this->form_validation->set_rules('firstName', 'First Name','trim|required');
		$this->form_validation->set_rules('lastName', 'Last Name','trim|required');
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('mobile', 'Mobile no.','trim|required|is_unique[users.mobile]');
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('userType', 'User Type','trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('firstName')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('firstName'))
				], 400);
			}
			if(form_error('lastName')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('lastName'))
				], 400);
			}
			if(form_error('email')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('email'))
				], 400);
			}
			if(form_error('mobile')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('mobile'))
				], 400);
			}
			if(form_error('password')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('password'))
				], 400);
			}
			if(form_error('userType')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userType'))
				], 400);
			}

		} else {

			$userData['password'] = $this->enc_password($userData['password']);
			$userData['otp'] = $this->generate_otp();
			$mydata = array(
				'firstName' => $userData['firstName'],
				'lastName' => $userData['lastName'],
				'email' => $userData['email'],
				'mobile' => $userData['mobile'],
				'password' => $userData['password'],
				'userType' => $userData['userType'],
				'otp' => $userData['otp']
			);
			if ($userData['userType'] == 2) {
				$mydata['approval'] = 0;
			} else {
				$mydata['approval'] = 2;
			}

			if (!$this->mymodel->insert('users', $mydata)) {
				$this->response([
					'status' => 0,
					'error' => 'Some error occured, please try later!'
				], 500);
			}
			$user = $this->mymodel->select('userId', 'users', true, ['email'=>$userData['email']]);

			$data['otp'] = $userData['otp'];
			$data['msg'] = $this->load->view('email/otp', $data, TRUE);
			$data['email'] = $userData['email'];
			$data['subject'] = 'Verify Your Account | '.SITENAME;
			if (!$this->mail($data)) {
				$this->response([
					'status' => 0,
					'error' => 'Account created but could not send OTP to the email address!'
				], 500);
			}

			$this->response([
				'status' => 1,
				'userId' => $user->userId,
				'otpCode' => $userData['otp']
			], 200);
		}
	}


	public function verify_email_post()
	{
		$userData = array();
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;

		$this->form_validation->set_rules('userId', 'User Id','trim|required');
		$this->form_validation->set_rules('otp', 'OTP Code','trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 400);
			}
			if(form_error('otp')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('otp'))
				], 400);
			}
		} else {

			$where = array(
				'userId' => $userData['userId'],
				'otp' => $userData['otp']
			);
			if ($this->mymodel->count('users', $where) == 0) {
				$this->response([
					'status' => 0,
					'error' => 'You have entered wrong OTP!'
				], 500);
			}
			$mydata = array(
				'verificationStatus' => 1,
				'otp' => ''
			);

			if (!$this->mymodel->update($mydata, 'users', $where)) {
				$this->response([
					'status' => 0,
					'error' => 'Some error occured, please try later!'
				], 500);
			}
			$this->response([
				'status' => 1
			], 200);
		}
	}


	public function email_auth_post()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;

		$this->form_validation->set_rules('email', 'Email','trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('email')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('email'))
				], 400);
			}
		} else {

			$where = array('email' => $userData['email']);
			if ($this->mymodel->count('users', $where) == 0) {
				$this->response([
					'status' => 0,
					'error' => 'This email is not registered with us.'
				], 500);
			}
			$otp = $this->generate_otp();
			$mydata = array('otp' => $otp);

			if (!$this->mymodel->update($mydata, 'users', $where)) {
				$this->response([
					'status' => 0,
					'error' => 'Some error occured, please try later!'
				], 500);
			}

			$data['otp'] = $otp;
			$data['msg'] = $this->load->view('email/otp', $data, TRUE);
			$data['email'] = $userData['email'];
			$data['subject'] = 'Verify Your Account | '.SITENAME;
			if (!$this->mail($data)) {
				$this->response([
					'status' => 0,
					'error' => 'Could not send OTP to the email address!'
				], 500);
			}
			$user = $this->mymodel->get_by('users', true, $where);

			$this->response([
				'status' => 1,
				'userId' => $user->userId,
				'otp' => $otp
			], 200);
		}
	}


	public function change_password_post()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json,true);

		if(is_array($obj)) {
			$_POST = (array) $obj;
		}
		$userData = $_POST;

		$this->form_validation->set_rules('userId', 'User Id','trim|required');
		$this->form_validation->set_rules('password', 'Password','trim|required');

		if ($this->form_validation->run() === false) {

			if(form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 400);
			}
			if(form_error('password')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('password'))
				], 400);
			}
		} else {

			$where = array('userId' => $userData['userId']);
			if ($this->mymodel->count('users', $where) == 0) {
				$this->response([
					'status' => 0,
					'error' => 'Invalid User Id'
				], 500);
			}
			$mydata = array('password' => $this->enc_password($userData['password']));

			if (!$this->mymodel->update($mydata, 'users', $where)) {
				$this->response([
					'status' => 0,
					'error' => 'Some error occured, please try later!'
				], 500);
			}
			$this->response([
				'status' => 1
			], 200);
		}
	}


	public function edit_profile_post()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		if (is_object($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('mobileNo', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			if (form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 400);
			}
			if (form_error('firstName')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('firstName'))
				], 400);
			}
			if (form_error('lastName')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('lastName'))
				], 400);
			}
			if (form_error('mobileNo')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('mobileNo'))
				], 400);
			}
			if (form_error('dob')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('dob'))
				], 400);
			}
		} else {

			$where = array('userId' => $data['userId']);
			if ($this->mymodel->count('users', $where) == 0) {
				$this->response([
					'status' => 0,
					'error' => 'Invalid User Id'
				], 404);
			}
			$mydata = array(
				'userId' => $data['userId'],
				'firstName' => $data['firstName'],
				'lastName' => $data['lastName'],
				'mobile' => $data['mobileNo'],
				'dob' => $data['dob']
			);
			if (!$this->mymodel->update($mydata, 'users', $where)) {
				$this->response([
					'status' => 0,
					'error' => 'Some error occure, please try later'
				], 500);
			} else {
				
				$this->response([
					'status' => 1
				], 200);
			}
		}
	}


	public function add_address_post()
	{
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		if (is_object($obj)) {
			$_POST = (array) $obj;
		}
		$data = $_POST;
		$this->form_validation->set_rules('userId', 'User Id', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('street', 'Street', 'trim');
		$this->form_validation->set_rules('routes', 'Routes', 'trim');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
		$this->form_validation->set_rules('region', 'State', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			if (form_error('userId')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('userId'))
				], 400);
			}
			if (form_error('address')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('address'))
				], 400);
			}
			if (form_error('city')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('city'))
				], 400);
			}
			if (form_error('postcode')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('postcode'))
				], 400);
			}
			if (form_error('region')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('region'))
				], 400);
			}
			if (form_error('country')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('country'))
				], 400);
			}
			if (form_error('longitude')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('longitude'))
				], 400);
			}
			if (form_error('latitude')) {
				$this->response([
					'status' => 0,
					'error' => strip_tags(form_error('latitude'))
				], 400);
			}
		} else {

			$where = array('userId' => $data['userId']);
			if ($this->mymodel->count('users', $where) == 0) {
				$this->response([
					'status' => 0,
					'error' => 'Invalid User Id'
				], 404);
			}
			$where = array(
				'userId' => $data['userId'],
				'addressType' => '0'
			);
			$mydata = array(
				'userId' => $data['userId'],
				'address' => $data['address'],
				'street' => $data['street'],
				'routes' => $data['routes'],
				'city' => $data['city'],
				'postcode' => $data['postcode'],
				'region' => $data['region'],
				'country' => $data['country'],
				'longitude' => $data['longitude'],
				'latitude' => $data['latitude'],
				'addressType' => '0'
			);

			if ($this->mymodel->count('contact_details', $where) == 0) {

				if (!$this->mymodel->save('contact_details', $mydata)) {
					$this->response([
						'status' => 0,
						'error' => 'Some error occure, please try later'
					], 500);
				}

			} else {

				if (!$this->mymodel->update($mydata, 'contact_details', $where)) {
					$this->response([
						'status' => 0,
						'error' => 'Some error occure, please try later'
					], 500);
				}
			}
			$addressId = $this->mymodel->select('contactId', 'contact_details', true, $where)->contactId;
			$this->response([
				'status' => 1,
				'addressId' => $addressId
			], 200);
		}
	}


}

/* End of file User.php */
/* Location: ./application/controllers/restapi/User.php */