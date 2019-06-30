<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->eshopLoggedIn();
	}

	public function lists()
	{
		$data = array(
			'title' => 'List of Orders',
			'page' => 'orderlist',
			'subpage' => ''
		);
		$eshopId = $this->session->userdata('eshopId');
		$sql = "SELECT o.orderId, o.orderNo, o.userId, o.eshopId, o.orderStatus, o.created, 
		(SELECT SUM(od.price*od.quantity) FROM order_details AS od WHERE od.orderId = o.orderId) AS totalAmount, u.firstName, u.lastName 
		FROM orders AS o 
		LEFT JOIN users AS u ON u.userId = o.userId
		WHERE o.eshopId = '$eshopId' ORDER BY o.orderId DESC";
		$data['list'] = $this->mymodel->fetch($sql);

		$this->load->view('eshop/header', $data);
		$this->load->view('eshop/sidebar');
		$this->load->view('eshop/order_list');
		$this->load->view('eshop/footer');
	}


}

/* End of file Order.php */
/* Location: ./application/controllers/Order.php */