<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('can_action'))
{
	function can_action($menu_id, $action)
	{
		$CI = &get_instance();
		$designations_id = $CI->session->userdata('userId');
		$where = array('userId' => $userId, $action => $menu_id);
		//$user_type = $CI->session->userdata('userType');
		//if ($user_type == 0) {
		//	return true;
		//} else {
			$can_do = $CI->db->where($where)->get('user_role')->row();
			if (!empty($can_do)) {
				return true;
			}
		//}
	}
}


if ( ! function_exists('can_do'))
{
	function can_do($menu_id)
	{
		$CI = &get_instance();
		$designations_id = $CI->session->userdata('userId');
		//$user_type = $CI->session->userdata('userType');
		//if ($user_type == 0) {
		//	return true;
		//} else {
			$can_do = $CI->db->where(array('userId' => $userId, 'menu_id' => $menu_id))->get('user_role')->result();
			if (!empty($can_do)) {
				return true;
			}
		//}
	}
}