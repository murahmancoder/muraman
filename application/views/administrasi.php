<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <title><?=$title;?></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="<?=base_url('assets/icon/'.$site->icon) ?>" rel="shortcut icon">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">


</head>
<body class="bg-dark">

   <?php if($isi){
            $this->load->view($isi);
         }else{
            echo"<h1>Data Kosong</h1>";
         }
   ?>


</body>
</html>