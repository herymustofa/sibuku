<?php 
	require_once "../db.php";
    require_once "../model.php";
    $app = new model($db);
    
    $app->logout();
    header('location: ../../index.php');
 ?>