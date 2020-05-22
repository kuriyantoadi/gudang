<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
      header("location:../login.php?pesan=belum_login");
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

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <h5>Halaman Gudang Pusat</h5>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Tampil Stok Barang </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="barang_masuk.php">Input Barang Masuk</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="barang_keluar.php">Input Barang Keluar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </nav>

      <div class="container">
        <h2 class="mt-4" style="margin-bottom: 30px">
          <center>Input Barang Baru</center>
        </h2>
        <form action="up_masuk.php" method="post">

          <table class="table table-bordered table-hover">
            <tr>
              <td>ID Barang</td>
              <td>
                <input type="text" class="form-control" name="id_barang" value="">
              </td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td>
                <input type="text" class="form-control" name="nama_barang" value="">
              </td>
            </tr>
            <tr>
              <td>Jenis Barang</td>
              <td>
                <input type="text" class="form-control" name="jenis_barang" value="">
              </td>
            </tr>
            <tr>
              <td>Model Barang</td>
              <td>
                <input type="text" class="form-control" name="model_barang" value="">
              </td>
            </tr>
            <tr>
              <td>Jumlah Stok</td>
              <td>
                <input type="text" class="form-control" name="jumlah_satuan" value="">
              </td>
            </tr>

          </table>
          <center><input type="submit" name="" class="btn btn-primary" value="Update Data Barang"></center>
      </div>
    </div>
    </form>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
