<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Mymodel extends MY_Model {



	public function insert($table, $data)

	{

		if($this->db->insert($table, $data)) {

			return true;

		} else {

			return false;

		}

	}





	public function getApprovalStatus($userId)

	{

		$user = $this->select('approval', 'users', true, ['userId' => $userId]);

		return $user->approval;

	}





	public function getSettings()

	{

		return $this->get('settings', true, 'settingId', '1');

	}

	public function cartlist($userId)
	{
		$sql="SELECT ct.cartId,p.productId, p.productName, ct.quantity, p.price,(SELECT pimg.productImage FROM product_images AS pimg WHERE pimg.productId = p.productId LIMIT 1) AS productImage   
		From cart as ct
		JOIN products AS p ON p.productId=ct.productId
		JOIN subcategory AS sc ON sc.subcategoryId = p.subcategoryId
		JOIN category AS c ON c.categoryId = sc.categoryId
		WHERE ct.userId = '".$userId."'";
		
		return $this->fetch($sql,false);
		
	}



}
