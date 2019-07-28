<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Collections',
			'page' => 'collection',
			'subpage' => 'collectionlist'
		);
		$sql = "SELECT s.*, c.categoryName FROM collection AS s LEFT JOIN category AS c ON c.categoryId = s.categoryId ORDER BY s.bannerId";

		$data['list'] = $this->mymodel->fetch($sql);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collection_list');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add New collection',
			'page' => 'collection',
			'subpage' => 'collectionadd'
		);

		$data['categoryList'] = $this->mymodel->get('category', false, 'status', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collection_add');
		$this->load->view('admin/footer');
	}

	public function create()
	{
		if ($this->input->post('bannerTitle') && $_FILES['bannerImage']['name'] != '') {
			
			$config['upload_path'] = './uploads/home/';
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
					'bannerImage' => $data['file_name'],
					'categoryId' => $this->testInput($this->input->post('categoryId'))
				);
				if (!$this->mymodel->save('collection', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Collection banner added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('collection/lists'),'refresh');
	}

	
	public function edit($bannerId = false)
	{
		if ($bannerId == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Collection',
			'page' => 'collection',
			'subpage' => 'collectionlist'
		);
		$data['data'] = $this->mymodel->get('collection', true, 'bannerId', $bannerId);

		$data['categoryList'] = $this->mymodel->get('category', false, 'status', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/collection_edit');
		$this->load->view('admin/footer');
	}
	public function update()
	{
		if ($this->input->post('bannerTitle') && $this->input->post('bannerId')) {

			$where = array('bannerId' => $this->input->post('bannerId'));
			$oldBannerImage = $this->input->post('oldBannerImage');
			$mydata = array(
				'bannerTitle' => $this->testInput($this->input->post('bannerTitle')),
				'categoryId' => $this->testInput($this->input->post('categoryId'))
			);

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
				
				if (!$this->mymodel->update($mydata, 'collection', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldBannerImage && $_FILES['bannerImage']['name'] != '') {
						if (file_exists('./uploads/home/'.$oldBannerImage)) {
							@unlink('./uploads/home/'.$oldBannerImage);
						}
					}
					$msg = '["Banner updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('collection/lists'),'refresh');
	}

	public function delete($bannerId = false)
	{
		if ($bannerId != false) {

			$where = array('bannerId' => $bannerId);
			$data = $this->mymodel->get_by('collection', true, $where);

			if (!$this->mymodel->delete('collection', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->bannerImage && file_exists('./uploads/home/'.@$data->bannerImage)) {
					@unlink('./uploads/home/'.@$data->bannerImage);
				}
				$msg = '["Banner deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('collection/lists'),'refresh');
	}


}