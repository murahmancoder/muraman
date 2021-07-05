<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Toko extends CI_Model{
   public function __construct()
   {
      parent:: __construct();
   }

   // Konfirmasi
   public function countKonfirmasi()
   {
      return $this->db->get('konfirmasi')->num_rows();
   }

   public function konfirmasi($data){
      $this->db->insert('konfirmasi',$data);
   }

   public function listKonfirmasi(){
      $this->db->select('konfirmasi.*, pesanan.status_pesanan');
		$this->db->from('konfirmasi');
      $this->db->join('pesanan','pesanan.id = konfirmasi.id_pesanan','LEFT');
      return $this->db->get()->result();
   }

   // update status
   public function update_status($data){
      $status = $data['status_pesanan'];
      $id = $data['id'];
      return $this->db->query("UPDATE pesanan SET status_pesanan ='$status' WHERE id ='$id'");
   }


   // INVOICE
   public function tambah_pesanan($data){
      $this->db->insert('pesanan',$data);
   }

   public function countPesanan()
   {
      return $this->db->get('pesanan')->num_rows();
   }

  

   public function AllPesanan(){
      $this->db->select('pesanan.*, user.nama');
		$this->db->from('pesanan');
      $this->db->join('user','user.id_user = pesanan.id_user','LEFT');
      return $this->db->get()->result();
   }

   public function listPesanan($id){
      $this->db->select('pesanan.*, user.nama');
		$this->db->from('pesanan');
      $this->db->join('user','user.id_user = pesanan.id_user','LEFT');
      $this->db->where('pesanan.id_user',$id);
      $this->db->order_by('pesanan.tanggal','DESC');
      return $this->db->get()->result();
   }

   public function getIdPesanan($id){
      return $this->db->get_where('pesanan',['pesanan.id'=>$id])->row();
   }

   public function getPesanan($id){
      $this->db->select('pesanan.*, pembayaran.*, user.nama');
		$this->db->from('pesanan');
      $this->db->join('pembayaran','pembayaran.id_pembayaran = pesanan.metode_bayar', 'LEFT');
      $this->db->join('user','user.id_user = pesanan.id_user','LEFT');
      $this->db->where('pesanan.id',$id);
      return $this->db->get()->row();
   }

   // Pesanan
   public function detail_pesanan($data){
      $this->db->insert('detail_pesanan',$data);
   }

   public function getDetailPesanan($id){
      return $this->db->get_where('detail_pesanan',['detail_pesanan.id_pesanan'=>$id])->result();    
   }
   

   // LIST
   public function listBayarOn(){
      $this->db->select('*');
      $this->db->from('pembayaran');
      $this->db->where('pembayaran.status','ON');
      return $this->db->get()->result();
   }

   public function listTarifOn(){
      $this->db->select('*');
      $this->db->from('ongkir');
      $this->db->where('ongkir.status','ON');
      return $this->db->get()->result();
   }



   // FRONTEND KATEGORI
   public function listKategoriOn(){
      return $this->db->order_by('urutan','DESC')->where('kategori_barang.status','ON')->get('kategori_barang')->result();
   }

   public function readKategori($slug_kategori) {
      return $this->db->order_by('urutan','DESC')->get_where('kategori_barang',['slug_kategori'=>$slug_kategori])->row();
   }

   public function countkategori($id){
      $this->db->select('barang.*');
      $this->db->from('barang');
      $this->db->where('id_kategori_barang',$id);
      return $this->db->get()->num_rows();
   }

   public function kategori_barang($id_kategori,$perHalaman,$dataMulai) {
		$this->db->select('barang.*, kategori_barang.kategori_brg, kategori_barang.slug_kategori');
		$this->db->from('barang');
		// Join
		$this->db->join('kategori_barang','kategori_barang.id_kategori_barang = barang.id_kategori_barang', 'LEFT');
		// End join
      $this->db->where('barang.id_kategori_barang',$id_kategori);
      $this->db->where('barang.status','ON');
      $this->db->order_by('id_barang','DESC');
      $this->db->limit($perHalaman,$dataMulai);
		$query = $this->db->get();
		return $query->result();
   }


   // CARI
   public function getKeyword($keyword = null){
      if($keyword){ 
         $this->db->like('barang', $keyword);
         return $this->db->where('barang.status','ON')->get('barang')->result();        
      }
   } 

   // FRONTEND
   public function countAllBarang()
   {
      return $this->db->get('barang')->num_rows();
   }

   public function getBarang($perHalaman,$dataMulai) {
		$this->db->select('barang.*, kategori_barang.kategori_brg, kategori_barang.slug_kategori');
		$this->db->from('barang');
		// Join
		$this->db->join('kategori_barang','kategori_barang.id_kategori_barang = barang.id_kategori_barang', 'LEFT');
		// End join
		$this->db->where('barang.status','ON');
		$this->db->order_by('RAND ()');
		$this->db->limit($perHalaman,$dataMulai);
		$query = $this->db->get();
		return $query->result();
   }

   // READ BARANG
   public function readBarang($slug_barang) {
		$this->db->select('barang.*, kategori_barang.kategori_brg');
		$this->db->from('barang');
		// Join
		$this->db->join('kategori_barang','kategori_barang.id_kategori_barang = barang.id_kategori_barang', 'LEFT');
		// End join
		$this->db->where('slug_barang',$slug_barang);
		$query = $this->db->get();
		return $query->row();
   }



   // KATEGORI BARANG
   
   public function listKategori(){
      return $this->db->order_by('urutan','DESC')->get('kategori_barang')->result();
   }

   public function getKategoriById($id){
      return $this->db->get_where('kategori_barang',['id_kategori_barang'=>$id])->row_array();
   }

   public function tambahKategori($data){
      $this->db->insert('kategori_barang',$data);
   }

   public function editKategori($data){
      $this->db->where('id_kategori_barang', $this->input->post('id'));
      $this->db->update('kategori_barang',$data);   
   }

   public function hapusKategori($id){
      $this->db->delete('kategori_barang',['id_kategori_barang'=>$id]);
   }

   // BARANG

   public function listBarang(){
      $this->db->select('barang.*, kategori_barang.kategori_brg');
      $this->db->from('barang');
      $this->db->join('kategori_barang','kategori_barang.id_kategori_barang = barang.id_kategori_barang');
      return $this->db->order_by('id_barang','DESC')->get()->result();
   }

   public function listBrgById($id){
      $this->db->select('barang.*, kategori_barang.kategori_brg');
      $this->db->from('barang');
      $this->db->join('kategori_barang','kategori_barang.id_kategori_barang = barang.id_kategori_barang');
      $this->db->order_by('id_barang','DESC');
      $this->db->where('barang.id_user',$id);
      return $this->db->get()->result();
   }

   public function upload(){
      $config['upload_path']='./assets/uploads/toko/';
      $config['allowed_types']='gif|jpg|png';
      $config['max_size']='2048';
      $this->load->library('upload',$config);
    
         if($this->upload->do_upload('gambar')){
            unlink(FCPATH.'assets/uploads/toko/'.$this->input->post('gambarLama'));
            return $this->upload->data('file_name');  
         }else{
            return $this->input->post('gambarLama');
         }
      
   }

   public function tambahBarang($data){
      $this->db->insert('barang',$data);
   }

   public function detailBarang($id){
      return $this->db->get_where('barang',['id_barang' =>$id])->row();
    }

    public function editBarang($data){
      $this->db->where('id_barang', $this->input->post('id'));
      $this->db->update('barang',$data);
   }

   public function hapusBarang($id){
      $filename=$this->detailBarang($id);
      unlink(FCPATH.'assets/uploads/toko/'. $filename->gambar);

      $this->db->where(['id_barang'=>$id]);
      $this->db->delete('barang');
   }


   // BANNER
   public function uploadBanner(){
      $config['upload_path']='./assets/uploads/banner/';
      $config['allowed_types']='gif|jpg|png';
      $config['max_size']='1048';
      $this->load->library('upload',$config);
         if($this->upload->do_upload('gambar')){
            unlink(FCPATH.'assets/uploads/banner/'.$this->input->post('gambarLama'));
            return $this->upload->data('file_name');  
         }else{
            return $this->input->post('gambarLama');
         }
   }

   public function listBannerOn(){
      return $this->db->get_where('banner',['status'=> 'ON'])->result();
   }

   public function listBanner(){
      return $this->db->order_by('id_banner','DESC')->get('banner')->result();
   }

   public function tambahBanner($data){
      $this->db->insert('banner',$data);
   }

   public function getIdBanner($id){
      return $this->db->get_where('banner',['id_banner' =>$id])->row();
   }

   public function editBanner($data){
      $this->db->where('id_banner', $this->input->post('id'));
      $this->db->update('banner',$data);
   }

   public function hapusBanner($id){
      $filename=$this->getIdBanner($id);
      unlink(FCPATH.'assets/uploads/banner/'. $filename->gambar);

      $this->db->where(['id_banner'=>$id]);
      $this->db->delete('banner');
   }


   // TARIF / ONGKIR

   public function listTarif(){
      return $this->db->order_by('id_ongkir','DESC')->get('ongkir')->result();
   }

   public function getIdTarif($id){
      return $this->db->get_where('ongkir',['id_ongkir'=>$id])->row();
   }

   public function tambahTarif($data){
      $this->db->insert('ongkir',$data);
   }

   public function editTarif($data){
      $this->db->where('id_ongkir', $this->input->post('id'));
      $this->db->update('ongkir',$data);   
   }

   public function hapusTarif($id){
      $this->db->delete('ongkir',['id_ongkir'=>$id]);
   }

   // METODE PEMBAYRAN / PILIHAN PEMBAYARAN

   public function listBayar(){
      return $this->db->order_by('id_pembayaran','DESC')->get('pembayaran')->result();
   }

   public function getIdBayar($id){
      return $this->db->get_where('pembayaran',['id_pembayaran'=>$id])->row();
   }

   public function tambahBayar($data){
      $this->db->insert('pembayaran',$data);
   }

   public function editBayar($data){
      $this->db->where('id_pembayaran', $this->input->post('id'));
      $this->db->update('pembayaran',$data);   
   }

   public function hapusBayar($id){
      $this->db->delete('pembayaran',['id_pembayaran'=>$id]);
   }

}