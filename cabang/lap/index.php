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

      <?php include('../menu.php'); ?>

      <div class="container">
        <h3 class="mt-4" style="margin-bottom: 30px">
          <center>Data Laporan</center>
        </h3>
        <form action="update_masuk.php" method="post">
          <table class="table table-bordered table-hover">
            <tr>
              <th>
                <center>No
              </th>
              <th>
                <center>ID Material</td>
              <th>
                <center>Nama Material</td>
              <th>
                <center>Jumlah Material</td>
              <th>
                <center>Jenis Satuan Material</td>
              <th>
                <center>Status Barang</td>
              <th>
                <center>Tanggal</td>
              <th>
                <center>Penanggug Jawab</td>

            </tr>
            <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from lap_cabang");
          $no =1;
          while ($d = mysqli_fetch_array($data)) {
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['id_material']; ?></td>
              <td><?php echo $d['nama_material']; ?></td>
              <td>
                <center><?php echo $d['jumlah_material']; ?>
              </td>
              <td>
                <center><?php echo $d['jenis_satuan_material']; ?>
              </td>
              <td>
                <center><?php echo $d['status_barang']; ?>
              </td>
              <td>
                <center><?php echo $d['tanggal']; ?>
              </td>
              <td>
                <center><?php echo $d['penanggung_jawab']; ?>
              </td>

            </tr>
            <?php
          } ?>
          </table>
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