<div class="container mt-5">


   <div class="card ">
         <div class="card-header font-weight-bold text-center">
            <?=$title?>
         </div>
        
         <div class="card-body">
          <form action="<?=$action?>" method="post">
            
            <input type="hidden" name="id" value="<?= $user->id_user; ?>">
            <div class="col-auto">
               <?php if($this->session->flashdata('gagal')) { 
                  echo '<div class="alert alert-danger">';
                  echo $this->session->flashdata('gagal');
                  echo '</div>';
               } ?>
            </div>

            <div class="col-auto">
               <label class="sr-only" for="inlineFormInputGroup">Nama</label>
               <div class="input-group mb-2">
               <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-tag"></i></div>
               </div>
               <input type="text" class="form-control" id="inlineFormInputGroup" name="nama" placeholder="Nama"  required  value="<?= $user->nama; ?>">
               </div>
            </div>

            <div class="col-auto">
               <label class="sr-only" for="inlineFormInputGroup">Email</label>
               <div class="input-group mb-2">
               <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
               </div>
               <input type="email" class="form-control" id="inlineFormInputGroup" name="email" placeholder="Alamat email" required value="<?= $user->email; ?>">
               </div>
            </div>

            <div class="col-auto">
               <label class="sr-only" for="inlineFormInputGroup">Password</label>
               <div class="input-group mb-2">
               <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-key"></i></div>
               </div>
               <input type="hidden" name="passwordLama" value="<?= $user->password; ?>">
               <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Ketik password baru jika ingin diganti atau biarkan kosong" name="password" >
               </div>
            </div>

            <div class="col-auto">
               <label class="sr-only" for="inlineFormInputGroup">Status</label>
               <div class="input-group mb-2">
               <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-eye"></i></div>
               </div>
               <?php if($userAktif->status == 'Admin' || $userAktif->status == 'User'){?>
                  <input type="text" name="status" class="form-control" placeholder="status" required value="<?= $user->status; ?>" readonly disabled>
               <?php }else{?>
                  <select name="status" class="form-control">
                     <option value="Admin">Admin</option>
                     <option value="Super Admin" <?php if( 'Super Admin'== $user->status) {echo"selected";}?>>Super Admin</option>
                  </select>
               <?php }?>               
               </div>
            </div>        
   
           
            <input type="submit" name="submit" value="Simpan" class="btn btn-primary ml-3">
            
         </form>
        
      
   </div>
</div>

</div>
