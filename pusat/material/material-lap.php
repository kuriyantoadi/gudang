<?php
  session_start();
  if ($_SESSION['status']!="pusat") {
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

  <title>Gudang Pusat</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../plugins/datatables/css/jquery.dataTables.min.css">

  <!-- Custom styles for this template -->
  <link href="../../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <?php include('menu.php'); ?>

      <div class="container">
        <h3 class="mt-4" style="margin-bottom: 30px">
          <center>Data Laporan Material</center>
        </h3>
        <button class="btn btn-danger btn-sm" style="margin-bottom: 20px" onclick="cetak()">Cetak Laporan</button>
        <table id="example" class="table table-bordered table-hover">
          <thead>
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
                <center>PJ. Petugas</td>
              <th>
                <center>PJ. Lapangan</td>

            </tr>
          </thead>

          <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from lap_pusat");
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
              <center><?php echo $d['pj_petugas']; ?>
            </td>
            <td>
              <center><?php echo $d['pj_lapangan']; ?>
            </td>

          </tr>
          <?php
          } ?>
        </table>
      </div>
    </div>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/datatables/js/jquery.dataTables.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
      $('#example').DataTable();
    });

    function cetak() {
      window.print();
    }
  </script>

</body>

</html>
