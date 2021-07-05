
<div class="container mt-5">

<div class="card">
<h5 class="card-header text-center text-uppercase"><?=$title?></h5>
<div class="card-body">
<div id="border">

<form action="<?=$action;?>" method="post" enctype="multipart/form-data">
	<div class="row">
      <div class="col-md-12">
         <div class="form-group form-group-lg">
            <label class="font-weight-bold">Judul</label>
            <input type="text" name="judul" class="form-control" required value="<?= set_value('judul', $artikel->judul ??'');?>">
         </div>
      </div>


	<div class="col-md-6">
      <div class="form-group form-group-lg">
      <label class="font-weight-bold">Status Artikel</label>
         <select name="status" class="form-control" required>
            <option value="Publish">Publikasikan</option>
            <option value="Draft" <?php if($title == "Edit Artikel" && $artikel->status == "Draft"){ echo "selected";} ?>>Simpan sebagai Draft</option>
         </select>
      </div>
	</div>

	<div class="col-md-6">
      <div class="form-group">
         <label class="font-weight-bold">Kategori Artikel</label>
            <select name="id_kategori" class="form-control" required>
               <?php foreach($listKategori as $kategori):?>
                  <option value="<?= $kategori->id_kategori;?>"
                        <?php if ($title == "Edit Artikel"){
                              if( $artikel->id_kategori == $kategori->id_kategori){echo"selected";}
                        }?>>
                        <?= $kategori->kategori;?>
                  </option>
               <?php endforeach;?>
            </select>
      </div>
	</div>


	<div class="col-md-6">
      <div class="form-group ">
         <label class="font-weight-bold">Meta title</label>
         <input type="text" name="meta_title" class="form-control" required value="<?= set_value('meta_title', $artikel->meta_title ??'');?>">
      </div>
	</div>

	<div class="col-md-6">
      <div class="form-group ">
         <label class="font-weight-bold">Meta Keyword</label>
         <input type="text" name="meta_keywords" class="form-control" required value="<?= set_value('meta_keywords', $artikel->meta_keywords ??'');?>">
      </div>
	</div>


<?php if($title == "Edit Artikel") {
	echo
	"<div class='col-md-4'>
	   <img src='".base_url('assets/uploads/'.$artikel->gambar)."' width='250px'>
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
         <label class="font-weight-bold">Content</label>
         <textarea name="content" placeholder="Content" id="editor"  class="form-control"><?=set_value('content',$artikel->content ??'')?></textarea>
		</div>
		
		<div class="form-group">

      <input type="hidden" name ="gambarLama" value="<?=$artikel->gambar??'kosong';?>">
      <input type="hidden" name = "id" value="<?=$artikel->id_artikel??'';?>">
		

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