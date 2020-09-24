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

  <title>Gudang Cabang</title>

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

        <?php include('menu.php')  ?>

      <div class="container">
        <h3 class="mt-4" style="margin-bottom: 30px">
          <center>Jumlah Pre Order</center>
        </h3>
        <form action="jml-up.php" method="post">
          <?php
            include '../../koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from t_order where id='$id'");
            while ($d = mysqli_fetch_array($data)) {
                ?>

          <table class="table table-bordered table-hover">
            <tr>
              <td>Kode Order</td>
              <td>
                <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>
                <input type="text" class="form-control" name="kode_order" value="<?php echo $d['kode_order'] ?>" readonly>
              </td>
            </tr>
            <tr>
              <td>Tanggal Order</td>
              <td>
                <input type="text" class="form-control" name="tanggal_order" value="<?php echo $d['tanggal_order'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>ID Material</td>
              <td>
                <input type="text" class="form-control" name="id_material" value="<?php echo $d['id_material'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Nama Material</td>
              <td>
                <input type="text" class="form-control" name="nama_material" value="<?php echo $d['nama_material'] ?>" disabled>
              </td>
            </tr>
            <tr>
              <td>Jumlah Order Material</td>
              <td>
                <input type="number" class="form-control" name="jumlah_material" value="<?php echo $d['jumlah_material'] ?>" required>
              </td>
            </tr>

          </table>
          <center><input type="submit" name="" class="btn btn-sm btn-success" value="Update"></center>
      </div>
    </div>
  <?php
            } ?>
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
