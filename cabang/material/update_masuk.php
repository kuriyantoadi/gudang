<?php
  session_start();
  if ($_SESSION['status']!="cabang") {
      header("location:../../index.php?pesan=belum_login");
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gudang cabang</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <h5>Halaman Gudang cabang</h5>

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
        <form action="aksi_tambah.php" method="post">
          <?php
           // memanggil koneksi
           include('../koneksi.php');

           // jika checkbox yang di pilih lebih 0
           if (count($_POST['id_barang']) == 0) {
               header('Location: index.php');
           }

           foreach ($_POST['id_barang'] as $key=>$val) {
               $no=1;
               $id_barang = (int) $_POST['id_barang'][$key];
               $sql =  'SELECT * FROM barang_cabang';
               $sql .= ' WHERE id_barang='.$id_barang;

               // execute query
               // $data = mysqli_query($koneksi, "SELECT * from barang_cabang");
               $data = mysqli_query($koneksi, $sql);
               $d = mysqli_fetch_array($data);

               // fetch data
               $nama_barang = $d['nama_barang'];
               $jenis_barang = $d['jenis_barang'];
               $model_barang = $d['model_barang'];
               $jumlah_stok = $d['jumlah_stok']; ?>
          <a href="barang_tambah.php" style="margin-bottom: 30px" type="button" class="btn btn-sm btn-primary" name="button">Input Barang Baru</a>
          <table class="table table-bordered table-hover">
            <tr>
              <th>
                <center>No
              </th>
              <th>
                <center>ID Barang</td>
              <th>
                <center>Nama Barang</td>
              <th>
                <center>Jenis Barang</td>
              <th>
                <center>Model barang</td>
              <th>
                <center>Jumlah Barang Stok</td>
              <th>
                <center>Jumlah Barang Masuk</td>
            </tr>

            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['kode_barang']; ?></td>
              <td><?php echo $nama_barang; ?></td>
              <td><?php echo $d['jenis_barang']; ?></td>
              <td><?php echo $d['model_barang']; ?></td>
              <td><center><?php echo $d['jumlah_stok']; ?></td>
              <td><center>
                <input type="hidden" name="id_barang[]" value="<?php echo $id_barang; ?>">
                <input type="number" name="barang_masuk[]" value="<?php echo $barang_masuk; ?>">
              </center>
              </td>
            </tr>
            <?php
           } ?>
          </table>
          <center><input type="submit" name="" class="btn btn-success" value="Update Data Barang"></center>
      </div>
    </div>
    </form>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
