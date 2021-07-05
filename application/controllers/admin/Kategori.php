<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

   public function __construct(){
      parent::__construct();
      login();
      $this->load->model(["M_Kategori","M_User",]);
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      } 
   }

   public function index(){
      $data=[
         "title"=>'Kategori Artikel',
         "listKategori"=>$this->M_Kategori->list(),
         "isi"=>'admin/listKategori',
      ];

      $this->load->view('backend',$data);
   }
   
   public function tambah(){
      $this->form_validation->set_rules('kategori','Kategori','required|is_unique[kategori_artikel.kategori]');
      $this->form_validation->set_rules('keterangan','Keterangan','required');
      $this->form_validation->set_rules('urutan', 'Urutan', 'is_unique[kategori_artikel.urutan]');

      if($this->form_validation->run()==FALSE){
         $data=[
             "title"=>"Tambah Kategori Artikel",
            "isi"=>"admin/formKategori",
            "action"=>base_url('kategori/tambah'),
            "button"=>"Tambah"
         ];
         $this->load->view('backend', $data);
      }else{
         $dataKategori=[
            "kategori"=>$this->input->post('kategori',true),
            "keterangan"=>$this->input->post('keterangan',true),
            "urutan"=>$this->input->post('urutan',true),
            "slug_kategori"=>url_title($this->input->post('kategori',true),'dash',true),
            "gambar"=>$this->M_Kategori->upload()
         ];
      //    if($this->M_Kategori->tambahKategori($dataKategori)){
      //    $pesan = [
      //       'alert'=>'alert alert-success',
      //       'pesan'=>'Data Berhasil ditambahkan'
      //    ];
      // }else{
      //    $pesan = [
      //       'alert'=>'alert alert-warning',
      //       'pesan'=>'Gambar gagal ditambahkan ukuran atau format tidak sesuai'
      //    ];
      // }
     $this->M_Kategori->tambahKategori($dataKategori);
            $pesan = [
               'alert'=>'alert alert-success',
               'pesan'=>'Data Berhasil ditambahkan'
            ];
         $this->session->set_flashdata($pesan);
         redirect('kategori');  
      }
   }

   public function edit(){
      $this->form_validation->set_rules('kategori','Kategori','required');
      $this->form_validation->set_rules('keterangan','Keterangan','required');

      if($this->form_validation->run()== FALSE){
         $data=[
            "title"=>'Edit Kategori',
            "kategori"=>$this->M_Kategori->getKategoriById($this->input->post('id')),
            "isi"=>'admin/formKategori',
            "action"=>base_url('kategori/edit'),
            "button"=>"Edit"
         ];
         $this->load->view('backend',$data);
      }else{
         $dataKategori=[
            "kategori"=>$this->input->post('kategori',true),
            "keterangan"=>$this->input->post('keterangan',true),
            "urutan"=>$this->input->post('urutan',true),
            "slug_kategori"=>url_title($this->input->post('kategori',true),'dash',true),
            "gambar"=>$this->M_Kategori->upload()
         ];
        $this->M_Kategori->editKategori($dataKategori);
         $pesan = [
            'alert'=>'alert alert-success',
            'pesan'=>'Data Berhasil di ubah'
         ];
         $this->session->set_flashdata($pesan);
         redirect('kategori');     
      }
   }

   public function hapus(){
      $this->M_Kategori->hapusKategori($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil di hapus'
      ];
      $this->session->set_flashdata($pesan);
       
      redirect('kategori');
   }
}



