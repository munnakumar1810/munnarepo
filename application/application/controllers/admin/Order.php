<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends MY_Controller {
public function __construct()
{
parent::__construct();
$this->loggedIn();
}
public function lists()
{
$data = array(
'title' => 'List of Orders',
'page' => 'orderlist',
'subpage' => ''
);
$sql = "SELECT o.orderId, o.orderNo, o.userId, o.eshopId, o.orderStatus, o.created, e.eshopName, users.firstName, users.lastName, (SELECT SUM(od.price*od.quantity) FROM order_details AS od WHERE od.orderId = o.orderId) AS totalAmount FROM orders AS o JOIN eshop AS e ON e.eshopId = o.eshopId JOIN users ON users.userId = o.userId ORDER BY o.orderId DESC";
$data['list'] = $this->mymodel->fetch($sql);
$this->load->view('admin/header', $data);
$this->load->view('admin/sidebar');
$this->load->view('admin/order_list');
$this->load->view('admin/footer');
}
}