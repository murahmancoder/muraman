
   <div class="container mt-5" >
   <form action="<?=base_url('cari')?>" method="post">
      <div class="input-group mb-3">
         <input type="search" class="form-control" placeholder="Cari Judul Artikel..." name="keyword" value="<?=set_value('keyword',$this->input->post('keyword')??false)?>">
         <div class="input-group-append">
            <button class="btn btn-primary" type="submit" >cari</button>
         </div>
      </div>
   </form>
        
    

      <?php if($keyword == '' || empty($keyword)) { ?>
         <div class="alert alert-danger" role="alert">
            Data tidak ditemukan !
         </div>
      <?php }
      else {?>
      <div id="post mt-4">
      <?php foreach($keyword as $k) { ?>
         <div class="media mb-4" id="border">
            <img src="<?= base_url('assets/uploads/'.$k->gambar)?>" class="img-fluid" alt="..." style="width: 20%">
            <div class="media-body" >
               <a href="<?=base_url('kategori/'.$k->slug_kategori)?>" class="btn btn-info ml-3"><?= $k->kategori?></a>
               <a href="<?=base_url('artikel/'.$k->slug_judul)?>" class="list-group-item list-group-item-action  border-0">
                  <h1><?= $k->judul?> </h1>
                  <p><?= word_limiter($k->content, 30); ?></p>
               </a>
            </div>
         </div>
      <?php }?>
      </div>
   <?php }?>
</div>