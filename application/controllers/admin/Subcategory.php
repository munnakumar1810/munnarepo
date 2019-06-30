<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loggedIn();
	}


	public function add()
	{
		$data = array(
			'title' => 'Add New Sub Category',
			'page' => 'product',
			'subpage' => 'subcategorylist'
        );
		$data['categoryList'] = $this->mymodel->get('category', false, 'status', 1);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/subcategory_add');
		$this->load->view('admin/footer');
	}


	public function create()
	{
		if ($this->input->post('subcategoryName')) {
			$mydata = array(
				'subcategoryName' => $this->testInput($this->input->post('subcategoryName')),
				'categoryId' => $this->testInput($this->input->post('categoryId')),
				'status' => 1
            );
			if (!$this->mymodel->save('subcategory', $mydata)) {
				$msg = 'error';
			} else {
				$msg = '["New Sub Category added successfully!", "success", "#A5DC86"]';
			}

			$this->session->set_flashdata('msg', $msg);
			redirect(admin_url('subcategory/lists'),'refresh');
		} else {
			show_404();
		}
	}


	public function lists()
	{
		$data = array(
			'title' => 'List of Sub Categories',
			'page' => 'product',
			'subpage' => 'subcategorylist'
        );
        $sql = "SELECT s.*, c.categoryName FROM subcategory AS s LEFT JOIN category AS c ON c.categoryId = s.categoryId ORDER BY s.subcategoryName";
		$data['list'] = $this->mymodel->fetch($sql);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/subcategory_list');
		$this->load->view('admin/footer');
	}


	public function edit($subcategoryId = false)
	{
		if ($subcategoryId == false) {
			show_404();
		} elseif ($this->mymodel->count('subcategory', ['subcategoryId'=>$subcategoryId]) != 1) {
			show_404();
		} else {
			$data = array(
				'title' => 'Edit Sub Category',
				'page' => 'product',
				'subpage' => 'subcategorylist'
            );
			$data['data'] = $this->mymodel->get('subcategory', true, 'subcategoryId', $subcategoryId);
			$data['categoryList'] = $this->mymodel->get('category', false, 'status', 1);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/subcategory_edit');
			$this->load->view('admin/footer');
		}
	}


    public function update()
    {
        if ($this->input->post('subcategoryName') && $this->input->post('subcategoryId')) {
            $subcategoryId = $this->input->post('subcategoryId');
            $where = array('subcategoryId'=>$subcategoryId);
            $mydata = array(
                'subcategoryName' => $this->testInput($this->input->post('subcategoryName')),
				'categoryId' => $this->testInput($this->input->post('categoryId')),
                'status' => $this->input->post('status')
            );
            if (!$this->mymodel->update($mydata, 'subcategory', $where)) {
                $msg = 'error';
            } else {
                $msg = '["Sub Category updated successfully!", "success", "#A5DC86"]';
            }

            $this->session->set_flashdata('msg', $msg);
            redirect(admin_url('subcategory/lists'),'refresh');
        } else {
            show_404();
        }
    }


	public function changeStatus()
	{
		if ($this->input->post('subcategoryId')) {
			$subcategoryId = $this->input->post('subcategoryId');
			$status = $this->input->post('status');
			if ($status == 1) {
				$msg = 'Sub Category activated successfully!';
			} else {
				$msg = 'Sub Category deactivated successfully!';
			}
			if ($this->mymodel->update(['status'=>$status], 'subcategory', ['subcategoryId'=>$subcategoryId])) {
				echo '["'.$msg.'", "success", "#A5DC86"]';
			} else {
				echo '["Some error occured, Please try again!", "error", "#DD6B55"]';
			}
		}
	}

}

/* End of file Subcategory.php */
/* Location: ./application/controllers/Subcategory.php */