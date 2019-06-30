<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New Category',
			'page' => 'product',
			'subpage' => 'categorylist'
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('categoryName')) {
			$mydata = array(
				'categoryName' => $this->testInput($this->input->post('categoryName')),
				'status' => 1
			);
			if (!$this->mymodel->save('category', $mydata)) {
				$msg = 'error';
			} else {
				$msg = '["New Category added successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('category/lists'),'refresh');
		} else {
			show_404();
		}
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Categories',
			'page' => 'product',
			'subpage' => 'categorylist'
		);
		$data['list'] = $this->mymodel->get('category');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category_list');
		$this->load->view('admin/footer');
	}


	public function edit($categoryId = false)
	{
		if ($categoryId == false) {
			show_404();
		} elseif ($this->mymodel->count('category', ['categoryId'=>$categoryId]) != 1) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit Category',
				'page' => 'product',
				'subpage' => 'categorylist'
			);
			$data['data'] = $this->mymodel->get('category', true, 'categoryId', $categoryId);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/category_edit');
			$this->load->view('admin/footer');
		}
	}


	public function update()
	{
		if ($this->input->post('categoryName') && $this->input->post('categoryId')) {
			$categoryId = $this->input->post('categoryId');
			$where = array('categoryId'=>$categoryId);
			$mydata = array(
				'categoryName' => $this->testInput($this->input->post('categoryName')),
				'status' => $this->input->post('status')
			);
			if (!$this->mymodel->update($mydata, 'category', $where)) {
				$msg = 'error';
			} else {
				$msg = '["Category updated successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('category/lists'),'refresh');
		} else {
			show_404();
		}
	}


	public function changeStatus()
	{
		if ($this->input->post('categoryId')) {
			$categoryId = $this->input->post('categoryId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Category activated successfully!';
			} else {
				$msg = 'Category deactivated successfully!';
			}
			if ($this->mymodel->update(['status'=>$status], 'category', ['categoryId'=>$categoryId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */