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
          <center>Tampil Data Order</center>
        </h3>
        <form action="update_masuk.php" method="post">
          <br><br>
          <table id="example" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>
                <center>No
              </th>
              <th>
                <center>ID Order</td>
              <th>
                <center>Tanggal Order</td>
              <th>
                <center>Status Order
              </th>
              <th>
                <center>Lihat</td>
              <th>
                <center>Cetak
              </th>
            </tr>
          </thead>
            <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, " SELECT DISTINCT kode_order, tanggal_order, kondisi, status FROM t_order ORDER BY kode_order DESC;");
          $no =1;
          while ($d = mysqli_fetch_array($data)) {
              ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php echo $d['kode_order']; ?></td>
              <td align="center"><?php echo $d['tanggal_order']; ?></td>
              <td align="center">
                <?php echo $d['status'] ?>
              </td>
              <td>
                <center><a type="bottom" class="btn btn-info btn-sm" href="order-tampil.php?kode_order=<?php echo $d['kode_order']; ?>">Lihat Order</a>
              </td>
              <td>
                <center><a type="bottom" class="btn btn-success btn-sm" href="cetak.php?kode_order=<?php echo $d['kode_order']; ?>"> Cetak Order</a>
              </td>

            </tr>
            <?php
          } ?>
          </table>
      </div>
    </div>
  </div>

  </form>

  <!-- /#page-content-wrapper -->




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
  </script>

</body>
</script>

</body>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
  });
</script>

</html>
