<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Banners',
			'page' => 'banner',
			'subpage' => 'bannerlist'
		);
		$data['list'] = $this->mymodel->get('banner');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/banner_list');
		$this->load->view('admin/footer');
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New Banner',
			'page' => 'banner',
			'subpage' => 'banneradd'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/banner_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('bannerTitle') && $_FILES['bannerImage']['name'] != '') {
			
			$config['upload_path'] = './uploads/slider/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bannerImage')){
				
				$error = strip_tags($this->upload->display_errors());
				$msg = '["'.$error.'", "error", "#DD6B55"]';
		
			} else {

				$data = $this->upload->data();
				$mydata = array(
					'bannerTitle' => $this->testInput($this->input->post('bannerTitle')),
					'bannerImage' => $data['file_name']
				);
				if (!$this->mymodel->save('banner', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Banner added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('banner/lists'),'refresh');
	}


	public function edit($bannerId = false)
	{
		if ($bannerId == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Banner',
			'page' => 'banner',
			'subpage' => 'bannerlist'
		);
		$data['data'] = $this->mymodel->get('banner', true, 'bannerId', $bannerId);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/banner_edit');
		$this->load->view('admin/footer');
	}


	public function update()
	{
		if ($this->input->post('bannerTitle') && $this->input->post('bannerId')) {

			$where = array('bannerId' => $this->input->post('bannerId'));
			$oldBannerImage = $this->input->post('oldBannerImage');
			$mydata = array('bannerTitle' => $this->testInput($this->input->post('bannerTitle')));

			if ($_FILES['bannerImage']['name'] != '') {
			
				$config['upload_path'] = './uploads/slider/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('bannerImage')){
					
					$error = strip_tags($this->upload->display_errors());
					$msg = '["'.$error.'", "error", "#DD6B55"]';
			
				} else {

					$data = $this->upload->data();
					$mydata['bannerImage'] = $data['file_name'];
				}
			}

			if (empty($error)) {
				
				if (!$this->mymodel->update($mydata, 'banner', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldBannerImage && $_FILES['bannerImage']['name'] != '') {
						if (file_exists('./uploads/slider/'.$oldBannerImage)) {
							@unlink('./uploads/slider/'.$oldBannerImage);
						}
					}
					$msg = '["Banner updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('banner/lists'),'refresh');
	}


	public function delete($bannerId = false)
	{
		if ($bannerId != false) {

			$where = array('bannerId' => $bannerId);
			$data = $this->mymodel->get_by('banner', true, $where);

			if (!$this->mymodel->delete('banner', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->bannerImage && file_exists('./uploads/slider/'.@$data->bannerImage)) {
					@unlink('./uploads/slider/'.@$data->bannerImage);
				}
				$msg = '["Banner deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('banner/lists'),'refresh');
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */