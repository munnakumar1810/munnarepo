<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}

	public function lists()
	{
		$data = array(
			'title' => 'List of Menus',
			'page' => 'menu_mgmt',
			'subpage' => 'menu_mgmt_list'
		);

		$sql = "SELECT m.*, a.label AS parentName 
		FROM menus AS m 
		LEFT JOIN menus AS a 
		ON m.parent = a.menu_id";
		$data['list'] = $this->mymodel->fetch($sql);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/list_menu');
		$this->load->view('admin/footer');
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New Menu'
		);

		$menus = $this->mymodel->get_by('menus', false, "(parent = '' OR parent IS NULL)");
		$new_menus = array('' => 'Select Parent Menu');
		foreach ($menus as $key => $v) {
			$new_menus[$v->menu_id] = $v->label;
		}
		$data['parent_menus'] = $new_menus;

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/add_menu');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('label')) {

			if ($this->input->post('status')) {
				$status = 1;
			} else {
				$status = 0;
			}
			$mydata = array(
				'label' => $this->testInput($this->input->post('label')),
				'link' => $this->testInput($this->input->post('link')),
				'icon' => $this->testInput($this->input->post('icon')),
				'parent' => $this->testInput($this->input->post('parent')),
				'status' => $status
			);
			if ($this->mymodel->insert('menus', $mydata)) {
				$msg = '["New menu added successfully!", "success", "#A5DC86"]';
			} else {
				$msg = 'error';
			}
			$this->session->set_flashdata('msg', $msg);
		}
		redirect(admin_url('menus/add'),'refresh');
	}


	public function edit($menu_id = false)
	{
		if ($menu_id != false) {

			$data = array(
				'title' => 'Edit Menu'
			);

			$menus = $this->mymodel->get_by('menus', false, "(parent = '' OR parent = 0 OR parent IS NULL)");
			$new_menus = array('' => 'Select Parent Menu');
			foreach ($menus as $key => $v) {
				$new_menus[$v->menu_id] = $v->label;
			}
			$data['menu_id'] = $menu_id;
			$data['parent_menus'] = $new_menus;
			$data['data'] = $this->mymodel->get('menus', true, 'menu_id', $menu_id);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_menu');
			$this->load->view('admin/footer');
		} else {
			show_404();
		}
	}


	public function update($menu_id)
	{
		if ($this->input->post('label')) {

			if ($this->mymodel->count('menus', "menu_id = '".$menu_id."'") == 1) {

				if ($this->input->post('status')) {
					$status = 1;
				} else {
					$status = 0;
				}

				$mydata = array(
					'label' => $this->testInput($this->input->post('label')),
					'link' => $this->testInput($this->input->post('link')),
					'icon' => $this->testInput($this->input->post('icon')),
					'parent' => $this->testInput($this->input->post('parent')),
					'status' => $status
				);

				if ($this->mymodel->update($mydata, 'menus', "menu_id = $menu_id")) {
					$msg = '["Menu updated successfully!", "success", "#A5DC86"]';
				} else {
					$msg = 'error';
				}
				$this->session->set_flashdata('msg', $msg);
			}
			redirect(admin_url('menus/edit/'.$menu_id),'refresh');
		}
		redirect(admin_url('menus/lists'),'refresh');
	}

}

/* End of file Menus.php */
/* Location: ./application/controllers/portal/Menus.php */