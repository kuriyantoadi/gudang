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

            <!-- <th>
              <center>Edit</td>
            <th>
              <center>Hapus</td> -->
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
  <h3 style="margin-bottom: 30px">
  <?php
  $id_material = $_GET['id_material'];
  $kode_order = $_GET['kode_order'];
  $data = mysqli_query($koneksi, "SELECT * from t_order where kode_order=$kode_order and id_material=$id_material");
  $no =1;
  while ($d = mysqli_fetch_array($data)) {
      ?>


  <center>Tabel Pre-Order</h3>
    <form action="acc-up.php" method="post">
  <table class="table table-bordered table-hover">
    <tr>
      <td>Nama Material</td>
      <td>
        <input type="text" name="id_material" value="<?php echo $d['id_material']; ?>" hidden>
        <input type="text" name="kode_order" value="<?php echo $d['kode_order']; ?>" hidden>
        <input type="text" name="nama_material" value="<?php echo $d['nama_material'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>Jumlah Material</td>
      <td>
        <input type="text" name="jumlah_material" value="<?php echo $d['jumlah_material'] ?>" readonly>
      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td>
        <input type="text" name="status" value="Acc" readonly>
      </td>
    </tr>
    <tr>
      <td>Kondisi</td>
      <td>
        <textarea name="kondisi"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <center><input type="submit" name="" value="Update">
      </td>
    </tr>
  </form>

  </table>
<?php
  } ?>
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
