       <?php 
          $data = $app->getAllPenerbit();
          //var_dump($data);


        ?> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<div class="card mb-2">
                <div class="card-header">
                  Kelola Penerbit
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach ($data as $d) : ?>
                      <tr>
                        <th scope="row"><?=$no?></th>
                        <td><?=$d['penerbit']?></td>
                        <td><?=$d['alamat']?></td>
                        <td> 
                        <a href="index.php?page=update-penerbit&kd-penerbit=<?=$d['kd_penerbit']?>" class="btn btn-warning btn-icon-split btn-sm">
                          <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                          </span>
                          <span class="text">Update</span>
                        </a>
                        <a href="index.php?page=del-penerbit&kd-penerbit=<?=$d['kd_penerbit']?>" class="btn btn-danger btn-icon-split btn-sm">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Delete</span>
                        </a>
                        </td>
                      </tr>
                    <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                </div>
             </div>          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->