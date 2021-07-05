<div class="container mt-5">
   <div id="border">


   <h3 class="text center">Detail Pesanan</h3><hr>
   <table>
      <tr>
         <td>Nama</td>
         <td width="100px"></td>
         <td width="20px">:</td>
         <td> <?= $listPesanan->nama_pembeli?></td>
      </tr>
      <tr>
         <td>No. Telp</td>
         <td></td>
         <td>:</td>
         <td> <?= $listPesanan->no_telp?></td>
      </tr>
      <tr>
         <td>Tanggal</td>
         <td></td>
         <td>:</td>
         <td> <?= $listPesanan->tanggal?></td>
      </tr>
      <tr>
         <td>Pembayaran</td>
         <td></td>
         <td>:</td>
         <td> Rekening ( <?= $listPesanan->rekening?> - <?= $listPesanan->no_rekening?> )</td>
      </tr>
      <tr>
         <td>Total Bayar</td>
         <td ></td>
         <td >:</td>
         <td> Rp. <?= number_format($listPesanan->total_bayar,'0',',','.')?></td>
      </tr>
      <tr>
         <td>Status</td>
         <td ></td>
         <td >:</td>
         <td><?= $arrayStatus[$listPesanan->status_pesanan];
         ?></td>
      </tr>
   </table>
   
   
   
   
   <div class="table-responsive mt-3">
   <table class="table table-hover table-striped">
   <thead>
      <tr class="font-weight-bold">
         <td>No</td>
         <td>Nama Barang</td>
         <td>QTY</td>
         <td>Harga</td>
      </tr>
   </thead>
   
   <tbody>
      <?php $i=1; foreach($detailPesanan as $dp) :?>
      <tr>
         <td><?=$i?></td>
         <td><?=$dp->nama_barang?></td>
         <td><?=$dp->qty?></td>
         <td>Rp. <?=number_format($dp->harga,'0',',','.')?></td>
      </tr>
      <?php $i++; endforeach;?>
      <tr>
    
         <td colspan="2"></td>
         <td>Ongkir</td>
         <td>Rp. <?=number_format($listPesanan->tarif,'0',',','.')?></td>

      </tr>
      <tr>
    
         <td colspan="2"></td>
         <td>total</td>
         <td>Rp. <?=number_format($listPesanan->total_bayar,'0',',','.')?></td>

      </tr>
   </tbody> 
   </table> 
</div>
<Info>Jika Anda Sudah Membayar Klik dibawah untuk Konfirmasi Pembayaran </p>
<a href="<?=base_url('pesanan/konfirmasi/'.$listPesanan->id)?>" class="btn btn-primary">Konfirmasi</a>
<a href="" class="btn btn-success"> <i class="fab fa-whatsapp"></i> <?=$site->no_wa?></a>
</div>
</div>