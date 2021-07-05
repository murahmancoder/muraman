<?php
		
	if (!function_exists('menuAktif')){

		function menuAktif($url = ""){
			$ci =& get_instance();

			if($ci->router->fetch_class() == $url){
				return 'active';
			}
		 }   
		function subMenuAktif($url = ""){
			$ci =& get_instance();

			if($ci->router->fetch_method() == $url){
				return 'active';
			}
		 }   
	}

	if (!function_exists('Admin')){
		function AdminDilarang(){
			$ci =& get_instance();
			if($ci->M_User->detail($ci->session->userdata('user_id'))->status == 'Admin'){
				return show_404();
			}
		}
	}
	