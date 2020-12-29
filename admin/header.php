<?php
ob_start();
session_start();
if ($_SESSION['status'] != "admin") {
  header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gudang Pusat</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../plugins/datatables/css/jquery.dataTables.min.css">


  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">


      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <h5><a href="index.php">Halaman Admin</a></h5>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu Pusat
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="pusat-material.php">Material Pusat</a>
                <a class="dropdown-item" href="pusat-order.php">Order Pusat</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu Cabang
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="cabang-material.php">Material Cabang</a>
                <a class="dropdown-item" href="cabang-order.php">Order Cabang</a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="datauser.php">Data Users</a>
            </li>
            <!-- <li class="nav-item ">
        <a class="nav-link" href="order/index.php">Pre-Order</a>
      </li> -->
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </nav>