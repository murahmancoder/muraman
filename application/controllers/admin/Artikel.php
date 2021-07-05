<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
      parent::__construct();		
      login();
      $this->load->model(['M_Kategori','M_Artikel','M_User']);
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      } 
   }

   public function index(){
      if($this->M_User->detail($this->session->userdata('user_id'))->status == 'Admin'){
         $artikel = $this->M_Artikel->listById($this->session->userdata('user_id'));
      }else{
         $artikel = $this->M_Artikel->list();
      }

      $data=[
         'title'=>'List Artikel',
         'isi'=>'admin/listArtikel',
         'listArtikel'=>$artikel
      ];

      $this->load->view('backend',$data);
   }


   public function tambah(){
      $kategori = $this->M_Kategori->list();

      $data =[
         'title'=>'Tambah Artikel',
         'isi'=>'admin/formArtikel',
         'listKategori'=>$kategori,
         "action"=>base_url('artikel/tambah'),
         "button"=>'Tambah'
      ];

      $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[artikel.judul]');
     
      if($this->form_validation->run() == FALSE){
         $this->load->view('backend',$data); 
      }else{
         $dataArtikel = [
            'judul'=>$this->input->post('judul'),
            'slug_judul'=>url_title($this->input->post('judul')),
            'id_kategori'=>$this->input->post('id_kategori'),
            'id_user'=>$this->session->userdata('user_id'),
            'penulis'=>$this->M_User->detail($this->session->userdata('user_id'))->nama,
            'meta_title'=>$this->input->post('meta_title',true),
            'meta_keywords'=>$this->input->post('meta_keywords',true),
            'status'=>$this->input->post('status'),
            'content'=>$this->input->post('content'),
            'tanggal_post'=>date('Y-m-d H:i:s'),
            'gambar'=> $this->M_Artikel->upload()
         ];
      //   if($this->M_Artikel->tambah($dataArtikel)){
      //      $pesan = [
      //         'alert'=>'alert alert-success',
      //         'pesan'=>'Data Berhasil ditambahkan'
      //      ];
      //   }else{
      //    $pesan = [
      //       'alert'=>'alert alert-warning',
      //       'pesan'=>'Gambar Gagal ditambahkan format atau ukuran gambar tidak sesuai yang ditentukan'
      //    ];
      //   }
      $this->M_Artikel->tambah($dataArtikel);
              $pesan = [
                 'alert'=>'alert alert-success',
                 'pesan'=>'Data Berhasil ditambahkan'
              ];
         $this->session->set_flashdata($pesan);
         redirect('artikel');
      }


   }


   public function edit(){
      $artikel = $this->M_Artikel->detail($this->input->post('id'));
      $kategori = $this->M_Kategori->list();

      $data=[  "title"=>"Edit Artikel",
               "isi"=>"admin/formArtikel",
               "action"=>base_url('artikel/edit'),
               "button"=>"Edit",
               "listKategori"=>$kategori,
               "artikel"=>$artikel,             
            ];

      $this->form_validation->set_rules('judul','Judul','required');

      if($this->form_validation->run() == FALSE){
         $this->load->view('backend', $data);
      }else{
         $dataArtikel = ['judul'=>$this->input->post('judul'),
                        'slug_judul'=>url_title($this->input->post('judul')),
                        'id_kategori'=>$this->input->post('id_kategori'),
                        'id_user'=>$this->session->userdata('user_id'),
                        'penulis'=>$this->M_User->detail($this->session->userdata('user_id'))->nama,
                        'meta_title'=>$this->input->post('meta_title',true),
                        'meta_keywords'=>$this->input->post('meta_keywords',true),
                        'status'=>$this->input->post('status',true),
                        'content'=>$this->input->post('content',true),
                        'tanggal_post'=>date('Y-m-d H:i:s'),
                        'gambar'=> $this->M_Artikel->upload()
                     ];
            $this->M_Artikel->edit($dataArtikel);
               $pesan = [
                  'alert'=>'alert alert-success',
                  'pesan'=>'Data Berhasil di ubah'
               ];
               $this->session->set_flashdata($pesan);
               redirect('artikel');
         }      
   }
      



   public function hapus(){
      $this->M_Artikel->hapus($this->input->post('id'));
      $pesan = [
         'alert'=>'alert alert-danger',
         'pesan'=>'Data Berhasil dihapus'
      ];
      $this->session->set_flashdata($pesan);
      redirect('artikel');
   }

   

   

}