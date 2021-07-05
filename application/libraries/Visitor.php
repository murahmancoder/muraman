<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function add() {
		// Web Statistik
		$link = parse_url(current_url(),PHP_URL_PATH);
      $url = explode('/', $link);
		$artikel = $this->CI->M_Artikel->readArtikel($url[3]);
		
		$datastatistik = [
         'id_artikel'=> $artikel->id_artikel,
			'judul'=>$artikel->judul,
			'penulis'=>$artikel->penulis,
         'views'=>count([$this->CI->input->ip_address()])
	   ];
		$this->CI->M_Visitor->tambah($datastatistik);
		// End web statistik	
	}
	

	
}