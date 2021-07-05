<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
   public function __construct(){
      parent::__construct();
      login();  
      $this->load->model(['M_Toko','M_User']);  
     
   }

   public function index(){
      // status superadmin semua ditampilkan
      if($this->M_User->detail($this->session->userdata('user_id'))->status == 'Super Admin'){
         $dataPesanan = $this->M_Toko->AllPesanan();
      }else if($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         $dataPesanan = $this->M_Toko->listPesanan($this->session->userdata('user_id'));
      }
      $data=[
         "title"=>'Detail Pesanan',
         "listPesanan"=>$dataPesanan,
         "arrayStatus"=>[1 =>"Menunggu Pembayaran",2 =>"Lunas",3 =>"Ditolak"],
         "isi"=>'toko/listPesanan',
      ];
      $this->load->view('backend',$data);
   }


   public function detail_pesanan(){
      // Detail Pesanan
      $dataPesanan = $this->M_Toko->getPesanan($this->input->post('id'));
      $detailPesanan = $this->M_Toko->getDetailPesanan($this->input->post('id'));
      $data=[
         "title"=>'Detail Pesanan',
         "listPesanan"=>$dataPesanan,
         "detailPesanan"=>$detailPesanan,
         "site"=>$this->M_Konfigurasi->get(),
         "arrayStatus"=>[1 =>"Menunggu Pembayaran",2 =>"Lunas",3 =>"Ditolak"],
         "isi"=>'toko/detailPesanan',
      ];
      $this->load->view('backend',$data);
   }

   // Konfirmasi
   public function konfirmasi($id){
		$this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('no_rekening','No Rekening','required');
		if($this->form_validation->run()==FALSE){
         $data=[
            "title"=>"Konfirmasi Pembayaran",
            "isi"=>"Toko/formKonfirmasiPembayaran",
         ];
         $this->load->view('backend', $data);
      }else{
         $data=[
            "nama"=>$this->input->post('nama',true),
            "no_rekening"=>$this->input->post('no_rekening',true),
            "tanggal"=>$this->input->post('tanggal'),
            "id_pesanan"=>$id
			];
         $this->M_Toko->konfirmasi($data);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Pesanan Sudah Dikonfirmasi Di mohon Tunggu'
         ];
         $this->session->set_flashdata($pesan);
			redirect('admin/pesanan');
		}
	}


}