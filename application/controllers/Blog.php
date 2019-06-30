<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller  {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blogmodel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library("pagination");

	}
	

	
	public function index()
	{
		$data['title']="Blog List";
		$this->load->view('header',$data);

		$config=array();
		$config["base_url"] = base_url() . "/blog";
		$data['total_row'] = $total_row = $this->Blogmodel->blog_count('blog', array('status' => 1));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		
		if($this->input->get('page')){
			$page = $this->input->get('page') ;
			$start_from = ($page-1) * $config["per_page"];
		}
		else{
			$page = 1;
			$start_from = 0;
		}

		$query="SELECT * FROM blog WHERE status=1 LIMIT ".$config['per_page']." OffSET ".$start_from."";

    	
    	$data['bloglist'] = $this->Blogmodel->fetch_all_join($query);
    	$data['links'] = $this->pagination->create_links();

		$data['total_pages'] = ceil($total_row / $config['per_page']);
    	
    	$data['catblogs']=$this->Blogmodel->fetch_all_rows('blog_category',"status=1");
    	$data['latestProduct']=$this->Blogmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC LIMIT 5");
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}
	
	public function details()
	{
		$data['title']="Blog Details";

		$blog_id=$this->uri->segment(3);

		$query="SELECT b.*, c.blogCatId, c.name FROM blog as b JOIN blog_category as c on b.blogCatId=c.blogCatId WHERE b.blogId=$blog_id";

		$data['details']=$this->Blogmodel->fetch_single_join($query);
		$data['catblogs']=$this->Blogmodel->fetch_all_rows('blog_category',"status=1");
		$data['latestProduct']=$this->Blogmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC LIMIT 5");
		$this->load->view('header',$data);
		$this->load->view('blogdetails',$data);
		$this->load->view('footer');
	}
	public function blogcatgory()
	{
		
		$data['title']="Blog List";
		$this->load->view('header',$data);
		$id=$this->uri->segment(3);
    	$data['bloglist'] = $this->Blogmodel->fetch_all_rows("blog","blogCatId=$id");
    	$data['catblogs']=$this->Blogmodel->fetch_all_rows('blog_category',"status=1");
    	$data['latestProduct']=$this->Blogmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC LIMIT 5");
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}
	public function add()
	{
		$data['title']="Post a Comments";
		$blog_id=$this->input->post('blogid');

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric|min_length[10]');
		$this->form_validation->set_rules('comments', 'Comments', 'required|trim');
		
		if ($this->form_validation->run() == TRUE ) {

			$data = array(
				'blogId'=>$blog_id,
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'comment' => $this->input->post('comments'),
				'status'=>1
			);

			$result = $this->mymodel->save('blog_comments', $data);

			if ($result==TRUE) {

				$this->session->set_flashdata("blogsuccess", "Your comment is added successfully!");
				redirect('blog/details/'.$blog_id,'refresh');
				
			} 		

		}
		else {

		$this->session->set_flashdata("error", "Something went wrong");


		
		$query="SELECT b.*, c.blogCatId, c.name FROM blog as b JOIN blog_category as c on b.blogCatId=c.blogCatId WHERE b.blogId=$blog_id";

		$data['details']=$this->Blogmodel->fetch_single_join($query);
		$data['catblogs']=$this->Blogmodel->fetch_all_rows('blog_category',"status=1");
		$data['latestProduct']=$this->Blogmodel->fetch_all_join("SELECT * FROM products WHERE status=1 ORDER BY productId DESC LIMIT 5");
		$this->load->view('header',$data);
		$this->load->view('blogdetails',$data);
		$this->load->view('footer');
		}
	

	}
}
