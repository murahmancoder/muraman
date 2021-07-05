<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_Artikel extends CI_Model{

   public function __construct()
   {
      parent::__construct();
   }

   public function upload(){
      $config['upload_path']='./assets/uploads/';
      $config['allowed_types']='gif|jpg|png';
      $config['max_size']='2048';
      $this->load->library('upload',$config);
         if($this->upload->do_upload('gambar')){
            unlink(FCPATH.'assets/uploads/'.$this->input->post('gambarLama'));
            return $this->upload->data('file_name');  
         }else{
            return $this->input->post('gambarLama');
         }
      
   }

   public function list(){
      $this->db->select('artikel.*, kategori_artikel.kategori');
      $this->db->from('artikel');
      $this->db->join('kategori_artikel','kategori_artikel.id_kategori = artikel.id_kategori');
      return $this->db->order_by('id_artikel','DESC')->get()->result();
   }

   public function listById($id){
      $this->db->select('artikel.*, kategori_artikel.kategori');
      $this->db->from('artikel');
      $this->db->join('kategori_artikel','kategori_artikel.id_kategori = artikel.id_kategori');
      $this->db->order_by('id_artikel','DESC');
      $this->db->where('artikel.id_user',$id);
      return $this->db->get()->result();
   }

   public function tambah($data){
      $this->db->insert('artikel',$data);
   }

   public function detail($id){
      return $this->db->get_where('artikel',['id_artikel' =>$id])->row();
    }

   public function edit($data){
      $this->db->where('id_artikel', $this->input->post('id'));
      $this->db->update('artikel',$data);
     }

   public function hapus($id){
      $filename=$this->detail($id);
      unlink(FCPATH.'assets/uploads/'. $filename->gambar);

      $this->db->where(['id_artikel'=>$id]);
      $this->db->delete('artikel');
     }


   
     public function getKeyword($keyword = null){
         if($keyword){ 
            $this->db->select('artikel.*, kategori_artikel.kategori, kategori_artikel.slug_kategori, user.nama');
            $this->db->from('artikel');
            $this->db->join('kategori_artikel','kategori_artikel.id_kategori=artikel.id_kategori','LEFT');
            $this->db->join('user','user.id_user=artikel.id_user','LEFT');
            // $this->db->or_like('kategori_artikel.kategori',$keyword);
            // $this->db->where('artikel.status','Publish');
            $this->db->like('judul',$keyword);
            // $this->db->or_like('content',$keyword);
            return $this->db->where('artikel.status','Publish')->get()->result();      
         }
      } 


   public function listPopuler() {
		$this->db->select('artikel.*, visitor.*');
		$this->db->from('artikel');
		// Join
		$this->db->join('visitor','visitor.id_artikel = artikel.id_artikel', 'LEFT');
		$this->db->where('artikel.status','Publish');
		$this->db->order_by('visitor.views','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
   }

   public function countAll()
   {
      return $this->db->get('artikel')->num_rows();
   }

   public function getArtikel($perHalaman,$dataMulai) {
		$this->db->select('artikel.*, kategori_artikel.kategori, kategori_artikel.slug_kategori, user.nama');
		$this->db->from('artikel');
		// Join
		$this->db->join('kategori_artikel','kategori_artikel.id_kategori = artikel.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = artikel.id_user','LEFT');
		// End join
		$this->db->where('artikel.status','Publish');
		$this->db->order_by('id_artikel','DESC');
		$this->db->limit($perHalaman,$dataMulai);
		$query = $this->db->get();
		return $query->result();
   }

    //kategori
	public function kategori($id_kategori,$perHalaman,$dataMulai) {
		$this->db->select('artikel.*, kategori_artikel.kategori, kategori_artikel.slug_kategori, user.nama');
		$this->db->from('artikel');
		// Join
		$this->db->join('kategori_artikel','kategori_artikel.id_kategori = artikel.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = artikel.id_user','LEFT');
		// End join
      $this->db->where('artikel.id_kategori',$id_kategori);
      $this->db->order_by('id_artikel','DESC');
      $this->db->limit($perHalaman,$dataMulai);
		$query = $this->db->get();
		return $query->result();
   }

   public function countkategori($id){
      $this->db->select('artikel.*');
      $this->db->from('artikel');
      $this->db->where('id_kategori',$id);
      return $this->db->get()->num_rows();
   }
   
   //read
	public function readArtikel($slug_judul) {
		$this->db->select('artikel.*, kategori_artikel.kategori, user.nama');
		$this->db->from('artikel');
		// Join
		$this->db->join('kategori_artikel','kategori_artikel.id_kategori = artikel.id_kategori', 'LEFT');
		$this->db->join('user','user.id_user = artikel.id_user','LEFT');
		// End join
		$this->db->where('slug_judul',$slug_judul);
		$query = $this->db->get();
		return $query->row();
   }
   
  
}