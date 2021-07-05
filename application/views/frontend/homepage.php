<div class="jumbotron jumbotron-fluid text-white" style="background-color:#40a8c4;">
      <div class="container text-center">
        <h1 class="display-4">Hello, Selamat datang</h1>
        <p class="lead"><?=$site->tagline?></p>
        <div class="tengah">
            <div class="input-group tengah">
               <form action="<?=base_url('cari')?>" method="post" class="form-inline" >
                  <input type="search" class="form-control form-control-sm mr-2" name="keyword" placeholder="Search...">
                  <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
        </div>
      </div>
</div>


    <div class="container geser-atas">
       <div class="row mt-2">
          <div class="col-lg-9">
             <h2 id="artikel">Artikel Terbaru <?=$namaKategori ??''?></h2>
             <p class="ml-1">Baca Artikel Terbaru dari kami</p><hr>
               <div class="row">
               <?php foreach ($listArtikel as $artikel) : ?>
                  <div class="col-md-4">
                     <div class="card card-shadow border-1 rounded mb-4">
                        <img src="<?=base_url('assets/uploads/'.$artikel->gambar)?>" class="img-fluid" width="600px" height="400px">
                        <div class="card-body">
                           <a href="<?=base_url('kategori/'.$artikel->slug_kategori)?>" class="text-decoration-none badge badge-primary">#<small class="card-title font-weight-bold"><?=$artikel->kategori?></small></a>
                           <a href="<?=base_url('artikel/'.$artikel->slug_judul)?>" class="text-decoration-none">
                              <h6 class="card-text text-dark mt-2"><?=$artikel->judul?></h6>
                           </a>
                        </div>
                     </div>
                  </div>
               <?php endforeach;?>
            </div>
         <?= $this->pagination->create_links();?>        
       </div>


          <div class="col-lg-3 mt-3">   
            <h5 class="card-header text-white" style="background-color: #00334e;" >Kategori artikel</h5>
            <div class="list-group list-group-flush">
               <?php foreach ($listKategori as $kategori) :?>
                  <a href="<?=base_url('kategori/'.$kategori->slug_kategori)?>" class="list-group-item list-group-item-action">
                     <div class="media">
                        <img class="img-fluid mr-3" src="<?=base_url('assets/uploads/'.$kategori->gambar)?>" data-sizes="auto" width="15%%" height="20%">
                        <div class="media-body mt-1">
                           <h6><?=$kategori->kategori?></h6>
                        </div>
                     </div>
                  </a>
               <?php endforeach;?>
            </div>
            <a class="float-right" href="<?=base_url('Allkategori')?>">Lihat Semua ➜</a>        
           </div>
        




       </div>
    </div>
