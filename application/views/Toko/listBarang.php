<div class="container mt-5">
   <div id="border">

  <?php if($this->session->flashdata('pesan')) :?>
   <div class="<?=$this->session->flashdata('alert')?> alert-dismissible fade show" role="alert">
   <?=$this->session->flashdata('pesan')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
  <?php endif;?>

   <div class="row">
      <div class="col-md-12">
         <a href="<?=base_url('toko/tambah-barang')?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> BARANG</a>
      </div>
   </div>
   
   <div class="table-responsive mt-3">
   <table class="table table-bordered table-hover table-striped container border-0 " id="table">
   <thead>
      <tr class="font-weight-bold">
         <td>No</td>
         <td>Gambar</td>
         <td>Barang</td>
         <td>Kategori</td>
         <td>Harga (Rp)</td>
         <td>Status</td>
         <td>Stok</td>
         <td>Penjual</td>
         <td width="25%" class="text-center">Aksi</td>
      </tr>
   </thead>
   
   <tbody>
      <?php $i=1; foreach($listBarang as $barang) :?>
      <tr>
         <td><?=$i?></td>
         <td class="text-center">
            <img src="<?=base_url('assets/uploads/toko/'.$barang->gambar)?> " alt="format gambar tidak sesuai/ukuran lebih besar" width="60px"  class="img img-responsive">
         </td>
         <td><?=$barang->barang?></td>
         <td><?=$barang->kategori_brg?></td>
         <td><?=number_format($barang->harga,'0',',','.')?></td>
         <td><?=$barang->status?></td>
         <td><?=$barang->stok?></td>
         <td><?=$barang->penjual?></td>
         <td  width="25%">
         <div class="text-center tengah" >
            <form action="<?=base_url('toko/edit-barang')?>" method="post" >
               <input type="hidden" name="id" value="<?=$barang->id_barang?>">
               <button type="submit" class="btn btn-primary border-0 mr-1"><i class="fa fa-edit"></i></button>
            </form>
            <form action="<?=base_url('toko/hapus-barang')?>" method="post">
               <input type="hidden" name="id" value="<?=$barang->id_barang?>">
               <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin Menghapus ini ?')"><i class="fa fa-trash"></i></button>
            </form>
            </div>
         </td>
      </tr>
      <?php $i++; endforeach;?>
   </tbody> 
   </table>
   
</div>
</div>
</div>