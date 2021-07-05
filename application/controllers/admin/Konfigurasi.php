<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
   public function __construct(){
      parent::__construct();
      login();
      AdminDilarang();
      $this->load->model(['M_User','M_Konfigurasi']);
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      } 
      
   }

   public function index(){
      $data=[
         "title"=>"konfigurasi",
         "isi"=>"admin/konfigurasi",
         "konfigurasi"=>$this->M_Konfigurasi->get()
      ];

      $this->load->view('backend',$data);
   }

   public function konfig(){
         $data=[
            "namaweb"=>$this->input->post('namaweb',true),
            "tagline"=>$this->input->post('tagline',true),
            "email"=>$this->input->post('email',true),
            "alamat"=>$this->input->post('alamat',true),
            "no_wa"=>$this->input->post('no_wa',true),
            "fb"=>$this->input->post('fb',true),
            "ig"=>$this->input->post('ig',true),
            "tanggal"=>date('Y-m-d H:i:s'),
            "metatext"=>$this->input->post('metatext',true),
            "keywords"=>$this->input->post('keywords',true),
            "google_maps"=>$this->input->post('google_maps',true),
            "icon"=>$this->M_Konfigurasi->upload(),
            "id_user"=>$this->session->userdata('user_id')
        ];

        $this->M_Konfigurasi->edit($data);
        $pesan = [
         'alert'=>'alert alert-success',
         'pesan'=>'Data Berhasil di ubah'
      ];
      $this->session->set_flashdata($pesan);
        redirect('admin/konfigurasi');      
   }

}