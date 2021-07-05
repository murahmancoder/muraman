<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller {
   public function __construct(){
      parent::__construct();
      login();
      $this->load->library('password');
      $this->load->model(['M_User']);
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      } 
     
   }


   public function index(){
      $data=[
         "title"=>"Administrasi",
         "listUser"=>$this->M_User->list(),
         "isi"=>"admin/listUser",
         "userAktif"=>$this->M_User->detail($this->session->userdata('user_id'))
      ];

      $this->load->view('backend',$data);

   }

   public function edit(){
     AdminDilarang();

      $data=[
         "title"=>"Update User",
         "user"=>$this->M_User->detail($this->input->post('id')),
         "isi"=>"admin/formAdministrasi",
         "action"=>base_url('administrasi/edit'),
         "userAktif"=>$this->M_User->detail($this->session->userdata('user_id'))
      ];
     
     
      $this->form_validation->set_rules('email','Email','required|valid_email');
     
      if($this->form_validation->run()==FALSE){   
         $this->load->view('backend',$data);
      }else{
         if($this->input->post('password') == ''){
            $dataUser=[
               "nama" => $this->input->post('nama',true),
               "email" => $this->input->post('email',true),
               "password" => $this->input->post('passwordLama',true),
               "tanggal"=>date('Y-m-d H:i:s')
            ];
         }else if(strlen($this->input->post('password')) > 1 && strlen($this->input->post('password')) < 6){
            $this->session->set_flashdata('gagal','Password Anda kurang dari 6 Karakter');	
            redirect('administrasi/edit');
         }else{
            $dataUser=[
               "nama" => $this->input->post('nama',true),
               "email" => $this->input->post('email',true),
               "password" => $this->password->hash($this->input->post('password',true)),
               "tanggal"=>date('Y-m-d H:i:s')
            ];
         }   
         $this->M_User->edit($dataUser);
         $datapesan =  [ 
            "alert"=> 'alert alert-success',
            "pesan" => 'akun anda berhasil dibuat' 
         ];
         $this->session->set_flashdata($datapesan);

         redirect('administrasi');
      }
   
   }

   public function hapus(){
      AdminDilarang();
      $this->M_User->hapus($this->input->post('id'));
      $datapesan =  [ 
         "alert"=> 'alert alert-danger',
         "pesan" => 'Akun berhasil di hapus' 
      ];
      $this->session->set_flashdata($datapesan);
      redirect('administrasi');
   }


}