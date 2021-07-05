<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="" method="post" >
              <div class="row"> 
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Nama Account</label>
                  <input type="text"  name="nama" class="form-control" value="<?= set_value('nama');?>">
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">No Rekening</label> 
                  <input type="text"  name="no_rekening" class="form-control" value="<?= set_value('no_rekening');?>" required>
                  <small class="text-info">Jangan Pakai tanda baca (.,) titik dan koma</small>
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Tanggal Transfer - (Tahun - Bulan - Tanggal)</label> 
                  <input type="text"  name="tanggal" placeholder="Contoh : 2020-12-20"class="form-control" value="<?= set_value('no_rekening');?>" required>
               </div>
               
               <div class="form-group col-md-12">
                  <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1">Konfirmasi</button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>