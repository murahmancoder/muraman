<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="<?=$action;?>" method="post" enctype="multipart/form-data">
              <div class="row">
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nama</label>
                  <input type="text"  name="nama" class="form-control" value="<?= set_value('nama', $pembayaran->nama ?? '');?>" required>
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nama Rekening Bank</label> 
                  <input type="text"  name="rekening" class="form-control" value="<?= set_value('rekening', $pembayaran->rekening ??'');?>" required>
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nomor Rekening</label> 
                  <input type="text"  name="no_rekening" class="form-control" value="<?= set_value('no_rekening', $pembayaran->no_rekening ??'');?>" required>
                  <small class="text-info">Jangan Pakai tanda baca (.,) titik dan koma</small>
               </div>
               
               <div class="ml-3">
               <p class="font-weight-bold" >Status Tarif</p>
                  <div class="form-check d-inline mr-4" >
                     <input class="form-check-input" type="radio" name="status" value="ON" <?= $button == 'Edit' && $pembayaran->status == 'ON' ?'checked' :''?>>
                     <label class="form-check-label">
                        ON
                     </label>
                  </div>
                     <div class="form-check d-inline"  style="display: inline-block;">
                     <input class="form-check-input" type="radio" name="status" value="OFF" <?= $button == 'Edit' && $pembayaran->status == 'OFF' ?'checked' :''?>>
                     <label class="form-check-label">
                        OFF
                     </label>
                  </div>
                  <small class="form-text text-danger"><?= $button == 'Edit' ?'': form_error('status'); ?></small>
               </div>

               <input type="hidden" name='id' value="<?= $pembayaran->id_pembayaran ?? '';?>"> 
               <div class="form-group col-md-12">
                  <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1"><?=$button;?></button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>