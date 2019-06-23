<?php 
	$kd_penerbit = $_GET['kd-penerbit'];

	$data = $app->getPenerbit($kd_penerbit);
	$app->delPenerbit($kd_penerbit);
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
			Buku dengan jenis : <?=$data['penerbit'] ?> berhasi di delete
        </div>
     </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->