<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model{
   public function __construct()
   {
      parent:: __construct();
   }

   public function list(){
     return $this->db->order_by('urutan','DESC')->limit(10)->get('kategori_artikel')->result();
   }

   public function getAll(){
      return $this->db->order_by('urutan','DESC')->get('kategori_artikel')->result();
   }

   public function countAll(){
      return $this->db->get('kategori_artikel')->num_rows();
   }
 
   public function upload(){
      $config['upload_path']          = './assets/uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = '1048';
      $this->load->library('upload',$config);
         if($this->upload->do_upload('gambar')){
            $filename = $this->input->post('gambarLama'); 
            unlink( FCPATH. "assets/uploads/".$filename);
            return $this->upload->data('file_name');
         }else{
            return $this->input->post('gambarLama');
         }
      
   }
   
   public function tambahKategori($data){
      $this->db->insert('kategori_artikel',$data);
   }
   
   public function getKategoriById($id){
      return $this->db->get_where('kategori_artikel',['id_kategori'=>$id])->row_array();
   }
      
   public function editKategori($data){
      $this->db->where('id_kategori', $this->input->post('id'));
      $this->db->update('kategori_artikel',$data);   
   }
   
   public function hapusKategori($id){
      $filename = $this->getKategoriById($id);
      unlink( FCPATH. "assets/uploads/".$filename['gambar']);
      $this->db->delete('kategori_artikel',['id_kategori'=>$id]);
   }
   
   
   public function readKategori($slug_kategori) {
      return $this->db->order_by('urutan','ASC')->get_where('kategori_artikel',['slug_kategori'=>$slug_kategori])->row();
   }
   
}
   