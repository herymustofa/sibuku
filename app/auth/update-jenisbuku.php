<?php 
	$kd_jenis = $_GET['kd-jenis'];
	$data = $app->getJenisBuku($kd_jenis);
	//var_dump($data);

	if(isset($_POST['submit'])) {
		$kd_jenis = $_POST['kd-jenis-buku'];
		$jenisbuku = $_POST['jenis-buku'];
		$desbuku = $_POST['des-buku'];
		$app->updateJenisBuku($kd_jenis, $jenisbuku, $desbuku);
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
			    <label for="jenis-buku" class="col-sm-2 col-form-label">Kode Jenis</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="kd-jenis-buku" name="kd-jenis-buku" value="<?=$data['kd_jenis']?>" disabled>
			      <input type="text" class="form-control" id="kd-jenis-buku" name="kd-jenis-buku" value="<?=$data['kd_jenis']?>" hidden>
			    </div>
			  </div>				
			  <div class="form-group row">
			    <label for="jenis-buku" class="col-sm-2 col-form-label">Jenis Buku</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="jenis-buku" name="jenis-buku" required="required" value="<?=$data['jenis_buku'] ?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="des-buku" class="col-sm-2 col-form-label">Deskripsi</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="des-buku" name="des-buku" required="required" value="<?=$data['deskripsi'] ?>">
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