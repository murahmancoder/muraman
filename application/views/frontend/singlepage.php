<div class="container">
   <div class="row">

   <div class="col-lg-8 mt-4" style="background-color: white;">

      <h1 class="mt-4"><?=$artikel->judul?></h1> <hr>
      <p>Posted on <?=$artikel->tanggal_post?> By <?=$artikel->penulis?></p> <hr>
      <img src="<?=base_url('assets/uploads/'.$artikel->gambar)?>" class="img-fluid mb-2" alt="" width="760px" height="300px">
      <div class="mt-4">
       <?=$artikel->content?>
      </div>
   </div>

   <div class="col-lg-4">
             <!-- search widget -->
             <div class="card my-4">
                <h5 class="card-header text-white" style="background-color: #00334e;" >Search</h5>
                <div class="card-body">
                   <div class="input-group">
                      <form action="<?=base_url('cari')?>" method="post" class="form-inline">
                         <input type="search" class="form-control mr-2" name="keyword" placeholder="Search...">
                         <button class="btn text-white" type="submit" style="background-color: #40a8c4;">Cari</button>
                      </form>
                   </div>
                </div>
             </div>


           <div class="card border-1">
            <h5 class="card-header text-white" style="background-color: #00334e;" >Artikel Populer</h5>
            <div class="list-group list-group-flush">
            <?php foreach($listPopuler as $populer):?>
               <a href="<?=base_url('artikel/'.$populer->slug_judul)?>" class="list-group-item list-group-item-action">
                  <div class="media">
                     <img class="img img-fluid mr-3" src="<?=base_url('assets/uploads/'.$populer->gambar)?>" data-sizes="auto" width="25%%" height="15%">
                     <div class="media-body ">
                        <h6><?=$populer->judul?></h6>
                     </div>
                  </div>
               </a>
            <?php endforeach;?>
            </div>
           </div>
         </div>




       </div>
    </div>

