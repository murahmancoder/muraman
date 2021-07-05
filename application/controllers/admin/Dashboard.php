<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   

   public function __construct(){
      parent::__construct();
      login();
      
     
   }

   public function index(){
      $this->load->model(['M_User','M_Kategori','M_Artikel','M_Konfigurasi','M_Visitor','M_Toko']);  
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         redirect('pesanan');
      }else{ 
         $site = $this->M_Konfigurasi->get();
         $data=[
            "title"=>"Dashboard | " .$site->namaweb,
            "isi"=>"admin/dashboard",
            "user"=>$this->M_User->countAll(),
            "kategori"=>$this->M_Kategori->countAll(),
            "artikel"=>$this->M_Artikel->countAll(),
            "listVisitor"=>$this->M_Visitor->list(),
            "statistik"=>$this->M_Visitor->getStatistik(),
            "konfirmasi"=>$this->M_Toko->countKonfirmasi(),
            "pesanan"=>$this->M_Toko->countPesanan(),
         ];
      
         $this->load->view('backend', $data);
      }
   }

   
// Sama dengan User Administrasi
   public function profil(){
      $user	= $this->M_User->detail($this->session->userdata('user_id'));
      $data=[
         "title"=>"Update Profile",
         "user"=>$user,
         "isi"=>"admin/formAdministrasi",
         "action"=>base_url('profile'),
         "userAktif"=>$this->M_User->detail($this->session->userdata('user_id'))
      ];
          
      $this->form_validation->set_rules('email','Email','required|valid_email');
     
      if($this->form_validation->run()==FALSE){   
         $this->load->view('backend',$data);
      }else{
         if($this->input->post('password') != '' && strlen($this->input->post('password')) >=6 ){
            $this->load->library('password');
            $dataUser=[
               "nama" => $this->input->post('nama',true),
               "email" => $this->input->post('email',true),
               "password" => $this->password->hash($this->input->post('password',true)),
               "tanggal"=>date('Y-m-d H:i:s')
            ];
            $this->M_User->edit($dataUser);
         }else if($this->input->post('password') == ''){
            $dataUser=[
               "nama" => $this->input->post('nama',true),
               "email" => $this->input->post('email',true),
               "password" => $this->input->post('passwordLama',true),
               "tanggal"=>date('Y-m-d H:i:s')
            ];
            $this->M_User->edit($dataUser);
         }else if(strlen($this->input->post('password')) > 1 && strlen($this->input->post('password')) < 6){
            $this->session->set_flashdata('gagal','Password Anda kurang dari 6 Karakter');	
            redirect('profile');
         }
         
         $datapesan =  [ 
            "alert"=> 'alert alert-success',
            "pesan" => 'akun anda berhasil dibuat' 
         ];
         $this->session->set_flashdata($datapesan);

         redirect('admin/dashboard');
   }
}


   







}