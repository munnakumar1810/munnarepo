<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Gallery',
			'page' => 'gallery',
			'subpage' => 'gallerylist'
		);
		$data['list'] = $this->mymodel->get('gallery_list');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_list');
		$this->load->view('admin/footer');
	}
	
	public function add()
	{
		$data = array(
			'title' => 'Add New Gallery',
			'page' => 'gallery',
			'subpage' => 'gallerylist'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('title') && $_FILES['images']['name'] != '') {
			
			$config['upload_path'] = './uploads/home/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('images')){
				
				$error = strip_tags($this->upload->display_errors());
				$msg = '["'.$error.'", "error", "#DD6B55"]';
		
			} else {

				$data = $this->upload->data();
				$mydata = array(
					'title' => $this->testInput($this->input->post('title')),
					'images' => $data['file_name']
				);
				if (!$this->mymodel->save('gallery_list', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Gallery added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/lists'),'refresh');
	}


	public function edit($id = false)
	{
		if ($id == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Gallery',
			'page' => 'banner',
			'subpage' => 'gallerylist'
		);
		$data['data'] = $this->mymodel->get('gallery_list', true, 'id', $id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_edit');
		$this->load->view('admin/footer');
	}


	public function update()
	{
		if ($this->input->post('title') && $this->input->post('id')) {

			$where = array('id' => $this->input->post('id'));
			$oldimages = $this->input->post('oldimages');
			$mydata = array('title' => $this->testInput($this->input->post('title')));

			if ($_FILES['images']['name'] != '') {
			
				$config['upload_path'] = './uploads/home/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('images')){
					
					$error = strip_tags($this->upload->display_errors());
					$msg = '["'.$error.'", "error", "#DD6B55"]';
			
				} else {

					$data = $this->upload->data();
					$mydata['images'] = $data['file_name'];
				}
			}

			if (empty($error)) {
				
				if (!$this->mymodel->update($mydata, 'gallery_list', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldimages && $_FILES['images']['name'] != '') {
						if (file_exists('./uploads/home/'.$oldimages)) {
							@unlink('./uploads/home/'.$oldimages);
						}
					}
					$msg = '["Gallery updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/lists'),'refresh');
	}


	public function delete($id = false)
	{
		if ($id != false) {

			$where = array('id' => $id);
			$data = $this->mymodel->get_by('gallery_list', true, $where);

			if (!$this->mymodel->delete('gallery_list', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->images && file_exists('./uploads/home/'.@$data->images)) {
					@unlink('./uploads/home/'.@$data->images);
				}
				$msg = '["Gallery deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/lists'),'refresh');
	}

	public function weeklylists()
	{
		$data = array(
			'title' => 'List of Weekly Gallery',
			'page' => 'gallery',
			'subpage' => 'weeklylists'
		);
		$data['list'] = $this->mymodel->get('gallery_weekly_list');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_weekly_list');
		$this->load->view('admin/footer');
	}

	public function addweekly()
	{
		$data = array(
			'title' => 'Add New Gallery',
			'page' => 'gallery',
			'subpage' => 'weeklylists'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_weekly_add');
		$this->load->view('admin/footer');
	}


	public function createweekly()
	{
		if ($this->input->post('title') && $_FILES['images']['name'] != '') {
			
			$config['upload_path'] = './uploads/home/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '1024';

			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('images')){
				
				$error = strip_tags($this->upload->display_errors());
				$msg = '["'.$error.'", "error", "#DD6B55"]';
		
			} else {
				
				$data = $this->upload->data();
				$mydata = array(
					'title' => $this->testInput($this->input->post('title')),
					'images' => $data['file_name']
				);
				if (!$this->mymodel->save('gallery_weekly_list', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Gallery added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/weeklylists'),'refresh');
	}


	public function editweekly($id = false)
	{
		if ($id == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Banner',
			'page' => 'banner',
			'subpage' => 'bannerlist'
		);
		$data['data'] = $this->mymodel->get('gallery_weekly_list', true, 'id', $id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_weekly_edit');
		$this->load->view('admin/footer');
	}


	public function updateweekly()
	{
		if ($this->input->post('title') && $this->input->post('id')) {

			$where = array('id' => $this->input->post('id'));
			$oldimages = $this->input->post('oldimages');
			$mydata = array('title' => $this->testInput($this->input->post('title')));

			if ($_FILES['images']['name'] != '') {
			
				$config['upload_path'] = './uploads/home/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('images')){
					
					$error = strip_tags($this->upload->display_errors());
					$msg = '["'.$error.'", "error", "#DD6B55"]';
			
				} else {

					$data = $this->upload->data();
					$mydata['images'] = $data['file_name'];
				}
			}

			if (empty($error)) {
				
				if (!$this->mymodel->update($mydata, 'gallery_weekly_list', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldimages && $_FILES['images']['name'] != '') {
						if (file_exists('./uploads/home/'.$oldimages)) {
							@unlink('./uploads/home/'.$oldimages);
						}
					}
					$msg = '["Gallery updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/weeklylists'),'refresh');
	}


	public function deleteweekly($id = false)
	{
		if ($id != false) {

			$where = array('id' => $id);
			$data = $this->mymodel->get_by('gallery_weekly_list', true, $where);

			if (!$this->mymodel->delete('gallery_weekly_list', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->images && file_exists('./uploads/home/'.@$data->images)) {
					@unlink('./uploads/home/'.@$data->images);
				}
				$msg = '["Gallery deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/weeklylists'),'refresh');
	}

	public function featuredlists()
	{
		$data = array(
			'title' => 'List of Featured Gallery',
			'page' => 'gallery',
			'subpage' => 'featuredlists'
		);
		$data['list'] = $this->mymodel->get('gallery_featured_list');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_featured_list');
		$this->load->view('admin/footer');
	}

	public function addfeatured()
	{
		$data = array(
			'title' => 'Add New Gallery',
			'page' => 'gallery',
			'subpage' => 'featuredlists'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_featured_add');
		$this->load->view('admin/footer');
	}


	public function createfeatured()
	{
		if ($this->input->post('title') && $_FILES['images']['name'] != '') {
			
			$config['upload_path'] = './uploads/home/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '1024';

			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('images')){
				
				$error = strip_tags($this->upload->display_errors());
				$msg = '["'.$error.'", "error", "#DD6B55"]';
		
			} else {
				
				$data = $this->upload->data();
				$mydata = array(
					'title' => $this->testInput($this->input->post('title')),
					'images' => $data['file_name']
				);
				if (!$this->mymodel->save('gallery_featured_list', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Gallery added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/featuredlists'),'refresh');
	}

	public function editfeatured($id = false)
	{
		if ($id == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Gallery',
			'page' => 'banner',
			'subpage' => 'featuredlists'
		);
		$data['data'] = $this->mymodel->get('gallery_featured_list', true, 'id', $id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_featured_edit');
		$this->load->view('admin/footer');
	}


	public function updatefeatured()
	{
		if ($this->input->post('title') && $this->input->post('id')) {

			$where = array('id' => $this->input->post('id'));
			$oldimages = $this->input->post('oldimages');
			$mydata = array('title' => $this->testInput($this->input->post('title')));

			if ($_FILES['images']['name'] != '') {
			
				$config['upload_path'] = './uploads/home/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('images')){
					
					$error = strip_tags($this->upload->display_errors());
					$msg = '["'.$error.'", "error", "#DD6B55"]';
			
				} else {

					$data = $this->upload->data();
					$mydata['images'] = $data['file_name'];
				}
			}

			if (empty($error)) {
				
				if (!$this->mymodel->update($mydata, 'gallery_featured_list', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldimages && $_FILES['images']['name'] != '') {
						if (file_exists('./uploads/home/'.$oldimages)) {
							@unlink('./uploads/home/'.$oldimages);
						}
					}
					$msg = '["Gallery updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/featuredlists'),'refresh');
	}


	public function deletefeatured($id = false)
	{
		if ($id != false) {

			$where = array('id' => $id);
			$data = $this->mymodel->get_by('gallery_featured_list', true, $where);

			if (!$this->mymodel->delete('gallery_featured_list', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->images && file_exists('./uploads/home/'.@$data->images)) {
					@unlink('./uploads/home/'.@$data->images);
				}
				$msg = '["Gallery deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/featuredlists'),'refresh');
	}


	public function newlists()
	{
		$data = array(
			'title' => 'List of newlists',
			'page' => 'gallery',
			'subpage' => 'newlists'
		);
		$data['list'] = $this->mymodel->get('gallery_new_list');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_new_list');
		$this->load->view('admin/footer');
	}

	public function addnew()
	{
		$data = array(
			'title' => 'Add New Gallery',
			'page' => 'gallery',
			'subpage' => 'newlists'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_new_add');
		$this->load->view('admin/footer');
	}


	public function createnew()
	{
		if ($this->input->post('title') && $_FILES['images']['name'] != '') {
			
			$config['upload_path'] = './uploads/home/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '1024';

			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('images')){
				
				$error = strip_tags($this->upload->display_errors());
				$msg = '["'.$error.'", "error", "#DD6B55"]';
		
			} else {
				
				$data = $this->upload->data();
				$mydata = array(
					'title' => $this->testInput($this->input->post('title')),
					'images' => $data['file_name']
				);
				if (!$this->mymodel->save('gallery_new_list', $mydata)) {
					$msg = 'error';
				} else {
					$msg = '["Gallery added successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/newlists'),'refresh');
	}

	public function editnew($id = false)
	{
		if ($id == false) {
			show_404();
			exit();
		}
		$data = array(
			'title' => 'Edit New Gallery',
			'page' => 'banner',
			'subpage' => 'newlists'
		);
		$data['data'] = $this->mymodel->get('gallery_new_list', true, 'id', $id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/gallery_new_edit');
		$this->load->view('admin/footer');
	}


	public function updatenew()
	{
		if ($this->input->post('title') && $this->input->post('id')) {

			$where = array('id' => $this->input->post('id'));
			$oldimages = $this->input->post('oldimages');
			$mydata = array('title' => $this->testInput($this->input->post('title')));

			if ($_FILES['images']['name'] != '') {
			
				$config['upload_path'] = './uploads/home/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('images')){
					
					$error = strip_tags($this->upload->display_errors());
					$msg = '["'.$error.'", "error", "#DD6B55"]';
			
				} else {

					$data = $this->upload->data();
					$mydata['images'] = $data['file_name'];
				}
			}

			if (empty($error)) {
				
				if (!$this->mymodel->update($mydata, 'gallery_new_list', $where)) {
					
					$msg = 'error';

				} else {

					if ($oldimages && $_FILES['images']['name'] != '') {
						if (file_exists('./uploads/home/'.$oldimages)) {
							@unlink('./uploads/home/'.$oldimages);
						}
					}
					$msg = '["Gallery updated successfully", "success", "#A5DC86"]';
				}
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/newlists'),'refresh');
	}


	public function deletenew($id = false)
	{
		if ($id != false) {

			$where = array('id' => $id);
			$data = $this->mymodel->get_by('gallery_new_list', true, $where);

			if (!$this->mymodel->delete('gallery_new_list', $where)) {
				
				$msg = 'error';

			} else {
				
				if (@$data->images && file_exists('./uploads/home/'.@$data->images)) {
					@unlink('./uploads/home/'.@$data->images);
				}
				$msg = '["Gallery deleted successfully.", "success", "#A5DC86"]';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('gallery/newlists'),'refresh');
	}


}