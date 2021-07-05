<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="<?=$action;?>" method="post">
              <div class="row">
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nama Kategori Barang</label>
                  <input type="text"  name="kategori_brg" class="form-control" value="<?= set_value('kategori_brg', $kategori['kategori_brg'] ?? '');?>">
                  <small class="form-text text-danger"><?= $title == 'Edit Kategori Barang' ?'':form_error('kategori_brg'); ?></small>
               </div>
              
               <div class="form-group col-md-12">
                  <label class="font-weight-bold" >Urutan</label>
                  <input type="number" min="1" class="form-control"  name="urutan" value="<?= set_value('urutan', $kategori['urutan'] ?? '1');?>">
                  <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
               </div>

               <div class="ml-3">
               <p class="font-weight-bold" >Status Kategori</p>
                  <div class="form-check d-inline mr-4" >
                     <input class="form-check-input" type="radio" name="status" value="ON" <?= $title == 'Edit Kategori Barang' && $kategori['status'] == 'ON' ?'checked' :''?>>
                     <label class="form-check-label">
                        ON
                     </label>
                  </div>
                     <div class="form-check d-inline"  style="display: inline-block;">
                     <input class="form-check-input" type="radio" name="status" value="OFF" <?= $title == 'Edit Kategori Barang' && $kategori['status'] == 'OFF' ?'checked' :''?>>
                     <label class="form-check-label">
                        OFF
                     </label>
                  </div>
                  <small class="form-text text-danger"><?= form_error('status'); ?></small>
               </div>
              
               <input type="hidden" name='id' value="<?= $kategori['id_kategori_barang'] ?? '';?>"> 
               <div class="form-group col-md-12">
                  <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1"><?=$button;?></button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>