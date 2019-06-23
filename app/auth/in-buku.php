<?php 
	$dataJenis = $app->getAllJenisBuku();
	$dataPenerbit = $app->getAllPenerbit();

	//var_dump($jenis);

	if(isset($_POST['submit'])) {
		$judul = $_POST['judul'];
		$jenis = $_POST['jenis'];
		$penerbit = $_POST['penerbit'];
		$tahun_terbit = $_POST['tahun-terbit'];
		$jumlah_buku = $_POST['jumlah-buku'];

		$dataJenis = $app->getAllJenisBuku();
		$dataPenerbit = $app->getAllPenerbit();

		$app->inputBuku($judul, $jenis, $penerbit, $tahun_terbit, $jumlah_buku);
		$message = $app->getLastmessage();
	}
	

 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Input Buku
        </div>
        <div class="card-body">
			<form action="" method="post">
			  <div class="form-group row">
			    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="judul" name="judul" placeholder="input judul buku" required="required">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label class="col-sm-2 col-form-label">Jenis</label>
			    	<div class="col-sm-5">
					    <select class="form-control" id="jenis" name="jenis">
							<?php foreach ($dataJenis as $j) : ?>	
					    		<option value="<?=$j['kd_jenis']?>"><?=$j['jenis_buku']?></option>
					  		<?php endforeach ?>
					    </select>
					</div>
			  </div>
			  <div class="form-group row">
			    <label  class="col-sm-2 col-form-label">Penerbit</label>
			    	<div class="col-sm-5">
					    <select class="form-control" id="penerbit" name="penerbit">
							<?php foreach ($dataPenerbit as $p) : ?>	
					    		<option value="<?=$p['kd_penerbit']?>"><?=$p['penerbit']?></option>
					  		<?php endforeach ?>
					    </select>
					</div>
			  </div>		
			  <div class="form-group row">
			    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="tahun-terbit" name="tahun-terbit" placeholder="input tahun terbit" required="required">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="jumlah-buku" class="col-sm-2 col-form-label">Jumlah Buku</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="jumlah-buku" name="jumlah-buku" placeholder="input jumlah buku" required="required">
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