<div id="border">
<h3 class="panel panel-back mt-5 " style="padding: 10px;">DASHBOARD PAGE</h3>
<div class="row mt-3">
<!-- User -->
<div class="col-md-3 col-sm-6">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-danger text-white set-icon">
            <i class="fa fa-user"></i>
        </span>
        <div class="text-box" >
            <a href="<?=base_url('administrasi')?>">
                <p>User</p>
                <span class="badge badge-info"><?= $user?></span>
            </a>
        </div>
    </div>
</div>


<!-- Artikel -->
<div class="col-md-3 col-sm-6">           
	<div class="panel panel-back noti-box">
		<span class="icon-box bg-color-purple set-icon"><i class="fa fa-newspaper 2x"></i></span>
		<div class="text-box" >
			<a href="<?=base_url('visitor')?>">
					<p>Artikel</p>
					<span class="badge badge-info"><?= $artikel?></span>
			</a>
		</div>
	</div>
</div>



<!-- Kategori -->
<div class="col-md-3 col-sm-6 ">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-blue set-icon">
            <i class="fa fa-tags 2x"></i>
        </span>
        <div class="text-box" >
        <a href="<?=base_url('kategori')?>">
            <p>Kategori</p>
            <span class="badge badge-info"><?= $kategori?></span></a>
        </div>
    </div>
</div>



<!-- Views -->
<div class="col-md-3 col-sm-6 ">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-warning text-white set-icon">
            <i class="fas fa-eye 2x"></i>
        </span>
        <div class="text-box" >
        <a href="<?=base_url('visitor')?>">
            <p>Views</p>
            <span class="badge badge-info">
					<?php $subtotal=0; foreach ($listVisitor as $v ){
						$subtotal +=$v['views'];
					} 
					echo $subtotal; ?>
				</span>
        </a>
        </div>
    </div>
</div>
<?php if ($this->M_User->detail($this->session->userdata('user_id'))->status == 'Super Admin'){ ?>
<!-- Konfirmasi -->
<div class="col-md-6 col-sm-6 mt-4">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-success text-white set-icon">
            <i class="fa fa-check-square 2x"></i>
        </span>
        <div class="text-box" >
        <a href="<?=base_url('admin/toko')?>">
            <p>Pembayaran Yang Dikonfrimasi</p>
            <span class="badge badge-danger"><?= $konfirmasi?></span></a>
        </div>
    </div>
</div>

<!-- Pesanan -->
<div class="col-md-6 col-sm-6 mt-4">           
    <div class="panel panel-back noti-box">
        <span class="icon-box bg-primary text-white set-icon">
            <i class="fas fa-shopping-bag 2x"></i>
        </span>
        <div class="text-box" >
        <a href="<?=base_url('admin/toko')?>">
            <p>Pesanan (Sudah & Belum Bayar)</p>
            <span class="badge badge-danger"><?= $pesanan?></span></a>
        </div>
    </div>
</div>


<?php } ?>

<div class="col-md-12 mt-4">
	<hr>
	<div class="widget mt-3 ">
		<div class="widget-header">
			<h3>Statistik Website</h3>
		</div>
		<div class="tengah">	
			<canvas id="myChart"  class="chart-holder" height="250" width="450"></canvas>
		</div>
	</div>
</div>

</div>



<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
                   <?php foreach ($statistik as $statis):?>
                     	"<?=$statis['judul']?>",
                   <?php endforeach;?>    
                ],
				datasets: [{
					label: '10 Artikel populer',
					data: [
                        <?php foreach ($statistik as $statis):?>
                            "<?=$statis['views']?>",
                        <?php endforeach;?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    



