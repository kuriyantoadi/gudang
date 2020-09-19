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

  <title>Delivery Note</title>

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




      <div class="container">
        <h2 class="mt-4" style="margin-bottom: 30px">
          <center>Delivery Note</center>
        </h2>
        <?php
          include '../../koneksi.php';
          $kode_order = $_GET['kode_order'];
          $data = mysqli_query($koneksi, "select * from t_order where kode_order='$kode_order'");
          $d = mysqli_fetch_array($data)
              ?>

        <table style="margin-top: 50px">
          <tr>
            <td width="200px">Delivery Note Number :</td>
            <td width="400px">: <?php echo $d['kode_order'] ?></td>
            <td width="150px">Warehouse </td>
            <td>: <?php echo $d['warehouse'] ?></td>
          </tr>
          <tr>
            <td width="200px">Date </td>
            <td width="400px">: <?php echo $d['tanggal_order'] ?></td>
            <td width="150px">Devision/Project </td>
            <td>: <?php echo $d['devision'] ?></td>
          </tr>
          <tr>
            <td width="200px"> </td>
            <td width="400px"></td>
            <td width="150px">Po Number </td>
            <td>: <?php echo $d['kode_order'] ?></td>
          </tr>
          <tr>
            <td width="200px"> </td>
            <td width="400px"></td>
            <td width="150px">Origin Place </td>
            <td>: <?php echo $d['origin_place'] ?></td>
          </tr>
          <tr>
          <tr>
            <td width="200px"> </td>
            <td width="400px"></td>
            <td width="150px">Destionation </td>
            <td>: <?php echo $d['destionation'] ?></td>
          </tr>
          </tr>
        </table>

        <table class="table table-bordered" style="margin-top: 50px">
          <tr>
            <th><center>No</th>
            <th><center>Id Order</th>
            <th><center>Nama Material</th>
            <th><center>Qty</th>
            <th><center>Satuan</th>
            <th><center>Status</th>
            <th><center>kondisi</th>

          </tr>
          <?php
        include('../../koneksi.php');
        $data = mysqli_query($koneksi, "SELECT * from t_order where kode_order='$kode_order'");
        $no =1;
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
              <td><center><?php echo $no++ ?></td>
              <td><center><?php echo $d['kode_order']; ?></td>
              <td><center><?php echo $d['nama_material']; ?></td>
              <td><center><?php echo $d['jumlah_material']; ?></td>
              <td><center></td>
              <td><center><?php echo $d['status']; ?></td>
              <td><center><?php echo $d['kondisi']; ?></td>

            </tr>

        </table>

        <table style="margin-top: 50px">
          <tr>
            <th width="400px"><center>Pj. Warehouse Jakarta</td>
            <th width="400px"><center>Pj. Ekspedisi</td>
            <th width="400px"><center>Pj. Warehouse Pusat</td>
            <th width="400px"><center>Driver</td>
          </tr>
          <tr>
            <td height="80px"></td>
          </tr>
          <tr>
            <td><center><?php echo $d['pj_warehouse_pusat'] ?></td>
            <td><center><?php echo $d['pj_ekspedisi'] ?></td>
            <td><center><?php echo $d['pj_warehouse_cbg'] ?></td>
            <td><center><?php echo $d['driver'] ?></td>
          </tr>
        </table>
        <?php
        } ?>
      </div>
    </div>


    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
  window.print();
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
