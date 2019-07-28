<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of CMS',
			'page' => 'cms',
			'subpage' => ''
		);
		$data['list'] = $this->mymodel->select('pageId, pageTitle, modified', 'cms');

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/cms_list');
		$this->load->view('admin/footer');
	}


	public function edit($pageId = false)
	{
		if ($pageId == false) {
			show_404();
		} elseif ($this->mymodel->count('cms', ['pageId'=>$pageId]) != 1) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit CMS',
				'page' => 'cms',
				'subpage' => ''
			);
			$data['data'] = $this->mymodel->get('cms', true, 'pageId', $pageId);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/cms_edit');
			$this->load->view('admin/footer');
		}
	}


	public function update()
	{
		if ($this->input->post('pageTitle') && $this->input->post('pageId') && $this->input->post('pageText')) {
			$pageId = $this->input->post('pageId');
			$where = array('pageId'=>$pageId);
			$mydata = array(
				'pageTitle' => $this->testInput($this->input->post('pageTitle')),
				'pageText' => $this->testInput($this->input->post('pageText')),
				'content' => $this->testInput($this->input->post('content'))
			);
			if (!$this->mymodel->update($mydata, 'cms', $where)) {
				$msg = 'error';
			} else {
				$msg = '["Data saved successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('cms/edit/'.$pageId),'refresh');
		} else {
			show_404();
		}
	}


}

/* End of file Cms.php */
/* Location: ./application/controllers/Cms.php */