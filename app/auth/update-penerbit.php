<?php 
	$kd_penerbit = $_GET['kd-penerbit'];
	$data = $app->getPenerbit($kd_penerbit);
	//var_dump($data);

	if(isset($_POST['submit'])) {
		$kd_penerbit = $_POST['kd-penerbit'];
		$penerbit = $_POST['penerbit'];
		$alamat = $_POST['alamat'];
		$app->updatePenerbit($kd_penerbit, $penerbit, $alamat);
		$message = $app->getLastmessage();
	}
	

 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Update Jenis Buku
        </div>
        <div class="card-body">
			<form action="" method="post">
			  <div class="form-group row">
			    <label for="penerbit" class="col-sm-2 col-form-label">Kode Penerbit</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="kd-penerbit" name="kd-penerbit" value="<?=$data['kd_penerbit']?>" disabled>
			      <input type="text" class="form-control" id="kd-penerbit" name="kd-penerbit" value="<?=$data['kd_penerbit']?>" hidden>
			    </div>
			  </div>				
			  <div class="form-group row">
			    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="penerbit" name="penerbit" required="required" value="<?=$data['penerbit'] ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="des-buku" class="col-sm-2 col-form-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="alamat" name="alamat" required="required" value="<?=$data['alamat'] ?>">
			    </div>
			  </div>
			  <button type="submit" name="submit" class="btn btn-warning mb-2">Update</button>	
			  			  	    <?php if (isset($message)) : ?>
                      <div class="alert alert-danger" role="alert">
                        <?=$message ?>
                      </div>
                    <?php endif ?>				  
			</form>
        </div>
     </div>

</div>
<!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->