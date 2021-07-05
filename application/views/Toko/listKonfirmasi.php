<div class="container mt-5">
   <div id="border">
   <div class=" table table-responsive mt-3" >
   <table id="table" class="table table-bordered table-hover table-striped container border-0"  >
   <thead>
      <tr class="font-weight-bold">
         <td>No</td>
         <td>Tanggal</td>
         <td>Nama</td>
         <td>No Rekening</td>
         <td>Status</td>
         <td class="text-center">Aksi</td>
      </tr>
   </thead>
   
   <tbody>
      <?php $i=1; foreach($konfirmasi as $kp) :?>
      <tr>
         <td><?=$i?></td>
         <td><?=$kp->tanggal?></td>
         <td><?=$kp->nama?></td>
         <td><?=$kp->no_rekening?></td>
         <td><?=$arrayStatus[$kp->status_pesanan]?></td>
         <td>
         <div class="text-center" >
            <form action="<?=base_url('pesanan/detail_pesanan')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$kp->id_pesanan?>">
               <button type="submit" class="btn btn-primary btn-sm">Detail</button>
            </form>
            <form action="<?=base_url('pesanan/update_pesanan')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$kp->id_pesanan?>">
               <button type="submit" class="btn btn-success btn-sm">Update Status Pesanan</button>
            </form>
            </div>
         </td>
       
         
      </tr>
      <?php $i++;  endforeach;?>
   </tbody> 
   </table>
   
</div>
</div>
</div>