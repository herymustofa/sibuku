<?php 
	if(isset($_POST['submit'])) {
		$jenisbuku = $_POST['jenis-buku'];
		$desbuku = $_POST['des-buku'];
		$app->inputJenisBuku($jenisbuku, $desbuku);
		$message = $app->getLastmessage();
	}
	

 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Input Jenis Buku
        </div>
        <div class="card-body">
			<form action="" method="post">
			  <div class="form-group row">
			    <label for="jenis-buku" class="col-sm-2 col-form-label">Jenis Buku</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="jenis-buku" name="jenis-buku" placeholder="input jenis buku" required="required">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="des-buku" class="col-sm-2 col-form-label">Deskripsi</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="des-buku" name="des-buku" placeholder="input deskripsi buku" required="required">
			    </div>
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary mb-2">Save</button>	
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