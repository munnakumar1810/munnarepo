<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Commonmodel');
	}


	public function index()
	{
		
		$data['cms']=$cms=$this->Commonmodel->fetch_row("cms","pageId=2");
		$data['title']=$cms->pageTitle;
		$this->load->view('header',$data);
		$this->load->view('about',$data);
		$this->load->view('footer');

	}
	public function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric|min_length[10]');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');
		if ($this->form_validation->run() == TRUE ) {

			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'message' => $this->input->post('message')
			);

			$result = $this->mymodel->save('enquiries', $data);

			if ($result==TRUE) {

				$this->session->set_flashdata("success_msg", "Thankyou for contacting us!");
				redirect('contact','refresh');
				
			} else {

				$this->session->set_flashdata("success_msg", "Error in sending Email.");
				redirect('contact','refresh');
			}		

		}
		else {
			$this->session->set_flashdata("error", "Something went wrong");
			$data['title']="Contact Us";
			$this->load->view('header',$data);
			$this->load->view('contact',$data);
			$this->load->view('footer');
		}
	}

}
