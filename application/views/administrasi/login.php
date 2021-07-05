<div class="container">

<div class="row mt-5">
   <div class="col-md-4 offset-md-4">

   <div class="card">
         <div class="card-header font-weight-bold text-center">
            LOGIN
         </div>
         <div class="card-body">
            <?php
               if($this->session->flashdata('pesan')){
                  $alert = $this->session->flashdata('alert');
                  echo '<div class="alert ' . $alert . '">' . $this->session->flashdata('pesan') .  '</div>';
               }
            ?>
          <form action="<?= base_url('login')?>" method="post">
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" id="email" name="email" >
               <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password" >
               <small class="form-text text-danger"><?= form_error('password'); ?></small>
            </div>
            <p>Belum Registrasi klik <a href="<?=base_url('registrasi')?>">disini</a> </p>
            <button type="submit" name="login" class="btn btn-primary float-right">Login</button>
            </form>
         </div>
         </div>
      
   </div>
</div>

</div>