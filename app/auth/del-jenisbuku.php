<?php 
	$kd_jenis = $_GET['kd-jenis'];

	$data = $app->getJenisBuku($kd_jenis);
	$app->delJenisBuku($kd_jenis);
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
			Buku dengan jenis : <?=$data['jenis_buku'] ?> berhasi di delete
        </div>
     </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->