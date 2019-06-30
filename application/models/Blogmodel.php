<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogmodel extends CI_Model {

	function __construct() { 
		parent::__construct(); 

	}

	public function fetch_all($tbl)
	{
		$this->db->select('*');
		$query=$this->db->get($tbl);
		return $query->result();

	}
	public function fetch_all_join($query)
	{
		$query = $this->db->query($query);
		return $query->result();   

	}
	public function fetch_all_rows_limit($tbl, $where,$limit)
	{
		$this->db->select('*');
		$this->db->where($where);
		$this->db->limit($limit); 
		$query=$this->db->get($tbl);
		return $query->result();

	}
	public function fetch_single_join($query)
	{
		$query = $this->db->query($query);
		return $query->row();        
	}
	public function fetch_row($tbl, $where)
	{

		$this->db->select('*');
		$this->db->where($where);
		$query=$this->db->get($tbl);
		return $query->row();

	} 
	public function fetch_all_rows($tbl, $where)
	{
		$this->db->select('*');
		$this->db->where($where);
		$query=$this->db->get($tbl);
		return $query->result();

	}
	public function delete_single_con($tbl,$where)
	{
		$this->db->where($where);
		$delete = $this->db->delete($tbl); 
		return $delete;

	}
	public function eidt_single_row($tbl,$data, $where)
	{
		$this->db->where($where);
		$this->db->update($tbl,$data);
		return true;

	}
	
   public function blog_count($tbl,$where) 
	{
		$this->db->select('*');
		$this->db->where($where);
		return $this->db->count_all_results($tbl);
	}  
 
 
   public function fetch_blogs($limit=null,$offset=NULL) {
 
   	$this->db->select("*");
   	$this->db->from('country');
   	$this->db->limit($limit, $offset);
   	$query = $this->db->get();
   	return $query->result();
 
   }
   public function num_rows()
	{
		$query = $this->db->select('*')->from('menus')->get();
		return $query->num_rows();
	}
	public function blog_list( $limit, $offset )
	{

		$query = $this->db
		->select('*')
		->order_by('menu_id','desc')
		->from('menus')
		->limit( $limit, $offset )
		->get();
		return $query->result();
	}


}