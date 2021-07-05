<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {
   public function __construct(){
      parent::__construct();
      login();  
      $this->load->model(['M_Toko','M_User']);  
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      }  
   }

   // Hanya Untuk Super Admin
   public function index(){
     
      $data=[
         "title"=>'List Konfirmasi',
         "konfirmasi" => $this->M_Toko->listKonfirmasi(),
         "arrayStatus"=>[1 =>"Menunggu Pembayaran",2 =>"Lunas",3 =>"Ditolak"],
         "isi"=>'toko/listKonfirmasi',
      ];
      $this->load->view('backend',$data);
   }

  


   // Untuk Super Admin
   public function update_pesanan(){
      
      $dataPesanan = $this->M_Toko->getIdPesanan($this->input->post('id'));
     
      $this->form_validation->set_rules('status','Status','required');
      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Update Status Pesanan",
            "pesanan"=>$dataPesanan,
            "isi"=>"Toko/update_status",
            "arrayStatus"=>[1 =>"Menunggu Pembayaran",2 =>"Lunas",3 =>"Ditolak"]
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "status_pesanan"=>$this->input->post('status'),
            "id"=>$this->input->post('id')
         ];
        if( $this->M_Toko->update_status($data)){
            if($this->input->post('status') == 2){
               $detailPesanan = $this->M_Toko->getDetailPesanan($this->input->post('id'));
               foreach($detailPesanan as $dp){
                  $qty = $dp->qty;
                  $id_brg = $dp->id_barang;
                  $this->db->query("UPDATE barang SET stok=stok-$qty WHERE id_barang='$id_brg'");
               }
            }
               $pesan = [
                  'alert'=>'alert alert-success',
                  'pesan'=>'Pesanan Sudah Dikonfirmasi Di mohon Tunggu'
               ];
               $this->session->set_flashdata($pesan);
               redirect('admin/toko');
        }else{
           echo"gagal";
        }
        
		}
   }


   
   // KATEGORI

   public function listKategoriBarang(){
      $data=[
         "title"=>'Kategori Artikel',
         "listKategoriBarang"=>$this->M_Toko->listKategori(),
         "isi"=>'toko/listKategoriBarang',
      ];

      $this->load->view('backend',$data);

   } 

   public function tambahKategoriBarang(){
      $this->form_validation->set_rules('kategori_brg','Kategori','required|is_unique[kategori_barang.kategori_brg]');
      $this->form_validation->set_rules('urutan', 'Urutan', 'is_unique[kategori_barang.urutan]');
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Tambah Kategori Barang",
            "isi"=>"Toko/formKategoriBarang",
            "action"=>base_url('toko/tambah-kategori'),
            "button"=>"Tambah"
         ];
         $this->load->view('backend', $data);
      }else{
         $dataKategori=[
            "kategori_brg"=>$this->input->post('kategori_brg',true),
            "status"=>$this->input->post('status',true),
            "urutan"=>$this->input->post('urutan',true),
            "slug_kategori"=>url_title($this->input->post('kategori_brg',true),'dash',true),
         ];
        if($this->M_Toko->tambahKategori($dataKategori)){
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil ditambahkan'
         ];
      }
         $this->session->set_flashdata($pesan);
         redirect('toko/kategori-barang');  
      }

   }

   public function editKategoriBarang(){
      $this->form_validation->set_rules('kategori_brg','Kategori','required');
     
      if($this->form_validation->run()== FALSE){
         $data=[
            "title"=>'Edit Kategori Barang',
            "kategori"=>$this->M_Toko->getKategoriById($this->input->post('id')),
            "isi"=>'toko/formKategoriBarang',
            "action"=>base_url('toko/edit-kategori'),
            "button"=>"Edit"
         ];
         $this->load->view('backend',$data);
      }else{
         $dataKategori=[
            "kategori_brg"=>$this->input->post('kategori_brg',true),
            "status"=>$this->input->post('status',true),
            "urutan"=>$this->input->post('urutan',true),
            "slug_kategori"=>url_title($this->input->post('kategori_brg',true),'dash',true),
         ];
        $this->M_Toko->editKategori($dataKategori);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil di ubah'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/kategori-barang');     
      }

   }

   public function hapusKategoriBarang(){
      $this->M_Toko->hapusKategori($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil di hapus'
      ];
      $this->session->set_flashdata($pesan);
       
      redirect('toko/kategori-barang');

   }

   // BARANG

   public function listBarang(){
      if($this->M_User->detail($this->session->userdata('user_id'))->status == 'Admin'){
         $barang = $this->M_Barang->listBrgById($this->session->userdata('user_id'));
      }else{
         $barang = $this->M_Toko->listBarang();
      }

      $data=[
         'title'=>'List Barang',
         'isi'=>'toko/listBarang',
         'listBarang'=>$barang
      ];

      $this->load->view('backend',$data);

   }

   public function tambahBarang(){
      $kategori = $this->M_Toko->listKategori();

      $data =[
         'title'=>'Tambah Barang',
         'isi'=>'toko/formBarang',
         'listKategori'=>$kategori,
         "action"=>base_url('toko/tambah-barang'),
         "button"=>'Tambah'
      ];

      $this->form_validation->set_rules('barang', 'Nama Barang', 'required|is_unique[barang.barang]');
      $this->form_validation->set_rules('status', 'Status', 'required');
     
      if($this->form_validation->run() == FALSE){
         $this->load->view('backend',$data); 
      }else{
         $data = [
            'barang'=>$this->input->post('barang'),
            'slug_barang'=>url_title($this->input->post('barang')),
            'id_kategori_barang'=>$this->input->post('id_kategori_barang'),
            'id_user'=>$this->session->userdata('user_id'),
            'penjual'=>$this->M_User->detail($this->session->userdata('user_id'))->nama,
            'status'=>$this->input->post('status'),
            'harga'=>$this->input->post('harga'),
            'stok'=>$this->input->post('stok'),
            'berat'=>$this->input->post('berat'),
            'deskripsi'=>$this->input->post('deskripsi'),
            'tanggal_post'=>date('Y-m-d H:i:s'),
            'gambar'=> $this->M_Toko->upload()
         ];
        $this->M_Toko->tambahBarang($data);
           $pesan = [
              'alert'=>'alert alert-success',
              'pesan'=>'Data Berhasil ditambahkan'
           ];
         $this->session->set_flashdata($pesan);
         redirect('toko/barang');
      }


   }

   public function editBarang(){
      $barang = $this->M_Toko->detailBarang($this->input->post('id'));
      $kategori = $this->M_Toko->listKategori();

      $data=[  "title"=>"Edit Barang",
               "isi"=>"toko/formBarang",
               "action"=>base_url('toko/edit-barang'),
               "button"=>"Edit",
               "listKategori"=>$kategori,
               "barang"=>$barang             
            ];

      $this->form_validation->set_rules('barang','Nama Barang','required');

      if($this->form_validation->run() == FALSE){
         $this->load->view('backend', $data);
      }else{
         $dataArtikel = [
            'barang'=>$this->input->post('barang'),
            'slug_barang'=>url_title($this->input->post('barang')),
            'id_kategori_barang'=>$this->input->post('id_kategori_barang'),
            'id_user'=>$this->session->userdata('user_id'),
            'penjual'=>$this->M_User->detail($this->session->userdata('user_id'))->nama,
            'harga'=>$this->input->post('harga'),
            'status'=>$this->input->post('status'),
            'stok'=>$this->input->post('stok'),
            'berat'=>$this->input->post('berat'),
            'deskripsi'=>$this->input->post('deskripsi'),
            'tanggal_post'=>date('Y-m-d H:i:s'),
            'gambar'=> $this->M_Toko->upload()
         ];
            $this->M_Toko->editBarang($dataArtikel);
               $pesan = [
                  'alert'=>'alert alert-success',
                  'pesan'=>'Data Berhasil di ubah'
               ];
               $this->session->set_flashdata($pesan);
               redirect('toko/barang');
         }      

   }

   public function hapusBarang(){
      $this->M_Toko->hapusBarang($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil dihapus'
      ];
      $this->session->set_flashdata($pesan);
      redirect('toko/barang');

   }

   // BANNER HANYA UNTUK SUPERADMIN

   public function listBanner(){
      $data=[
         "title"=>'Banner Toko',
         "listBanner"=>$this->M_Toko->listBanner(),
         "isi"=>'toko/listBanner',
      ];

      $this->load->view('backend',$data);

   }

   public function tambahBanner(){
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Tambah Banner Barang",
            "isi"=>"Toko/formBanner",
            "action"=>base_url('toko/tambah-banner'),
            "button"=>"Tambah"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "banner"=>$this->input->post('banner',true),
            "link"=>$this->input->post('link',true),
            "status"=>$this->input->post('status',true),
            "gambar"=>$this->M_Toko->uploadBanner()
         ];

         $this->M_Toko->tambahBanner($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil ditambahkan'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/banner');  
      }
      //   if($this->M_Toko->tambahBanner($data)){
      //    $pesan = [
      //       'alert'=>'alert alert-success',
      //       'pesan'=>'Data Berhasil ditambahkan'
      //    ];
      // }else{
      //    $pesan = [
      //       'alert'=>'alert alert-warning',
      //       'pesan'=>'Gambar Gagal ditambahkan format atau ukuran gambar tidak sesuai yang ditentukan'
      //    ];
      //   }
        
        

   }

   public function editBanner(){
      $this->form_validation->set_rules('banner','Banner','required');
      $this->form_validation->set_rules('link', 'Link', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Edit Banner",
            "isi"=>"Toko/formBanner",
            "banner"=>$this->M_Toko->getIdBanner($this->input->post('id')),
            "action"=>base_url('toko/edit-banner'),
            "button"=>"Edit"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "banner"=>$this->input->post('banner',true),
            "status"=>$this->input->post('status',true),
            "link"=>$this->input->post('link',true),
            "gambar"=>$this->M_Toko->uploadBanner()
         ];
         $this->M_Toko->editBanner($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil di ubah'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/banner');     
      }

   }

   public function hapusBanner(){
      $this->M_Toko->hapusBanner($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil dihapus'
      ];
      $this->session->set_flashdata($pesan);
      redirect('toko/banner');

   }


   // TARIF


   public function listTarif(){
      $data=[
         "title"=>'Tarif',
         "listTarif"=>$this->M_Toko->listTarif(),
         "isi"=>'toko/listTarif',
      ];

      $this->load->view('backend',$data);

   }

   public function tambahTarif(){
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Tambah Tarif",
            "isi"=>"Toko/formTarif",
            "action"=>base_url('toko/tambah-tarif'),
            "button"=>"Tambah"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "kota"=>$this->input->post('kota',true),
            "tarif"=>$this->input->post('tarif',true),
            "status"=>$this->input->post('status',true)
         ];

         $this->M_Toko->tambahTarif($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil ditambahkan'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/tarif');  
      }

   }

   public function editTarif(){
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Edit Tarif",
            "isi"=>"Toko/formTarif",
            "ongkir"=>$this->M_Toko->getIdTarif($this->input->post('id')),
            "action"=>base_url('toko/edit-tarif'),
            "button"=>"Edit"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "kota"=>$this->input->post('kota',true),
            "tarif"=>$this->input->post('tarif',true),
            "status"=>$this->input->post('status',true)
         ];
         $this->M_Toko->editTarif($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil di ubah'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/tarif');     
      }


   }

   public function hapusTarif(){
      $this->M_Toko->hapusTarif($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil dihapus'
      ];
      $this->session->set_flashdata($pesan);
      redirect('toko/tarif');


   }


   // PEMBAYARAN / METODE PEMBAYARAN

   public function listPembayaran(){
      $data=[
         "title"=>'Pembayaran',
         "listBayar"=>$this->M_Toko->listBayar(),
         "isi"=>'toko/listBayar',
      ];

      $this->load->view('backend',$data);

   }

   public function tambahPembayaran(){
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Tambah Metode Pembayaran",
            "isi"=>"Toko/formBayar",
            "action"=>base_url('toko/tambah-metode-pembayaran'),
            "button"=>"Tambah"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "nama"=>$this->input->post('nama',true),
            "rekening"=>$this->input->post('rekening',true),
            "no_rekening"=>$this->input->post('no_rekening',true),
            "status"=>$this->input->post('status',true)
         ];

         $this->M_Toko->tambahBayar($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil ditambahkan'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/pembayaran');  
      }


   }

   public function editPembayaran(){
      $this->form_validation->set_rules('status', 'Status', 'required');

      if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Edit Metode Pembayaran",
            "isi"=>"Toko/formBayar",
            "pembayaran"=>$this->M_Toko->getIdBayar($this->input->post('id')),
            "action"=>base_url('toko/edit-metode-pembayaran'),
            "button"=>"Edit"
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "nama"=>$this->input->post('nama',true),
            "rekening"=>$this->input->post('rekening',true),
            "no_rekening"=>$this->input->post('no_rekening',true),
            "status"=>$this->input->post('status',true)
         ];
         $this->M_Toko->editBayar($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil di ubah'
         ];
         $this->session->set_flashdata($pesan);
         redirect('toko/pembayaran');     
      }


   }

   public function hapusPembayaran(){
      $this->M_Toko->hapusBayar($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil dihapus'
      ];
      $this->session->set_flashdata($pesan);
      redirect('toko/pembayaran');

   }

   
}