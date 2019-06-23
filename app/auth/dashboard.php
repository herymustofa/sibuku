        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

	          <div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="../../assets/img/default.jpg" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?=$app->getUser()['nama']?></h5>
			        <p class="card-text">user : <?=$app->getUser()['user']?> | status <?=$app->getUser()['status']?> </p>
			        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			      </div>
			    </div>
			  </div>
			</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->