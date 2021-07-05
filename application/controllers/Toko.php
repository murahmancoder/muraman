<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Toko extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model(['M_Toko','M_Konfigurasi']);
		$this->load->library('pagination');
   }
 
   public function index(){
      $config['base_url'] = 'http://localhost/muraman/toko/index';
		$config['total_rows'] = $this->M_Toko->countAllBarang();
		$config['per_page'] = 6;
		$mulai = $this->uri->segment(3);
      $this->pagination->initialize($config);
      
      $site=$this->M_Konfigurasi->get();
		$barang= $this->M_Toko->getBarang($config['per_page'],$mulai);
		$kategori=$this->M_Toko->listKategoriOn();
		$banner = $this->M_Toko->listBannerOn();
      $data=[
			"title"=> $site->namaweb,
			"keywords"=>'Online Shop '. $site->namaweb,
			"metatext"=>$site->metatext,
			"banner"=>$banner,
			"site"=>$site,
			"listKategoriBarang"=>$kategori,
			"listBarang"=>$barang,
			"isi"=>"frontend/toko"
		];
		$this->load->view('frontend',$data);
   }

	// Kategori 
	public function kategori($slug_kategori) {
		$site					= $this->M_Konfigurasi->get();
		$kategori			= $this->M_Toko->readKategori($slug_kategori);

		$config['base_url'] = 'http://localhost/muraman/toko/kategori/'.$slug_kategori.'/';
		$config['total_rows'] = $this->M_Toko->countkategori($kategori->id_kategori_barang);
		$config['per_page'] = 3;
		$mulai =$this->uri->segment(4);
		$this->pagination->initialize($config);

		$barang	= $this->M_Toko->kategori_barang($kategori->id_kategori_barang,$config['per_page'],$mulai);
		
		$data	= array( 
						'title'	=> 'Kategori | '.$kategori->kategori_brg,
						"keywords"=>'Online Shop '. $site->namaweb,
						"metatext"=>$site->metatext,
						"banner"=>$this->M_Toko->listBannerOn(),
						'site' => $site,
						'listBarang'	=> $barang,
						'listKategoriBarang'=>$this->M_Toko->listKategoriOn(),
						'isi'		=> 'frontend/toko');
		$this->load->view('frontend',$data); 
	}


	public function AllkategoriBarang()
	{

		$site=$this->M_Konfigurasi->get();
		$kategori=$this->M_Toko->listKategoriOn();

		$data=[
			"title"=> $site->namaweb,
			"keywords"=>'Semua List dari Kategori Toko '. $site->namaweb,
			"site"=>$site,
			"listKategoriBarang"=>$kategori,
			"isi"=>"frontend/categorytoko"
		];
		$this->load->view('frontend',$data);
	}

	public function cari(){
		$config['base_url'] = 'http://localhost/muraman/toko/index';
		$config['total_rows'] = $this->M_Toko->countAllBarang();
		$config['per_page'] = 3;
		$mulai = $this->uri->segment(3);
      $this->pagination->initialize($config);
		$site=$this->M_Konfigurasi->get();
		$keyword = $this->input->post('keyword',true);
			
		$data = [
			'title'=>'Pencarian'. $keyword,
			"banner"=>$this->M_Toko->listBannerOn(),
			'site'=>$site,
			'listBarang'=> $keyword ==''?$this->M_Toko->getBarang($config['per_page'],$mulai):$this->M_Toko->getKeyword($keyword),
			'listKategoriBarang'=>$this->M_Toko->listKategoriOn(),
			'isi'=>'frontend/toko'
		];
		$this->load->view('frontend',$data);	
	}

	public function barang($slug_barang) {
		$site	= $this->M_Konfigurasi->get();
		$barang	= $this->M_Toko->readBarang($slug_barang);
		$data	= array( 'title'	=> $barang->barang,
							'site'=>$site,
							'listKategoriBarang'=>$this->M_Toko->listKategoriOn(),
							'barang'=> $barang,
							'isi'		=> 'frontend/barangpage');
		$this->load->view('frontend',$data); 
		
	}

	// beli langsung
	public function beli_langsung($slug_barang){
		if(!$this->session->userdata('user_id')){
			redirect('login');
		}
		$site	= $this->M_Konfigurasi->get();
		$barang	= $this->M_Toko->readBarang($slug_barang);

		$data = array(
			'id'      => $barang->id_barang,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->barang,
			'berat'	 => $barang->berat,
 			);
 
		 $this->cart->insert($data);

		 $dataLangsung=[
			"title"=> 'belanja',
			"site"=>$site,
			"keywords"=>'Online Shop '. $site->namaweb,
			"isi"=>"frontend/belanja"
		];
		$this->load->view('frontend',$dataLangsung);

	}

	// Keranjang
   public function keranjang($slug_barang){
		if(!$this->session->userdata('user_id')){
			redirect('login');
		}
		$barang	= $this->M_Toko->readBarang($slug_barang);

		$data = array(
			'id'      => $barang->id_barang,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->barang,
			'berat'   =>$barang->berat
 			);
 
		 $this->cart->insert($data);
		 redirect('toko');

	}
	
	public function belanja(){
		if(empty($this->cart->contents())){
			redirect('toko');
		}else if(!$this->session->userdata('user_id')){
			redirect('login');
		}

		$site=$this->M_Konfigurasi->get();
		$data=[
			"title"=> 'belanja',
			"site"=>$site,
			"keywords"=>'Online Shop '. $site->namaweb,
			"isi"=>"frontend/belanja"
		];
		$this->load->view('frontend',$data);
	}

	public function update(){
		$i=1;
		foreach($this->cart->contents() as $items){
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i.'[qty]')
			);
			$i++;
			$this->cart->update($data);
		}
		 redirect('toko/belanja');
	}

	public function hapus_belanja($id){
		$this->cart->remove($id);
		redirect('toko/belanja');
	}

	public function clear(){
		$this->cart->destroy();
		redirect('toko/belanja');
	}

	// CHECK_OUT
	public function check_out(){

		if(!$this->session->userdata('user_id')){
			redirect('login');
		}
		
		$site	= $this->M_Konfigurasi->get();
		$tarif=$this->M_Toko->listTarifOn();
		$bayar=$this->M_Toko->listBayarOn();
		$user = $this->M_User->detail($this->session->userdata('user_id'));
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$data=[
			"title"=> 'belanja',
			"user"=>$user,
			"site"=>$site,
			"listTarif"=>$tarif,
			"listBayar"=>$bayar,
			"isi"=>'frontend/check_out'
		];

		if($this->form_validation->run() == FALSE){
			$this->load->view('frontend',$data); 
		}else{
			$dataInvoice=[
			"nama_pembeli"=>$this->input->post('nama'),
			"id_user"=>$this->session->userdata('user_id'),
			"alamat"=>$this->input->post('alamat'),
			"no_telp"=>$this->input->post('no_telp'),
			"tarif"=>$this->input->post('tarif'),
			"metode_bayar"=>$this->input->post('bayar'),
			"tanggal"=>date('Y-m-d H:i:s'),
			"total_berat"=>$this->input->post('total_berat'),
			"total_bayar"=>$this->cart->total() + $this->input->post('tarif'),
			"status_pesanan"=> 1
			];
			$this->M_Toko->tambah_pesanan($dataInvoice);
			$id_pesanan =$this->db->insert_id();
			foreach($this->cart->contents() as $items){
				$dataPesanan = array(
					"id_pesanan"=>$id_pesanan,
					"id_barang"=>$items['id'],
					"nama_barang"=>$items['name'],
					"qty"=>$items['qty'], 
					"harga"=>$items['price']			
				 );
				 $this->M_Toko->detail_pesanan($dataPesanan); 
				}
				redirect('pesanan');
		}
	}

	
}