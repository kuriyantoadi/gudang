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
          <center>Data Material</center>
        </h3>
        <form action="update_masuk.php" method="post">
          <a href="material-baru.php" style="margin-bottom: 30px" type="button" class="btn btn-sm btn-primary" name="button">Input Material Baru</a>
          <a href="material-lap.php" style="margin-bottom: 30px" type="button" class="btn btn-sm btn-warning" name="button">Laporan Material</a>
          <table id="example" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>
                <center>No </th>
              <th>
                <center>ID Material</td>
              <th>
                <center>Nama Material</td>
              <th>
                <center>Jumlah Material</td>
              <th>
                <center>Jenis Satuan Material</td>
              <th>
                <center>Material Masuk</td>
              <th>
                <center>Material Keluar</td>
              <!-- <th>
                <center>Edit</td>
              <th>
                <center>Hapus</td> -->
            </tr>
          </thead>
          <tbody>
            <?php
          include('../../koneksi.php');
          $data = mysqli_query($koneksi, "SELECT * from gudang_pusat");
          $no =1;
          while ($d = mysqli_fetch_array($data)) {
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['id_material']; ?></td>
              <td><?php echo $d['nama_material']; ?></td>
              <td><center><?php echo $d['jumlah_material']; ?></td>
              <td><center><?php echo $d['jenis_satuan_material']; ?></td>
              <td>
                <center><a type="bottom" class="btn btn-success btn-sm" href="material-masuk.php?id_material=<?php echo $d['id_material']; ?>">Material Masuk</a>
              </td>
              <td>
                <center><a type="bottom" class="btn btn-primary btn-sm" href="material-keluar.php?id_material=<?php echo $d['id_material']; ?>">Material Keluar</a>
              </td>
              <!-- <td>
                <center><a type="bottom" class="btn btn-warning btn-sm" href="material-edit.php?id_material=<?php echo $d['id_material']; ?>">Edit</a>
              </td>
              <td>
                <center>
                  <a type="button" class="btn btn-danger btn-sm" href="up_hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Anda yakin Hapus data material <?php echo $d['nama_material']; ?> ?')">Hapus</a>
                </center>
              </td> -->
            </tr>
            <?php
          } ?>
        </tbody>
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
   <script src="../../plugins/datatables/js/jquery.dataTables.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').DataTable();
  });
</script>

</html>
