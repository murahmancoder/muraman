<div class="container mt-5" id="border">
   <div class="row">


   <div class="col-md-6">
      <h3 class="bg-danger text-white p-3">Formulir Pesanan</h3>
      <form action="<?=base_url('toko/check_out')?>" method="post" >
         <div class="form-group">
            <label class="font-weight-bold">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= set_value('nama', $user->nama ??'nama');?>">
         </div>

         <div class="form-group">
            <label class="font-weight-bold">Nomor Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="<?= set_value('no_telp');?>">
         </div>

         <div class="form-group">
            <label class="font-weight-bold">Alamat</label>
            <textarea name="alamat" cols="10" rows="3" class="form-control"><?= set_value('alamat');?></textarea>
         </div>
       
     
         
      <div class="form-group">
      <label class="font-weight-bold">Metode Bayar ( Transfer )</label>
         <select name="bayar" class="form-control" required>
            <?php foreach ($listBayar as $bayar) { ?>
               <option value="<?=$bayar->id_pembayaran?>"> <?=$bayar->rekening?> -  <?=$bayar->no_rekening?></option>
           <?php }?>
         </select>
      </div>

      <div class="form-group">
      <label class="font-weight-bold">Tarif</label>
         <select name="tarif" class="form-control" required>
            <?php foreach ($listTarif as $tarif) { ?>
               <option value="<?=$tarif->tarif?>"><?=$tarif->kota?> - ( Rp. <?=number_format($tarif->tarif,'0',',','.')?> )</option>
           <?php }?>
         </select>
      </div>    
   </div>
     
         <div class="col-md-6">
            <h3  class="bg-info text-white p-3">Detail Barang</h3><hr><br>
               <table class="table table-hover table-striped table-responsive" >
                  <tr class="bg-dark text-white">
                        <th width="100px">QTY</th>
                        <th>Nama Barang</th>
                        <th style="text-align:left">Harga</th>
                        <th style="text-align:left">Sub-Total</th>
                        <th style="text-align:right">Berat</th>    
                  </tr>

               <?php $i=1; $total_berat=0; foreach ($this->cart->contents() as $items){
                 $berat=$items['berat']*$items['qty']; ?>
                  <tr>
                           <td width="100px">
                           <input type="number" name="<?= $i.'[qty]'?>" value="<?=$items['qty']?>" class="form-control" readonly  />
                           </td>
                           <td><?php echo $items['name']; ?></td>
                           <td style="text-align:left">Rp. <?php echo number_format($items['price'],'0',',','.'); ?></td>
                           <td style="text-align:left">Rp. <?php echo number_format($items['subtotal'],'0',',','.'); ?></td>
                           <td style="text-align:right"><?=$berat?> Gr</td>
                  </tr>

            <?php $i++; 
            $total_berat +=$berat;
            }?>

            <input type="hidden" name="total_berat" value="<?=$total_berat?>">

            <tr>
                  <td colspan="2"></td>
                  <td style="text-align:left" class="bg-dark text-white"><strong>Total</strong></td>
                  <td style="text-align:left" class="bg-dark text-white"><strong>Rp. <?php echo number_format($this->cart->total(),'0',',','.'); ?></strong></td>
                  <td style="text-align:right" class="bg-dark text-white"><strong> <?=$total_berat ?> Gr</strong></td>
            </tr>

         </table>
           
      </div>

      <div class="col-md-6">
            <button class="btn btn-success float-right"><i class="fa fa-check-square"></i> Bayar</button>
         </form>
      </div>
      
   </div>
</div>