<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Visitor extends CI_Model {
	

	public function __construct() {
		parent::__construct();
   }


   public function list(){
      return $this->db->order_by('views','DESC')->get('visitor')->result_array();
   }

   public function getStatistik(){
      return $this->db->order_by('views','DESC')->limit(10)->get('visitor')->result_array();
   }

   public function hapus($id){
      $this->db->delete('visitor',['id_visitor'=>$id]);
   }
   
   public function tambah($data){
      $queryStatistik = $this->db->get_where('visitor',['judul'=>$data['judul']])->num_rows();

      if($queryStatistik > 0){
         $this->db->query(" UPDATE visitor SET views=views+1 WHERE judul='".$data['judul']."'" );

      }else{
         $this->db->insert('visitor',$data);
      }
   }
   
   // $this->db->where(
   //    [
   //       'ip_address' => $data['ip_address'],
   //       'slug_judul' => $data['slug_judul']
   //    ]
   // );
   // $this->db->update('statistik', [
   //                                        'visitor' =>$this->db->from('statistik.visitor')+1  
   //                                        ]);


}