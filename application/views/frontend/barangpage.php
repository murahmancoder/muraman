<div class="container geser-atas">
   <div class="row mt-4">
      
         <div class="col-lg-3 mt-3">   
            <h5 class="card-header text-white" style="background-color: #00334e;" >Kategori</h5>
            <div class="list-group list-group-flush">
               <?php foreach ($listKategoriBarang as $kategori) :?>
                  <a href="<?=base_url('toko/kategori/'.$kategori->slug_kategori)?>" class="list-group-item list-group-item-action">
                     <div class="media">
                        <div class="media-body mt-1">
                           <h6><?=$kategori->kategori_brg?></h6>
                        </div>
                     </div>
                  </a>
               <?php endforeach;?>
            </div>
            <a class="float-leftt" href="<?=base_url('toko/AllkategoriBarang')?>">Lihat Semua ➜</a>        
         </div>



   
              
                  <div class="col-lg-9">
                     <div class="row mt-3" id="border">
                        <div class="col-md-6">
                           <img src="<?=base_url('assets/uploads/toko/'.$barang->gambar)?>" class="img-fluid" width="600px" height="400px">
                           <div class="mt-2">
                              <a href="<?=base_url('toko/keranjang/'.$barang->slug_barang)?>" class=" d-block btn btn-warning text-white font-weight-bold"><i class="fas fa-shopping-cart"></i> Tambah</a>
                              <a href="<?=base_url('toko/beli_langsung/'.$barang->slug_barang)?>" class="d-block btn btn-danger font-weight-bold mt-2">Beli langsung</a>
                           </div>
                        </div>
                        <div class="col-md-6">

                           <h1><?=$barang->barang?></h1>
                           <p class="badge badge-primary font-weight-bold">Kategori : <?=$barang->kategori_brg?></p>
                           <p class="badge badge-warning font-weight-bold">Stok : <?=$barang->stok?></p>
                           <p class="badge badge-success font-weight-bold">Berat : <?=$barang->berat?> Gr</p>
                           <h5 class="bg bg-dark text-white p-2">Rp. <?=number_format($barang->harga,'0',',','.')?></h5>

                           <div class="card border-0">
                              <h6 class="card-header ">
                                 Deskripsi Produk 
                              </h6>
                              <div class="card-body">
                                 <?=$barang->deskripsi?>
                              </div>
                           </div>
                           
                        </div>
                     </div>

                   
                  </div>
              
            </div>
              
       </div>


         
        




      
    </div>
