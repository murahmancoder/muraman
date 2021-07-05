<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="description" content="<?=$metatext??''?>">
    <meta name="keywords" content="<?=$keywords??''?>">
    <meta name="author" content="<?=$site->namaweb?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=base_url('assets/icon/'.$site->icon) ?>" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css')?>">
    
  </head>
  <body style="background-color: #eeeeee;">

   <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00334e;">
      <a href="<?=base_url()?>" class="navbar-brand menu-item" >
            <img src="<?=base_url('assets/icon/'.$site->icon)?>" width="30" height="30">
         <span class="navbar-brand menu-item"><?= $site->namaweb?></span> 
       </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul id="frontend" class="navbar-nav ml-auto" >
               <li class="nav-item">
                  <a class="nav-link text-white menu-item " href="<?=base_url()?>">HOME</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white menu-item  <?= subMenuAktif('artikel')?> <?= $this->uri->segment('1') == 'Allkategori' ? subMenuAktif('Allkategori'):''?>" href="<?=base_url('#artikel')?>">ARTIKEL</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white menu-item" href="<?=base_url('toko')?>">TOKO</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white menu-item" href="<?=base_url('toko/belanja')?>"><i class="fas fa-shopping-cart"></i> <div class="<?= $this->cart->total_items() ? 'badge badge-warning text-white' : ''?>"><?= $this->cart->total_items() != 0 ?$this->cart->total_items():''?> </div></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white menu-item" href="<?=base_url('login')?>">LOGIN</a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link text-white menu-item" href="<?=base_url('register')?>">REGISTER</a>
               </li> -->
         </ul>
         </div>    
   </nav>


         <?php if($isi){
            $this->load->view($isi);
         }else{
            echo"<h1>Data Kosong</h1>";
         }
         ?>
  

         
  
    <footer class="py-5 mt-5" style="background-color: #00334e;">
       <div class="container">
         <div class="row">
            <div class="col-md-12 text-center text-white">
               <p class="mt-3 text-white">Copyright &copy; <?=$site->namaweb?> 2020</p>
               <h4>SOSIAL MEDIA</h4><br>
               <a href="<?=$site->fb?>" class="mr-3"><i class="fab fa-facebook fa-2x" style="color:white;"></i></a> 
               <a href="<?=$site->ig?>"><i class="fab fa-instagram fa-2x" style="color:white;"></i></a>
            </div>
         </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js')?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script>
      $(".carousel").carousel({
         interval:2000
      });
   </script>

  </body>