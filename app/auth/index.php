<?php 
    require_once "../db.php";
    require_once "../model.php";
    $app = new model($db);

 ?>
<?php include_once('header.php'); ?>

<?php include_once('sidebar.php') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php include_once('topbar.php'); ?>

<?php  
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
          case 'in-jenisbuku':
            include_once('in-jenisbuku.php');
            break;
          case 'kelola-jenisbuku':
            include_once('kelola-jenisbuku.php');
            break;  
          case 'update-jenisbuku':
            include_once('update-jenisbuku.php');
            break;  
          case 'del-jenisbuku':
            include_once('del-jenisbuku.php');
            break; 
          case 'in-penerbit':
            include_once('in-penerbit.php');
            break;
          case 'kelola-penerbit':
            include_once('kelola-penerbit.php');
            break;  
          case 'update-penerbit':
            include_once('update-penerbit.php');
            break;  
          case 'del-penerbit':
            include_once('del-penerbit.php');
            break;  
          case 'in-buku':
            include_once('in-buku.php');
            break;
          case 'kelola-buku':
            include_once('kelola-buku.php');
            break;  
          case 'update-buku':
            include_once('update-buku.php');
            break;  
          case 'del-buku':
            include_once('del-buku.php');
            break;

                                   
          default:
            echo "error page";
            break;
        }
    } else {
      include_once('dashboard.php');
    }
  
?>
<?php include_once('footer.php') ?>