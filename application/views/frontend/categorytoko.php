<div class="container mt-4" >

         <div class="text-center mb-3">
            <h2>Kategori Barang</h2>
               <p>kategori barang dari kami</p>
            <hr>
         </div>

         <div class="row mb-4 mt-3 " id="border">

            <?php foreach ($listKategoriBarang as $kategori) : ?>
               <div class="col-md-3 col-sm-6 text-center mb-2">
                     <a href="<?=base_url('toko/kategori/'.$kategori->slug_kategori) ?>" class="list-group-item list-group-item-action bg-info">  
                        <h6 class="card-text font-weight-bold text-white"><?= $kategori->kategori_brg?></h6>
                     </a>
               </div>
            <?php endforeach;?>
            
          <!-- /row -->
         </div>
</div>