<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
      header("location:../login.php?pesan=belum_login");
  }
  $kode_order = $_GET['kode_order'];

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gudang pusat</title>

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
        <h5>Halaman Gudang pusat</h5>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Tampil Stok Barang </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="data-material.php">Data Material</a>
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


    </div>
  </div>


    <!-- /#page-content-wrapper -->

    <div class="container">
      <h3 class="mt-4" style="margin-bottom: 30px">
        <center>Data Material</center>
      </h3>
        <table class="table table-bordered table-hover">
          <tr>
            <th>
              <center>No </th>
            <!-- <th>
              <center>ID Material</td> -->
            <th>
              <center>Nama Material</td>
            <th>
              <center>Jumlah Material</td>
            <th>
              <center>Jenis Satuan Material</td>

          </tr>
          <?php
        include('../../koneksi.php');
        $data = mysqli_query($koneksi, "SELECT * from gudang_pusat");
        $no =1;
        while ($d = mysqli_fetch_array($data)) {
            ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <!-- <td><?php echo $d['id_material']; ?></td> -->
            <td><?php echo $d['nama_material']; ?></td>
            <td><center><?php echo $d['jumlah_material']; ?></td>
            <td><center><?php echo $d['jenis_satuan_material']; ?></td>

          </tr>
          <?php
        } ?>
        </table>
    </div>



  <!-- awal preoder -->
  <div class="container">
  <h3 class="mt-4" style="margin-bottom: 30px">
  <center>Tabel Pre-Order</h3>
  <table class="table table-bordered table-hover">
    <tr>
      <th>
        <center>No
      </th>
      <th>
        <center>Tanggal Order
      </th>
      <th>
        <center>Nama Material
        </td>
      <th>
        <center>Jumlah Material
        </td>
        <th><center>Ekspedisi</th>
        <th>
          <center>kondisi
        </th>
        <th>
          <center>Status
        </td>
        <th>
          <center>ACC
        </th>
        <th>
          <center>REJECT
        </th>




    </tr>
    <?php
  include('../../koneksi.php');
  $kode_order = $_GET['kode_order'];

  $data = mysqli_query($koneksi, "SELECT * from t_order where kode_order=$kode_order");
  $no =1;
  while ($d = mysqli_fetch_array($data)) {
//
      $cek_material = $d['nama_material'];
      if (!empty($cek_material)) {
      } ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $d['tanggal_order']; ?></td>
      <td><?php echo $d['nama_material']; ?></td>
      <td><center><?php echo $d['jumlah_material']; ?></td>
      <td><center><?php echo $d['ekspedisi']; ?></td>
      <td><center><?php echo $d['status']; ?></td>
      <td><center><?php echo $d['kondisi']; ?></td>
<?php
    //validasi jika npsn kosong
    $cek_acc = $d['status'];
      if (($cek_acc)=="") {
          include('acc-opsi.php');
      } ?>


    </tr>
    <?php
  } ?>
  </table>
</div>

<div align="center">
  <table center>
    <tr>
      <td>
        <center><a type="button" style="margin-bottom: 60px;" class="btn btn-warning btn-md" href="index.php">Kembali</a>
      </td>
    </tr>
  </table>
</div>

</center>
  <!-- akhir preorder -->
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
