<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Commission extends MY_Model {

	function __construct() { 
		parent::__construct(); 

	}

	public function percentageOf($total, $per, $decimals)
	{
		return round($total*$per / 100, $decimals);
	}
	public function getUserCredits($userId)
	{
		$sql = "SELECT credits FROM users WHERE userId = '$userId'";
		return $this->fetch($sql, true)->credits;
		
	}
	public function getEshopCredits($userId)
	{
		return $this->select('credits','eshop', true, "eshopId='$userId'")->credits;
	}
	public function eshopSlabComm()
	{
		return $this->select('eshopPoint','referal_points', true, "pointId=1")->eshopPoint;
	}
	public function firstSlabComm()
	{
		return $this->select('level1','referal_points',true, "pointId=1")->level1;
	}
	public function secondSlabComm()
	{
		return $this->select('level2','referal_points',true, "pointId=1")->level2;
	}
	
	public function thirdSlabComm()
	{
		return $this->select('level3','referal_points',true, "pointId=1")->level3;
	
	}
	public function fourthSlabComm()
	{
		return $this->select('level4','referal_points',true, "pointId=1")->level4;
	
	}


	


}