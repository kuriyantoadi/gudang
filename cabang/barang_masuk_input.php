<?php
  session_start();
  if ($_SESSION['status']!="cabang") {
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

  <title>Gudang Cabang</title>

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
        <h5>Halaman Cabang</h5>

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
          <center>Input Barang Masuk</center>
        </h2>
        <form action="up_masuk.php" method="post">
          <?php
            include '../koneksi.php';
            $id_barang = $_GET['id_barang'];
            $data = mysqli_query($koneksi, "select * from barang_cabang where id_barang='$id_barang'");
            while ($d = mysqli_fetch_array($data)) {
                ?>

          <table class="table table-bordered table-hover">
            <tr>
              <td>ID Barang</td>
              <td>
                <input type="text" name="id_barang" value="<?php echo $d['id_barang']; ?>" hidden>
                <input type="text" class="form-control" name="kode_barang" value="<?php echo $d['kode_barang'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $d['nama_barang'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Jenis Barang</td>
              <td>
                <input type="text" class="form-control" name="jenis_barang" value="<?php echo $d['jenis_barang'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Model Barang</td>
              <td>
                <input type="text" class="form-control" name="model_barang" value="<?php echo $d['model_barang'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Jumlah Stok</td>
              <td>
                <input type="text" class="form-control" name="jumlah_satuan" value="<?php echo $d['jumlah_stok'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Jumlah Barang Masuk</td>
              <td>
                <input type="text" class="form-control" name="barang_masuk" required>
              </td>
            </tr>

          </table>
          <center><input type="submit" name="" class="btn btn-primary" value="Update Data Barang"></center>
      </div>
    </div>
  <?php
            } ?>
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
