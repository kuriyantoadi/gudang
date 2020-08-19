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
          <center>Data Laporan PreOrder</center>
        </h3>
          <button class="btn btn-danger btn-sm" style="margin-bottom: 20px" onclick="cetak()">Cetak Laporan</button>
          <table id="example" class="table table-bordered">
            <thead>
            <tr>
              <th rowspan="3"><center>No</th>
              <th colspan="4" rowspan="2"><center>Status Pre Order</th>
              <th colspan="4"><center>Status Transaksi</th>
            </tr>
            <tr>
              <th colspan="2"><center>Di Kirim</th>
              <th colspan="2"><center>Di Terima</th>
            </tr>
            <tr>
              <th><center>Id Order</th>
              <th><center>Nama Material</th>
              <th><center>Kondisi</th>
              <th><center>Keterangan</th>
              <th><center>Waktu</th>
              <th><center>Nama Ekspedisi</th>
              <th><center>Waktu</th>
              <th><center>Nama Penerima</th>
            </tr>
          </thead>

            <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from t_order ");
          $no =1;
          while ($d = mysqli_fetch_array($data)) {
              ?>
              <tr>
                <td><center><?php echo $no++ ?></td>
                <td><center><?php echo $d['kode_order']; ?></td>
                <td><center><?php echo $d['nama_material']; ?></td>
                <td><center><?php echo $d['status']; ?></td>
                <td><center><?php echo $d['kondisi']; ?></td>
                <td><center><?php echo $d['tgl_kirim']; ?></td>
                <td><center><?php echo $d['ekspedisi']; ?></td>
                <td><center><?php echo $d['tgl_terima']; ?></td>
                <td><center><?php echo $d['nama_penerima']; ?></td>
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


    function cetak(){
      window.print();
    		}
  </script>

</body>

</html>
