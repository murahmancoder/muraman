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
            <div class="row mt-3">

               <div class="col-md-12">
                  <div class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                     <?php $i=1; foreach ($banner as $bnr){?>
                           <div class="carousel-item <?= $i == 1 ?'active':''?>">
                              <a href="<?=$bnr->link?>">
                                 <img src="<?=base_url('assets/uploads/banner/'.$bnr->gambar)?>"  >
                              </a>
                           </div>
                        <?php $i++; } ?>

                     </div>
                    </div>
                  </div>




               <div class="col-md-12 mt-3">
               <form action="<?=base_url('toko/cari')?>" method="post">
                  <div class="input-group mb-3">
                     <input type="search" class="form-control mr-2" placeholder="Search ... " name="keyword" value="<?=set_value('keyword',$this->input->post('keyword')??false)?>">
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-search"></i></button>
                     </div>
                  </div>
               </form>
               </div>
              
               <?php foreach ($listBarang as $barang) : ?>
                  <div class="col-md-4">
                     <div class="card card-shadow border-1 rounded mb-4">
                     <a href="">
                        <img src="<?=base_url('assets/uploads/toko/'.$barang->gambar)?>" class="img-fluid" width="600px" height="400px">
                     </a>
                        <div class="card-body text-center">
                           <a href="<?=base_url('toko/barang/'.$barang->slug_barang)?>" class="text-decoration-none">
                              <h5 class="card-text text-dark mb-1"><?=$barang->barang?></h5>
                           </a>
                           <small class="font-weight-bold mt-1">Stok : <?=$barang->stok?></small> <br>
                           <p class="badge badge-info p-1 mt-1">Rp. <?=number_format($barang->harga,'0',',','.')?></p>
                           <div class="tengah">
                              <a href="<?=base_url('toko/keranjang/'.$barang->slug_barang)?>" class="text-decoration-none badge badge-warning text-white p-2 mr-2"><i class="fas fa-shopping-cart"></i> Tambah </a>
                              <a href="<?=base_url('toko/barang/'.$barang->slug_barang)?>" class="text-decoration-none  badge badge-danger p-2 "><i class="fab fa-product-hunt"></i> Detail Produk</a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endforeach;?>
            </div>
         <?= $this->pagination->create_links();?>        
       </div>


         
        




       </div>
    </div>
