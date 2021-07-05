<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="<?=$action;?>" method="post" >
              <div class="row">
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Kota</label>
                  <input type="text"  name="kota" class="form-control" value="<?= set_value('kota', $ongkir->kota ?? '');?>" required>
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Tarif</label> 
                  <input type="number"  name="tarif" class="form-control" value="<?= set_value('tarif', $ongkir->tarif ??'');?>" required>
                  <small class="text-info">Jangan Pakai tanda baca (.,) titik dan koma</small>
               </div>
               
               <div class="ml-3">
               <p class="font-weight-bold" >Status Tarif</p>
                  <div class="form-check d-inline mr-4" >
                     <input class="form-check-input" type="radio" name="status" value="ON" <?= $title == 'Edit Tarif' && $ongkir->status == 'ON' ?'checked' :''?>>
                     <label class="form-check-label">
                        ON
                     </label>
                  </div>
                     <div class="form-check d-inline"  style="display: inline-block;">
                     <input class="form-check-input" type="radio" name="status" value="OFF" <?= $title == 'Edit Tarif' && $ongkir->status == 'OFF' ?'checked' :''?>>
                     <label class="form-check-label">
                        OFF
                     </label>
                  </div>
                  <small class="form-text text-danger"><?= $title == 'Edit Tarif' ?'': form_error('status'); ?></small>
               </div>

               <input type="hidden" name='id' value="<?= $ongkir->id_ongkir ?? '';?>"> 
               <div class="form-group col-md-12">
                  <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1"><?=$button;?></button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>