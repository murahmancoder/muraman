
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

   <div class="row mb-3">
      <div class="col-md-12">
         <a href="<?=base_url('artikel/tambah')?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> ARTIKEL</a>
      </div>
   </div>
   
<table class="table table-striped table-bordered table-hover" id="table">
<thead>
    <tr class="font-weight-bold">
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Pengunjung</th>
        <th>Penulis</th>
        <?php if($userAktif->status == 'Super Admin'){?>
        <th class="text-center">Action</th>
        <?php } ?>
    </tr>
</thead>
<tbody>
<?php $i=1; foreach ($listVisitor as $visitor) { ?>
    <tr class="odd gradeX">
        <td><?= $i ?></td>
        <td><?= $visitor['judul'] ;?></td>
        <td><?= $visitor['views'] ;?>x dilihat</td>
        <td><?= $visitor['penulis'] ;?></td>

        <?php if($userAktif->status == 'Super Admin'){?>
            <td class="text-center">
                <a href="<?= base_url('visitor/hapus/'.$visitor['id_visitor'] ); ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ini');"><i class="fa fa-trash"></i></a>
            </td>
        <?php } ?>
    </tr>
<?php $i++; } ?>
</tbody>
</table>
</div>
</div>