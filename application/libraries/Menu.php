<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu
{
	public function dynamicMenu() {

		$CI = & get_instance();
		
		$CI->db->select('menus.*', FALSE);
		$CI->db->where('status = 1');
		$CI->db->from('menus');
		$CI->db->order_by('sort');
		$query_result = $CI->db->get();
		$user_menu = $query_result->result();
							

		// Create a multidimensional array to conatin a list of items and parents
		$menu = array(
			'items' => array(),
			'parents' => array()
		);
		
		// Builds the array lists with data from the menu table
		
		
		foreach ($user_menu as $v_menu) {
			$menu['items'][$v_menu->menu_id] = $v_menu;
			$menu['parents'][$v_menu->parent][] = $v_menu->menu_id;
		}

		// Builds the array lists with data from the menu table
		return $output = $this->buildMenu(0, $menu);
	}

	public function buildMenu($parent, $menu) {
	
		$html = "";

		if (isset($menu['parents'][$parent])) {
			$html .= "<ul class='nav' id='side-menu'>\n";
			foreach ($menu['parents'][$parent] as $itemId) {
				$result = $this->active_menu_id($menu['items'][$itemId]->menu_id);
				if ($result){
					$active = 'active';
					$opened = 'active';
				} else {
					$active = '';
					$opened = '';
					$current = '';
				}

				if (strpos($menu['items'][$itemId]->link, '/')) {
					$link = admin_url($menu['items'][$itemId]->link);
				} elseif (!strpos($menu['items'][$itemId]->link, '#') || !strpos($menu['items'][$itemId]->link, 'void(0);')) {
					$link = admin_url($menu['items'][$itemId]->link);
				} else {
					$link = $menu['items'][$itemId]->link;
				}
				
				if (!isset($menu['parents'][$itemId])) { //if condition is false
					$html .= "<li class='" . $active . "' >\n  <a href='" . $link . "' class='waves-effect '> <i  data-icon='/' class='" . $menu['items'][$itemId]->icon . "'></i><span class='hide-menu'>" . $menu['items'][$itemId]->label . "</span></a>\n</li> \n";
				}

				if (isset($menu['parents'][$itemId])) { //if condition is true
					$html .= "<li class='". $opened ." '>\n  <a href='" . $link . "' class='waves-effect'> <i data-icon='/' class='" . $menu['items'][$itemId]->icon . "'></i><span class='hide-menu'>" . $menu['items'][$itemId]->label . "<span class='fa arrow'></span></span></a>\n";
					$html .= self::buildMenu($itemId, $menu);
					$html .= "</li> \n";
				}
			}

			$html .= "</ul> \n";
		}
		return $html;
	}
	
	public function active_menu_id($id){
		$CI = & get_instance();    
		$activeId = $CI->session->userdata('menu_active_id');
		
		if(!empty($activeId)){
			foreach($activeId as $v_activeId){
				if($id == $v_activeId){
					return TRUE;
				}
			} 
		}
		return FALSE;
	}

	

}

/* End of file menu.php */
/* Location: ./application/libraries/menu.php */
