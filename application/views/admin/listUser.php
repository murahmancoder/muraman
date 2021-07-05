
<div class="container mt-5">
<div id="border">
   
   <?php if($this->session->flashdata('pesan')) :?>
      <div class="<?=$this->session->flashdata('alert')?> alert-dismissible fade show" role="alert">
      <?=$this->session->flashdata('pesan')?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
   <?php endif;?>

<table class="table table-striped table-bordered table-hover" id="table">
<thead>
    <tr class="font-weight-bold">
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <?php if($userAktif->status == 'Super Admin'){?>
        <th class="text-center">Aksi</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
<?php $i=1; foreach ($listUser as $user) { ?>
    <tr class="odd gradeX">
        <td><?= $i ?></td>
        <td><?= $user->nama ;?></td>
        <td><?= $user->email ;?></td>
        <?php if($userAktif->status == 'Super Admin'){?>
        <td class="text-center">
        <!-- <a href="<?= base_url('administrasi/edit/'.$user->id_user); ?>"class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?= base_url('administrasi/hapus/'.$user->id_user); ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ini');"><i class="fa fa-trash"></i></a> -->
        <div class="text-center" >
            <form action="<?=base_url('administrasi/edit')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$user->id_user?>">
               <button type="submit" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></button>
            </form>
            <form action="<?=base_url('administrasi/hapus')?>" method="post" style="display: inline-block;">
               <input type="hidden" name="id" value="<?=$user->id_user?>">
               <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ini')"><i class="fa fa-trash"></i></button>
            </form>
            </div>
    
        </td>
        <?php } ?>
    </tr>
<?php $i++; } ?>
</tbody>
</table>
</div>
</div>