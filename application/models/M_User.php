<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model{
   public function __construct()
   {
      parent:: __construct();
   }

   public function getAll(){
      return $this->db->get('user')->result();
   }

   public function countAll(){
      return $this->db->get('user')->num_rows();
   }

   public function tambahUser($data){
      $this->db->insert('user',$data);
   }

   public function login($email,$password){
      $query = $this->db->select('*')
                        ->where('email',$email)
                        ->get('user');
      $row=$query->row();

      if($this->password->verify($password, $row->password)){
         return $row;
      }else{
         return false;
      }

   }


   public function detail($id){
      return $this->db->get_where('user',['id_user'=>$id])->row();
   }

   public function list(){
      return $this->db->get('user')->result();
   }
   
   public function edit($data){
      $this->db->where('id_user', $this->input->post('id',true));
      $this->db->update('user',$data);
   }
   
   public function hapus($id){
      $this->db->delete('user',['id_user'=>$id]);
   }
}