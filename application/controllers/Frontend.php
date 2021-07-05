<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model(['M_Artikel','M_Konfigurasi','M_Kategori','M_Visitor']);
		$this->load->library('Visitor');
		$this->load->library('pagination');
	}


	public function index()
	{
		
		$config['base_url'] = 'http://localhost/muraman/frontend/index';
		$config['total_rows'] = $this->M_Artikel->countAll();
		$config['per_page'] = 6;
		$mulai = $this->uri->segment(3).'#artikel';
		$this->pagination->initialize($config);

		$site=$this->M_Konfigurasi->get();
		$artikel= $this->M_Artikel->getArtikel($config['per_page'],$mulai);
		$kategori=$this->M_Kategori->list();

		$data=[
			"title"=> $site->namaweb,
			"keywords"=>$site->keywords,
			"metatext"=>$site->metatext,
			"site"=>$site,
			"listKategori"=>$kategori,
			"listArtikel"=>$artikel,
			"isi"=>"frontend/homepage"
		];
		$this->load->view('frontend',$data);
	}

	public function Allkategori()
	{

		$site=$this->M_Konfigurasi->get();
		$kategori=$this->M_Kategori->getAll();

		$data=[
			"title"=> $site->namaweb,
			"keywords"=>$site->keywords,
			"metatext"=>$site->metatext,
			"site"=>$site,
			"listKategori"=>$kategori,
			"isi"=>"frontend/categorypage"
		];
		$this->load->view('frontend',$data);
	}


	public function cari(){
		$site=$this->M_Konfigurasi->get();
		$keyword = $this->input->post('keyword',true);
			$data = [
				'title'=>'Pencarian',
				'site'=>$site,
				'keyword'=>$this->M_Artikel->getKeyword($keyword)??'',
				'isi'=>'frontend/searchpage'
			];
			$this->load->view('frontend',$data);	
	}

	// Kategori 
	public function kategori($slug_kategori) {
		$site					= $this->M_Konfigurasi->get();
		$kategori			= $this->M_Kategori->readKategori($slug_kategori);

		$config['base_url'] = 'http://localhost/muraman/frontend/kategori/'.$slug_kategori.'/';
		$config['total_rows'] = $this->M_Artikel->countkategori($kategori->id_kategori);
		$config['per_page'] = 6;
		$mulai =$this->uri->segment(4).'#kategori';
		$this->pagination->initialize($config);

      $artikel				= $this->M_Artikel->kategori($kategori->id_kategori,$config['per_page'],$mulai);
    	
		$data	= array( 'title'	=> 'Kategori | '.$kategori->kategori,
						//  'keywords' => 'Kategori Berita '.$kategori->nama_kategori_berita,
						 'site' => $site,
						 'namaKategori' => $kategori->kategori,
						 'listArtikel'	=> $artikel,
                   'listKategori'=>$this->M_Kategori->list(),
						 'isi'		=> 'frontend/homepage');
		$this->load->view('frontend',$data); 
	}

	
	
	
	// Read
	public function artikel($slug_judul) {
		$site	= $this->M_Konfigurasi->get();
		$readArtikel	= $this->M_Artikel->readArtikel($slug_judul);
      $this->visitor->add();
		$data	= array( 'title'	=> $readArtikel->judul,
							'site'=>$site,
							'listPopuler'=>$this->M_Artikel->listPopuler(),
							'keywords' => $readArtikel->meta_title,
							'metatext'=>$readArtikel->meta_keywords,
							'artikel'=> $readArtikel,
							'isi'		=> 'frontend/singlepage');
		$this->load->view('frontend',$data); 
		
	}



}
