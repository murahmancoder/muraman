<div class="container mt-4" >

         <div class="text-center mb-3">
            <h2>Kategori Artikel</h2>
               <p>Baca artikel sesuai kategori dari kami</p>
            <hr>
            <!-- <div class="tengah">
            <div class="input-group tengah">
               <form action="<?=base_url('cari')?>" method="post" class="form-inline" >
                  <input type="search" class="form-control form-control-sm mr-2" name="keyword" placeholder="Cari Kategori...">
                  <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
            </div> -->
         </div>

         <div class="row mb-4 mt-3 " id="border">

            <?php foreach ($listKategori as $kategori) : ?>
               <div class="col-md-3 col-sm-6 text-center mt-4">
                 
                     <a href="<?=base_url('kategori/'.$kategori->slug_kategori) ?>" class="list-group-item list-group-item-action border-0">
                        <img src="<?=base_url('assets/uploads/'.$kategori->gambar)?>" class="img-fluid" width="75%" >
                        <h6 class="card-text font-weight-bold mt-2"><?= $kategori->kategori?></h6>
                        <p class="mt-3"><?=$kategori->keterangan?></p>
                     </a>
                  
               </div>
            <?php endforeach;?>
            
          <!-- /row -->
         </div>
</div>