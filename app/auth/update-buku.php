<?php 
	$kd_penerbit = $_GET['kd-buku'];
	$data = $app->getBuku($kd_penerbit);
	$dataJenis = $app->getAllJenisBuku();
	$dataPenerbit = $app->getAllPenerbit();
	//var_dump($data);



	if(isset($_POST['submit'])) {
		$kd_buku = $_GET['kd-buku'];
		$judul = $_POST['judul'];
		$kd_jenis = $_POST['jenis'];
		$kd_penerbit = $_POST['penerbit'];
		$tahun_terbit = $_POST['tahun-terbit'];
		$jumlah_buku = $_POST['jumlah-buku'];

		$app->updateBuku($kd_buku, $judul, $kd_jenis, $kd_penerbit, $tahun_terbit, $jumlah_buku);
		$message = $app->getLastmessage();
		$data = $app->getBuku($kd_penerbit);

	} 
	


 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="col-sm4"></div>	
  	<div class="card mb-2">
        <div class="card-header">
          Update Buku
        </div>
        <div class="card-body">
			<form action="" method="post">
			  <div class="form-group row">
			    <label for="kode-buku" class="col-sm-2 col-form-label">Kode Buku</label>
			    <div class="col-sm-2">
			      <input type="text" class="form-control" id="kode-buku" name="kode-buku" value="<?=$data['kd_buku']?>" disabled>
			      <input type="text" class="form-control" id="kode-buku" name="kode-buku" value="<?=$data['kd_buku']?>" hidden>
			    </div>
			  </div>				
			  <div class="form-group row">
			    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="judul" name="judul" placeholder="input judul buku" required="required" value="<?=$data['judul']?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label class="col-sm-2 col-form-label">Jenis</label>
			    	<div class="col-sm-5">
					    <select class="form-control" id="jenis" name="jenis">
					    	<option value="<?=$data['kd_jenis']?>" selected><?=$data['jenis_buku']?></option>
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
					    	<option value="<?=$data['kd_penerbit']?>"><?=$data['penerbit']?></option>
							<?php foreach ($dataPenerbit as $p) : ?>	
					    		<option value="<?=$p['kd_penerbit']?>"><?=$p['penerbit']?></option>
					  		<?php endforeach ?>
					    </select>
					</div>
			  </div>		
			  <div class="form-group row">
			    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="tahun-terbit" name="tahun-terbit" placeholder="input tahun terbit" required="required" value="<?=$data['tahun_terbit']?>">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="jumlah-buku" class="col-sm-2 col-form-label">Jumlah Buku</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="jumlah-buku" name="jumlah-buku" placeholder="input jumlah buku" required="required" value="<?=$data['jumlah_buku']?>">
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