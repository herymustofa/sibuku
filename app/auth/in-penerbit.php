<?php 
	if(isset($_POST['submit'])) {
		$penerbit = $_POST['penerbit'];
		$alamat = $_POST['alamat'];
		$app->inputPenerbit($penerbit, $alamat);
		$message = $app->getLastmessage();
	}
	

 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Input Penerbit Buku
        </div>
        <div class="card-body">
			<form action="" method="post">
			  <div class="form-group row">
			    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="input penerbit" required="required">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="input alamat" required="required">
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