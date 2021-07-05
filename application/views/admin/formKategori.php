<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="<?=$action;?>" method="post" enctype="multipart/form-data">
              <div class="row">
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nama Kategori</label>
                  <input type="text"  name="kategori" class="form-control" value="<?= set_value('kategori', $kategori['kategori'] ?? '');?>">
               </div>
               <div class="form-group col-md-12">
                  <label class="font-weight-bold">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="<?= set_value('keterangan', $kategori['keterangan'] ?? '');?>" >
               </div>

               

               <?php if($title == 'Edit Kategori') {
               echo "
               <div class='row mb-2'>
               <img src='".base_url('assets/uploads/'.$kategori['gambar'])."' width='100px' class='col-md-4 ml-3'>
                   <div class='form-group col-md-7 ml-3'>
                   <label class='font-weight-bold'>Upload Gambar</label><small> (Ukuran dibawah 1mb) </small>
                   <div class='custom-file'>
                     <input type='file' class='custom-file-input' id='customFile' name='gambar'>
                     <label class='custom-file-label' for='customFile'>Pilih Gambar minimal ukuran (300 x 250)</label>
                  </div>
                     <small class='text-info'> Biarkan Jika tidak Ada & Jika tidak sesuai dengan format atau Ukuran Gambar maka gambar di set ke sebelumnya </small>                  </div>
               </div>";
            }else{
              echo
              " <div class='form-group col-md-12'>
               <label for='keterangan'class='font-weight-bold'>Upload Gambar</label><small> (Ukuran dibawah 1mb) </small>
               <div class='custom-file'>
                  <input type='file' class='custom-file-input' id='customFile' name='gambar' required>
                  <label class='custom-file-label' for='customFile'>Pilih Gambar minimal ukuran (300 x 250)</label>
               </div>
               </div>";
            }

            ?>

               <div class="form-group col-md-12">
                  <label class="font-weight-bold" >Urutan</label>
                  <input type="number" min="1" class="form-control"  name="urutan" value="<?= set_value('urutan', $kategori['urutan'] ?? '1');?>">
                  <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
               </div>
              
               <input type="hidden" name='id' value="<?= $kategori['id_kategori'] ?? '';?>"> 
               <input type="hidden" name ="gambarLama" value="<?=$kategori['gambar']??'kosong';?>">      
               <div class="form-group col-md-12">
                  <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1"><?=$button;?></button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>