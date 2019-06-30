<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function site_settings()
	{
		$data = array(
			'title' => 'Site Settings',
			'page' => 'settings',
			'subpage' => 'site_settings'
		);
		$data['data'] = $this->mymodel->get('settings', true, 'settingId', 1);
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/site-settings');
		$this->load->view('admin/footer');
	}


	public function save()
	{
		if ($this->input->post('settings')) {

			$mydata = array(
				'address' => $this->testInput($this->input->post('address')),
				'email' => $this->lc($this->input->post('email')),
				'phone' => $this->testInput($this->input->post('phone')),
				'facebook' => $this->testInput($this->input->post('facebook')),
				'twitter' => $this->testInput($this->input->post('twitter')),
				'linkedin' => $this->testInput($this->input->post('linkedin')),
				'google_plus' => $this->testInput($this->input->post('google_plus'))
			);
			$where = array('settingId' => '1');
			if (!$this->mymodel->update($mydata, 'settings', $where)) {
				$msg = 'error';
			} else {
				$msg = '["Setting saved successfully!", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('settings/site_settings'),'refresh');
	}


	public function commission()
	{
		$data = array(
			'title' => 'Commission Points Settings',
			'page' => 'settings',
			'subpage' => 'commission_settings'
		);
		$data['data'] = $this->mymodel->get('referal_points', true, 'pointId', 1);
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/commission-settings');
		$this->load->view('admin/footer');
	}


	public function update()
	{
		if ($this->input->post('eshopPoint')) {

			$mydata = array(
				'eshopPoint' => $this->testInput($this->input->post('eshopPoint')),
				'level1' => $this->testInput($this->input->post('level1')),
				'level2' => $this->testInput($this->input->post('level2')),
				'level3' => $this->testInput($this->input->post('level3')),
				'level4' => $this->testInput($this->input->post('level4'))
			);
			$where = array('pointId' => '1');
			if (!$this->mymodel->update($mydata, 'referal_points', $where)) {
				$msg = 'error';
			} else {
				$msg = '["Data saved successfully!", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('settings/commission'),'refresh');
	}


	public function logo()
	{
		$data = array(
			'title' => 'Logo Settings',
			'page' => 'settings',
			'subpage' => 'logo_settings'
		);
		$data['data'] = $this->mymodel->get('settings', true, 'settingId', 1);
		$this->load->view('admin/header', $data, FALSE);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/logo-settings');
		$this->load->view('admin/footer');
	}


	public function logosave()
	{
		if ($this->input->post('logo_settings')) {

			$mydata = array();
			$where = array('settingId' => '1');

			if ($_FILES['logo']['name']!='' && $this->input->post('oldLogo')) {

				$config['upload_path'] = './uploads/logos/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '1024';

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('logo')){
					$error = strip_tags($this->upload->display_errors());
				} else {
					$logoArray = $this->upload->data();
					$oldLogo = $this->input->post('oldLogo');
					$mydata['logo'] = $logoArray['file_name'];
				}
			}
			if ($_FILES['favicon']['name']!='' && $this->input->post('oldFavicon')) {
				
				$config['upload_path'] = './uploads/logos/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '1024';

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('favicon')){
					$error = strip_tags($this->upload->display_errors());
				} else {
					$faviconArray = $this->upload->data();
					$oldFavicon = $this->input->post('oldFavicon');
					$mydata['favicon'] = $faviconArray['file_name'];
				}
			}
			if ($_FILES['title']['name']!='' && $this->input->post('oldTitle')) {
				
				$config['upload_path'] = './uploads/logos/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '1024';

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ( ! $this->upload->do_upload('title')){
					$error = strip_tags($this->upload->display_errors());
				} else {
					$titleArray = $this->upload->data();
					$oldTitle = $this->input->post('oldTitle');
					$mydata['title'] = $titleArray['file_name'];
				}
			}
			if (count($mydata) > 0) {
				if (!$this->mymodel->update($mydata, 'settings', $where)) {
					$msg = 'error';
				} else {
					if (!empty($oldLogo) && $oldLogo != '' && !is_null($oldLogo) && file_exists('./uploads/logos/'.$oldLogo)) {
						@unlink('./uploads/logos/'.$oldLogo);
					}
					if (!empty($oldFavicon) && $oldFavicon != '' && !is_null($oldFavicon) && file_exists('./uploads/logos/'.$oldFavicon)) {
						@unlink('./uploads/logos/'.$oldFavicon);
					}
					if (!empty($oldTitle) && $oldTitle != '' && !is_null($oldTitle) && file_exists('./uploads/logos/'.$oldTitle)) {
						@unlink('./uploads/logos/'.$oldTitle);
					}
					$msg = '["Settings saved successfully!", "success", "#A5DC86"]';
				}
				$this->session->set_flashdata('msg', $msg);
			} elseif (!empty($error)) {
				$msg = '["'.$error.'", "error", "#DD6B55"]';
			}
		}
		redirect(admin_url('settings/logo'),'refresh');
	}

}

/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */