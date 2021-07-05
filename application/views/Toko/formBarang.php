
<div class="container mt-5">

<div class="card">
<h5 class="card-header text-center text-uppercase"><?=$title?></h5>
<div class="card-body">
<div id="border">

<form action="<?=$action;?>" method="post" enctype="multipart/form-data">
	<div class="row">
      <div class="col-md-12">
         <div class="form-group form-group-lg">
            <label class="font-weight-bold">Nama Barang</label>
            <input type="text" name="barang" class="form-control" required value="<?= set_value('barang', $barang->barang ??'');?>">
         </div>
      </div>


	<div class="col-md-6">
      <div class="form-group">
         <label class="font-weight-bold">Kategori Barang</label>
            <select name="id_kategori_barang" class="form-control" required>
               <?php foreach($listKategori as $kategori):?>
                  <option value="<?= $kategori->id_kategori_barang;?>"
                        <?php if ($title == "Edit Barang"){
                              if( $barang->id_kategori_barang == $kategori->id_kategori_barang){echo"selected";}
                        }?>>
                        <?= $kategori->kategori_brg;?>
                  </option>
               <?php endforeach;?>
            </select>
      </div>
   </div>
   
   <div class="col-md-6">
      <p class="font-weight-bold" >Status Barang</p>
      <div class="form-check d-inline mr-4" >
         <input class="form-check-input" type="radio" name="status" value="ON" <?= $title == 'Edit Barang' && $barang->status == 'ON' ?'checked' :''?>>
         <label class="form-check-label">
            ON
         </label>
      </div>
         <div class="form-check d-inline"  style="display: inline-block;">
         <input class="form-check-input" type="radio" name="status" value="OFF" <?= $title == 'Edit Barang' && $barang->status == 'OFF' ?'checked' :''?>>
         <label class="form-check-label">
            OFF
         </label>
      </div>
         <small class="form-text text-danger"><?= form_error('status'); ?></small>
   </div>


	<div class="col-md-4">
      <div class="form-group ">
         <label class="font-weight-bold">Stok</label>
         <input type="text" name="stok" class="form-control" required value="<?= set_value('stok', $barang->stok ??'1');?>">
      </div>
   </div>

	<div class="col-md-4">
      <div class="form-group ">
         <label class="font-weight-bold">Berat (Gr)</label>
         <input type="text" name="berat" class="form-control" required value="<?= set_value('berat', $barang->berat ??'');?>">
      </div>
   </div>

	<div class="col-md-4">
      <div class="form-group ">
         <label class="font-weight-bold">Harga Barang </label>
         <input type="text" name="harga" class="form-control" required value="<?= set_value('harga', $barang->harga ??'');?>">
      </div>
   </div>
   
<?php if($title == "Edit Barang") {
	echo
	"<div class='col-md-4'>
	   <img src='".base_url('assets/uploads/toko/'.$barang->gambar)."' width='250px'>
	</div>";

	echo "
	<div class='col-md-8'>
      <div class='form-group'>
         <label for='keterangan'class='font-weight-bold'>Upload Gambar</label><small> (Ukuran dibawah 2mb) </small>
         <div class='custom-file'>
            <input type='file' class='custom-file-input' id='customFile' name='gambar'>
            <label class='custom-file-label' for='customFile'>Pilih Gambar minimal ukuran (600 x 400)</label>
         </div>
         <small class='text-info'> Biarkan Jika tidak Ada & Jika tidak sesuai dengan format atau Ukuran Gambar maka gambar di set ke sebelumnya </small>
      </div>
	</div>";
}else{
	echo"
	<div class='col-md-12'>
      <div class='form-group'>
         <label for='keterangan'class='font-weight-bold'>Upload Gambar</label><small> (Ukuran dibawah 2mb) </small>
         <div class='custom-file'>
            <input type='file' class='custom-file-input' id='customFile' name='gambar' required>
            <label class='custom-file-label' for='customFile'>Pilih Gambar minimal ukuran (600 x 400)</label>
         </div>
      </div>
	</div>";
}

?>


	<div class="col-md-12 mt-3">		
		<div class="form-group">
         <label class="font-weight-bold">Deskripsi</label>
         <textarea name="deskripsi" placeholder="Content" id="editor"  class="form-control"><?= set_value('deskripsi',$barang->deskripsi ??'')?></textarea>
		</div>
		
		<div class="form-group">

      <input type="hidden" name ="gambarLama" value="<?=$barang->gambar??'kosong';?>">
      <input type="hidden" name = "id" value="<?=$barang->id_barang??'';?>">
		

		<input type="reset" name="reset" value="Reset" class="btn btn-danger btn-lg float-right">
		<input type="submit" name="submit" value="<?=$button;?>" class="btn btn-primary btn-lg float-right mr-1">
		</div>

	</div>
</div>

</form>
</div>
</div>
</div>
</div>