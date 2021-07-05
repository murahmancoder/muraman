<div class="container">

<div class="row mt-5">
   <div class="col-md-4 offset-md-4">

   <div class="card">
         <div class="card-header font-weight-bold text-center">
            REGISTRASI AKUN
         </div>
         <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
               <label for="nama">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama');?>">
               <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email');?>">
               <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" >
               <small class="form-text text-danger"><?= form_error('password'); ?></small>
            </div>
            <div class="form-group">
               <label for="konfirmasipw">Konfirmasi Password</label>
               <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" >
               <small class="form-text text-danger"><?= form_error('konfirmasi'); ?></small>
            </div>
           
            <button type="submit" name="register" class="btn btn-primary float-right">Daftar</button>
            </form>
         </div>
         </div>
      
   </div>
</div>

</div>