<div class="row">
   <div class="container mt-5" id="border">
      <?php echo form_open('toko/update');?>
         <div class="col-md-8 offset-md-2">
               <table class="table table-hover table-responsive" width="100%" >
                  <tr>
                        <th width="10%">QTY</th>
                        <th>Nama Barang</th>
                        <th style="text-align:right">Harga</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th style="text-align:right">Berat</th>
                       
                  </tr>

               <?php $i=1; $total_berat=0; foreach ($this->cart->contents() as $items){
                  $barang = $this->M_Toko->detailBarang($items['id']); 
                  // $berat = $items['qty'] * $barang->berat;
                ?>
                  <tr>
                           <td width="25%">
                              <?php echo form_input(
                                 array('name' => $i.'[qty]', 
                                       'value' => $items['qty'], 
                                       'type' => 'number',
                                       'min'=>0,
                                       'max'=>$barang->stok,
                                       'maxlength' => '3', 'size' => '5'
                                       )); 
                                       ?>
                           </td>
                           
                           <td><?php echo $items['name']; ?></td>
                           <td style="text-align:right">Rp. <?php echo number_format($items['price'],'0',',','.'); ?></td>
                           <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'],'0',',','.'); ?></td>
                           <td style="text-align:right"><?= $items['qty']*$items['berat']?> Gr</td>
                           <td><a href="<?=base_url('toko/hapus_belanja/'.$items['rowid'])?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>

            <?php 
            $total_berat +=$items['qty']*$items['berat'];
            $i++; 
            }?>

           

            <tr>
                  <td colspan="2"></td>
                  <td style="text-align:right"><strong>Total</strong></td>
                  <td style="text-align:right"><strong>Rp. <?php echo number_format($this->cart->total(),'0',',','.'); ?></strong></td>
                  <td style="text-align:right"><strong> <?=$total_berat ?> Gr</strong></td>
            </tr>

            </table>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            <?php echo form_close(); ?>
            <a href="<?=base_url('toko/check_out')?>" class="btn btn-success"><i class="fa fa-check-square"></i> Check Out</a>
            <a href="<?=base_url('toko/clear')?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete All</a>
            <a href="<?=base_url('pesanan')?>" class="btn btn-warning text-white"><i class="fas fa-shopping-bag"></i> Pesanan Mu</a>

      </div>
   </div>
</div>