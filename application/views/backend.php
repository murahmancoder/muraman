<?php
// karena ini dipake disemua controler jadi hanya sekali di load disini
$userAktif=$this->M_User->detail($this->session->userdata('user_id'));
$site= $this->M_Konfigurasi->get();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <link href="<?=base_url('assets/icon/'.$site->icon) ?>" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css'); ?>" />

    <!-- JS -->
   <script src="<?=base_url('assets/js/ckeditor/ckeditor.js');?>" ></script>
   <script src="<?=base_url('assets/js/ckfinder/ckfinder.js');?>" ></script>
   <script src="<?=base_url('assets/js/Chart.js')?>"></script>
   
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-atas">
      <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-info">
         <i class="fas fa-align-left"></i>
      </button>
      <a href="#" class="navbar-brand menu-item"><?=$site->namaweb?></a>
         <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
               <li class="nav-item ">
                  <a class="nav-link btn btn-success text-white menu-icon" href="<?=base_url('profile')?>">  <i class="fas fa-user-tie"></i><span class="ml-2"><?=$userAktif->nama??''?></span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link btn btn-primary text-white menu-icon" href="<?=base_url()?>" target="blank"><i class="fas fa-home"></i><span class="ml-2">HomePage</span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link btn btn-danger text-white menu-icon" href="<?=base_url('logout');?>"><i class="fas fa-sign-out-alt"></i><span class="ml-2">Logout</span></a>
               </li> 
            </ul>
         </div>
      </div>
   </nav>


   
         <nav id="sidebar">
         <ul class="list-unstyled">
         <?php if ($this->M_User->detail($this->session->userdata('user_id'))->status !== 'User'){ ?>
               <li><a href="<?=base_url('dashboard');?>" class="<?=menuAktif('dashboard')?>"><i class="fas fa-tachometer-alt fa-fw"></i><span class="ml-3">DASHBOARD</span></a></li>
               <?php if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'Super Admin'){ ?>
               <li><a href="#olshop" data-toggle="collapse" class="dropdown-toggle <?= ($this->uri->segment(1) == 'toko' ) ? 'active' :''; ?>" aria-expanded="false"><i class="fas fa-store-alt"></i><span class="ml-3">TOKO ONLINE</span></a>
                  <ul class="collapse list-unstyled" id="olshop">
                     <li><a href="<?=base_url('toko-admin');?>" class="<?=subMenuAktif('index')?>"><i class="fa fa-check-square"></i><span class="ml-3">DI KONFIRMASI</span></a></li>
                     <li><a href="<?=base_url('toko/kategori-barang');?>" class="<?=subMenuAktif('listKategoriBarang')?>"><i class="fas fa-tag"></i><span class="ml-3">KATEGORI PRODUK</span></a></li>
                     <li><a href="<?=base_url('toko/barang');?>" class="<?=subMenuAktif('listBarang')?>"><i class="fas fa-boxes"></i><span class="ml-3">PRODUK</span></a></li>
                     <li><a href="<?=base_url('toko/banner');?>" class="<?=subMenuAktif('listBanner')?>"><i class="fas fa-flag"></i><span class="ml-3">BANNER</span></a></li>
                     <li><a href="<?=base_url('toko/tarif');?>" class="<?=subMenuAktif('listTarif')?>"><i class="fas fa-shipping-fast"></i><span class="ml-3">ONGKIR</span></a></li>
                     <li><a href="<?=base_url('toko/pembayaran');?>" class="<?=subMenuAktif('listPembayaran')?>"><i class="fas fa-money-check"></i><span class="ml-3">OPSI PEMBAYARAN</span></a></li>
                  </ul>
               </li>
               <?php } ?>
               <li><a href="#artikel" data-toggle="collapse" class="dropdown-toggle <?= ($this->uri->segment(1) == 'artikel' || $this->uri->segment(1) == 'kategori' ) ? 'active' :''; ?>" aria-expanded="false"><i class="fas fa-newspaper"></i><span class="ml-3">ARTIKEL</span></a>
               <ul class="collapse list-unstyled" id="artikel">
                  <li><a href="<?=base_url('kategori');?>" class="<?=menuAktif('kategori')?>"><i class="fa fa-tags"></i><span class="ml-3">KATEGORI ARTIKEL</span></a></li>
                  <li><a href="<?=base_url('artikel');?>" class="<?=menuAktif('artikel')?>"><i class="fas fa-list"></i><span class="ml-3"> ARTIKEL</span></a></li>
               </ul>
            </li>
            <li><a href="<?=base_url('visitor');?>" class="<?=menuAktif('visitor')?>"><i class="fas fa-chart-bar"></i><span class="ml-3">VISITOR</span></a></li>
            <li><a href="<?=base_url('administrasi');?>" class="<?=menuAktif('administrasi')?>"><i class="fas fa-user-cog"></i><span class="ml-3">USER</span></a></li>
         <?php }?>
            <li><a href="<?=base_url('pesanan');?>" class="<?=menuAktif('pesanan')?>"><i class="fas fa-shopping-bag"></i> <span class="ml-3">PESANAN</span></a></li>
            <?php if($userAktif->status == 'Super Admin'){ ?>
            <li><a href="<?=base_url('konfigurasi');?>" class="<?=menuAktif('konfigurasi')?>"><i class="fas fa-tools"></i><span class="ml-3">KONFIGURASI</span></a></li>
            <?php } ?>
            </ul>
            </ul>
         </nav>

         
      <!-- CONTENT -->
      <div id="content">   
         <?php 
            if($isi){
               $this->load->view($isi);
            }else{
               echo "
                  <h1>Data Masih Kosong </h1>
               ";
            }
         ?>   
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js');?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/DataTables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script>
      //  CKEDITOR
      var editor = CKEDITOR.replace('editor');
         CKFinder.setupCKEditor(editor);


      //FILE BROWSER 
       $('document').ready(function(){
         $('#table').DataTable();

         $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            // SIDEBAR
          $('#sidebarCollapse').click(function(){
             $('#sidebar').toggleClass('active');
             $('#content').toggleClass('active');
          });
       });
    </script>
  </body>
</html>