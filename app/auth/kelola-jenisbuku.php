       <?php 
          $data = $app->getAllJenisBuku();
          //var_dump($data);


        ?> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<div class="card mb-2">
                <div class="card-header">
                  Kelola Jenis Buku
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Buku</th>
                        <th scope="col">Deskripsi Buku</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach ($data as $d) : ?>
                      <tr>
                        <th scope="row"><?=$no?></th>
                        <td><?=$d['jenis_buku']?></td>
                        <td><?=$d['deskripsi']?></td>
                        <td> 
                        <a href="index.php?page=update-jenisbuku&kd-jenis=<?=$d['kd_jenis']?>" class="btn btn-warning btn-icon-split btn-sm">
                          <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                          </span>
                          <span class="text">Update</span>
                        </a>
                        <a href="index.php?page=del-jenisbuku&kd-jenis=<?=$d['kd_jenis']?>" class="btn btn-danger btn-icon-split btn-sm">
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