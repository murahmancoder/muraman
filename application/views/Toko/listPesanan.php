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

   <div class=" table table-responsive mt-3" >
   <table id="table" class="table table-bordered table-hover table-striped container border-0"  >
   <thead>
      <tr class="font-weight-bold">
         <td>No</td>
         <td class="text-center">Aksi</td>
         <td>Tanggal</td>
         <td>Status</td>
      </tr>
   </thead>
   
   <tbody>
      <?php $i=1; foreach($listPesanan as $lp) :?>
      <tr>
         <td><?=$i?></td>
         <td>
         <div class="text-center" >
            <form action="<?=base_url('pesanan/detail_pesanan')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$lp->id?>">
               <button type="submit" class="btn btn-success btn-sm">Detail & Konfirmasi </button>
            </form>
            <?php if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'Super Admin'){ ?>
            <form action="<?=base_url('pesanan/update_pesanan')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$lp->id?>">
               <button type="submit" class="btn btn-primary btn-sm">Update Status Pesanan</button>
            </form>
            <?php }?>
            </div>
         </td>
         <td><?=$lp->tanggal?></td>
         <td><?=$arrayStatus[$lp->status_pesanan]?></td>
         
      </tr>
      <?php $i++;  endforeach;?>
   </tbody> 
   </table>
   
</div>
</div>
</div>