<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct(){
      parent::__construct();
      $this->load->model('M_User','M_Konfigurasi');
      $this->load->library('password');
     
   }
   
   public function register(){

      if($this->session->userdata('user_id')){
         redirect('dashboard');
      }
 
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
      $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'required|matches[password]');

      if($this->form_validation->run() == FALSE){
         $data=[
            "title" => "Register",
            "isi"=>'administrasi/registrasi',
            "site"=>$this->M_Konfigurasi->get()
         ];
         $this->load->view('administrasi',$data);
      }else{
         $data =[
            "nama" => $this->input->post('nama',true),
            "email" => $this->input->post('email',true),
            "password" => $this->password->hash($this->input->post('password',true)),
            "tanggal"=>date('Y-m-d H:i:s'),
            "status"=>'admin'
         ];
         $this->M_User->tambahUser($data);

         $datapesan =  [ "alert"=> 'alert-success',
                        "pesan" => 'akun anda berhasil dibuat' ];

         $this->session->set_flashdata($datapesan);
         redirect('login');
      }  

   }

   public function login(){

      if($this->session->userdata('user_id')){
         redirect('dashboard');
      }


      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');

      if($this->form_validation->run() == FALSE){
         $data=[  "title"=>'login',
                  "isi"=>'administrasi/login',
                  "site"=>$this->M_Konfigurasi->get()
               ];
         $this->load->view('administrasi',$data);
      }else{
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         
         // karena Pengecekan Jadi buat Variabel baru buat session
         if($user = $this->M_User->login($email, $password)){
          $dataLogin = ['user_id'=>  $user->id_user,
                       'nama'		=> $user->nama
                   ];
        $this->session->set_userdata($dataLogin);
         
          //pindahkan ke halaman home
          redirect('dashboard');
         }else{
            $dataPesan = ['alert' => 'alert-danger',
                       'pesan' => 'Email, password yang anda masukan salah Atau Anda Belum <a href="'.base_url('registrasi').'">Registrasi</a>'];

            $this->session->set_flashdata($dataPesan);
            //tampilkan halaman login
        
            redirect('login');
         }

      }
      
   }

   public function logout(){
      $dataLogin = ['user_id','nama','logged_in'];
      if($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         $this->session->unset_userdata($dataLogin);  
      }else{
         $this->session->unset_userdata($dataLogin);
      }
      redirect('login');
   }

   public function registrasi_user(){

      if($this->session->userdata('user_id')){
         redirect('pesanan');
      }
 
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
      $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'required|matches[password]');

      if($this->form_validation->run() == FALSE){
         $data=[
            "title" => "Registrasi",
            "isi"=>'administrasi/registrasi',
            "site"=>$this->M_Konfigurasi->get()
         ];
         $this->load->view('administrasi',$data);
      }else{
         $data =[
            "nama" => $this->input->post('nama',true),
            "email" => $this->input->post('email',true),
            "password" => $this->password->hash($this->input->post('password',true)),
            "tanggal"=>date('Y-m-d H:i:s'),
            "status"=>'User'
         ];
         $this->M_User->tambahUser($data);

         $datapesan =  [ "alert"=> 'alert-success',
                        "pesan" => 'akun anda berhasil dibuat' ];

         $this->session->set_flashdata($datapesan);
         redirect('login');
      }  

   }

   // public function login_user(){

   //    if($this->session->userdata('user_id')){
   //       redirect('toko/belanja');
   //    }


   //    $this->form_validation->set_rules('email','Email','required|valid_email');
   //    $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');

   //    if($this->form_validation->run() == FALSE){
   //       $data=[  "title"=>'login',
   //                "isi"=>'administrasi/login_user',
   //                "site"=>$this->M_Konfigurasi->get()
   //             ];
   //       $this->load->view('administrasi',$data);
   //    }else{
   //       $email = $this->input->post('email');
   //       $password = $this->input->post('password');
         
   //       // karena Pengecekan Jadi buat Variabel baru buat session
   //       if($user = $this->M_User->login($email, $password)){
   //        $dataLogin = ['user_id'=>  $user->id_user,
   //                     'nama'		=> $user->nama
   //                 ];
   //      $this->session->set_userdata($dataLogin);
         
   //        //pindahkan ke halaman home
   //        redirect('pesanan');
   //       }else{
   //          $dataPesan = ['alert' => 'alert-danger',
   //                     'pesan' => 'Email, password yang anda masukan salah Atau Anda Belum <a href="'.base_url('register_user').'">Registrasi</a>'];

   //          $this->session->set_flashdata($dataPesan);
   //          //tampilkan halaman login
        
   //          redirect('login-user');
   //       }

   //    }
      
   // }

}