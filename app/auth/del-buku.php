<?php 
	$kd_buku = $_GET['kd-buku'];

	$data = $app->getBuku($kd_buku);
	$app->delBuku($kd_buku);
	$message = $app->getLastmessage();
	
	

 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Delete Jenis Buku
        </div>
        <div class="card-body">
		  		<?php if (isset($message)) : ?>
            <div class="alert alert-danger" role="alert">
              <?=$message ?>
            </div>
          <?php endif ?>	
			Buku dengan jenis : <?=$data['judul'] ?> berhasil di delete
        </div>
     </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->