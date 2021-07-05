<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller {
   public function __construct(){
      parent::__construct();
      $this->load->model(['M_Visitor','M_User']);
      if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'User'){
         return show_404();
      } 
   }


   public function index(){
      $data=[
         "title"=>"Visitor Halaman",
         "listVisitor"=>$this->M_Visitor->list(),
         "isi"=>"admin/listVisitor",
         "userAktif"=>$this->M_User->detail($this->session->userdata('user_id'))
      ];
      $this->load->view('backend',$data);
   }

   public function hapus($id){
      $this->M_Visitor->hapus($id);
      $datapesan =  [ 
         "alert"=> 'alert alert-danger',
         "pesan" => 'Visitor artikel berhasil di Hapus' 
      ];
      $this->session->set_flashdata($datapesan);
      redirect('visitor');
   }
}