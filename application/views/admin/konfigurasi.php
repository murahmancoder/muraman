<div class="container mt-5">    

<form action="<?= base_url('admin/konfigurasi/konfig') ?>" method="post" id="border" enctype="multipart/form-data">

   <?php if($this->session->flashdata('pesan')) :?>
      <div class="<?=$this->session->flashdata('alert')?> alert-dismissible fade show" role="alert">
      <?=$this->session->flashdata('pesan')?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
   <?php endif;?>

   <input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi?>">
   <div class="row">
      <div class="col-md-12">
         <h4>Konfigurasi:</h4><hr>
            <div class="form-group row">
               <label class="col-sm-2">Nama Web</label>
               <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?= $konfigurasi->namaweb?>" required class="form-control col-sm-10">
            </div>
            
            <div class="form-group row">
               <label class="col-sm-2">Tagline</label>
               <textarea name="tagline" rows="3" class="form-control col-sm-10" placeholder="Tentang Website"><?= $konfigurasi->tagline?></textarea>
            </div>
            
            <div class="form-group row">
               <label class="col-sm-2">Official Email</label>
               <input type="email" name="email" placeholder="youremail@address.com" value="<?= $konfigurasi->email?>" class="form-control col-sm-10" valid_email | required>
            </div>
            
            <div class="form-group row">
            <label class="col-sm-2">No WhatsApp</label>
            <input type="text" name="no_wa" value="<?= $konfigurasi->no_wa?>" class="form-control col-sm-10" required>

            </div>

            <div class="form-group row">
            <label class="col-sm-2">Alamat</label>
            <textarea name="alamat" rows="3" class="form-control col-sm-10" placeholder="Alamat perusahaan/organisasi"><?= $konfigurasi->alamat?></textarea>
            </div>
            
            <h4>Sosial Media</h4><hr>
            
            <div class="form-group row">
               <label class="col-sm-2"><i class="fab fa-facebook"></i> Facebook </label>
               <input type="url" name="fb" placeholder="http://facebook.com/namakamu" value="<?= $konfigurasi->fb?>" class="form-control col-sm-10">
            </div>
      
         <div class="form-group row">
            <label class="col-sm-2"><i class="fab fa-instagram"></i> Instagram </label>
            <input type="url" name="ig" placeholder="http://instagram.com/namakamu" value="<?= $konfigurasi->ig?>" class="form-control col-sm-10">
         </div>
            

         <h4>SEO (Search Engine Optimization)</h4><hr>
            <div class="form-group row">
               <label class="col-sm-2">Keywords <br><small>(Keyword search for Google, Bing, etc)</small></label>
               <textarea name="keywords" rows="3" class="form-control col-sm-10" placeholder="Kata kunci / keywords"><?= $konfigurasi->keywords?></textarea>
            </div>
            
            <div class="form-group row">
               <label class="col-sm-2">Metatext</label>
               <textarea name="metatext" rows="5" class="form-control col-sm-10" placeholder="Kode metatext"><?= $konfigurasi->metatext?></textarea>
            </div>

            <h4>Icon</h4><hr>
            <input type="hidden" name="gambarLama" value="<?= $konfigurasi->icon?>">
            <div class="row mb-4">
            <img src="<?=base_url('assets/icon/'.$konfigurasi->icon);?>" alt="icon" class="col-sm-4">
            <div class="form-group col-sm-8">
                  <label class="font-weight-bold">Upload Gambar</label><small> (Ukuran dibawah 1mb) </small>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile" name="icon">
                     <label class="custom-file-label" for="customFile">Biarkan Jika tidak Ada</label>
                  </div>
            </div>
            </div>
            
            <h4>Google Map</h4><hr>
            <div class="form-group row">
               <label class="col-sm-2">Link Google Maps</label>
               <textarea name="google_maps" rows="5" class="form-control col-sm-10" placeholder="salin link google maps disini"><?=$konfigurasi->google_maps?></textarea>
            </div>
            
            <div class="form-group map row">
               <label class="col-sm-2">Tampilan Maps</label>
               <iframe class="col-sm-10"src="<?= $konfigurasi->google_maps?>" frameborder="1" width="100%" height="250px"></iframe>
            </div>  
         </div>
      </div>

      <div class="row">
         <div class="ml-auto">
         <input type="submit" name="submit" value="Simpan Konfigurasi" class="btn btn-primary">
      </div>
   </div>



</form>
   
</div>
