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
         <a href="<?=base_url('toko/tambah-metode-pembayaran')?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> PEMBAYARAN</a>
      </div>
   </div>
   
   <div class="table-responsive mt-3">
   <table class="table table-bordered table-hover table-striped container border-0" id="table">
   <thead>
      <tr class="font-weight-bold">
         <td>No</td>
         <td>Nama</td>
         <td>Nama Bank</td>
         <td>No Rekening</td>
         <td>Status</td>
         <td class="text-center">Aksi</td>
      </tr>
   </thead>
   
   <tbody>
      <?php $i=1; foreach($listBayar as $bayar) :?>
      <tr>
         <td><?=$i?></td>
         <td><?=$bayar->nama?></td>
         <td><?=$bayar->rekening?></td>
         <td><?=$bayar->no_rekening?></td>
         <td><?=$bayar->status?></td>
         <td>
         <div class="text-center" >
            <form action="<?=base_url('toko/edit-metode-pembayaran')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$bayar->id_pembayaran?>">
               <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
            </form>
            <form action="<?=base_url('toko/hapus-metode-pembayaran')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$bayar->id_pembayaran?>">
               <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin Menghapus ini ?')"><i class="fa fa-trash"></i></button>
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