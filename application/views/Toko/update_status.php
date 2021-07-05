<div class="container mt-5">

      <div class="card">
      <h5 class="card-header text-center text-uppercase"><?=$title?></h5>
            <div class="card-body">
             <form action="" method="post" >
              <div class="row"> 
               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">ID-Pemesanan</label>
                  <input type="text"  name="id" class="form-control" value="<?=$pesanan->id?>" readonly>
               </div>

               <div class="form-group col-md-12">
                  <label  class="font-weight-bold">Status Pemesanan</label> 
                  <select name="status" class="form-control" required>
                     <?php foreach($arrayStatus as $key => $value){
                        if($pesanan->status_pesanan == $key){
                           echo"<option value='$key' selected='true'>$value</option>";
                        }else{
                           echo"<option value='$key'>$value</option>";
                        }
                     }?>
                  </select>
               </div>

               <div class="form-group col-md-12">
                  <button type="submit" name="simpan" class="btn btn-primary float-right mr-1">Update</button>
               </div>
               </div>
               </form>
               
            </div>
         </div>
         
    

</div>